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
use App\Http\Controllers\MeetingController;


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


  // routes/web.php
  Route::middleware('permission:manage chat')->group(function () {

    Route::get('/chat', [ChatController::class, 'view'])->name('chat.view'); // loads Blade
    Route::get('/chats/{type}', [ChatController::class, 'index']); // clients, users, teams
    Route::get('/chat/{id}', [ChatController::class, 'show']);
    Route::post('/chat/{id}/message', [ChatController::class, 'store']);
    Route::post('/chat/start', [ChatController::class, 'start'])->name('chat.start');
    Route::post('/chat/{id}/mark-read', [ChatController::class, 'markRead']);
    Route::post('/chat/{conversation}/audio-message', [ChatController::class, 'sendAudioMessage']);
    Route::post('/chat/{id}/document-message', [ChatController::class, 'sendDocument']);

});

Route::middleware(['auth'])->group(function () {
    Route::post('/meetings', [MeetingController::class, 'store'])->name('meetings.store');
    Route::get('/meetings/{conversation}', [MeetingController::class, 'index'])->name('meetings.index');
});

  // Projects
  Route::middleware('permission:manage projects')->group(function () {

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
  }); 

  // Clients
  Route::middleware('permission:manage clients')->group(function () {

    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.add');
    Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
    Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
  });
  // Teams CRUD

  Route::middleware('permission:manage teams')->group(function () {

    Route::get('/teams-dashboard', [TeamController::class, 'dashboard'])->name('teams.dashboard');
    Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
    Route::get('/teams/{id}/members', [TeamController::class, 'members'])->name('member');
    Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
    Route::put('/teams/{team}', [TeamController::class, 'update'])->name('teams.update');
    Route::delete('/teams/{team}', [TeamController::class, 'destroy'])->name('teams.destroy');
  });

   Route::middleware('permission:manage users')->group(function () {
        Route::get('/users/all', [UserController::class, 'allUsers'])->name('users.all');
        Route::get('/users/add', [UserController::class, 'create'])->name('users.add');
        Route::post('/users/add', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/profile/{id}', [UserController::class, 'profile'])->name('users.profile');
        Route::get('/users/myprofile', [UserController::class, 'myprofile'])->name('users.myprofile');
        Route::put('/user/profile/update/{id}', [UserController::class, 'profile_update'])->name('profile.update');

        Route::get('users/{user}/roles', [UserController::class, 'editRoles'])->name('users.editRoles');
        Route::put('users/{user}/roles', [UserController::class, 'updateRoles'])->name('users.updateRoles');
    });

    Route::middleware('permission:manage roles')->group(function () {
        Route::resource('roles', RoleController::class);
    });

    Route::middleware('permission:manage permissions')->group(function () {
        Route::resource('permissions', PermissionController::class);
    });


  // Transactions
  Route::middleware('permission:manage transactions')->group(function () {

    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
    Route::get('/transactions/{transaction}/edit', [TransactionController::class, 'edit'])->name('transactions.edit');
    Route::put('/transactions/{transaction}', [TransactionController::class, 'update'])->name('transactions.update');
    Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy'])->name('transactions.destroy');
  });
  // Invoice Routes

  Route::middleware('permission:manage invoices')->group(function () {
  
    Route::get('/invoices/template', [InvoiceController::class, 'template'])->name('invoices.template');
    Route::get('/invoices/information', [InvoiceController::class, 'information'])->name('invoices.information');
    Route::post('/invoices/information', [InvoiceController::class, 'store'])->name('invoices.store');
    Route::get('/invoices/client', [InvoiceController::class, 'client'])->name('invoices.client');
    Route::get('/invoices/users', [InvoiceController::class, 'users'])->name('invoices.users');
    Route::get('/invoices/{invoice}', [InvoiceController::class, 'show'])->name('invoices.show');
    Route::get('/invoices/payment/{invoice}', [InvoiceController::class, 'payment'])->name('invoices.payment');

    // New PayPal routes
    Route::get('/invoices/pay-with-paypal/{invoice}', [InvoiceController::class, 'payWithPayPal'])->name('invoices.pay.paypal');
    Route::get('/invoices/paypal/success/{invoice}', [InvoiceController::class, 'paypalSuccess'])->name('invoices.paypal.success');
    Route::get('/invoices/paypal/cancel/{invoice}', [InvoiceController::class, 'paypalCancel'])->name('invoices.paypal.cancel');

    Route::post('/invoices/send', [InvoiceController::class, 'sendInvoice'])->name('invoices.send');
  });
  // Jobs
  Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');




  // Time tracking dashboard
  Route::middleware('permission:manage time and attendance')->group(function () {

    Route::get('/time', [TimeController::class, 'showTimeDashboard'])->name('time.dashboard');
    Route::post('/time/check-in', [TimeController::class, 'processCheckIn'])->name('time.check_in');
    Route::post('/time/check-out', [TimeController::class, 'processCheckOut'])->name('time.check_out');
    Route::post('/time/leave', [TimeController::class, 'submitLeave'])->name('time.leave.submit');
    Route::get('/leaves', [TimeController::class, 'showLeaveRequests'])->name('time.leaves');
    Route::post('/leaves/{leave}/status', [TimeController::class, 'updateLeaveStatus'])->name('leaves.updateStatus');
  }); 


  // blank page route
  Route::get('/blank-template', function () {
    return view('pages.time.check_out');
  })->name('menu.settings');
});
