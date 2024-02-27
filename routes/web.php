<?php

use App\Http\Controllers\DetectionsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\WelcomeController;
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

Route::middleware(['web'])->group(function () {
    Route::resource('/', WelcomeController::class)->middleware('throttle:10,1');
    Route::resource('/user_dashboard', UserDashboardController::class)->middleware('throttle:10,1');
    Route::resource('/detections', DetectionsController::class)->middleware('throttle:10,1');
    Route::get('/scan', [ScanController::class, 'index'])->middleware('throttle:10,1');
    Route::get("/logout", [LoginController::class, 'signout'])->middleware('throttle:10,1');
    Route::post("/login", [LoginController::class, 'store'])->middleware('throttle:10,1');
    Route::post("/signup", [LoginController::class, 'signup'])->middleware('throttle:10,1');
});
