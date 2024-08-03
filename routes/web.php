<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login',[\App\Http\Controllers\AuthController::class,'loginView'])->name('login-view');
Route::post('login',[\App\Http\Controllers\AuthController::class,'login'])->name('login');

Route::middleware(["auth"])->group(function () {
    Route::get('home',[\App\Http\Controllers\HomeController::class,'index'])->name('home');
    Route::resource('employee',\App\Http\Controllers\EmployeeController::class)->middleware('manager');
    Route::resource('department',\App\Http\Controllers\DepartmentController::class)->middleware('manager');
    Route::resource('task',\App\Http\Controllers\TasksController::class)->except(['delete']);
});

