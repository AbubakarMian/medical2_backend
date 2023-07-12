<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group_fees extends Model
{
   use SoftDeletes;
   protected $table='group_fees';

  
}
