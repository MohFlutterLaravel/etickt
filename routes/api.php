<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// auth models
use \App\Http\Controllers\Etp\EmployeeController;
use \App\Http\Controllers\Etp\BusinessAccountController;

// ****** dashboard route ***** //
use \App\Http\Controllers\Etp\AppointmentController;
use \App\Http\Controllers\Etp\BusinessCategoryController;

Route::group(['prefix' => 'guests'], function(){
    Route::post('offresCheck', [BusinessAccountController::class, "offresCheck"]);
    Route::get('business-categories', [BusinessCategoryController::class, "index"]);
});

Route::group(['prefix' => 'owners', 'middleware' => 'assign.guard:owners'], function(){
    Route::post('login', [BusinessAccountController::class, "login"]);
    Route::post('register', [BusinessAccountController::class, "register"]);
});
Route::group(['prefix' => 'owners', 'middleware' => ['assign.guard:owners','jwt.auth']],function ()
{
    Route::post('logout', [BusinessAccountController::class, "logout"]);
    Route::post('refresh', [BusinessAccountController::class, "refresh"]);
    Route::post('me', [BusinessAccountController::class, "me"]);
    // application sur les employees
    Route::post('register-employee', [EmployeeController::class, "register"])->middleware('assign.guard:employees');
    // Appointments
    Route::apiResource('appointments', AppointmentController::class);
});




Route::group(['prefix' => 'employees', 'middleware' => 'assign.guard:employees'], function(){
    Route::post('login', [EmployeeController::class, "login"]);
    
});
Route::group(['prefix' => 'employees', 'middleware' => ['assign.guard:employees','jwt.auth']],function ()
{
    Route::post('logout', [EmployeeController::class, "logout"]);
    Route::post('refresh', [EmployeeController::class, "refresh"]);
    Route::post('me', [EmployeeController::class, "me"]);
});
