<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Model_permissions extends Model
{
    protected $table = 'permissions';
    protected $primaryKey = 'id';
    public $incrementing = true;

    public static $menues = [
        '1'=> 'Employees',
        '2'=> 'Clients',
        '3'=> 'Projects',
    ];
}
