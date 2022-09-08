<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
	public function login(LoginUserRequest $request): RedirectResponse
	{
		if (!auth()->attempt($request->validated()))
		{
			throw ValidationException::withMessages([
				'email' => 'Your credentials could not verified!',
			]);
		}
		return redirect()->route('dashboard');
	}
}
