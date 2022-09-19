<?php

namespace App\Console\Commands;

use App\Models\Statistic;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetStatistics extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'fetch:statistics';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Get countries covid statistic info from API';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle(): string
	{
		$countries = Http::get('https://devtest.ge/countries')->json();

		foreach ($countries as $country)
		{
			$response = Http::post('https://devtest.ge/get-country-statistics', [
				'code' => $country['code'],
			])->json();

			Statistic::updateOrCreate(
				[
					'id'        => $response['id'],
				],
				[
					'country'   => $country['name'],
					'code'      => $response['code'],
					'confirmed' => $response['confirmed'],
					'recovered' => $response['recovered'],
					'deaths'    => $response['deaths'],
				],
			);
		}
		return 'Covid statistic has been fetched!';
	}
}
