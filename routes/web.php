<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\LinkageController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SiteSettingsController;
use App\Http\Controllers\DatabaseBackupsController;
use App\Http\Controllers\HomeSlidesController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\StaffInformationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SecurityScanController;
use App\Http\Controllers\ServerToolsController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Artisan;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Admin routes////////////////////////////////
// 'guest' sends users who are already logged in to the admin area instead of showing the form again.
Route::get('/admin_panel', function () {
    return view('admin.login');
})->middleware('guest');

Route::middleware(['adminType', 'same.site'])->group(function () {

    // Admin home: website status, counts and shortcuts.
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // SECURITY: cache clear is admin-only (was public).
    Route::get('/clear', function () {
        Artisan::call('optimize:clear');
        return 'Caching, routes, and configuration cleared successfully.';
    })->name('clear');

    //Users//
    Route::get('/add_user', [UserController::class, "showUser"]);
    Route::post('/add_user', [UserController::class, "addUser"])->name('add_user');
    Route::get('/edit_user/{user}/edit/', [UserController::class, "showEditForm"])->name('edit_user');
    Route::get('/add_user/{user}/delete/', [UserController::class, "deleteUser"])->name('delete_user');
    Route::put('/edit_user/{user}', [UserController::class, "editUser"])->name('editsubmit');
    Route::get('/add_user/{user:id}/edit', [UserController::class, "showUser"]);
    Route::get('/profile', [UserController::class, "user_profile"])->name('profile');
    Route::get('/new_edit_user/{id}/edit/', [UserController::class, "newPage"]);

    //Events//
    Route::get('/add_event', [EventsController::class, "showEvents"])->name('add_event');
    Route::post('/add_event', [EventsController::class, "addEvent"]);
    Route::get('/add_event/{event}/delete/', [EventsController::class, "deleteEvent"]);
    Route::get('/add_event/{event}/status/{event_status}', [EventsController::class, "eventStatus"]);
    Route::get('/edit_event/{event}/edit/', [EventsController::class, "showEditForm"])->name('edit_event');
    Route::post('/edit_event/{event}', [EventsController::class, "editEvent"])->name('eventsubmit');

    //News//
    Route::get('/add_news', [NewsController::class, "showNews"])->name('add_news');
    Route::post('/add_news', [NewsController::class, "addNews"]);
    Route::get('/add_news/{news}/status/{news_status}', [NewsController::class, "newsStatus"]);
    Route::get('/edit_news/{news}/edit/', [NewsController::class, "showEditForm"]);
    Route::post('/edit_news/{news}', [NewsController::class, "editNews"])->name('editnews_submit');
    Route::get('/add_news/{news}/delete/', [NewsController::class, "deleteNews"]);

    // Linkages
    Route::get('/linkage', [LinkageController::class, "index"])->name('linkage');
    Route::post('/add_linkage', [LinkageController::class, "store"]);
    Route::get('/edit_linkage/{id}/edit', [LinkageController::class, "show"]);
    Route::post('/edit_linkage/{id}', [LinkageController::class, "edit"])->name('editlinkage');
    Route::get('/linkage/{id}/delete', [LinkageController::class, "destroy"])->name('deletelinkage');

    // Fee Structure: the tables on the public /Fee-Structure page.
    Route::get('/fee_structure', [FeeController::class, 'index'])->name('fee_structure');
    Route::post('/fee_structure/sections', [FeeController::class, 'storeSection'])->name('fees.sections.store');
    Route::get('/fee_structure/sections/{section}/edit', [FeeController::class, 'editSection'])->name('fees.sections.edit');
    Route::put('/fee_structure/sections/{section}', [FeeController::class, 'updateSection'])->name('fees.sections.update');
    Route::delete('/fee_structure/sections/{section}', [FeeController::class, 'destroySection'])->name('fees.sections.destroy');
    Route::post('/fee_structure/items', [FeeController::class, 'storeItem'])->name('fees.items.store');
    Route::get('/fee_structure/items/{item}/edit', [FeeController::class, 'editItem'])->name('fees.items.edit');
    Route::put('/fee_structure/items/{item}', [FeeController::class, 'updateItem'])->name('fees.items.update');
    Route::post('/fee_structure/items/{item}/toggle', [FeeController::class, 'toggleItem'])->name('fees.items.toggle');
    Route::delete('/fee_structure/items/{item}', [FeeController::class, 'destroyItem'])->name('fees.items.destroy');

    // Site Settings: contact details, links, announcement bar, maintenance mode.
    Route::get('/site_settings', [SiteSettingsController::class, 'index'])->name('site_settings');
    Route::post('/site_settings', [SiteSettingsController::class, 'update'])->name('site_settings.update');
    Route::post('/site_settings/maintenance', [SiteSettingsController::class, 'maintenance'])->name('site_settings.maintenance');
    Route::get('/site_settings/preview', [SiteSettingsController::class, 'preview'])->name('site_settings.preview');

    // Home page: top slider and alumni testimonials.
    Route::get('/home_slider', [HomeSlidesController::class, 'index'])->name('slides.index');
    Route::post('/home_slider', [HomeSlidesController::class, 'store'])->name('slides.store');
    Route::get('/home_slider/{slide}/edit', [HomeSlidesController::class, 'edit'])->name('slides.edit');
    Route::put('/home_slider/{slide}', [HomeSlidesController::class, 'update'])->name('slides.update');
    Route::post('/home_slider/{slide}/toggle', [HomeSlidesController::class, 'toggle'])->name('slides.toggle');
    Route::delete('/home_slider/{slide}', [HomeSlidesController::class, 'destroy'])->name('slides.destroy');

    Route::get('/testimonials', [TestimonialsController::class, 'index'])->name('testimonials.index');
    Route::post('/testimonials', [TestimonialsController::class, 'store'])->name('testimonials.store');
    Route::get('/testimonials/{testimonial}/edit', [TestimonialsController::class, 'edit'])->name('testimonials.edit');
    Route::put('/testimonials/{testimonial}', [TestimonialsController::class, 'update'])->name('testimonials.update');
    Route::post('/testimonials/{testimonial}/toggle', [TestimonialsController::class, 'toggle'])->name('testimonials.toggle');
    Route::delete('/testimonials/{testimonial}', [TestimonialsController::class, 'destroy'])->name('testimonials.destroy');

    // Staff information
    Route::get('/staff', [StaffInformationController::class, "index"])->name('staff');
    Route::post('/add_staff', [StaffInformationController::class, "store"]);
    Route::get('/saff_cv/{id}/staff_cv', [StaffInformationController::class, "Show_cv"]);
    Route::post('/saff_cv/{id}/add_cv', [StaffInformationController::class, "Add_cv"]);
    Route::get('/edit_staff/{id}', [StaffInformationController::class, "show"])->name('edit_staff');
    Route::post('/update_staff/{id}', [StaffInformationController::class, "update"])->name('update_staff');
    Route::get('/staff/{id}/delete', [StaffInformationController::class, "destroy"])->name('deletestaff');
});

