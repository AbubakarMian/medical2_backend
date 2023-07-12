<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question_Course extends Model
{
    use SoftDeletes;
    protected $table='question_courses';

    public function question()
    {
        return $this->hasOne('use App\Models\Question', 'id', 'question_id');
    }
    public function course()
    {
        return $this->hasOne('use App\Models\Courses', 'id', 'course_id');
    }

}
