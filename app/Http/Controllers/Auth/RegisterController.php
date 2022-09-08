<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
	public function register(RegisterUserRequest $request): RedirectResponse
	{
		$user = User::create([
			'username' => $request->username,
			'email'    => $request->email,
			'password' => bcrypt($request->password),
		]);
		event(new Registered($user));
		auth()->login($user);
		return redirect()->route('verification.notice');
	}

	public function verify(EmailVerificationRequest $request): RedirectResponse
	{
		$request->fulfill();

		return redirect()->route('dashboard');
	}
}
