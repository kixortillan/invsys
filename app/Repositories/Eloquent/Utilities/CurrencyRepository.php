<?php

namespace App\Repositories\Eloquent\Utilities;

use App\Models\Utilities\Currency;
use App\Repositories\Contracts\Utilities\CurrencyRepositoryInterface;

class CurrencyRepository implements CurrencyRepositoryInterface
{
	public function all()
	{
		return Currency::all();
	}
}