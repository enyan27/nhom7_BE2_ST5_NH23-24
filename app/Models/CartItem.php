<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'product_detail_id',
        'selected_size',
        'quantity'
    ];

    public function cart() {
        return $this->belongsTo(CartItem::class,'cart_id','id');
    }

    public function productDetail() {
        return $this->belongsTo(ProductDetail::class,'product_detail_id','id');
    }
}
