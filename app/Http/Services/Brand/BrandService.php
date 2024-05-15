<?php

namespace App\Http\Services\Brand;

use App\Models\Brand;

class BrandService
{
    public function getAll() {

        return Brand::orderByDesc('id')->get();
    }

    public function create($request) { 
        
        Brand::create($request->all());
    }

    public function update($request, $brand) {

        $brand->fill($request->all());
        $brand->save();
    }
    
    public function destroy($id) {
        $brand = Brand::find($id);

        if ($brand) {
            // Kiểm tra xem brand có sản phẩm nào không
            $products = $brand->product()->get(['id', 'productname']);
            if ($products->isNotEmpty()) {
                return [
                    'success' => false,
                    'productCount' => $products->count(),
                    'products' => $products
                ]; // Brand có sản phẩm, không cho phép xóa
            }

            // Xóa brand
            $brand->delete();
            return ['success' => true];
        }
        return ['success' => false, 'productCount' => 0, 'products' => collect()];
    }
}