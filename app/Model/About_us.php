<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class About_us extends Model
{
   use SoftDeletes;
   protected $table='about_us';


}
