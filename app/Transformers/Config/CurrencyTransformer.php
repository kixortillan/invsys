<?php

namespace App\Transformers\Config;

use App\Models\Config\Currency;
use League\Fractal\TransformerAbstract;

class CurrencyTransformer extends TransformerAbstract
{

	public function transform(Currency $model)
	{
		return [
			'currency_code' => $model->code,
			'country' => $model->country,
		];
	}
}