<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TimeController;

// Authentication Routes
Route::get('/', [AuthController::class, 'index']);
Route::get('/hr-dashboard', [AuthController::class, 'hr_dashboard'])->name('dashboard.hr');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::match(['get', 'post'], 'logout', [AuthController::class, 'logout'])->name('logout');

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
    Route::get('/users/{id}/{slug}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggleStatus');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::patch('/users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');
  });

  // Projects
  Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
  Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
  Route::post('/projects-store', [ProjectController::class, 'store'])->name('projects.store');
  Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
  Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
  Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

  Route::post('/projects-assign', [ProjectController::class, 'assign'])->name('projects.assign');
  Route::put('/assign-projects/{assignment}/update', [ProjectController::class, 'updateProgress'])->name('projects.updateProgress');
  Route::put('/credential-projects/{project}', [ProjectController::class, 'updateCredentials'])->name('projects.updateCredentials');
  Route::delete('/assign-projects/{assignment}', [ProjectController::class, 'assignProjectdestroy'])->name('assign-projects.destroy');
Route::post('/projects/{project}/comments', [ProjectController::class, 'addComment'])->name('projects.comments.store');
  Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

  // Clients
  Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
  Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.add');
  Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
  Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
  Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
  Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');

  // Teams CRUD
  Route::get('/teams-dashboard', [TeamController::class, 'dashboard'])->name('teams.dashboard');
  Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
  Route::get('/teams/{id}/members', [TeamController::class, 'members'])->name('member');
  Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
  Route::put('/teams/{team}', [TeamController::class, 'update'])->name('teams.update');
  Route::delete('/teams/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');

  Route::get('/users/all', [UserController::class, 'allUsers'])->name('users.all');
  Route::get('/users/add', [UserController::class, 'create'])->name('users.add');
  Route::post('/users/add', [UserController::class, 'store'])->name('users.store');
  Route::get('/users/profile/{id}', [UserController::class, 'profile'])->name('users.profile');
  Route::get('/users/myprofile', [UserController::class, 'myprofile'])->name('users.myprofile');
  Route::put('/user/profile/update/{id}', [UserController::class, 'profile_update'])->name('profile.update');

  // Transactions
  Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
  Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
  Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
  Route::get('/transactions/{transaction}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
  Route::put('/transactions/{transaction}', [TransactionController::class, 'update'])->name('transactions.update');
  Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy'])->name('transactions.destroy');

  // Invoice Routes
  Route::get('/invoices/template', [InvoiceController::class, 'template'])->name('invoices.template');
  Route::get('/invoices/information', [InvoiceController::class, 'information'])->name('invoices.information');
  Route::post('/invoices/information', [InvoiceController::class, 'store'])->name('invoices.store');
  Route::get('/invoices/client', [InvoiceController::class, 'client'])->name('invoices.client');
  Route::get('/invoices/payment', [InvoiceController::class, 'payment'])->name('invoices.payment');
  Route::get('/invoices/users', [InvoiceController::class, 'users'])->name('invoices.users');
  Route::get('/invoices/{invoice}', [InvoiceController::class, 'show'])->name('invoices.show');


Route::post('/invoices/send', [InvoiceController::class, 'sendInvoice'])->name('invoices.send');

  // Chat Module Routes
  Route::get('/chat', [ChatController::class, 'show'])->name('chat');
  Route::get('/chat/conversations', [ChatController::class, 'getConversations'])->name('chat.getConversations');
  Route::get('/chat/messages/{conversationId}', [ChatController::class, 'getMessages'])->name('chat.getMessages');
  Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.sendMessage');


  // Jobs
  Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');

  //roels and permissions
  Route::resource('roles', RoleController::class);
  Route::resource('permissions', PermissionController::class);

  // Time Check-in/Check-out Routes
  route::get('/time-check-in', [timecontroller::class, 'showtimecheckin'])->name('time.check_in');
  route::get('/time-check-out', [timecontroller::class, 'showtimecheckout'])->name('time.check_out');
  route::post('/time-check-in', [timecontroller::class, 'processcheckin'])->name('time.check_in.post');
  route::post('/time-check-out', [timecontroller::class, 'processcheckout'])->name('time.check_out.post');






  // blank page route
  Route::get('/blank-template', function () {
    return view('pages.blank');
  })->name('menu.settings');
});