// Security scanner (admin + SECURITY_SCANNER_KEY). 404 when the key is not set.
Route::middleware(['adminType', 'throttle:30,1'])->prefix('security_scan')->group(function () {
    Route::get('/', [SecurityScanController::class, 'index'])->name('security.index');
    Route::post('/unlock', [SecurityScanController::class, 'unlock'])->middleware('throttle:5,10')->name('security.unlock');
    Route::post('/lock', [SecurityScanController::class, 'lock'])->name('security.lock');
    Route::post('/scan', [SecurityScanController::class, 'scan'])->name('security.scan');
    Route::post('/quarantine', [SecurityScanController::class, 'quarantine'])->name('security.quarantine');
    Route::post('/undo', [SecurityScanController::class, 'undo'])->name('security.undo');
    Route::post('/restore-index', [SecurityScanController::class, 'restoreIndex'])->name('security.restore');
    Route::post('/kick', [SecurityScanController::class, 'kick'])->name('security.kick');
});

// Maintenance commands (admin + own password again).
Route::middleware(['adminType'])->prefix('server_tools')->group(function () {
    Route::get('/', [ServerToolsController::class, 'index'])->name('tools.index');
    Route::post('/unlock', [ServerToolsController::class, 'unlock'])->middleware('throttle:5,10')->name('tools.unlock');
    Route::post('/lock', [ServerToolsController::class, 'lock'])->name('tools.lock');
    Route::post('/run', [ServerToolsController::class, 'run'])->middleware('throttle:20,1')->name('tools.run');
});

// Database backup files (admin + own password again).
Route::middleware(['adminType'])->prefix('db_backups')->group(function () {
    Route::get('/', [DatabaseBackupsController::class, 'index'])->name('backups.index');
    Route::post('/unlock', [DatabaseBackupsController::class, 'unlock'])->middleware('throttle:5,10')->name('backups.unlock');
    Route::post('/lock', [DatabaseBackupsController::class, 'lock'])->name('backups.lock');
    Route::get('/file/{file}', [DatabaseBackupsController::class, 'download'])->where('file', '[^/\\\\]+')->name('backups.download');
    Route::post('/zip', [DatabaseBackupsController::class, 'downloadZip'])->name('backups.zip');
    Route::post('/delete', [DatabaseBackupsController::class, 'delete'])->middleware('throttle:20,1')->name('backups.delete');
    Route::post('/protect', [DatabaseBackupsController::class, 'protect'])->name('backups.protect');
});

Route::get('/logout', [UserController::class, "logout"]);
// SECURITY: brute-force protection on login (5 attempts / minute).
Route::post('/login', [UserController::class, "login"])->middleware(['guest', 'throttle:5,1']);
// SECURITY: the public /register route was removed. It created and logged in
// an "admin" account with password "123" for anyone who visited it.



//Client routes //

