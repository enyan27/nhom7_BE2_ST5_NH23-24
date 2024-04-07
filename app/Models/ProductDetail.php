<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'color',
        'size',
        'quantity',
        'product_id',
        'colorImg_1',
        'colorImg_2'
    ];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id','id');
    }

    public function orderDetails() {
        return $this->hasMany(OrderDetail::class, 'product_detail_id','id');
    }
    public function cartItems() {
        return $this->belongsToMany(CartItem::class, 'product_detail_id','id');
    }

    protected $color; //*x
}
