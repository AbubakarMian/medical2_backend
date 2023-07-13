<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Group_users extends Model
{
    
        use SoftDeletes;
       protected $table='group_users';

       public function user()
       {
           return $this->hasOne('App\Models\User', 'id', 'user_id');
       }
    }
