<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Question extends Model
{
    use SoftDeletes;
    protected $table='question';
 
    public function choice(){
     return $this->hasMany('App\Model\Choice','question_id','id');
 }
 
}
