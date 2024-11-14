<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InmateController;
use App\Http\Controllers\ModeratorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::view('/login', 'users.login');
// Route::view('/register', 'users.register');

Route::group(['middleware' => 'auth:visitor'], function () {
    Route::get('/dashboard', [VisitorController::class, 'ShowDashboard'])->name('dashboard');
    Route::get('/UserProfile', [VisitorController::class, 'ShowProfile'])->name('profile');
});
// 
// @ admin routes MIDDLEWARE
// 
Route::get('/admin', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin', [LoginController::class, 'loginAdmin'])->name('admin.login.submit');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admins.dashboard');
    Route::get('/admin/inmate', [InmateController::class, 'show'])->name('admins.inmate');
    Route::post('/admin/inmate', [InmateController::class, 'store'])->name('admin.inmate.store');
    // Route::get('/admin/inmate/{id}', [AdminController::class, 'show'])->name('admin.inmate.show');
    // Route::get('/admin/inmate/{id}/edit', [AdminController::class, 'edit'])->name('admin.inmate.edit');
    // Route::put('/admin/inmate/{id}', [AdminController::class, 'update'])->name('admin.inmate.update');
    // Route::delete('/admin/inmate/{id}', [AdminController::class, 'destroy'])->name('admin.inmate.destroy');

    Route::get('/admin/user/moderator', [ModeratorController::class, 'show'])->name('admins.users.moderator');
    Route::post('/admin/user/moderator', [ModeratorController::class, 'store'])->name('admins.users.moderator.store');
    Route::get('/admin/moderator/search', [ModeratorController::class, 'mod_search'])->name('admins.users.moderator.search');

    Route::get('/admin/user/registered', [AdminController::class, 'user_reg'])->name('admins.users.registered');
    Route::get('/admin/user/pending', [AdminController::class, 'user_pend'])->name('admins.users.pending');
    Route::get('/admin/user/blacklisted', [AdminController::class, 'user_black'])->name('admins.users.blacklist');
});



Route::view('/admin', 'admins.login');
// Route::view('/admin/dashboard', 'admins.dashboard');
// Route::view('/admin/inmate', 'admins.inmate');                                                                                                                                                                                                                                                                                                                                                                                                                                                              111111                  
// Route::view('/admin/user/moderator', 'admins.users.moderator');
Route::view('/admin/user/registered', 'admins.users.registered');
Route::view('/admin/user/pending', 'admins.users.pending');
Route::view('/admin/user/blacklisted', 'admins.users.blacklist');

Route::view('/admin/logs/pending', 'admins.logs.pending');
Route::view('/admin/logs/ongoing', 'admins.logs.ongoing');
Route::view('/admin/logs/completed', 'admins.logs.completed');

Route::view('/admin/audit', 'admins.audit');