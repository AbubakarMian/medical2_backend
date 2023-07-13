<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course_Register extends Model
{
    use SoftDeletes;
    protected $table='course_register';

    public function course()
    {
        return $this->hasOne('App\Models\Courses', 'id', 'course_id');
    }
    public function user(){
        return $this->hasOne('App\Models\User','id','user_id');
    }
    public function group(){
        return $this->hasOne('App\Models\Group','id','group_id');
    }
    public function student_fees(){
        return $this->hasOne('App\Models\Student_fees','course_register_id','id');
    }
    public function student_feess(){
        return $this->hasMany('App\Models\Student_fees','course_register_id','id');
    }
    public function group_exams()
    {
        return $this->hasMany('App\Models\Group_Exams', 'group_id', 'group_id');
    }
 }
