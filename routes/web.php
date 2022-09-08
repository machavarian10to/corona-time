<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::view('/register', 'users.register')->name('register')
	->middleware('guest');

Route::post('/register', [RegisterController::class, 'register'])->name('user.register')
	->middleware('guest');

Route::view('/email/verify', 'auth.verify-email')
	->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [RegisterController::class, 'verify'])
	->name('verification.verify');

Route::view('/login', 'users.login')
	->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'login'])
	->name('user.login')->middleware('guest');

Route::get('/', function () {
	return view('landing-page');
})->name('home');

Route::get('/forget-password', function () {
	return 'forget password';
})->name('forget');

Route::get('/dashboard', function () {
	return 'dashboard';
})->name('dashboard');
