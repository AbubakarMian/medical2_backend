<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group_Timings extends Model
{
    use SoftDeletes;
   protected $table='group_timings';

   public function courses()
   {
       return $this->hasOne('App\Model\Courses', 'id', 'courses_id');
   }
   public function group(){
    return $this->hasOne('App\Model\Group','id','group_id');
}
}
