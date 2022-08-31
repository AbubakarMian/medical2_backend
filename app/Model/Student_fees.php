<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student_fees extends Model
{
   use SoftDeletes;
   protected $table='student_fees';

  
}
