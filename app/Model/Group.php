<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Group extends Model
{
    use SoftDeletes;
   protected $table='group';

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
}
