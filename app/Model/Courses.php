<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class 
Courses extends Model
{
   use SoftDeletes;
   protected $table='courses';

   public function question()
   {
       return $this->hasOne('App\Model\Question', 'question_id', 'id');
   }
   public function group()
   {
       return $this->hasOne('App\Model\Group', 'courses_id', 'id');
   }
}
