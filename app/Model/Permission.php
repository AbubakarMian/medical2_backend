<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;
    protected $table='permissions';

    public function url()
    {
        return $this->hasOne('App\Model\Url', 'id', 'url_id');
    }
    public function role()
    {
        return $this->hasOne('App\Model\Role', 'id', 'role_id');
    }
 }
