<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    public function user() {
        return $this->beLongsTo(User::class, 'user_id','id');
    }

    public function cartItems() {
        return $this->hasMany(CartItem::class,'cart_id','id');
    }
}
