<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use SoftDeletes;
    protected $table = 'quiz';

    public function quiz_question()
    {
        return $this->hasMany('App\Model\Quiz_Question', 'quiz_id', 'id');
    }
    public function course()
    {
        return $this->hasOne('App\Model\Courses', 'id', 'course_id');
    }

}
