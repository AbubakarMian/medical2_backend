<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;
    protected $table='teacher';

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'users_id');
    }
 }
