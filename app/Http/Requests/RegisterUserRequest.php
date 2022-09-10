<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
	public function rules()
	{
		return [
			'username' => 'required|min:3|unique:users,username',
			'email'    => 'required|email|unique:users,email',
			'password' => 'required|confirmed|min:3',
		];
	}
}
