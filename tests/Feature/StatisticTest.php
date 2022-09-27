<?php

namespace Tests\Feature;

use App\Models\Statistic;
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

	public function test_countries_can_sort_by_english_name(): void
	{
		Statistic::factory()->count(3)->create();

		$response = $this->actingAs($this->user)->get(route('country'), [
			'sortby'    => 'country',
			'direction' => 'desc',
		]);

		$response->assertSuccessful();

//		$response->assertViewHas([
//			'statistics' => $statistics,
//		]);
	}

//    public function test_countries_can_sort_by_georgian_name(): void
//	{
//		Statistic::factory()->count(3)->create();
//
//		$sortby = 'country';
//		$sortDirection = 'desc';
//
//		$response = $this->actingAs($this->user)->get(route('country'), [
//			'sortby'    => $sortby,
//			'direction' => $sortDirection,
//		]);
//
//		$statistics = Statistic::orderBy(, $sortDirection)->get();
//		$response->assertViewHas([
//			'statistics' => $statistics,
//		]);
//	}

	public function test_user_can_search_country_by_english_name(): void
	{
		$response = $this->actingAs($this->user)->get(route('country', 'search=d'));
		$response->assertSuccessful();
	}

	public function test_user_can_search_country_by_georgian_name(): void
	{
		$response = $this->actingAs($this->user)->get(route('country', 'search=დ'));
		$response->assertSuccessful();
	}
}
