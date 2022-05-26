<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pages_Images extends Model
{
    use SoftDeletes;
    protected $table='pages_images';
 }
