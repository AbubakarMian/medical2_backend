<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    protected $table='payment';

    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
    public function course_register()
    {
        return $this->hasOne('App\Model\Course_Register', 'id', 'course_register_id');
    }
    public function student()
    {
        return $this->hasOne('App\Model\Student_fees', 'id', 'student_fees_id');
    }
 }
