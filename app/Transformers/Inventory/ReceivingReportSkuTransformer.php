<?php

namespace App\Transformers\Inventory;

use App\Models\ReceivingReportSku;
use League\Fractal\TransformerAbstract;

class ReceivingReportSkuTransformer extends TransformerAbstract
{

	public function transform(ReceivingReportSku $model)
	{
		return [
			'receiving_report_id' => $model->id,
			'sku' => $model->part_number . '-' . $model->pne_code,
			'cost' => $model->cost,
			'average_cost' => $model->averate_cost,
		];
	}
}