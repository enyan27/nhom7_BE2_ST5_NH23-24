<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_detail_id',
        'ordered_size',
        'quantity',
        'unit_price',
        'amount'
    ];

    public function order() {
        return $this->belongsTo(Order::class, 'order_id','id');
    }

    public function productDetail() {
        return $this->belongsTo(ProductDetail::class, 'product_detail_id','id');
    }
}
