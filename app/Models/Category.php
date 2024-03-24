<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoryname',
        'parent_id',
        'description',
        'slug',
        'active'
    ];

    public function product() {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function childs() {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
}
