<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\YoutubeController;
use Illuminate\Support\Facades\Route;

# DASHBOARD
Route::get('/', [DashboardController::class, 'home'])->name('home');

# AUTH
Route::get('auth/login', [AuthController::class, 'loginForm'])->name('login')->middleware('guest');
Route::get('auth/login2', [AuthController::class, 'loginForm'])->name('login2')->middleware('guest');
Route::post('auth/login', [AuthController::class, 'login'])->name('login-post')->middleware('guest');
Route::get('auth/send-email-verification', [AuthController::class, 'verificationForm'])->name('send-email-verification')->middleware('guest');
Route::post('auth/send-email-verification', [AuthController::class, 'sendEmailVerification'])->middleware('guest');
Route::get('auth/verify/{token}', [AuthController::class, 'verify'])->name('verify')->middleware('guest');
Route::get('auth/register', [AuthController::class, 'registerForm'])->name('register')->middleware('guest');
Route::post('auth/register', [AuthController::class, 'register'])->middleware('guest');
Route::get('auth/forgot-password', [AuthController::class, 'forgotPasswordForm'])->name('forgot-password')->middleware('guest');
Route::post('auth/forgot-password', [AuthController::class, 'forgotPassword'])->middleware('guest');
Route::get('auth/reset-password/{token}', [AuthController::class, 'resetPasswordForm'])->name('reset-password')->middleware('guest');
Route::post('auth/reset-password/{token}', [AuthController::class, 'resetPassword'])->middleware('guest');
Route::get('auth/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout')->middleware('auth');

# SOCIAL LOGIN AND REGISTER
Route::get('auth/social-login/{provider}', [AuthController::class, 'socialLogin'])->name('social-login');
Route::get('auth/social-register/{provider}', [AuthController::class, 'socialRegister'])->name('social-register');
Route::get('auth/social/{provider}/callback', [AuthController::class, 'socialCallback'])->name('social-callback');

# CRUD GENERATOR
Route::get('crud-generator', [CrudController::class, 'index'])->middleware('auth');
Route::post('crud-generator', [CrudController::class, 'generateJson'])->middleware('auth');

# YOUTUBE
Route::get('youtube/view-sync', [YoutubeController::class, 'viewSync'])->name('youtube.view-sync')->middleware('auth');
