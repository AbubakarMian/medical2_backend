<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exams extends Model
{
    use SoftDeletes;
    protected $table = 'exams';

    public function quiz_question()
    {
        return $this->hasMany('use App\Models\Quiz_Question', 'quiz_id', 'id');
    }
    public function group()
    {
        return $this->hasOne('use App\Models\Group', 'id', 'group_id');
    }

}
