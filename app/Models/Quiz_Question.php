<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz_Question extends Model
{
    use SoftDeletes;
    protected $table = 'quiz_question';

    public function quiz()
    {
        return $this->hasOne('App\Models\Quiz', 'quiz_id', 'id');
    }
    public function question()
    {
        return $this->hasOne('App\Models\Question', 'question_id', 'id');
    }
}
