<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\coursesController;
use App\Http\Controllers\parentController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\teacherController;
use App\Http\Controllers\teachingController;
use App\Http\Controllers\trainingController;
use App\Http\Controllers\userController;
use App\Models\training;
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
    Route::post('addCourse', [coursesController::class, 'addcourse']);
    Route::get('delRecording/{id}', [teachingController::class, 'delRecording']);
    Route::post('addtraining', [trainingController::class, 'addtraining']);
    Route::get('delTraining/{training_id}', [trainingController::class, 'deltraining']);
    //  admnim pages
    Route::get('/student', [studentController::class, 'getstudentdata']);
    Route::post('addStudent', [studentController::class, 'addstudent']);
    Route::post('student/import', [studentController::class, 'importStudent']);
    Route::post('updatStudent/{id}', [studentController::class, 'updatestudent']);

    Route::get('studentViewData/{id}', [studentController::class, 'studentViewData']);

    Route::get('editStudent/{id}', [studentController::class, 'editStudentData']);


    Route::middleware('adminAuth')->group(function () {
        Route::get('/admin', [userController::class, 'adminDashboard']);
        Route::middleware('superAdminAuth')->group(function () {
            Route::get('/admin/permission', [userController::class, 'permissionView']);
            Route::post('/changePermission/{user_id}', [userController::class, 'changePermission']);
        });
        Route::get('/admin/teacher', [teacherController::class, 'getsteacherdata']);
        Route::get('/admin/parents', [parentController::class, 'getparentdata']);
        Route::get('/admin/help', function () {
            return view('admin.help');
        });
        Route::get('/admin/games', function () {
            return view('admin.games');
        });
        Route::get('/admin/audio', function () {
            return view('admin.audio');
        });
        Route::post('addParent', [parentController::class, 'addparent']);
        Route::post('parent/import', [parentController::class, 'importParent']);
        Route::post('addteacher', [teacherController::class, 'addteacher']);

        Route::post('teacher/import', [teacherController::class, 'importTeacher']);


        Route::get('teacherViewData/{id}', [teacherController::class, 'teacherViewData']);
        Route::post('updateTeacher/{id}', [teacherController::class, 'updateteacher']);
        Route::get('editTeacher/{id}', [teacherController::class, 'editTeacher']);


        // add  course

        Route::post('updateCourse/{id}', [coursesController::class, 'updatecourse']);


        // paraent
        Route::match(['get', 'post'], 'delParent/{parent_id}', [parentController::class, 'delparent']);
        Route::get('editParant/{id}', [parentController::class, 'editParantData']);
        Route::post('updateParent/{parent_id}', [parentController::class, 'updateparent']);
    });



    // parent pages
    Route::middleware('parentAuth')->group(function () {

        Route::get('/', [userController::class, 'parentDashboard']);
        Route::get('/games', function () {
            return view('parent.games');
        });
        Route::get('/help', function () {
            return view('parent.help');
        });
    });

    Route::get('/teachingpage', [teachingController::class, 'teachingData']);
    // teachers pages
    Route::middleware('teacherAuth')->group(function () {
        // Route::get('/teacher', function () {
        //     return view("teacher.dashboard");
        // });
        Route::get('/teacher', [userController::class, 'teacherDashboard']);

        Route::get('/teacher/courses', function () {
            return view("teacher.courses");
        });
        Route::get('/teacher/games', function () {
            return view("teacher.games");
        });
        Route::get('/teacher/reports', function () {
            return view("teacher.reports");
        });
        Route::get('/teacher/training', function () {
            return view("teacher.training");
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


    Route::get('/setting', [authController::class, 'settingdata']);

    Route::post('updateSettings', [authController::class, 'updateSet']);
    Route::get('training', [trainingController::class, 'gettrainingdata']);

    Route::get('/studentRec', [teachingController::class, 'getRecording']);

    Route::get('/getWords/{id}', [coursesController::class, 'getteachingWords']);

    // teaching  page
    Route::get('filter-options', [teachingController::class, 'filterOptions']);
    Route::get('/course', [coursesController::class, 'getcoursedata']);
    Route::get('/deleteCourseData/{id}', [coursesController::class, 'deleteCourse']);
    Route::post('/updateCoursedata/{id}', [coursesController::class, 'updateCourse']);
    Route::get('/editCourse/{id}', [coursesController::class, 'editCourseData']);

    Route::post('/addteaching', [teachingController::class, 'addteachingdata']);
    Route::post('/teacherRec', [teachingController::class, 'teacherRecordingData']);
    Route::get('/sendemail', [userController::class, 'sendWelcomeEmail']);

    // get training  data for update
    Route::get('/editTraining/{id}', [trainingController::class, 'editTrainingData']);
    Route::post('updateTraining/{training_id}', [trainingController::class, 'updatetraining']);

    Route::get('/contact-us', function () {
        return view('contactUs');
    });


    Route::post('course/import', [coursesController::class, 'Courseimport']);
    Route::get('recentLecturers', [teachingController::class, 'getWords']);
    Route::get('deleteLecturers/{id}', [teachingController::class, 'delWords']);


    Route::match(['get',  'post'], 'deleteTeacher/{teacher_id}', [teacherController::class, 'delTeacher']);
    Route::post('changeStdStatus/{id}', [studentController::class, 'changeVerifictionStatus']);
    Route::post('/deleteMultipleCourses', [coursesController::class, 'deleteMultipleCourses']);
});


Route::get('email', function () {
    return view("emails.parent");
});
