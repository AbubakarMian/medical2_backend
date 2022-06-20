<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
   use SoftDeletes;
   protected $table='category';

   public function courses()
   {
       return $this->hasOne('App\Model\Courses', 'category_id', 'id');
   }
}
