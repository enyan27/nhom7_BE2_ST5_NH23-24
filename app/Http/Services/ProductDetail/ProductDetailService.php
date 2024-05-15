<?php

namespace App\Http\Services\ProductDetail;

use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ProductDetailService
{
    private function uploadImg($request, $fieldImg, $product_id, $attr) {

        $product_slug = Product::find($product_id)->slug;
    
        if ($request->hasFile($fieldImg)) {
    
            $original_name = $request->file($fieldImg)->getClientOriginalName();
            $ext = $request->file($fieldImg)->extension();
            $new_name = $product_slug . '-' . md5($original_name) . '.' . $ext;
    
            $path = 'uploads/product';
            $request->file($fieldImg)->storeAs('public/' . $path, $new_name);
    
            return $request->merge([$attr => 'storage/' . $path . '/' . $new_name]);
        }
    
        return null;
    }
    

    // Remove the 'storage/' prefix and add 'public/' prefix
    private function deleteImg($imgPath) {
        // Kiểm tra nếu imgPath là ảnh mặc định, không xóa
        if ($imgPath === 'storage/uploads/product/no_image.jpg') {
            return;
        }
    
        // Remove the 'storage/' prefix and add 'public/' prefix
        $imgPath = 'public/' . str_replace('storage/', '', $imgPath);
    
        if (Storage::exists($imgPath)) {
            Storage::delete($imgPath);
        }
    }

    public function store($request, $product_id) {
    
        $image1 = $this->uploadImg($request, 'imageProduct_1', $product_id, 'colorImg_1') ?? 'storage/uploads/product/no_image.jpg';
        $image2 = $this->uploadImg($request, 'imageProduct_2', $product_id, 'colorImg_2') ?? 'storage/uploads/product/no_image.jpg';
    
        $productDetail = $request->all();
        $productDetail['size'] = explode(',', $productDetail['size']);
        $productDetail['product_id'] = $product_id;
        $productDetail['colorImg_1'] = $image1;
        $productDetail['colorImg_2'] = $image2;
        
        ProductDetail::create($productDetail);
    }
    
    public function update($request, $product_id, $productDetail_id) {

        $productDetail = ProductDetail::find($productDetail_id);
    
        // Upload new images if provided and delete old ones
        if ($request->hasFile('imageProduct_1')) {
            $this->deleteImg($productDetail->colorImg_1);
            $productDetail->colorImg_1 = $this->uploadImg($request, 'imageProduct_1', $product_id, 'colorImg_1');
        } elseif (!$productDetail->colorImg_1) {
            $productDetail->colorImg_1 = 'storage/uploads/product/no_image.jpg';
        }
    
        if ($request->hasFile('imageProduct_2')) {
            $this->deleteImg($productDetail->colorImg_2);
            $productDetail->colorImg_2 = $this->uploadImg($request, 'imageProduct_2', $product_id, 'colorImg_2');
        } elseif (!$productDetail->colorImg_2) {
            $productDetail->colorImg_2 = 'storage/uploads/product/no_image.jpg';
        }
    
        $data = $request->all();
        $data['size'] = explode(',', $data['size']);
        $productDetail->update($data);
    }

    public function destroy($productDetail_id) {

        $productDetail = ProductDetail::find($productDetail_id);
    
        if ($productDetail) {
    
            $this->deleteImg($productDetail->colorImg_1);
            $this->deleteImg($productDetail->colorImg_2);
    
            return ProductDetail::where('id', $productDetail_id)->delete();
        }
    }


    public function find($product_id, $productDetail_id) {
        
        return ProductDetail::where('product_id', $product_id)
                                ->where('id', $productDetail_id)->first();
    }
}
