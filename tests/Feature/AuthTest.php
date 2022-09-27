<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
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
		$username = 'username';
		$password = 'password';

		User::factory()->create([
			'username' => $username,
			'password' => bcrypt($password),
		]);

		$response = $this->post(route('user.login'), [
			'username' => $username,
			'password' => $password,
		]);

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

	public function test_user_can_verify_email(): void
	{
		$notification = new VerifyEmail();
		$user = User::factory()->create(['email_verified_at' => null]);

		$this->assertFalse($user->hasVerifiedEmail());

		$mail = $notification->toMail($user);
		$uri = $mail->actionUrl;

		$this->actingAs($user)->get($uri);

		$this->assertTrue(User::find($user->id)->hasVerifiedEmail());
	}

	public function test_send_password_reset_email(): void
	{
		$user = User::factory()->create();

		$this->expectsNotification($user, ResetPassword::class);

		$response = $this->post(route('password.request'), ['email' => $user->email]);

		$response->assertStatus(302);
	}

	public function test_does_not_send_password_reset_email(): void
	{
		$this->doesntExpectJobs(ResetPassword::class);

		$this->post(route('password.request'), ['email' => 'invalid@email.com']);
	}

	public function test_display_password_reset_form(): void
	{
		$user = User::factory()->create();
		$token = Password::createToken($user);

		$response = $this->get(route('password.reset', $token));
		$response->assertOk();
	}

	public function test_changes_users_password(): void
	{
		$user = User::factory()->create();

		$token = Password::createToken($user);

		$this->post(route('password.update'), [
			'token'                 => $token,
			'email'                 => $user->email,
			'password'              => 'password',
			'password_confirmation' => 'password',
		]);

		$this->assertTrue(Hash::check('password', $user->fresh()->password));
	}
}
