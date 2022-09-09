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
		return redirect()->route('feedback');
	}

	public function verify(EmailVerificationRequest $request): RedirectResponse
	{
		$request->fulfill();
		auth()->logout();

		return redirect()->route('user.verified');
	}
}
