<?php

namespace App\Models\Part;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartNumberExtension extends Model
{
	use SoftDeletes;
	
	protected $table = 'part_number_extensions';

	protected $primaryKey = 'code';

	public $incrementing = false;

	protected $fillable = [
		'code', 'description'
	];
}