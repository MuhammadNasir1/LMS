<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;



// language route
Route::get('/lang', [userController::class  , 'language_change' ] );

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


Route::get('/training', function () {
    return view('training');
});

// get a login  role
Route::get('/login/{role}', function(){
  return view('login');
});




//  admnim pages
Route::get('/', function () {
    return view('admin.dashboard');
});

Route::get('/teacher', function () {
    return view('admin.teacher');
});


Route::get('/parents', function () {
    return view('admin.parent');
});

Route::get('/student', function () {
    return view('admin.student');
});
