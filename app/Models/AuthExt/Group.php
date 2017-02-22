<?php

namespace App\Models\AuthExt;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\AuthExt\Access;

class Group extends Model
{

    use SoftDeletes;

    /**
     * Table name
     * @var string 
     */
    protected $table = 'groups';

    /**
     * 
     * @return type
     */
    public function access()
    {
        return $this->belongsToMany(Access::class, 'group_access', 'group_id', 'access_id')->withPivot('permission');
    }

}
