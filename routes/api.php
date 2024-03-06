<?php

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


Route::post('register', [userController::class, 'register']);
Route::post('login', [userController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [userController::class, 'logout']);
    Route::post('changepasword', [userController::class, 'changepasword']);
});

// student CRUD
ROute::post('addStudent', [userController::class, 'addstudent']);
Route::match(['get', 'post'], 'delStudent/{std_id}', [userController::class, 'delstudent']);
ROute::post('updateStudent/{std_id}', [userController::class, 'updatestudent']);


// parent CRUD

Route::post('addParent' , [userController::class , 'addparent']);
