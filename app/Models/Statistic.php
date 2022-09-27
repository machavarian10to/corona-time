<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Statistic extends Model
{
	use HasFactory, HasTranslations;

	public array $translatable = ['country'];

	protected $guarded = ['id'];

	public function scopeFilter($query, array $filters)
	{
		return $query->when(
			$filters['search'] ?? false,
			fn ($query, $search) => $query->where('country->ka', 'like', '%' . $search . '%')->
			orWhere('country->en', 'like', '%' . substr($search, 1) . '%')
		);
	}
}
