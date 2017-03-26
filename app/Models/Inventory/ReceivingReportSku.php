<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;

class ReceivingReportSku extends Model
{
    protected $table = 'receiving_report_sku';

    protected $fillable = [
    	'receiving_report_id', 'part_number', 'pne_code', 'quantity', 
    	'cost', 'average_cost',
    ];
}
