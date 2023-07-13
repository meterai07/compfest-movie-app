<?php

use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionDetailController;
use App\Models\TransactionDetail;

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

Route::get('/', [MovieController::class, 'index']);

Route::prefix('movies')->group(function () {
    Route::get('/', [MovieController::class, 'index']);
    Route::get('/details/{id}/{movie_id}', [MovieController::class, 'show']);
});

Route::get('/login', [UsersController::class, 'index']);
Route::post('/login', [UsersController::class, 'login']);
Route::get('/logout', [UsersController::class, 'logout'])->middleware('auth');

Route::get('/register', [UsersController::class, 'register']);
Route::post('/register', [UsersController::class, 'store']);

Route::get('/payment', [PaymentController::class, 'index'])->middleware('auth');
Route::post('/payment', [PaymentController::class, 'update'])->middleware('auth');

Route::post('/transaction', [TransactionController::class, 'store'])->middleware('auth');
Route::get('/deletetransaction/{id}', [TransactionController::class, 'destroy'])->middleware('auth');

Route::get('/transactiondetails', [TransactionDetailController::class, 'index'])->middleware('auth');
Route::get('/transactiondetailshistory/{id}', [TransactionDetailController::class, 'show'])->middleware('auth');