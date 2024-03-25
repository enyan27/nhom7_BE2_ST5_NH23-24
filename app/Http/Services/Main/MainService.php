<?php

namespace App\Http\Services\Main;

use App\Models\Product;

class MainService
{
    public function getProductBestSold() {
        return Product::orderByDesc('sold')->limit(10)->get();
    }

    /**
     * Lấy ra sản phẩm nổi bật
     */
    public function getProductByNote() {
        return [
            'featured' => $this->getProduct('featured', 1),
            'trending' => $this->getProduct('trending', 1),
            'newarrival' => $this->getProduct('newarrival', 1)
        ];
    }

    public function getProduct(string $note, int $val) {

        return Product::orderByDesc('id')
                        ->where($note, $val)
                        ->limit(10)
                        ->get();
    }
}