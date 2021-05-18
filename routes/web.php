<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\PlacesController;
use App\Http\Controllers\SchedulesController;
use App\Http\Controllers\ServicesController;

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

Route::get('/', function () {
    return view('home');
})->name('home');

/**
 * Route Client
 */
Route::prefix('clients')->group(function () {
    Route::get(
        '/',
        [ClientsController::class, 'index']
    )->name('clients.index');
});

/**
 * Route Employee
 */
Route::prefix('employees')->group(function () {
    Route::get(
        '/',
        [EmployeesController::class, 'index']
    )->name('employees.index');
});

/**
 * Route Place
 */
Route::prefix('places')->group(function () {
    Route::get(
        '/',
        [PlacesController::class, 'index']
    )->name('places.index');
});

/**
 * Route Service
 */
Route::prefix('services')->group(function () {
    Route::get(
        '/',
        [ServicesController::class, 'index']
    )->name('services.index');
});

/**
 * Route Schedule
 */
Route::prefix('schedules')->group(function () {
    Route::get(
        '/',
        [SchedulesController::class, 'index']
    )->name('schedules.index');
});
