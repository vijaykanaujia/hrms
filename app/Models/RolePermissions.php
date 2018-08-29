<?php

namespace App\models;

use App\Model_permissions;
use Illuminate\Database\Eloquent\Model;

class RolePermissions extends Model
{
    protected $table = 'role_permissions';

    public function getRoles(){
        return $this->belongsTo(Role::class,'role_id','id');
    }

    public function getAllPermissions(){
        return $this->hasMany(Model_permissions::class,'id','permission_id');
    }
}
