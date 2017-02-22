<?php

namespace App\Lib\Relation;

use App\Models\AuthExt\Group;

trait UserGroupRelation
{

    /**
     * 
     * @return type
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'user_group', 'user_id', 'group_id');
    }

}
