<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    protected $table='payment';

    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
    public function course()
    {
        return $this->hasOne('App\Model\Courses', 'id', 'course_id');
    }
 }
