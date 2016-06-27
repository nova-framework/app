<?php

namespace App\Models;

use Nova\Database\ORM\Model as BaseModel;


class Role extends BaseModel
{
    protected $table = 'roles';

    protected $fillable = array('name', 'alug', 'description');


    public function users()
    {
        return $this->hasMany('App\Models\User', 'role_id');
    }

}
