<?php

namespace App\Models\Inventory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockKeepingUnit extends Model
{
	use SoftDeletes;
	
    protected $table = 'stock_keeping_units';

    protected $fillable = [
    	'part_number', 'brand', 'pne_code', 'description', 'is_hazardous', 'has_expiration',
    	'on-hand', 'available', 'reserverd', 'on_order', 'unserved', 'srp', 'srp_currency', 
    	'cost', 'cost_currency',
    ];

    public function getSku()
    {
    	return $this->part_number . '-' . $this->pne_code;
    }
}
