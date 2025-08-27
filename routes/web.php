<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

// Authentication Routes
Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::match(['get','post'],'logout', [AuthController::class, 'logout'])->name('logout');

// Password Reset Routes
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('verify-otp', [ForgotPasswordController::class, 'showOtpForm'])->name('password.otp.form');
Route::post('verify-otp', [ForgotPasswordController::class, 'verifyOtp'])->name('password.otp.verify');
Route::get('reset-password', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset.form');
Route::post('reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin User Management
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::patch('/users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggleStatus');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::patch('/users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
    });

   // Projects
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index'); // This line is added
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::get('/project-progress-1/{project}', [ProjectController::class, 'progress1'])->name('project.progress1');
    Route::get('/project-progress-2/{project}', [ProjectController::class, 'progress2'])->name('project.progress2');
    Route::get('/project-progress-3/{project}', [ProjectController::class, 'progress3'])->name('project.progress3');

    // Clients
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.add');
    Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');


    // Teams & Users
    Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
    Route::get('/users/all', [UserController::class, 'allUsers'])->name('users.all');
    Route::get('/users/add', [UserController::class, 'create'])->name('users.add');
    Route::post('/users/add', [UserController::class, 'store'])->name('users.store');
   Route::get('/users/profile', [UserController::class, 'profile'])->name('users.profile');

    // Transactions
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');

    // Jobs
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');

    // Static Pages
    Route::get('/chat', function () { return view('pages.chat_module'); })->name('chat');
    Route::get('/payment', function () { return view('pages.payment'); })->name('payment');
    Route::get('/invoices/template', function () { return view('pages.invoice.invoice_template'); })->name('invoices.template');
    Route::get('/invoices/information', function () { return view('pages.invoice.invoice_information'); })->name('invoices.information');
    Route::get('/invoices/client', function () { return view('pages.invoice.invoice_client'); })->name('invoices.client');
    Route::get('/invoices/users', function () { return view('pages.invoice.all_invoice_users'); })->name('invoices.users');
    
    // Restored Static Routes
    Route::get('/resource-management', function () { return view('pages.blank'); })->name('resource.management');
    Route::get('/project-template', function () { return view('pages.blank'); })->name('project.template');
    Route::get('/menu-settings', function () { return view('pages.blank'); })->name('menu.settings');
});
