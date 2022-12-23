<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    protected $table='role';

    public function admin_url_permissions(){
        return $this->hasMany('App\Model\Admin_Url_Permission_Role','role_id','id');
    }

 }
