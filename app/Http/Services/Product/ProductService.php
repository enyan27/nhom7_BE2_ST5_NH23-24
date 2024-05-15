<?php

namespace App\Http\Services\Product;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Brand;
use App\Models\Category;

class ProductService 
{
    public function getAll() {

        return Product::orderByDesc('id')->paginate(10);
    }

    private function uploadImg(Request $request, $fieldImg, $attr) {

        $product_slug = Str::of($request->input('productname'))->slug('-');
    
        if ($request->hasFile($fieldImg)) {
    
            $original_name = $request->file($fieldImg)->getClientOriginalName();
            $ext = $request->file($fieldImg)->extension();
            $new_name = $product_slug . '-' . md5($original_name) . '.' . $ext;
    
            $path = 'uploads/product';
            $request->file($fieldImg)->storeAs('public/' . $path, $new_name);
    
            return 'storage/' . $path . '/' . $new_name;
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

    public function store($request) {

        $image1 = $this->uploadImg($request, 'imageProduct_1', 'image_1') ?? 'storage/uploads/product/no_image.jpg';
        $image2 = $this->uploadImg($request, 'imageProduct_2', 'image_2') ?? 'storage/uploads/product/no_image.jpg';
    
        $product = $request->all();
        $product['slug'] = Str::of($request->input('productname'))->slug('-');
        $product['quantity'] = 0;
        $product['view_count'] = 0;
        $product['rate_total'] = 0;
        $product['rate_count'] = 0;
        $product['created_by'] = Auth::user()->id;
        $product['image_1'] = $image1;
        $product['image_2'] = $image2;
    
        return Product::create($product);
    }

    public function update($request, $product_id) {

        $product = $this->find($product_id);
    
        // Upload new images if provided and delete old ones
        if ($request->hasFile('imageProduct_1')) {
            $this->deleteImg($product->image_1);
            $product->image_1 = $this->uploadImg($request, 'imageProduct_1', 'image_1');
        } elseif (!$product->image_1) {
            $product->image_1 = 'storage/uploads/product/no_image.jpg';
        }
    
        if ($request->hasFile('imageProduct_2')) {
            $this->deleteImg($product->image_2);
            $product->image_2 = $this->uploadImg($request, 'imageProduct_2', 'image_2');
        } elseif (!$product->image_2) {
            $product->image_2 = 'storage/uploads/product/no_image.jpg';
        }
    
        $data = $request->all();
        $data['slug'] = Str::of($request->input('productname'))->slug('-');
    
        $product->update($data);
    }
    
    public function destroy($product_id) {

        $product = $this->find($product_id);
        $productDetails = ProductDetail::where('product_id', $product_id)->get();
    
        if ($product->delete()) {
    
            $this->deleteImg($product->image_1);
            $this->deleteImg($product->image_2);
    
            foreach ($productDetails as $productDetail) {
                $productDetail->delete();
            }
            return true;
        }
        return false;
    }

    public function find($product_id) {

        return Product::Find($product_id);
    }

    public function updateQuantity($product_id) {

        Product::updateQty($product_id);
    }

    public function getProductBySlug($slug) {

        $product =  Product::where('slug', $slug)->first();
        $product->view_count ++;
        $product->save();

        return $product;
    }
    
    public function getRelatedProduct($catgegory_id) {

        return Product::where('category_id', $catgegory_id)
                                        ->orderByDesc('id')
                                        ->limit(8)->get();
    }

    public function getProductByCategory($category_slug, $request) {

        $products = Product::join('categories','categories.id', '=', 'products.category_id')
                                        ->where('categories.slug', $category_slug)
                                        ->select(['products.*']);
        
        $products = $this->filter($products, $request);
        $products = $this->sortAndPagination($products, $request);

        return $products;
    }

    public function getProductOnIndex($request) {
        
        $search = $request->search ?? '';
        $cate_search = $request->cate_search ?? null;
        
        if($cate_search == null) {
            $products = Product::where('productname', 'like', '%'.$search.'%');
        }
        else {
            $products = Product::join('categories','categories.id', '=','products.category_id')
                                        ->where('productname', 'like', '%'.$search.'%')
                                        ->where('categories.slug', $cate_search)
                                        ->select(['products.*']);
        }

        $products = $this->filter($products, $request);
        $products = $this->sortAndPagination($products, $request);

        return $products;
    }
    
    private function sortAndPagination($products, Request $request) {
        $perPage = $request->show ?? 12;
        $sortBy = $request->sort_by ?? 'latest';
        
        switch ($sortBy) {
            case 'latest':
                $products = $products->orderByDesc('id');
                break;
            case 'oldest':
                $products = $products->orderBy('id');
                break;
            case 'name-ascending':
                $products = $products->orderBy('productname');
                break;
            case 'name-desending':
                $products = $products->orderByDesc('productname');
                break;
            case 'price-ascending':
                $products = $products->orderBy('price_sale');
                break;
            case 'price-desending':
                $products = $products->orderByDesc('price_sale');
                break;
            default:
                $products = $products->orderByDesc('id');
        }

        $products = $products->paginate($perPage);
        $products->appends(['sort_by' => $sortBy , 'show' => $perPage]);

        return $products;
    }

    private function filter($products, Request $request){

        //Brand
        $brands = $request->brand ?? [];    
        $brand_names = array_keys($brands);

        if($brand_names != null) {
            $products = $products->whereHas('Brand', function($query) use ($brand_names) {
                return $query->whereIn('brandname', $brand_names);
            });
        }    

        //Price
        $min_price = $request->min_price;
        $max_price = $request->max_price;

        $products = ($min_price != null && $max_price != null) ? $products->whereBetween('price_sale', [$min_price, $max_price]) : $products;

        //Size
        $sizes = $request->size ?? [];
        $arr_sizes = array_keys($sizes);

        $products = $arr_sizes != null ? $products->whereHas('ProductDetail', function($query) use ($arr_sizes) {
            return $query->whereIn('size', $arr_sizes)
                            ->where('quantity', '>', '0');
        }) : $products;

        return $products;
    }
}
