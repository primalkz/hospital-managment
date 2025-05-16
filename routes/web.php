<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\GetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\TransactionController;
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

    // Common routes for all authenticated users
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [AdminController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/update-password', [AdminController::class, 'updatePassword'])->name('profile.update.password');
    Route::post('/profile/update-photo', [AdminController::class, 'updateProfilePhoto'])->name('profile.update.photo');
    Route::get('/appointment', [AppointmentController::class, 'index'])->name('dashboard.appointment');
    Route::post('/appointment/store', [AppointmentController::class, 'store'])->name('appointment.store');
    Route::post('/appointment/cancel', [AppointmentController::class, 'cancel'])->name('appointment.cancel');
    Route::put('/appointment/{appointment}/update', [AppointmentController::class, 'update'])->name('appointment.update');
    Route::get('/appointment/check-availability', [AppointmentController::class, 'checkAvailability'])->name('appointment.check-availability');
    Route::get('/transactions', [TransactionController::class, 'index'])->name('dashboard.transactions');
    Route::post('/transaction/pay', [TransactionController::class, 'processPayment'])->name('transaction.pay');
});

// Admin only routes
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/add', [AdminController::class, 'addAdmin'])->name('admin.add');
    Route::post('/admin/store', [AdminController::class, 'storeAdmin'])->name('admin.store');
    Route::get('/admin/doctors', [AdminController::class, 'getDoctorslist'])->name('admin.doctors');
    Route::post('/admin/doctors/store', [AdminController::class, 'storeDoctors'])->name('admin.doctors.store');
    Route::get('/admin/doctors/{id}', [AdminController::class, 'getDoctor'])->name('admin.doctors.get');
    Route::put('/admin/doctors/{id}', [AdminController::class, 'updateDoctor'])->name('admin.doctors.update');
    Route::delete('/admin/doctors/{id}', [AdminController::class, 'deleteDoctor'])->name('admin.doctors.delete');
});

// Doctor and Admin routes
Route::middleware(['role:admin,doctor'])->group(function () {
    Route::get('/admin/patients', [AdminController::class, 'getPatientsList'])->name('admin.patients');
    Route::post('/admin/patients/store', [AdminController::class, 'storePatient'])->name('admin.patients.store');
    Route::get('/admin/patients/{id}', [AdminController::class, 'getPatient'])->name('admin.patients.get');
    Route::put('/admin/patients/{id}', [AdminController::class, 'updatePatient'])->name('admin.patients.update');
    Route::delete('/admin/patients/{id}', [AdminController::class, 'deletePatient'])->name('admin.patients.delete');
});

// Profile Routes
Route::middleware(Authenticate::class)->group(function () {
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [AdminController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/update-password', [AdminController::class, 'updatePassword'])->name('profile.update.password');
    Route::post('/profile/update-photo', [AdminController::class, 'updateProfilePhoto'])->name('profile.update.photo');
});