<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\RoleController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\AccessController;
use App\Http\Controllers\dashboard\CountryController;
use App\Http\Controllers\dashboard\ProjectController;
use App\Http\Controllers\dashboard\PlatformController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\TechnologyController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
// roles
Route::resource('roles', RoleController::class);
// access control
Route::resource('access', AccessController::class);
// users
Route::resource('users', UserController::class);
// user status update
Route::post('/users/{id}/update-status', [UserController::class, 'updateStatus']);
Route::post('/user/upload-photo', [UserController::class, 'uploadPhoto'])->name('user.upload-photo');



// platforms
Route::resource('platforms', PlatformController::class);
// technologies
Route::resource('technologies', TechnologyController::class);
// projects
Route::resource('projects', ProjectController::class);
Route::post('/update-project-status', [ProjectController::class, 'updateProjectStatus']);


Route::get('/countries', [CountryController::class, 'index']);
Route::get('/countries/{id}', [CountryController::class, 'show']);
Route::get('/countries/continent/{continent}', [CountryController::class, 'byContinent']);
Route::get('/countries/currency/{currencyCode}', [CountryController::class, 'byCurrency']);

Route::post('/countries', [CountryController::class, 'store']);
Route::put('/countries/{id}', [CountryController::class, 'update']);
Route::delete('/countries/{id}', [CountryController::class, 'destroy']);
