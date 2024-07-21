<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\LinkageController;
use App\Http\Controllers\Fee_StructureController;
use App\Http\Controllers\StaffInformationController;
use App\Http\Controllers\StaffDirectoryController;



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
    })->name('add_event');

    Route::get('/add_news', function () {
        return view('admin.add_news');
    })->name('add_news');

    //Users//
Route::post('/add_user', [UserController::class, "addUser" ])->name('add_user');
Route::get('/edit_user/{user}/edit/', [UserController::class, "showEditForm" ])->name('edit_user');
Route::get('/add_user/{user}/delete/', [UserController::class, "deleteUser" ])->name('delete_user');
Route::put('/edit_user/{user}', [UserController::class, "editUser" ]);
Route::get('/add_user', [UserController::class, "showUser" ]);
Route::get('/add_user/{user:id}/edit', [UserController::class, "showUser" ]);
Route::get('/profile', [UserController::class, "user_profile" ])->name('profile');
// 

Route::get('/new_edit_user/{id}/edit/', [UserController::class, "newPage" ]);

// 

    //Event Routes  middleware and controllers //
    Route::post('/add_event', [EventsController::class, "addEvent"]);
    Route::get('/add_event', [EventsController::class, "showEvents"])->name('add_event');
    Route::get('/add_event/{event}/delete/', [EventsController::class, "deleteEvent"]);
    Route::get('/add_event/{event}/status/{event_status}', [EventsController::class, "eventStatus"]);
    Route::get('/edit_event/{event}/edit/', [EventsController::class, "showEditForm"])->name('edit_event');
    Route::post('/edit_event/{event}', [EventsController::class, "editEvent"]);

//News Routes  middleware and controllers //
Route::post('/add_news', [NewsController::class, "addNews" ]);
Route::get('/add_news', [NewsController::class, "showNews" ])->name('add_news');
Route::get('/edit_news/{news}/edit/', [NewsController::class, "showEditForm" ]);
Route::post('/edit_news/{news}', [NewsController::class, "editNews" ]);
Route::get('/add_news/{news}/delete/', [NewsController::class, "deleteNews" ]);

// Linkages
Route::get('/linkage', [LinkageController::class, "index" ])->name('linkage');
Route::post('/add_linkage', [LinkageController::class, "store" ]);
Route::get('/edit_linkage/{id}/edit', [LinkageController::class, "show" ]);
Route::get('/linkage/{id}/delete', [LinkageController::class, "destroy" ]);



// fee_structure
Route::get('/fee_structure', [Fee_StructureController::class, "index" ])->name('fee_structure');
Route::post('/add_fee', [Fee_StructureController::class, "store" ]);



// Staff information 

Route::get('/staff', [StaffInformationController::class, "index" ])->name('staff');
Route::post('/add_staff', [StaffInformationController::class, "store" ]);
Route::get('/saff_cv/{id}/staff_cv', [StaffInformationController::class, "Show_cv" ]);
Route::post('/saff_cv/{id}/add_cv', [StaffInformationController::class, "Add_cv" ]);



Route::get('/edit_staff_information', [StaffInformationController::class, "edit" ]);










});


Route::middleware(['mustBeLoggedIn'])->group(function () {

    // Route::get('/add_event', function () {
    //     return view('admin.add_events');
    // });

    Route::get('/add_news', function () {
        return view('admin.add_news');
    })->name('add_news');

    //Event Routes  middleware and controllers //
    Route::post('/add_event', [EventsController::class, "addEvent"]);
    Route::get('/add_event', [EventsController::class, "showEvents"])->name('add_event');
    Route::get('/add_event/{event}/delete/', [EventsController::class, "deleteEvent"]);
    Route::get('/add_event/{event}/status/{event_status}', [EventsController::class, "eventStatus"]);
    Route::get('/edit_event/{event}/edit/', [EventsController::class, "showEditForm"])->name('edit_event');
    Route::post('/edit_event/{event}', [EventsController::class, "editEvent"]);

    //News Routes  middleware and controllers //
    Route::post('/add_news', [NewsController::class, "addNews"]);
    Route::get('/add_news', [NewsController::class, "showNews"])->name('add_news');
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
    })->name('About-FU');
    
    Route::get('/news_events', function () {
        return view('client.News-and-Events');
    })->name('news_events');
    
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
    
    // Staff Directory

    Route::get('/Staff-Directory', [StaffDirectoryController::class, "index" ])->name('Staff-Directory');
    Route::post('/Staff-Directory', [StaffDirectoryController::class, "Search_Staff"])->name('Staff-Directory-POST');
    Route::get('/staff_details/{encryptedId}', [StaffDirectoryController::class, "showStaffDetails" ])->name('Staff-Details');

    
    

    

    //     Route::get('/Staff-Directory', function () {
    //     return view('client.Staff-Directory');
    // });

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


    Route::get('/Fee-Structure', function () {
        return view('client.Fee-structure');
    })->name('Fees');

    Route::get('/Scholarships', function () {
        return view('client.Scholarships');
    })->name('Scholarships');
    
    


    Route::get('/Fee-Structure', function () {
        return view('client.Fee-structure');
    })->name('Fees');

    Route::get('/Scholarships', function () {
        return view('client.Scholarships');
    })->name('Scholarships');
    
    

});


Route::get('/', [NewsController::class, "NewsAndEvents"]);
Route::get('/', [NewsController::class, "viewNews"]);

// Route::get('/Home', [NewsController::class, "viewNews" ]);
// Route::get('/Home', [EventsController::class, "viewEvents" ]);
Route::get('/Event-Details/{event}', [EventsController::class, "eventDetails" ])->name('eventDetails');
Route::get('/News-Details/{news}', [NewsController::class, "newsDetails" ])->name('newsDetails');
Route::get('/News-and-Events', [NewsController::class, "NewsAndEvents" ])->name('NewsAndEvents');
Route::get('/search', [NewsController::class, 'search'])->name('search');
Route::get('/Facts-Figures', [ChartController::class, 'barChart'])->name('barChart');




