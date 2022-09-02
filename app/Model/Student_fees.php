<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student_fees extends Model
{
   use SoftDeletes;
   protected $table='student_fees';

   public function user()
   {
       return $this->hasOne('App\User', 'id', 'user_id');
   }

   public function group(){
    return $this->hasOne('App\Model\Group','id','group_id');
}
public function course()
{
    return $this->hasOne('App\Model\Courses', 'id', 'course_id');
}
// public function course_register()
// {
//     return $this->hasOne('App\Model\Courses', 'id', 'course_id');
// }

  
}
