<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Books extends Model
{
   use SoftDeletes;
   protected $table='books';

//    public function question()
//    {
//        return $this->hasOne('App\Model\Question', 'question_id', 'id');
//    }
}
