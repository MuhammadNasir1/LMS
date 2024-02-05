<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('/teacher', function () {
    return view('teacheradd');
});
Route::get('/parents', function () {
    return view('parents');
});
Route::get('/student', function () {
    return view('students');
});
Route::get('/training', function () {
    return view('training');
});

// get a login  role
Route::get('/login/{role}', function(){
  return view('login');
});

