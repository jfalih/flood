<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlaceController;

/**
 * Admin Controller
 */
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SubmissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/404', [HomeController::class, 'notFound'])->name('404');

/**
 * Authentication
 */
Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('login', 'login')->name('login');
        Route::post('login', 'authenticate');
        Route::get('register', 'showRegister')->name('register');
        Route::post('register', 'register');
    });
});

Route::middleware(['auth', 'role:user'])->group(function() {
    Route::controller(DashboardController::class)->group(function() {
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::get('setting', 'setting')->name('setting');
    });
    Route::post('booking/{place}', [SubmissionController::class, 'booking'])->name('booking');
});

Route::middleware(['auth', 'role:admin'])->group(function() {
    Route::controller(DashboardController::class)->group(function() {
        Route::get('admin/dashboard', 'dashboardAdmin')->name('dashboard.admin');
    });
    Route::controller(CategoryController::class)->group(function() {
        Route::get('admin/category', 'index')->name('categories.index');
        Route::get('admin/category/create', 'create')->name('categories.create');
        Route::post('admin/category/create', 'store')->name('categories.store');
        Route::delete('admin/categories/{category}', 'destroy')->name('categories.destroy');
    });
    Route::controller(UserController::class)->group(function() {
        Route::get('admin/user', 'index')->name('users.index');
        Route::get('admin/user/create', 'create')->name('users.create');
        Route::post('admin/user/create', 'store')->name('users.store');
        Route::delete('admin/user/{user}', 'destroy')->name('users.destroy');
    });
    Route::controller(PlaceController::class)->group(function() {
        Route::get('admin/place', 'index')->name('place.index');
        Route::get('admin/place/create', 'create')->name('place.create');
        Route::post('admin/place/create', 'store')->name('place.store');
        Route::post('admin/place/{place}', 'destroy')->name('place.destroy');
    });
    Route::controller(StockController::class)->group(function() {
        Route::get('admin/stock', 'index')->name('stocks.index');
        Route::get('admin/stock/create', 'create')->name('stocks.create');
        Route::post('admin/stocks/create', 'store')->name('stocks.store');
        Route::delete('admin/stocks/{stock}', 'destroy')->name('stocks.destroy');
    });
    Route::controller(SubmissionController::class)->group(function() {
    });
});

Route::controller(SubmissionController::class)->group(function() {
    Route::get('submission/{status}', 'index')->name('submission.index');
    Route::get('submission/{submission}/detail', 'detail')->name('submission.detail');
    Route::get('submission/{submission}/cancel', 'cancel')->name('submission.cancel');
    Route::get('submission/{submission}/approve', 'approve')->middleware(['auth','role:admin'])->name('submission.admin.approve');
    Route::get('submission/{submission}/admin/cancel', 'admin_cancel')->middleware(['auth','role:admin'])->name('submission.admin.cancel');
});
Route::controller(AuthController::class)->group(function () {
    Route::get('logout', 'logout')->name('logout');
});


Route::get('stocks/place', [StockController::class, 'place'])->name('getStocksByPlace');

Route::get('place/{id}', [PlaceController::class, 'detail'])->name('places.detail');

Route::get('/storage/{filename}', function ($filename) {
    $path = storage_path('app/public/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    $file = \File::get($path);
    $type = \File::mimeType($path);

    $response = \Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
})->where('filename', '.*');
