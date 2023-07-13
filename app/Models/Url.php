<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Url extends Model
{
    use SoftDeletes;
    protected $table='url';

    public function permission()
    {
        return $this->hasOne('use App\Models\Permission', 'url_id', 'id');
    }
   
 }
