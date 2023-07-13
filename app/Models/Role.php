<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    protected $table='role';

    public function admin_url_permissions(){
        return $this->hasMany('use App\Models\Admin_Url_Permission_Role','role_id','id');
    }

 }
