<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student_fees extends Model
{
   use SoftDeletes;
   protected $table='student_fees';

   public function user()
   {
       return $this->hasOne('App\Models\User', 'id', 'user_id');
   }

   public function group(){
    return $this->hasMany('App\Models\Group','id','group_id');
}
public function course()
{
    return $this->hasOne('App\Models\Courses', 'id', 'course_id');
}
public function course_register()
{
    return $this->hasOne('App\Models\Course_Register', 'id', 'course_register_id');
}

public function payment()
{
    return $this->hasOne('App\Models\Payment', 'id', 'payment_id');
}


}