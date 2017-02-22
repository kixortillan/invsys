<?php

namespace App\Models\Parts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Catalog extends Model
{
	use SoftDeletes;
	
    protected $table = 'catalogs';

    protected $fillable = [
    	'part_number', 'brand', 'pne_code', 'description', 'is_hazardous', 'has_expiration',
    ];
}
