<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\analyticController;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InmateController;
use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ScannerController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Mail;

Route::get('/aboutus', function () {
    return view('info.aboutus');
})->name('aboutus');

Route::get('/contactus', function () {
    return view('info.contactus');
})->name('contactus');

Route::get('/', [AuthController::class, 'Authenticate'])->name('home');
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/logouts', [LoginController::class, 'logout'])->name('logouts');

// Forgot Password
Route::get('/forgot-password', [PasswordController::class, 'showForgotPasswordForm'])->name('forgot-password');
Route::post('/forgot-password', [PasswordController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [PasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [PasswordController::class, 'resetPassword'])->name('password.update');


Route::get('/test-email', function () {
    Mail::raw('This is a test email', function ($message) {
        $message->to('your_email@mailtrap.io')
                ->subject('Test Email');
    });
    return 'Email sent!';
});
Route::group(['middleware' => 'auth:visitor'], function () {
    Route::get('/dashboard', [VisitorController::class, 'ShowDashboard'])->name('dashboard');
    Route::get('/UserProfile', [VisitorController::class, 'ShowProfile'])->name('profile');
    Route::get('/visitor/qr-code', [VisitorController::class, 'showQr'])->name('show_qr');
    Route::get('qr-codes/{filename}', [VisitorController::class, 'getQrCode'])->name('qr_codes');
});
// 
// @ admin routes MIDDLEWARE
// 
Route::get('/admin', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin', [LoginController::class, 'loginAdmin'])->name('admin.login.submit');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/dashboard', [analyticController::class, 'index'])->name('admins.dashboard');
    Route::get('/admin/inmate', [InmateController::class, 'show'])->name('admins.inmate');
    Route::post('/admin/inmate', [InmateController::class, 'store'])->name('admin.inmate.store');
    Route::get('/admin/inmate/search', [InmateController::class, 'search'])->name('admin.inmate.search');
    Route::post('/admin/inmate/delete/{id}', [InmateController::class, 'delete'])->name('admin.inmate.delete');
    Route::put('/admin/inmate/update/{id}', [InmateController::class, 'update'])->name('admin.inmate.update');
    // Route::get('/admin/inmate/{id}', [AdminController::class, 'show'])->name('admin.inmate.show');
    // Route::get('/admin/inmate/{id}/edit', [AdminController::class, 'edit'])->name('admin.inmate.edit');
    // Route::delete('/admin/inmate/{id}', [AdminController::class, 'destroy'])->name('admin.inmate.destroy');

    Route::get('/admin/user/moderator', [ModeratorController::class, 'show'])->name('admins.users.moderator');
    Route::post('/admin/user/moderator', [ModeratorController::class, 'store'])->name('admins.users.moderator.store');
    Route::get('/admin/moderator/search', [ModeratorController::class, 'mod_search'])->name('admins.users.moderator.search');

    Route::get('/admin/user/registered', [AdminController::class, 'user_reg'])->name('admins.users.registered');
    Route::get('/admin/user/profile/{id}', [AdminController::class, 'get_profile'])->name('users.profile.show');

    Route::get('/admin/user/pending', [AdminController::class, 'user_pend'])->name('admins.users.pending');
    Route::get('/admin/user/pending/{id}', [AdminController::class, 'show_pending'])->name('users.pending.show');
    Route::post('/admin/visitor/pending/{id}', [AdminController::class, 'confirm_visitor'])->name('visitor.confirm');
    Route::post('/admin/visitor/pending{id}', [AdminController::class, 'reject_visitor'])->name('visitor.reject');

    Route::get('/admin/user/blacklisted', [AdminController::class, 'user_black'])->name('admins.users.blacklist');
    // ADD TO BLACKLISTED
    Route::post('/admin/user/blacklisted/{id}', [AdminController::class, 'add_blacklist'])->name('admins.users.add_to_blacklist');
    // REMOVE FROM BLACKLISTED
    Route::get('/admin/user/blacklisted/{id}', [AdminController::class, 'remove_blacklist'])->name('admins.users.remove_from_blacklist');

    // showing the pending visits
    // showing the ongoing visits
    // showing the completed visits
    // search visits logs
    Route::get('/admin/visit/pending', [VisitController::class, 'pending_visit'])->name('logs.pending');
    Route::get('/admin/visit/ongoing', [VisitController::class, 'ongoing_visit'])->name('logs.ongoing');
    Route::get('/admin/visit/completed', [VisitController::class, 'completed_visit'])->name('logs.completed');
    Route::post('/admin/visit/search', [VisitController::class, 'search_visit'])->name('logs.search');
    Route::get('/admin/visit/confirm/{id}', [VisitController::class, 'confirm_visit'])->name('visit.confirm');
    Route::get('/admin/visit/reject/{id}', [VisitController::class, 'reject_visit'])->name('visit.reject');
    Route::get('/admin/visit/force-end/{id}', [VisitController::class, 'force_end_visit'])->name('visit.force_end');

    Route::get('/scanner', [ScannerController::class, 'landingpage'])->name('landingpage');
    Route::get('/scanner/check-in', [ScannerController::class, 'checkin'])->name('checkin');
    Route::get('/scanner/check-out', [ScannerController::class, 'checkout'])->name('checkout');
    Route::post('/process-qr', [ScannerController::class, 'process_qr'])->name('process.qr');
    Route::post('/check-out', [ScannerController::class, 'check_out'])->name('check.out');
    Route::get('/scanner/search-inmate', [ScannerController::class, 'search_inmate'])->name('search.scanner.inmate');

    // Route::view('/admin/audit', 'admins.audit');
    Route::get('/admin/audit', [AuditLogController::class, 'showAudit'])->name('audit.log');
    Route::get('/admin/audit/search', [AuditLogController::class, 'searchAudit'])->name('audit.search');

    Route::get('/admin/analytics/daily/', [analyticController::class, 'daily'])->name('analytics.daily');
    Route::get('/admin/analytics/weekly/', [analyticController::class, 'weekly'])->name('analytics.weekly');
    Route::get('/admin/analytics/monthly/', [analyticController::class, 'monthly'])->name('analytics.monthly');
});
