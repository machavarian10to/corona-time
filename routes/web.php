<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\StatisticController;
use Illuminate\Support\Facades\Route;

Route::controller(StatisticController::class)->group(function () {
	Route::get('/', 'index')->name('dashboard')->middleware(['auth', 'verified']);
	Route::get('/country', 'show')->name('country')->middleware(['auth', 'verified']);
});

Route::controller(RegisterController::class)->group(function () {
	Route::post('/register', 'register')->name('user.register')->middleware('gust');
	Route::get('/email/verify/{id}/{hash}', 'verify')->name('verification.verify');
});

Route::controller(LoginController::class)->group(function () {
	Route::middleware('guest')->group(function () {
		Route::post('/login', 'login')->name('user.login');
		Route::post('/forgot-password', 'passwordRequest')->name('password.request');
		Route::get('/reset-password/{token}', 'resetPassword')->name('password.reset');
		Route::post('/reset-password', 'updatePassword')->name('password.update');
	});
	Route::post('/logout', 'logout')->name('logout')->middleware('auth');
});

Route::middleware('guest')->group(function () {
	Route::view('/register', 'users.register')->name('register');
	Route::view('/login', 'users.login')->name('login');
	Route::view('/forgot-password', 'password-reset.forgot-password')->name('forgot.password');
});

Route::view('/feedback', 'auth.feedback')->name('feedback');

Route::view('/email/verify', 'auth.verify-email')->name('verification.notice');

Route::view('/verified-feedback', 'auth.user-verified')->name('user.verified');

Route::view('/forgot-feedback', 'password-reset.forgot-feedback')->name('forgot.feedback');

Route::view('/reset-feedback', 'password-reset.reset-feedback')->name('reset.feedback');