// Public pages use no login, so they skip sessions and cookies. That lets the
// page cache and browsers keep them.
$noSession = [
    \App\Http\Middleware\EncryptCookies::class,
    \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
    \Illuminate\Session\Middleware\StartSession::class,
    \Illuminate\View\Middleware\ShareErrorsFromSession::class,
    \App\Http\Middleware\VerifyCsrfToken::class,
];

Route::get('/sitemap.xml', [SitemapController::class, 'index'])
    ->middleware('page.cache')->withoutMiddleware($noSession)->name('sitemap');

// Google Search Console ownership file. Only names listed in config/seo.php work.
Route::get('/{file}.html', function (string $file) {
    abort_unless(in_array($file, config('seo.google_files'), true), 404);

    return response("google-site-verification: {$file}.html", 200, ['Content-Type' => 'text/html; charset=UTF-8']);
})->where('file', 'google[0-9a-f]{16}')->withoutMiddleware($noSession)->name('google.file');

// Old addresses: one page, one URL.
Route::permanentRedirect('/Home', '/')->withoutMiddleware($noSession);
Route::permanentRedirect('/news_events', '/News-and-Events')->withoutMiddleware($noSession);

Route::middleware(['site.maintenance', 'visitor', 'page.cache'])->withoutMiddleware($noSession)->group(function () {


    // Route::get('/', function () {
    //     return view('client.Home');
    // });

    // Route::get('/Home', function () {
    //     return view('client.Home');
    // })->name('Home');

    Route::get('/', [HomeController::class, "index"])->name('Home');



    Route::get('/About-FU', function () {
        return view('client.About-FU');
    })->name('About-FU');

    Route::get('/Fu-Linkages', function () {
        return view('client.Fu-Linkages');
    })->name('Fu-Linkages');

    Route::get('/Fu-Journal', function () {
        return view('client.Fu-Journal');
    })->name('Fu-Journal');

    Route::get('/Fu-Historical-Gallery', function () {
        return view('client.Fu-Historical-Gallery');
    })->name('Fu-Historical-Gallery');


    Route::get('/Student-Affairs', function () {
        return view('client.Student-Affairs');
    })->name('Student-Affairs');


    // new pages

    Route::get('/UNESCO', function () {
        return view('client.UNESCO');
    })->name('UNESCO');


    Route::get('/Space-Technology-Center', function () {
        return view('client.Space-technology-reserch-center');
    })->name('Space-Technology-Center');


    Route::get('/ICDL', function () {
        return view('client.ICDL');
    })->name('ICDL');


    // Staff Directory
    // Route::get('/Staff-Directory', [StaffDirectoryController::class, "index"])->name('Staff-Directory');
    // Route::post('/Staff-Directory', [StaffDirectoryController::class, "Search_Staff"])->name('Staff-Directory-POST');
    // Route::get('/staff_details/{encryptedId}', [StaffDirectoryController::class, "showStaffDetails"])->name('Staff-Details');


    Route::get('/Students-Gallery', function () {
        return view('client.Students-Gallery');
    })->name('Students-Gallery');

    Route::get('/Undergraduate-Admission', function () {
        return view('client.Undergraduate-Admission');
    })->name('Undergraduate-Admission');

    Route::get('/Undergraduate-Programs', function () {
        return view('client.Undergraduate-Programs');
    })->name('Undergraduate-Programs');

    Route::get('/Postgraduates-Programs', function () {
        return view('client.Postgraduates-Programs');
    })->name('Postgraduates-Programs');

    Route::get('/Postgraduate-Admission', function () {
        return view('client.Postgraduate-Admission');
    })->name('Postgraduate-Admission');

    Route::get('/External-Transfer', function () {
        return view('client.External-Transfer');
    })->name('External-Transfer');

    Route::get('/Facts-Figures', function () {
        return view('client.Facts-Figures');
    })->name('Facts-Figures');

    Route::get('/CESD', function () {
        return view('client.CESD');
    })->name('CESD');

    Route::get('/CTS', function () {
        return view('client.CTS');
    })->name('CTS');

    Route::get('/IRDC', function () {
        return view('client.IRDC');
    })->name('IRDC');


    Route::get('/Fee-Structure', [FeeController::class, 'page'])->name('Fees');

    Route::get('/Scholarships', function () {
        return view('client.Scholarships');
    })->name('Scholarships');

});


Route::middleware(['site.maintenance', 'visitor', 'page.cache'])->withoutMiddleware($noSession)->group(function () {
    Route::get('/Event-Details/{event}', [EventsController::class, "eventDetails"])->name('eventDetails');
    Route::get('/News-Details/{news}', [NewsController::class, "newsDetails"])->name('newsDetails');
    Route::get('/News-and-Events', [NewsController::class, "NewsAndEvents"])->name('NewsAndEvents');
    Route::get('/Facts-Figures', [ChartController::class, 'barChart'])->name('barChart');
});

// Live search box. Not cached.
Route::get('/search', [NewsController::class, 'search'])->middleware(['site.maintenance', 'throttle:60,1'])->withoutMiddleware($noSession)->name('search');
