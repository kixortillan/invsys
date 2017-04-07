<?php

namespace App\Transformers\Part;

use App\Models\Part\PartNumberExtension;
use League\Fractal\TransformerAbstract;

class PartNumberExtensionTransformer extends TransformerAbstract
{

	public function transform(PartNumberExtension $model)
	{
		return [
			'pne_code' => $model->code,
			'description' => $model->description
		];
	}
}