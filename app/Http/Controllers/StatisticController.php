<?php

namespace App\Http\Controllers;

use App\Models\Statistic;

class StatisticController extends Controller
{
	public function index()
	{
		return view('dashboard', [
			'statistic' => Statistic::all(),
		]);
	}
}
