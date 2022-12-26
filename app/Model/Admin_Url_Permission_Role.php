<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin_Url_Permission_Role extends Model
{
    use SoftDeletes;
    protected $table='admin_url_permission_role';

    public function role(){
        return $this->hasOne('App\Model\Role','id','role_id');
    }

    public function admin_url(){
        return $this->hasOne('App\Model\Admin_url','id','admin_url_id');
    }
}
