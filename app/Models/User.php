<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'fullname',
        'email',
        'password',
        'gender',
        'phonenumber',
        'address',
        'avatar',
        'level'
    ];

    public function products() {
        return $this->hasMany(Product::class, 'created_by','id');
    }

    public function orders() {
        return $this->hasMany(Order::class, 'user_id','id');
    }

    public function cart() {
        return $this->hasOne(Cart::class, 'user_id','id');
    }

    public function wishListItems() {
        return $this->hasMany(WishList::class, 'user_id','id');
    }

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
