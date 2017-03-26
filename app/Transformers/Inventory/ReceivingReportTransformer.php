<?php

namespace App\Transformers\Inventory;

use App\Models\Inventory\ReceivingReport;
use League\Fractal\TransformerAbstract;

class ReceivingReportTransformer extends TransformerAbstract
{

	public function transform(ReceivingReport $model)
	{
		return [
			'receiving_report_id' => $model->id,
			'transaction_id' => $model->transaction_id,
			'invoice_number' => $model->invoice_num,
			'official_receipt_number' => $model->official_receipt_num,
			'total_cost' => $model->total_cost,
		];
	}
}