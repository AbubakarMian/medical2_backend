<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exams extends Model
{
    use SoftDeletes;
    protected $table = 'exams';

    public function quiz_question()
    {
        return $this->hasMany('App\Model\Quiz_Question', 'quiz_id', 'id');
    }
    public function group()
    {
        return $this->hasOne('App\Model\Group', 'id', 'group_id');
    }

}
