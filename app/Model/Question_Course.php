<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question_Course extends Model
{
    use SoftDeletes;
    protected $table='question_courses';
}
