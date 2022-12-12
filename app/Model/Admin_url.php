<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin_url extends Model
{
    use SoftDeletes;
    protected $table='admin_url';

    public function permission()
    {
        return $this->hasOne('App\Model\Permission', 'url_id', 'id');
    }
   
 }
