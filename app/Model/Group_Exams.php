<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Group_Exams extends Model
{
    use SoftDeletes;
   protected $table='group_exams';

   public function courses()
   {
       return $this->hasOne('App\Model\Courses', 'id', 'courses_id');
   }
   public function group_timings()
   {
       return $this->hasMany('App\Model\Group_Timings', 'group_id', 'id');
   }
   public function teacher()
   {
       return $this->hasOne('App\Model\Teacher', 'id', 'teacher_id');
   }
   public function course_register(){
    return $this->hasOne('App\Model\Course_Register','group_id','id');
}
   public function user()
   {
       return $this->hasOne('App\User', 'id', 'user_id');
   }
   public function exams()
   {
       return $this->hasOne('App\Model\Exams', 'id', 'exam_id');
   }
   public function group()
   {
       return $this->hasOne('App\Model\Group', 'id', 'group_id');
   }


   public function group_fees()
   {
       return $this->hasMany('App\Model\Group_fees', 'group_id', 'id');
   }
   public function student_fees()
   {
       return $this->hasMany('App\Model\Student_fees', 'group_id', 'id');
   }
}
