<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\TransactionController;


Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function (){
    Route::get('giris',[AuthController::class,'login'])->name('login');
    Route::post('giris',[AuthController::class,'loginPost'])->name('login.post');
});

Route::prefix('/')->middleware('isAdmin')->group(function (){
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('panel');
    Route::get('admin/logout',[AuthController::class,'logout'])->name('admin.logout');
});



Route::prefix('orders')->name('orders.')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('index');
    Route::get('/create', [OrderController::class, 'create'])->name('create');
    Route::post('/store', [OrderController::class, 'store'])->name('store');
    Route::post('/update/{id}', [OrderController::class, 'update'])->name('update');
    Route::post('/delete/{id}', [OrderController::class, 'delete'])->name('delete');
});

Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    Route::post('/update/{id}', [ProductController::class, 'update'])->name('update');
    Route::post('/delete/{id}', [ProductController::class, 'delete'])->name('delete');

});







