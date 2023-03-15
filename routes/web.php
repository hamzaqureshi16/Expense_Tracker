<?php

use App\Http\Controllers\ExpenseController;
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

Route::get('/home', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/expenses', [ExpenseController::class,'index'])->name('data');
    Route::get('/create', [ExpenseController::class,'create'])->name('create');
    Route::post('/store', [ExpenseController::class,'store'])->name('store');
    Route::get('/edit/{id}', [ExpenseController::class,'edit'])->name('edit');
    Route::post('/update/{id}', [ExpenseController::class,'update'])->name('update');
    Route::get('/delete/{id}', [ExpenseController::class,'delete'])->name('delete');
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
