<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\MonthlyReportController;
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

//auth routes
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('post-register', [AuthController::class, 'postRegister'])->name('register.post'); 
Route::get('/', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function() {
//income routes

Route::get('income' ,  [ IncomeController::class, 'index'])->name('income');
Route::get('income/create' ,[IncomeController::class,'create'])->name('income.create');
Route::post('income/store' ,[IncomeController::class,'store'])->name('income.store');
Route::get('income/{id}/edit' ,[IncomeController::class,'edit'])->name('income.edit');
Route::delete('income/{id}/delete' ,[IncomeController::class,'delete'])->name('income.delete');
Route::put('income/{id}' ,[IncomeController::class,'update'])->name('income.update');


//expense routes

Route::get('expense' ,  [ ExpenseController::class, 'index'])->name('expense');
Route::get('expense/create' ,[ExpenseController::class,'create'])->name('expense.create');
Route::post('expense/store' ,[ExpenseController::class,'store'])->name('expense.store');
Route::get('expense/{id}/edit' ,[ExpenseController::class,'edit'])->name('expense.edit');
Route::delete('expense/{id}/delete' ,[ExpenseController::class,'delete'])->name('expense.delete');
Route::put('expense/{id}' ,[ExpenseController::class,'update'])->name('expense.update');

// monthly expenditure/saving routes
Route::get('monthly/report' ,  [ MonthlyReportController::class, 'index'])->name('monthly.report');

});
