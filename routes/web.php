<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'dashboard']);
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::get('profile/edit', [ProfileController::class,'edit'])->name('profile.edit');
    Route::post('profile/update', [ProfileController::class,'update'])->name("profile.update");


    Route::get('/user', [UserController::class, 'user'])->name('user');
    Route::get('user/create', [UserController::class,'create'])->name('user.create');
    Route::post('user/store', [UserController::class,'store'])->name('user.store');
    Route::get('user/edit/{id}', [UserController::class,'edit']);
    Route::post('user/update/{id}', [UserController::class,'update']);
    Route::get('user/delete/{id}', [UserController::class,'delete']);
    Route::get('/export-user', [UserController::class,'exportUser'])->name('export-user');
    Route::get('/downloadPdf', [UserController::class,'downloadPdf'])->name('downloadPdf');
    Route::get('/users', [UserController::class, 'userDatatable'])->name('user.user');


    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
    Route::get('admin/create', [AdminController::class,'create'])->name('admin.create');
    Route::post('admin/store', [AdminController::class,'store'])->name('admin.store');
    Route::get('admin/edit/{id}', [AdminController::class,'edit']);
    Route::post('admin/update/{id}', [AdminController::class,'update']);
    Route::get('admin/delete/{id}', [AdminController::class,'delete']);
    Route::get('/export-admin', [AdminController::class,'exportAdmin'])->name('export-admin');
    Route::get('/downloadPdf2', [AdminController::class,'downloadPdf2'])->name('downloadPdf2');
    Route::get('/admins', [AdminController::class, 'adminDatatable'])->name('admin.admin');


    Route::get('/product', [ProductController::class, 'product'])->name('product');
    Route::get('product/create', [ProductController::class,'create'])->name('product.create');
    Route::post('product/store', [ProductController::class,'store'])->name('product.store');
    Route::get('product/edit/{id}', [ProductController::class,'edit']);
    Route::post('product/update/{id}', [ProductController::class,'update']);
    Route::get('product/delete/{id}', [ProductController::class,'delete']);
    Route::get('/export-product', [ProductController::class,'exportProduct'])->name('export-product');
    Route::get('/downloadPdf3', [ProductController::class,'downloadPdf3'])->name('downloadPdf3');
    Route::get('/products', [ProductController::class, 'productDatatable'])->name('product.product');



});

 require __DIR__.'/auth.php';
