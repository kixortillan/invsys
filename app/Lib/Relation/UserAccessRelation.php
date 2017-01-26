<?php

namespace App\Lib\Relation;

use App\Model\AuthExt\Access;

trait UserAccessRelation
{

    /**
     * 
     * @return type
     */
    public function access()
    {
        return $this->belongsToMany(Access::class, 'user_access', 'user_id', 'access_id');
    }

}
