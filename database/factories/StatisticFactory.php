<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Statistic>
 */
class StatisticFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'country'   => $this->faker->country(),
			'code'      => $this->faker->countryCode,
			'confirmed' => $this->faker->numberBetween(1, 10000),
			'recovered' => $this->faker->numberBetween(1, 10000),
			'deaths'    => $this->faker->numberBetween(1, 10000),
		];
	}
}
