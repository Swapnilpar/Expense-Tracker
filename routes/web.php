<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BudgetController;



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


Route::get('/', [DashboardController::class, 'index'])->name('Dashboard');
// Route::get('/', [DashboardController::class, 'CategorizedData']);


Route::get('/budget', [BudgetController::class, 'index'])->name('BudgetGet');
Route::post('/budget', [BudgetController::class, 'PostBudget'])->name('PostBudget');
// Route::get('/budget', [BudgetController::class, 'index'])->name('BudgetGet');
// Route::post('/budget', [BudgetController::class, 'PostBudget'])->name('PostBudget');
// Route::get('/budget', [BudgetController::class, 'AmountLeft'])->name('AmountLeft');
// Route::get('/budget', [BudgetController::class, 'BudgetStatus'])->name('BudgetStatus');





// Route::get('/visual', [DashboardController::class, 'CategorizedIncome']);


Route::get('/expense',[ExpenseController::class, 'index'])->name('expense-page');
Route::post('/expense',[ExpenseController::class, 'ExpData'])->name('expense-post');
Route::get('/expense', [ExpenseController::class, 'showexpRecord'])->name('expense-get');
Route::get('/expense/{id}', [ExpenseController::class, 'delExpRecord'])->name('expense-del');
Route::put('/expense/update/{id}', [ExpenseController::class, 'ExpenseUpdate'])->name('expense-update');



Route::get('/income',[IncomeController::class, 'index'])->name('income-page');
Route::post('/income',[IncomeController::class, 'IncData'])->name('income-post');
Route::get('/income', [IncomeController::class, 'showincRecord'])->name('income-get');
Route::get('/income/{id}', [IncomeController::class, 'delIncRecord'])->name('income-del');
Route::put('/income/update/{id}', [IncomeController::class, 'IncomeUpdate'])->name('income-update');





// Route::post('/income/filter', [IncomeController::class, 'filterByDate']);