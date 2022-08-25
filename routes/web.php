<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Redis;

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
    Route::get('/admin/category/manage_category', [CategoryController::class, 'manage_category'])->name('admin/category/manage_category');
    Route::post('admin/category/manage_category_process', [CategoryController::class, 'manage_category_process'])->name('category.insert');
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy']);
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('/category/update/{id}', [CategoryController::class, 'update']);
});



Route::get('/logout', [AdminController::class, 'logout']);


Route::get('/home', [AdminController::class, 'home'])->name('home');
