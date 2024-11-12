<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'show_registration_form'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

Route::view('/login', 'users.login');
// Route::view('/register', 'users.register');
Route::view('/dashboard', 'users.dashboard');
Route::view('/UserProfile', 'users.profile');

Route::view('/admin', 'admins.login');
Route::view('/admin/dashboard', 'admins.dashboard');
Route::view('/admin/inmate', 'admins.inmate');

Route::view('/admin/user/moderator', 'admins.users.moderator');
Route::view('/admin/user/registered', 'admins.users.registered');
Route::view('/admin/user/pending', 'admins.users.pending');
Route::view('/admin/user/blacklisted', 'admins.users.blacklist');

Route::view('/admin/logs/pending', 'admins.logs.pending');
Route::view('/admin/logs/ongoing', 'admins.logs.ongoing');
Route::view('/admin/logs/completed', 'admins.logs.completed');

Route::view('/admin/audit', 'admins.audit');