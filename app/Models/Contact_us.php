<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact_us extends Model
{
    use SoftDeletes;
    protected $table='contact_us';
}

