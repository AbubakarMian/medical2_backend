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
        return $this->hasOne('use App\Models\Question', 'question_id', 'id');
    }
    public function group()
    {
        return $this->hasOne('use App\Models\Group', 'courses_id', 'id');
    }
    public function course_fees()
    {
        return $this->hasMany('use App\Models\Courses_Fees', 'course_id', 'id');
    }
}
