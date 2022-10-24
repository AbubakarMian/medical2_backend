<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_Permission extends Model
{
    use SoftDeletes;
    protected $table='user_permission';
 }
