<?php

namespace App\Transformers\Part;

use App\Models\Part\Brand;
use League\Fractal\TransformerAbstract;

class BrandTransformer extends TransformerAbstract
{

	public function transform(Brand $model)
	{
		return [
			'name' => $model->name,
			'description' => $model->description
		];
	}
}