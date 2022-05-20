<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question_Course extends Model
{
    use SoftDeletes;
    protected $table='question_courses';

    public function question()
    {
        return $this->hasOne('App\Model\Question', 'id', 'question_id');
    }
    public function course()
    {
        return $this->hasOne('App\Model\Courses', 'id', 'course_id');
    }

}
