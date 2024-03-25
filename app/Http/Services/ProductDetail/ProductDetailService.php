<?php

namespace App\Http\Services\ProductDetail;

use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductDetail;
use Auth;
use Illuminate\Support\Facades\Hash;
use Request;


class ProductDetailService{

    private function uploadImg($request, $fieldImg, $product_id, $attr){
        $product_slug = Product::find($product_id)->slug;
        
        if($request->hasFile($fieldImg)){
            $original_name = $request->file($fieldImg)->getClientoriginalName();
            $ext = $request->file($fieldImg)->extension();
            $new_name = $product_slug . '-' . md5($original_name) . '.' .$ext;
            $path = 'uploads/product';
            $request->file($fieldImg)->storeAs('public/' . $path , $new_name);
            return $request->merge([$attr => 'storage/'. $path . '/' . $new_name ]);
        }

    }

    public function store($request, $product_id){
        
        $this->uploadImg($request, 'imageProduct_1', $product_id,'colorImg_1');
        $this->uploadImg($request, 'imageProduct_2', $product_id,'colorImg_2');

        $productDetail = $request->all();
        $productDetail['product_id'] = $product_id;
        ProductDetail::create($productDetail);
    }

    public function update($request, $product_id, $productDetail_id){
        
        $this->uploadImg($request, 'imageProduct_1', $product_id,'colorImg_1');
        $this->uploadImg($request, 'imageProduct_2', $product_id,'colorImg_2');

        $data = $request->all();
        ProductDetail::Find($productDetail_id)->update($data);
            
    }

    public function destroy($productDetail_id){
        $productDetail = ProductDetail::Find($productDetail_id);

        if($productDetail){
            return ProductDetail::where('id',$productDetail_id)->delete();
        }
    }

    public function find($product_id, $productDetail_id){
        
        return ProductDetail::where('product_id', $product_id)->Where('id', $productDetail_id)->first();
    }
}
