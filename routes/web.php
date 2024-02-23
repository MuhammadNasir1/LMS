<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;



// language route
Route::get('/lang', [userController::class, 'language_change']);

// Authentication
Route::post('registerdata', [userController::class, 'register']);
Route::post('login', [userController::class, 'login']);
Route::match(['get',  'post'], 'weblogout', [userController::class, 'weblogout']);

Route::get('/loginrole', function () {
    return view('loginrole');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/forgot', function () {
    return view('forgotpass');
});

Route::get('register/{role}', function () {
    return view('register');
});




Route::middleware('custom')->group(function () {
    //  admnim pages
    Route::middleware('adminAuth')->group(function () {
        Route::get('/admin', function () {
            return view('admin.dashboard');
        });

        Route::get('/admin/teacher', function () {
            return view('admin.teacher');
        });


        Route::get('/admin/parents', function () {
            return view('admin.parent');
        });

        Route::get('/admin/student', function () {
            return view('admin.student');
        });

        Route::get('/admin/course', function () {
            return view('admin.course');
        });

        Route::get('/admin/training', function () {
            return view('admin.training');
        });
        Route::get('/admin/studenRec', function () {
            return view('admin.std_recording');
        });
        Route::get('/admin/setting', function () {
            return view('admin.setting');
        });
    });



    // parent pages
    Route::middleware('parentAuth')->group(function () {
        Route::get('/', function () {
            return view('parent.dashboard');
        });
    });

    // teachers pages
    Route::middleware('teacherAuth')->group(function () {
        Route::get('/teacher', function () {
            return view("teacher");
        });
    });



});
