<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_fullname',
        'user_email',
        'user_phonenumber',
        'user_country',
        'user_address',
        'user_postcode',
        'status',
        'message',
        'payment',
        'total_price',
        'discount'
    ];

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class, 'order_id','id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
