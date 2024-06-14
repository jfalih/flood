<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SubmissionController;
use App\Http\Controllers\Api\PlaceController;



/*
|--------------------------------------------------------------------------
| Api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register api routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "api" middleware group. Now create something great!
|
*/
Route::group([
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
});

Route::post('booking/{place}', [SubmissionController::class, 'booking']);
Route::get('receipt/{submission}', [SubmissionController::class, 'detail']);
Route::get('history', [SubmissionController::class, 'history']);
Route::get('places', [PlaceController::class, 'index']);
Route::get('places/recommendation', [PlaceController::class, 'recommendation']);
Route::get('categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/{id}/places', [CategoryController::class, 'places'])->name('category.places');