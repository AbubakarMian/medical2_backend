<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Books_courses extends Model
{
    use SoftDeletes;
    protected $table = 'books_courses';

   
}
