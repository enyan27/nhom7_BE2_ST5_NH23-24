<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname',
        'email',
        'password',
        'gender',
        'phonenumber',
        'address',
        'avatar',
        'level',
    ];

    // Products
    public function products()
    {
        return $this->hasMany(Product::class, 'created_by', 'id');
    }

    // Orders
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    // Cart
    public function cart()
    {
        return $this->hasOne(Cart::class, 'user_id', 'id');
    }

    // Wish List Items
    public function wishListItems()
    {
        return $this->hasMany(WishList::class, 'user_id', 'id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
