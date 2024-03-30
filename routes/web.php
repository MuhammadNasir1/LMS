<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\parentController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\teacherController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\ParallelConsoleOutput;

// language route
Route::get('/lang', [userController::class, 'language_change']);

// Authentication
Route::post('registerdata', [authController::class, 'register']);
Route::post('login', [authController::class, 'login']);
Route::match(['get',  'post'], 'weblogout', [authController::class, 'weblogout']);

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

        Route::get('/admin/teacher', [teacherController::class, 'getsteacherdata']);
        Route::get('/admin/student', [studentController::class, 'getstudentdata']);
        Route::get('/admin/parents', [parentController::class, 'getparentdata']);

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
        Route::get('/admin/games', function () {
            return view('admin.games');
        });
        Route::get('/admin/audio', function () {
            return view('admin.audio');
        });
        Route::post('addStudent', [studentController::class, 'addstudent']);
        Route::post('addParent', [parentController::class, 'addparent']);
        Route::post('addteacher', [teacherController::class, 'addteacher']);
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
    // games routes
    Route::get('startMenu', function () {
        return view("games.g_start_men");
    });
    Route::get('game1', function () {
        return view("games.game1");
    });

    // live  video
    Route::get('video', function () {
        return view("video.startvideo");
    });
});

Route::get('/sendemail', [userController::class, 'sendWelcomeEmail']);

Route::get('email', function () {
    return view("emails.parent");
});
