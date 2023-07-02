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
use GuzzleHttp\Middleware;
use Illuminate\Routing\Controllers\Middleware as ControllersMiddleware;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::resource('employee', EmployeeController::class)->except('show')->middleware('auth');
Route::resource('customer', CustomerController::class)->except('show')->middleware('auth');
Route::resource('expenditure', ExpenditureController::class)->except('show')->middleware('auth');
Route::resource('laundry', LaundryController::class)->except('show')->middleware('auth');
Route::resource('transaction', TransactionController::class)->except('show')->middleware('auth');

Route::get('/report', function () {
    return view('report');
})->middleware('auth');

require __DIR__ . '/auth.php';
