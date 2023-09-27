<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogTransactionController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Models\Transaction;
use App\Models\User;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PublicController::class, 'index']);

Route::middleware('only_guest')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
    Route::post('register', [AuthController::class, 'registerProcess']);
});

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logout']);

    Route::get('profile', [UserController::class, 'profile'])->middleware('only_client');

    // Route Admin Only
    Route::middleware('only_admin')->group(function () {
        // Route Page Dashboard
        Route::get('dashboard', [DashboardController::class, 'index']);

        // Route Page Book
        Route::get('books', [BookController::class, 'index']);
        Route::get('book-add', [BookController::class, 'add']);
        Route::post('book-add', [BookController::class, 'store']);
        Route::get('book-edit/{slug}', [BookController::class, 'edit']);
        Route::post('book-edit/{slug}', [BookController::class, 'update']);
        Route::get('book/{slug}', [BookController::class, 'delete']);
        Route::get('book-deleted', [BookController::class, 'deletedBook']);
        Route::get('book-restore/{slug}', [BookController::class, 'restore']);

        // Route Page Category
        Route::get('categories', [CategoryController::class, 'index']);
        Route::get('category-add', [CategoryController::class, 'add']);
        Route::post('category-add', [CategoryController::class, 'store']);
        Route::get('category-edit/{slug}', [CategoryController::class, 'edit']);
        Route::put('category-edit/{slug}', [CategoryController::class, 'update']);
        Route::get('category/{slug}', [CategoryController::class, 'delete']);
        Route::get('category-deleted', [CategoryController::class, 'deletedCategory']);
        Route::get('category-restore/{slug}', [CategoryController::class, 'restore']);

        // Route Page User
        Route::get('users', [UserController::class, 'index']);
        Route::get('registered-users', [UserController::class, 'registeredUser']);
        Route::get('user-detail/{slug}', [UserController::class, 'show']);
        Route::get('user-approve/{slug}', [UserController::class, 'approve']);
        Route::get('user/{slug}', [UserController::class, 'delete']);
        Route::get('user-banned', [UserController::class, 'bannedUser']);
        Route::get('user-restore/{slug}', [UserController::class, 'restore']);

        // Route Transaction Loan only admin
        Route::get('transaction', [TransactionController::class, 'index']);
        Route::post('transaction', [TransactionController::class, 'store']);
        
        // Route Book Return
        Route::get('books-return', [TransactionController::class, 'returnBook']);
        Route::post('books-return', [TransactionController::class, 'saveReturnBook']);

        // Route Log Transaction only admin
        Route::get('log-transaction', [LogTransactionController::class, 'index']);
    });

});
