<?php

namespace Tests\Feature;

use Tests\TestCase;

class LocaleTest extends TestCase
{
	public function test_user_can_change_locale_to_georgian(): void
	{
		$response = $this->get(route('change.locale', 'ka'));
		$response->assertRedirect();
		$response->assertSessionHas('lang', 'ka');
	}

	public function test_if_locale_is_not_in_available_locales_app_default_language_set_to_english(): void
	{
		$response = $this->get(route('change.locale', 'fr'));
		$response->assertRedirect();
		$response->assertSessionHas('lang', 'en');
	}
}
