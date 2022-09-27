<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\View\View;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
	public function index(): View
	{
		return view('dashboard', [
			'statistic' => Statistic::all(),
		]);
	}

	public function show(Request $request): View
	{
		$sortby = $request->sortby ?? 'created_at';
		$sortDirection = $request->direction ?? 'asc';

		$sortby = ($sortby === 'country' && app()->currentLocale() === 'en') ? $sortby . '->en' : (($sortby === 'country' && app()->currentLocale() === 'ka') ? $sortby . '->ka' : $sortby);

		return view('country', [
			'general'         => Statistic::all(),
			'statistics'      => Statistic::filter(request(['search']))
									->orderBy($sortby, $sortDirection)->get(),
		]);
	}
}
