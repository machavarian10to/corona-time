<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
	use RefreshDatabase;

	public function test_if_login_input_fields_are_empty_print_errors(): void
	{
		$response = $this->post(route('user.login'));
		$response->assertSessionHasErrors(['username', 'password']);
	}

	public function test_if_login_username_input_is_empty_prints_error(): void
	{
		$response = $this->post(route('user.login'), [
			'password' => 'password',
		]);
		$response->assertSessionHasErrors(['username']);
	}

	public function test_if_login_password_input_is_empty_prints_error(): void
	{
		$response = $this->post(route('user.login'), [
			'username' => 'username',
		]);
		$response->assertSessionHasErrors(['password']);
	}

	public function test_if_user_does_not_exists_prints_wrong_credentials_error(): void
	{
		$response = $this->post(route('user.login'), [
			'username' => 'username',
			'password' => 'password',
		]);
		$response->assertSessionHasErrors(['username', 'password']);
	}

	public function test_if_user_password_is_invalid_print_error(): void
	{
		$user = User::factory()->create([
			'username' => 'username',
			'password' => 'password',
		]);

		$response = $this->post(route('user.login'), [
			'username' => $user->username,
			'password' => 'wrong_password',
		]);

		$response->assertSessionHasErrors(['password']);
	}

	public function test_valid_user_login_successfully(): void
	{
		$user = User::factory()->create([
			'username' => 'username',
			'password' => 'password',
		]);
		$response = $this->post(route('user.login'), [$user]);
		$response->assertRedirect(route('dashboard'));
	}

	public function test_if_register_input_fields_are_empty_print_errors(): void
	{
		$response = $this->post(route('user.register'));
		$response->assertSessionHasErrors(['username', 'email', 'password']);
	}

	public function test_if_register_username_input_is_empty_prints_error(): void
	{
		$response = $this->post(route('user.register'), [
			'email'    => 'email@redberry.ge',
			'password' => 'password',
		]);
		$response->assertSessionHasErrors(['username']);
	}

	public function test_if_register_email_input_is_empty_prints_error(): void
	{
		$response = $this->post(route('user.register'), [
			'username' => 'username',
			'password' => 'password',
		]);
		$response->assertSessionHasErrors(['email']);
	}

	public function test_if_register_password_input_is_empty_prints_error(): void
	{
		$response = $this->post(route('user.register'), [
			'username' => 'username',
			'email'    => 'email@redberry.ge',
		]);
		$response->assertSessionHasErrors(['password']);
	}

	public function test_if_register_passwords_input_does_not_match_print_error(): void
	{
		$response = $this->post(route('user.register'), [
			'username'                 => 'username',
			'email'                    => 'email@redberry.ge',
			'password'                 => 'password',
			'password_confirmation'    => 'wrong password',
		]);
		$response->assertSessionHasErrors(['password']);
	}

	public function test_user_register_successfully(): void
	{
		$response = $this->post(route('user.register'), [
			'username'              => 'username',
			'email'                 => 'email@redberry.ge',
			'password'              => 'password',
			'password_confirmation' => 'password',
		]);
		$response->assertRedirect(route('feedback'));
	}
}
