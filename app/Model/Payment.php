<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    protected $table='payment';

    public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
    public function course()
    {
        return $this->hasOne('App\Model\Courses', 'id', 'course_id')->withTrashed();
    }

    public function getRefundPaymentIdAttribute($value)
    {
        return json_decode($value);
    }
    public function setRefundPaymentIdAttribute($value)
    {
        $this->attributes['refund_payment_id'] = json_encode($value);
    }

    // public function refund_payments($value)
    // {
    //     return $this->hasMany('App\Model\Payment', 'id', 'refund_payment_id');
    // }
 }
