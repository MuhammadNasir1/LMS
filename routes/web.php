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
        Route::get('/admin/help', function () {
            return view('admin.help');
        });
    });



    // parent pages
    Route::middleware('parentAuth')->group(function () {
        Route::get('/', function () {
            return view('parent.dashboard');
        });
        Route::get('/student', function () {
            return view('parent.student');
        });
        Route::get('/studentRec', function () {
            return view('parent.student_rec');
        });
        Route::get('/games', function () {
            return view('parent.games');
        });
        Route::get('/setting', function () {
            return view('parent.setting');
        });
        Route::get('/help', function () {
            return view('parent.help');
        });
    });

    // teachers pages
    Route::middleware('teacherAuth')->group(function () {
        Route::get('/teacher', function () {
            return view("teacher.dashboard");
        });
        Route::get('/teacher/courses', function () {
            return view("teacher.courses");
        });
        Route::get('/teacher/teachingpage', function () {
            return view("teacher.teachingpage");
        });
        Route::get('/teacher/games', function () {
            return view("teacher.games");
        });
        Route::get('/teacher/studenRec', function () {
            return view("teacher.student_Rec");
        });
        Route::get('/teacher/reports', function () {
            return view("teacher.reports");
        });
        Route::get('/teacher/training', function () {
            return view("teacher.training");
        });
        Route::get('/teacher/setting', function () {
            return view("teacher.setting");
        });
        Route::get('/teacher/help', function () {
            return view("teacher.help");
        });
    });



});
