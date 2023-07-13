<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courses extends Model
{
    use SoftDeletes;
    protected $table = 'courses';

    public function question()
    {
        return $this->hasOne('App\Models\Question', 'question_id', 'id');
    }
    public function group()
    {
        return $this->hasOne('App\Models\Group', 'courses_id', 'id');
    }
    public function course_fees()
    {
        return $this->hasMany('App\Models\Courses_Fees', 'course_id', 'id');
    }
}
