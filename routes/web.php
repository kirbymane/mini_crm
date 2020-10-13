<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

    Route::get('', [App\Http\Controllers\CompanyController::class, 'index'])->name('dashboard');
    Route::get('create', [App\Http\Controllers\CompanyController::class, 'create']);
    Route::post('create', [App\Http\Controllers\CompanyController::class, 'store']);
    Route::get('view/{id}', [App\Http\Controllers\CompanyController::class, 'show'])->name('view');
    Route::get('edit/{id}', [App\Http\Controllers\CompanyController::class, 'edit']);
    Route::post('edit/{id}', [App\Http\Controllers\CompanyController::class, 'update']);
    Route::delete('view/{id}', [App\Http\Controllers\CompanyController::class, 'destroy']);

    Route::get('view/{companyId}/add', [App\Http\Controllers\EmployeeController::class, 'create']);
    Route::post('view/{companyId}/add', [App\Http\Controllers\EmployeeController::class, 'store']);
    Route::get('employee/{id}', [App\Http\Controllers\EmployeeController::class, 'show']);
    Route::get('employee/{id}/edit', [App\Http\Controllers\EmployeeController::class, 'edit']);
    Route::post('employee/{id}/edit', [App\Http\Controllers\EmployeeController::class, 'update']);
    Route::delete('employee/{id}', [App\Http\Controllers\EmployeeController::class, 'destroy']);
});



