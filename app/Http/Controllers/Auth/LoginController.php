<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\ResetUserPasswordRequest;
use App\Http\Requests\UpdateUserPasswordRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class LoginController extends Controller
{
	public function login(LoginUserRequest $request): RedirectResponse
	{
		if (!auth()->attempt($request->validated(), $request->boolean('remember')))
		{
			throw ValidationException::withMessages([
				'username' => 'Name not found!',
				'password' => 'Your password is incorrect!',
			]);
		}
		return redirect()->route('dashboard');
	}

	public function logout(): RedirectResponse
	{
		auth()->logout();
		return redirect()->route('dashboard');
	}

	public function passwordRequest(ResetUserPasswordRequest $request): RedirectResponse
	{
		$status = Password::sendResetLink(
			$request->only('email')
		);

		return $status === Password::RESET_LINK_SENT
			? redirect()->route('forgot.feedback')
			: back()->withErrors(['email' => __($status)]);
	}

	public function resetPassword(string $token): View
	{
		return view('password-reset.reset-password', [
			'token' => $token,
		]);
	}

	public function updatePassword(UpdateUserPasswordRequest $request): RedirectResponse
	{
		$status = Password::reset(
			$request->only('email', 'password', 'password_confirmation', 'token'),
			function ($user, $password) {
				$user->forceFill([
					'password' => Hash::make($password),
				])->setRememberToken(Str::random(60));
				$user->save();
				event(new PasswordReset($user));
			}
		);

		return $status === Password::PASSWORD_RESET
			? redirect()->route('reset.feedback')->with('status', __($status))
			: back()->withErrors(['email' => [__($status)]]);
	}
}
