<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;

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



Route::get('/expense',[ExpenseController::class, 'index']);
Route::post('/expense',[ExpenseController::class, 'ExpData']);
Route::get('/expense', [ExpenseController::class, 'showexpRecord']);
Route::get('/expense/{id}', [ExpenseController::class, 'delExpRecord']);



Route::get('/income',[IncomeController::class, 'index']);
Route::post('/income',[IncomeController::class, 'IncData']);
Route::get('/income', [IncomeController::class, 'showincRecord']);
Route::get('/income/{id}', [IncomeController::class, 'delIncRecord']);