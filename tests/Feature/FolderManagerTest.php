<?php

namespace Tests\Feature;

use App\Http\Controllers\FolderManagerController;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

/**
 * Admin > Server Folders, inside a temporary folder tree (never real folders).
 *
 *   php artisan test --filter=FolderManagerTest
 */
class FolderManagerTest extends TestCase
{
    private string $base;
    private string $root;
    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        // Outside the app: anything inside the website folder is (rightly) protected.
        $this->base = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'fu-folders-test-' . uniqid();
        $this->root = $this->base . '/vhosts';
        File::ensureDirectoryExists($this->root . '/fu.edu.sd/public_html/old_site/assets/img');
        File::ensureDirectoryExists($this->root . '/fu.edu.sd/httpdocs');
        File::put($this->root . '/fu.edu.sd/public_html/old_site/index.html', '<h1>old</h1>');
        File::put($this->root . '/fu.edu.sd/public_html/old_site/assets/img/a.png', str_repeat('x', 2048));
        File::ensureDirectoryExists($this->base . '/outside');
        File::put($this->base . '/outside/keep.txt', 'keep');

        config(['site.folder_roots' => [$this->root, $this->base . '/missing-root']]);

        $this->admin = (new User())->forceFill([
            'id' => 0, 'username' => 'test', 'user_fullname' => 'Test', 'isAdmin' => '1', 'del' => 0,
            'password' => Hash::make('right-password'),
        ]);
    }

    protected function tearDown(): void
    {
        File::deleteDirectory($this->base);
        parent::tearDown();
    }

    private function unlocked()
    {
        return $this->actingAs($this->admin)->withSession(['folder_manager_unlocked' => ['user' => 0, 'at' => time()]]);
    }

    private function real(string $path): string
    {
        return realpath($path);
    }

    public function test_needs_admin_and_password()
    {
        $this->get('/folders')->assertForbidden();
        $this->actingAs($this->admin)->get('/folders?path=' . urlencode($this->root))
            ->assertOk()->assertSee('Confirm your password')->assertDontSee('fu.edu.sd');
        $this->actingAs($this->admin)->post('/folders/unlock', ['password' => 'wrong'])->assertSessionHas('failure', 'Wrong password.');
        $this->actingAs($this->admin)->post('/folders/unlock', ['password' => 'right-password'])->assertSessionHas('folder_manager_unlocked');
    }

    public function test_shows_the_content_of_a_folder()
    {
        $this->unlocked()->get('/folders')->assertOk()->assertSee($this->real($this->root))->assertDontSee('missing-root');

        $this->unlocked()->get('/folders?path=' . urlencode($this->root . '/fu.edu.sd/public_html/old_site'))
            ->assertOk()
            ->assertSee('assets')
            ->assertSee('index.html')
            ->assertSee('Type <strong>old_site</strong> to confirm', false)
            ->assertSee('Delete folder');
    }

    public function test_folders_outside_the_roots_are_refused()
    {
        foreach ([$this->base . '/outside', $this->root . '/../outside', 'C:\\Windows', '/etc'] as $path) {
            $this->unlocked()->get('/folders?path=' . urlencode($path))->assertRedirect('/folders');
            $this->unlocked()->post('/folders/delete', ['path' => $path, 'confirm_name' => basename($path)])->assertRedirect('/folders');
        }
        $this->assertFileExists($this->base . '/outside/keep.txt');
    }

    public function test_deletes_a_folder_after_typing_its_name()
    {
        $dir = $this->root . '/fu.edu.sd/public_html/old_site';

        $this->unlocked()->post('/folders/delete', ['path' => $dir, 'confirm_name' => 'wrong'])
            ->assertSessionHasErrors('confirm_name');
        $this->assertDirectoryExists($dir);

        $this->unlocked()->post('/folders/delete', ['path' => $dir, 'confirm_name' => 'old_site'])
            ->assertRedirect('/folders?path=' . urlencode($this->real($this->root . '/fu.edu.sd/public_html')))
            ->assertSessionHas('success');
        $this->assertDirectoryDoesNotExist($dir);
        $this->assertDirectoryExists($this->root . '/fu.edu.sd/public_html');
        $this->assertFileExists($this->base . '/outside/keep.txt');
    }

    public function test_roots_and_hosting_folders_cannot_be_deleted()
    {
        foreach ([$this->root, $this->root . '/fu.edu.sd/public_html', $this->root . '/fu.edu.sd/httpdocs'] as $dir) {
            $this->unlocked()->post('/folders/delete', ['path' => $dir, 'confirm_name' => basename($dir)])
                ->assertSessionHas('failure');
            $this->assertDirectoryExists($dir);
        }
    }

    public function test_the_website_folder_and_its_parents_are_protected()
    {
        // Checked directly: a delete request for the real website folder is never sent.
        config(['site.folder_roots' => [dirname(base_path(), 2)]]);
        $reason = new \ReflectionMethod(FolderManagerController::class, 'protectedReason');
        $reason->setAccessible(true);
        $controller = new FolderManagerController();

        $this->assertNotNull($reason->invoke($controller, realpath(base_path())));
        $this->assertNotNull($reason->invoke($controller, realpath(dirname(base_path()))));
        $this->assertNotNull($reason->invoke($controller, realpath(base_path('storage'))));
    }

    public function test_links_inside_a_deleted_folder_are_not_followed()
    {
        $dir = $this->root . '/fu.edu.sd/public_html/old_site';
        if (!@symlink($this->base . '/outside', $dir . '/link-to-outside')) {
            $this->markTestSkipped('This system does not allow creating symbolic links.');
        }

        $this->unlocked()->post('/folders/delete', ['path' => $dir, 'confirm_name' => 'old_site'])->assertSessionHas('success');
        $this->assertDirectoryDoesNotExist($dir);
        $this->assertFileExists($this->base . '/outside/keep.txt');
    }
}
