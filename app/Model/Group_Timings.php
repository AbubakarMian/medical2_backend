<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group_Timings extends Model
{
    use SoftDeletes;
   protected $table='group_timings';
   public $timezone;

   public function __construct()
   {
        $this->timezone = session()->get('my_timezone') * 60; // into seconds
   }

   public function courses()
   {
       return $this->hasOne('App\Model\Courses', 'id', 'courses_id');
   }
   public function group(){
        return $this->hasOne('App\Model\Group','id','group_id');
    }
   public function getStartTimeAttribute($value){
        return $value - $this->timezone;
   }

   public function setStartTimeAttribute($value){
        $this->attributes['start_time'] = $value + $this->timezone;
    }

    public function getEndTimeAttribute($value){
        return $value - $this->timezone;
   }

   public function setEndTimeAttribute($value){
        $this->attributes['end_time'] = $value + $this->timezone;
    }

}
