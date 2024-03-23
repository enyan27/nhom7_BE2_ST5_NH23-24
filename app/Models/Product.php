<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'productname',
        'category_id',
        'brand_id',
        'price',
        'quantity',
        'price_sale',
        'sku',
        'slug',
        'featured',
        'trending',
        'newarrival',
        'description',
        'view_count',
        'sold',
        'image_1',
        'image_2',
        'created_by'
    ];

    public static function updateQty($product_id) {
        $product = Product::find($product_id);
        $totalQuantity = array_sum(array_column($product->productDetail->toArray(),'quantity'));
        $product->quantity = $totalQuantity;
        $product->save();
    }

    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'category_by', 'id');
    }

    public function productDetail() {
        return $this->hasMany(ProductDetail::class, 'product_id', 'id');
    }

    public function wishListItems() {
        return $this->hasMany(WishList::class, 'product_id', 'id');
    }
}
