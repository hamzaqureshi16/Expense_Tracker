<?php

use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    Route::get('/', [ExpenseController::class,'index'])->name('data');
    Route::get('/addexpense', [ExpenseController::class,'create'])->name('expense.add');
    Route::post('/store', [ExpenseController::class,'store'])->name('expense.save');
    Route::get('/edit/{id}', [ExpenseController::class,'edit'])->name('expense.edit');
    Route::post('/update',[ExpenseController::class,'update'])->name('expense.update');
    Route::delete('/delete/{id}',[ExpenseController::class,'delete'])->name('expense.delete');
    Route::get('/delete/{id}', [ExpenseController::class,'delete'])->name('delete');



    
   
});
Route::get('/hamza', function () {
    return Inertia::render('Test'); // This will get component Test.jsx from the resources/js/Pages/Test.jsx
});




Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
