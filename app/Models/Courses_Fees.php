<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courses_Fees extends Model
{
   use SoftDeletes;
   protected $table='course_fees';

   public function courses()
   {
       return $this->hasOne('use App\Models\Courses', 'id', 'course_id');
   }

  
}
