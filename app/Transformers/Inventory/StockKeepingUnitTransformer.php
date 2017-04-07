<?php

namespace App\Transformers\Inventory;

use App\Models\Inventory\StockKeepingUnit;
use League\Fractal\TransformerAbstract;

class StockKeepingUnitTransformer extends TransformerAbstract
{

	public function transform(StockKeepingUnit $model)
	{
		return [
			'sku_id' => $model->id,
			'sku' => $model->getSku(),
			'part_number' => $model->part_number,
			'brand' => $model->brand,
			'description' => $model->description,
			'pne_code' => $model->pne_code,
			'is_hazardous' => $model->is_hazardous,
			'has_expiration' => $model->has_expiration,
			'on_hand' => $model->on_hand,
			'available' => $model->available,
			'reserved' => $model->reserved,
			'on_order' => $model->on_order,
			'unserved' => $model->unserved,
			'srp' => $model->srp,
			'cost' => $model->cost,
			'cost_currency' => $model->cost_currency,
			'created_at' => $model->created_at,
		];
	}
}