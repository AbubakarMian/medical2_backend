<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminUrlUserPermission extends Model
{
    use SoftDeletes;
    protected $table='admin_url_permission_user';

    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
    public function role(){
        return $this->hasOne('use App\Models\Role','id','role_id');
    }
    public function admin_url()
    {
        return $this->hasOne('use App\Models\Admin_url', 'id', 'admin_url_id');
    }
}
