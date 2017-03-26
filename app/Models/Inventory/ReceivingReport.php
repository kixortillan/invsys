<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;

class ReceivingReport extends Model
{
    protected $table = 'receiving_reports';

    protected $fillable = [
    	'transaction_id', 'invoice_num', 'official_receipt_num', 'total_cost'
    ];
}
