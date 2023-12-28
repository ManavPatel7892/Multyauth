<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'dashboard']);
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/user', [UserController::class, 'user'])->name('user');
    Route::get('user/create', [UserController::class,'create'])->name('products.create');
    Route::post('user/store', [UserController::class,'store'])->name('products.store');
    Route::get('user/edit/{id}', [UserController::class,'edit']);
    Route::post('user/update/{id}', [UserController::class,'update']);
    Route::get('user/delete/{id}', [UserController::class,'delete']);
    Route::get('user/show/{id}', [UserController::class,'show']);
});

require __DIR__.'/auth.php';
