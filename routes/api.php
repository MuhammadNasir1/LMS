<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\parentController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', [authController::class, 'register']);
Route::post('login', [authController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [authController::class, 'logout']);
    Route::post('changepasword', [userController::class, 'changepasword']);
});

// student CRUD
ROute::post('addStudent', [studentController::class, 'addstudent']);
Route::match(['get', 'post'], 'delStudent/{std_id}', [studentController::class, 'delstudent']);
ROute::post('updateStudent/{std_id}', [studentController::class, 'updatestudent']);
Route::get('studentData'  , [studentController::class  , 'getStdData']);

// parent CRUD

Route::post('addParent' , [parentController::class , 'addparent']);
