<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\GetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppointmentController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::controller(GetController::class)->group(function() {
    Route::get('/', 'homePage')->name('home'); 
    // Auth
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
});

Route::controller(AuthController::class)->group(function() {
    Route::post('/register', 'registerUser')->name('register.user');
    Route::post('/login', 'loginUser')->name('login.user');
    Route::get('/logout', 'logoutUser')->name('logout.user');
});

Route::middleware(Authenticate::class)->group(function() {
    Route::controller(DashboardController::class)->group(function() {
        Route::get('/dashboard', 'Dashboard')->name('dashboard');
        Route::get('/dashboard/appointment', 'Appointment')->name('dashboard.appointment');
    });
    Route::get('/appointment', [AppointmentController::class, 'index'])->name('dashboard.appointment');
    Route::post('/appointment/store', [AppointmentController::class, 'store'])->name('appointment.store');
    Route::put('/appointment/{appointment}/update', [AppointmentController::class, 'update'])->name('appointment.update');
    Route::get('/appointment/check-availability', [AppointmentController::class, 'checkAvailability'])->name('appointment.check-availability');
    Route::get('/admin/doctors/', [AdminController::class, 'getDoctorslist'])->name('admin.doctors-list');
});