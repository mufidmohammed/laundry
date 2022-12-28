<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\LaundryTypeController;
use App\Http\Controllers\TransactionController;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('employee', EmployeeController::class)->except('show');
Route::resource('customer', CustomerController::class)->except('show');
Route::resource('expenditure', ExpenditureController::class)->except('show');
Route::resource('laundry', LaundryController::class)->except('show');
Route::resource('transaction', TransactionController::class)->except('show');

require __DIR__ . '/auth.php';
