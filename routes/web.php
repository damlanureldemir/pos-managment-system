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


Route::prefix('category')->name('category.')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/store', [CategoryController::class, 'store'])->name('store');
    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('update');
    Route::post('/delete/{id}', [CategoryController::class, 'delete'])->name('delete');

});

Route::prefix('suppliers')->name('suppliers.')->group(function () {
    Route::get('/', [SupplierController:: class, 'index'])->name('index');
    Route::get('/create', [SupplierController::class, 'create'])->name('create');
    Route::post('/store', [SupplierController::class, 'store'])->name('store');
    Route::post('/update/{id}', [SupplierController::class, 'update'])->name('update');
    Route::post('/delete/{id}', [SupplierController::class, 'delete'])->name('delete');

});

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
    Route::post('/delete/{id}', [UserController::class, 'delete'])->name('delete');
});

Route::prefix('companies')->name('companies.')->group(function () {
    Route::get('/', [CompanyController:: class, 'index'])->name('index');
    Route::get('/create', [CompanyController::class, 'create'])->name('create');
    Route::post('/store', [CompanyController::class, 'store'])->name('store');
    Route::post('/update/{id}', [CompanyController::class, 'update'])->name('update');
    Route::post('/delete/{id}', [CompanyController::class, 'delete'])->name('delete');
});

Route::prefix('transactions')->name('transactions.')->group(function () {
    Route::get('/', [TransactionController::class, 'index'])->name('index');
    Route::get('/create', [TransactionController::class, 'create'])->name('create');
    Route::post('/store', [TransactionController::class, 'store'])->name('store');
    Route::post('/update/{id}', [TransactionController::class, 'update'])->name('update');
    Route::post('/delete/{id}', [TransactionController::class, 'delete'])->name('delete');

});







