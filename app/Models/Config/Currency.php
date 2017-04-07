<?php

namespace App\Models\Config;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currencies';

    protected $primaryKey = 'code';

    public $incrementing = false;

    protected $fillable = [
    	'code', 'country'
    ];

}
