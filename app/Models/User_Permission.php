<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class   User_Permission extends Model
{
    use SoftDeletes;
    protected $table='user_permission';
    
    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
    public function url(){
        return $this->hasOne('use App\Models\Url','id','url_id');
    }
    public function role(){
        return $this->hasOne('use App\Models\Role','id','role_id');
    }
 }
