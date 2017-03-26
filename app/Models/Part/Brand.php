<?php

namespace App\Models\Part;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;

    protected $table = 'part_brands';

    protected $primaryKey = 'name';

    public $incrementing = false;

    protected $fillable = [
    	'name', 'description',
    ];
}
