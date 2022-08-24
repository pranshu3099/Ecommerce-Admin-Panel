<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;

// use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [AdminController::class, 'index'])->name('login');

Route::post('/admin/auth', [AdminController::class, 'auth']);



Route::group(['middleware' => 'admin_auth'], function () {

    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin/dashboard');
    Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin/category');
    Route::get('/admin/manage_category', [CategoryController::class, 'manage_category'])->name('admin/manage_category');
});


Route::get('/logout', [AdminController::class, 'logout']);


Route::get('/home', function () {
    return view('admin.layout');
})->name('home');
