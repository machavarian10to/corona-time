<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
	public function login(LoginUserRequest $request): RedirectResponse
	{
		$remember = $request->has('remember') ? true : false;
		if (!auth()->attempt($request->validated(), $remember))
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
        return redirect()->route('home');
	}
}
