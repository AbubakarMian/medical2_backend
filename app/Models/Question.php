<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Question extends Model
{
    use SoftDeletes;
    protected $table = 'question';

    public function choice()
    {
        return $this->hasMany('App\Models\Choice', 'question_id', 'id');
    }
    public function courses()
    {
        return $this->hasMany('App\Models\Question_Course', 'question_id', 'id');
    }
}
