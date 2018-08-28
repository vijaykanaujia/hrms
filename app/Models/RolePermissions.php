<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class RolePermissions extends Model
{
    protected $table = 'role_permissions';

    public function getRoles(){
        return $this->belongsTo(Role::class,'role_id','id');
    }
}
