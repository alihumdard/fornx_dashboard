<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::match(['get','post'],'logout', [AuthController::class, 'logout'])->name('logout');
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('verify-otp', [ForgotPasswordController::class, 'showOtpForm'])->name('password.otp.form');
Route::post('verify-otp', [ForgotPasswordController::class, 'verifyOtp'])->name('password.otp.verify');
Route::get('reset-password', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset.form');
Route::post('reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::patch('/users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggleStatus');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::patch('/users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
    });
});


// static routes

Route::get('/tansections', function () {
    return view('pages.Transactions_tab.tansections');
})->name('tansections');

Route::get('/add_transaction', function () {
    return view('pages.Transactions_tab.add_transaction');
})->name('add_transaction');

Route::get('/user_team', function () {
    return view('pages.user_team');
})->name('user_team');

Route::get('/all_users', function () {
    return view('pages.users_tab.all_users');
})->name('all_users');

Route::get('/add_new_user', function () {
    return view('pages.users_tab.add_new_user');
})->name('add_new_user');

Route::get('/create_project', function () {
    return view('pages.create_project');
})->name('create_project');

Route::get('/user_profile', function () {
    return view('pages.users_tab.user_profile');
})->name('user_profile');

Route::get('/all_clients', function () {
    return view('pages.all_clients');
})->name('all_clients');

Route::get('/project_progress_1', function () {
    return view('pages.project_progress.project_progress_1');
})->name('project_progress_1');

Route::get('/project_progress_2', function () {
    return view('pages.project_progress.project_progress_2');
})->name('project_progress_2');

Route::get('/project_progress_3', function () {
    return view('pages.project_progress.project_progress_3');
})->name('project_progress_3');

Route::get('/chat_module', function () {
    return view('pages.chat_module');
})->name('chat_module');

Route::get('/invoice', function () {
    return view('pages.invoice');
})->name('invoice');
