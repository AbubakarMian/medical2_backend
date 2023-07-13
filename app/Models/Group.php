<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Group extends Model
{
    use SoftDeletes;
   protected $table='group';

   public function courses()
   {
       return $this->hasOne('App\Models\Courses', 'id', 'courses_id');
   }
   public function group_timings()
   {
       return $this->hasMany('App\Models\Group_Timings', 'group_id', 'id');
   }
   public function teacher()
   {
       return $this->hasOne('App\Models\Teacher', 'id', 'teacher_id');
   }
   public function course_register(){
    return $this->hasOne('App\Models\Course_Register','group_id','id');
}
   public function user()
   {
       return $this->hasOne('App\Models\User', 'id', 'user_id');
   }
   public function group_exams()
   {
       return $this->hasMany('App\Models\Group_Exams', 'group_id', 'id');
   }
   public function group_fees()
   {
       return $this->hasMany('App\Models\Group_fees', 'group_id', 'id');
   }
   public function student_fees()
   {
       return $this->hasMany('App\Models\Student_fees', 'group_id', 'id');
   }



}
