<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\SearchAutoCompleteController;

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

// Route::get('/temp', function () {
//     return view('admin.temp');
// });


//Admin routes////////////////////////////////
Route::get('/admin_panel', function () {
    return view('admin.login');
});

Route::middleware(['adminType'])->group(function () {

    Route::get('/add_user', function () {
        return view('admin.add_user');
    });

    Route::get('/add_event', function () {
        return view('admin.add_events');
    });

    Route::get('/add_news', function () {
        return view('admin.add_news');
    });

    //Users//
    Route::post('/add_user', [UserController::class, "addUser"]);
    Route::get('/edit_user/{user}/edit/', [UserController::class, "showEditForm"]);
    Route::get('/add_user/{user}/delete/', [UserController::class, "deleteUser"]);
    Route::put('/edit_user/{user}', [UserController::class, "editUser"]);
    Route::get('/add_user', [UserController::class, "showUser"]);
    Route::get('/add_user/{user:id}/edit', [UserController::class, "showUser"]);
    Route::get('/profile', [UserController::class, "user_profile"]);

    //Event Routes  middleware and controllers //
    Route::post('/add_event', [EventsController::class, "addEvent"]);
    Route::get('/add_event', [EventsController::class, "showEvents"]);
    Route::get('/add_event/{event}/delete/', [EventsController::class, "deleteEvent"]);
    Route::get('/add_event/{event}/status/{event_status}', [EventsController::class, "eventStatus"]);
    Route::get('/edit_event/{event}/edit/', [EventsController::class, "showEditForm"]);
    Route::post('/edit_event/{event}', [EventsController::class, "editEvent"]);

    //News Routes  middleware and controllers //
    Route::post('/add_news', [NewsController::class, "addNews"]);
    Route::get('/add_news', [NewsController::class, "showNews"]);
    Route::get('/edit_news/{news}/edit/', [NewsController::class, "showEditForm"]);
    Route::post('/edit_news/{news}', [NewsController::class, "editNews"]);
    Route::get('/add_news/{news}/delete/', [NewsController::class, "deleteNews"]);


});


Route::middleware(['mustBeLoggedIn'])->group(function () {

    Route::get('/add_event', function () {
        return view('admin.add_events');
    });

    Route::get('/add_news', function () {
        return view('admin.add_news');
    });

    //Event Routes  middleware and controllers //
    Route::post('/add_event', [EventsController::class, "addEvent"]);
    Route::get('/add_event', [EventsController::class, "showEvents"]);
    Route::get('/add_event/{event}/delete/', [EventsController::class, "deleteEvent"]);
    Route::get('/add_event/{event}/status/{event_status}', [EventsController::class, "eventStatus"]);
    Route::get('/edit_event/{event}/edit/', [EventsController::class, "showEditForm"]);
    Route::post('/edit_event/{event}', [EventsController::class, "editEvent"]);

    //News Routes  middleware and controllers //
    Route::post('/add_news', [NewsController::class, "addNews"]);
    Route::get('/add_news', [NewsController::class, "showNews"]);
    Route::get('/edit_news/{news}/edit/', [NewsController::class, "showEditForm"]);
    Route::post('/edit_news/{news}', [NewsController::class, "editNews"]);
    Route::get('/add_news/{news}/delete/', [NewsController::class, "deleteNews"]);

});

Route::get('/logout', [UserController::class, "logout"]);
Route::post('/login', [UserController::class, "login"])->middleware('guest');
Route::get('/register', [UserController::class, "register"]);



//Client routes //

Route::middleware(['web', 'visitor'])->group(function () {


    Route::get('/', function () {
        return view('client.Home');
    }) ;

    Route::get('/Home', function () {
        return view('client.Home');
    })->name('Home');

    Route::get('/About-FU', function () {
        return view('client.About-FU');
    });

    Route::get('/news_events', function () {
        return view('client.news_events');
    });

    Route::get('/Fu-Linkages', function () {
        return view('client.Fu-Linkages');
    });

    Route::get('/Fu-Journal', function () {
        return view('client.Fu-Journal');
    });

    Route::get('/Fu-Historical-Gallery', function () {
        return view('client.Fu-Historical-Gallery');
    });


    Route::get('/Student-Affairs', function () {
        return view('client.Student-Affairs');
    });

    Route::get('/Students-Gallery', function () {
        return view('client.Students-Gallery');
    });

    Route::get('/Undergraduate-Admission', function () {
        return view('client.Undergraduate-Admission');
    });

    Route::get('/Undergraduate-Programs', function () {
        return view('client.Undergraduate-Programs');
    });

    Route::get('/Postgraduates-Programs', function () {
        return view('client.Postgraduates-Programs');
    });

    Route::get('/Postgraduate-Admission', function () {
        return view('client.Postgraduate-Admission');
    });

    Route::get('/Facts-Figures', function () {
        return view('client.Facts-Figures');
    });

    Route::get('/CESD', function () {
        return view('client.CESD');
    });

    Route::get('/CTS', function () {
        return view('client.CTS');
    });

    Route::get('/IRDC', function () {
        return view('client.IRDC');
    });

});


Route::get('/', [NewsController::class, "NewsAndEvents"]);
Route::get('/', [NewsController::class, "viewNews"]);

// Route::get('/Home', [NewsController::class, "viewNews"]);
// Route::get('/Home', [EventsController::class, "viewEvents" ]);
Route::get('/Event-Details/{event}', [EventsController::class, "eventDetails"]);
Route::get('/News-Details/{news}', [NewsController::class, "newsDetails"]);
Route::get('/News-and-Events', [NewsController::class, "NewsAndEvents"]);
Route::get('/search', [NewsController::class, 'search']);
Route::get('/Facts-Figures', [ChartController::class, 'barChart']);




