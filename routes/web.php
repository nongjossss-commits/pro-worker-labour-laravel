<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\ImporterController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\DelegateController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomepageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route for the homepage
Route::get('/', [HomepageController::class, 'index'])->name('home');

// Main modules using resource controllers
Route::resource('employers', EmployerController::class);
Route::resource('importers', ImporterController::class);
Route::resource('agents', AgentController::class);
Route::resource('delegates', DelegateController::class);

// --- CORRECTED EMPLOYEE ROUTES using standard resource controller ---
Route::resource('employees', EmployeeController::class);