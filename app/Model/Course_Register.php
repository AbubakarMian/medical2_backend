<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course_Register extends Model
{
    use SoftDeletes;
    protected $table='course_register';

    public function course()
    {
        return $this->hasOne('App\Model\Courses', 'id', 'course_id');
    }
 }
