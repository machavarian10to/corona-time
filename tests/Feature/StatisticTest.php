<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatisticTest extends TestCase
{
	use RefreshDatabase;

	private User $user;

	public function setUp(): void
	{
		parent::setUp();
		$this->user = User::factory()->create();
	}

	public function test_guest_can_not_access_the_dashboard(): void
	{
		$response = $this->get(route('dashboard'));
		$response->assertRedirect(route('login'));
	}

	public function test_guest_can_not_access_the_country_page(): void
	{
		$response = $this->get(route('country'));
		$response->assertRedirect(route('login'));
	}

	public function test_auth_user_can_access_dashboard(): void
	{
		$response = $this->actingAs($this->user)->get(route('dashboard'));
		$response->assertSuccessful();
	}

	public function test_auth_user_can_access_country_page(): void
	{
		$response = $this->actingAs($this->user)->get(route('country'));
		$response->assertSuccessful();
	}

	public function test_auth_user_can_logout(): void
	{
		$response = $this->actingAs($this->user)->post(route('logout'));
		$response->assertRedirect(route('dashboard'));
	}

//    public function test_if_locale_is_english_countries_sort_by_english_name(): void
//    {
//        $response = $this->actingAs($this->user)->get(route('country'));
//    }


}
