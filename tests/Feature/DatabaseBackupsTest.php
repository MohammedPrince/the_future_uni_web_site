<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

/**
 * Admin > Database Backups, against a temporary folder (never the real one).
 *
 *   php artisan test --filter=DatabaseBackupsTest
 */
class DatabaseBackupsTest extends TestCase
{
    private string $dir;
    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->dir = storage_path('framework/testing/db-backups-' . uniqid());
        File::ensureDirectoryExists($this->dir . '/sub');
        File::put($this->dir . '/fu-2026-11-01.sql', 'CREATE TABLE a;');
        File::put($this->dir . '/fu-2026-11-02.sql.gz', 'gz');
        File::put($this->dir . '/.htaccess', 'Require all denied');
        File::put($this->dir . '/sub/hidden.sql', 'x');
        File::put(dirname($this->dir) . '/outside.sql', 'secret');
        config(['site.db_backups_path' => $this->dir]);

        $this->admin = (new User())->forceFill([
            'id' => 0, 'username' => 'test', 'user_fullname' => 'Test', 'isAdmin' => '1', 'del' => 0,
            'password' => Hash::make('right-password'),
        ]);
    }

    protected function tearDown(): void
    {
        File::deleteDirectory($this->dir);
        File::delete(dirname($this->dir) . '/outside.sql');
        parent::tearDown();
    }

    private function unlocked()
    {
        return $this->actingAs($this->admin)->withSession(['db_backups_unlocked' => ['user' => 0, 'at' => time()]]);
    }

    public function test_needs_admin_and_password()
    {
        $this->get('/db_backups')->assertForbidden();

        $this->actingAs($this->admin)->get('/db_backups')->assertOk()
            ->assertSee('Confirm your password')->assertDontSee('fu-2026-11-01.sql');
        $this->actingAs($this->admin)->get('/db_backups/file/fu-2026-11-01.sql')->assertRedirect('/db_backups');

        $this->actingAs($this->admin)->post('/db_backups/unlock', ['password' => 'wrong'])
            ->assertSessionHas('failure', 'Wrong password.');
        $this->actingAs($this->admin)->post('/db_backups/unlock', ['password' => 'right-password'])
            ->assertSessionHas('db_backups_unlocked');
    }

    public function test_lists_only_backup_files()
    {
        $this->unlocked()->get('/db_backups')->assertOk()
            ->assertSee('fu-2026-11-01.sql')
            ->assertSee('fu-2026-11-02.sql.gz')
            ->assertDontSee('hidden.sql')
            ->assertSee('Web access blocked');
    }

    public function test_downloads_one_file_and_a_zip()
    {
        $response = $this->unlocked()->get('/db_backups/file/fu-2026-11-01.sql')->assertOk();
        $this->assertStringContainsString('fu-2026-11-01.sql', $response->headers->get('Content-Disposition'));
        $this->assertSame('CREATE TABLE a;', file_get_contents($response->baseResponse->getFile()->getPathname()));

        $zip = $this->unlocked()->post('/db_backups/zip', ['all' => '1'])->assertOk();
        $this->assertStringContainsString('.zip', $zip->headers->get('Content-Disposition'));
        $archive = new \ZipArchive();
        $archive->open($zip->baseResponse->getFile()->getPathname());
        $names = [];
        for ($i = 0; $i < $archive->numFiles; $i++) {
            $names[] = $archive->getNameIndex($i);
        }
        // Already-compressed backups are stored, not compressed again.
        $this->assertSame(\ZipArchive::CM_STORE, $archive->statName('fu-2026-11-02.sql.gz')['comp_method']);
        $archive->close();
        sort($names);
        $this->assertSame(['fu-2026-11-01.sql', 'fu-2026-11-02.sql.gz'], $names);
    }

    public function test_paths_outside_the_folder_are_refused()
    {
        foreach (['..%2Foutside.sql', '.htaccess', 'sub%2Fhidden.sql', 'missing.sql'] as $name) {
            $this->unlocked()->get('/db_backups/file/' . $name)->assertNotFound();
        }

        $this->unlocked()->post('/db_backups/delete', ['files' => ['../outside.sql', '.htaccess', 'sub/hidden.sql']])
            ->assertSessionHas('failure', 'Select at least one file.');
        $this->assertFileExists(dirname($this->dir) . '/outside.sql');
        $this->assertFileExists($this->dir . '/.htaccess');
    }

    public function test_deletes_selected_then_all()
    {
        $this->unlocked()->post('/db_backups/delete', ['files' => ['fu-2026-11-01.sql']])
            ->assertSessionHas('success', '1 file(s) deleted.');
        $this->assertFileDoesNotExist($this->dir . '/fu-2026-11-01.sql');
        $this->assertFileExists($this->dir . '/fu-2026-11-02.sql.gz');

        $this->unlocked()->post('/db_backups/delete', ['all' => '1'])->assertSessionHas('success', '1 file(s) deleted.');
        $this->assertFileDoesNotExist($this->dir . '/fu-2026-11-02.sql.gz');
        $this->assertFileExists($this->dir . '/.htaccess');
        $this->assertFileExists($this->dir . '/sub/hidden.sql');
    }

    public function test_block_web_access_writes_htaccess()
    {
        File::delete($this->dir . '/.htaccess');
        $this->unlocked()->post('/db_backups/protect')->assertSessionHas('success');
        $this->assertStringContainsString('Require all denied', file_get_contents($this->dir . '/.htaccess'));
    }
}
