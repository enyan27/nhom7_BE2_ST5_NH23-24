<?php

namespace App\Http\Services\Category;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class CategoryService
{
    public function getAll() {
        return Category::get();
    }

    public function getParent() {
        return Category::where('parent_id', 0)->get();
    }

    public function create($request) {
        $categories = $request->all();
        $categories['slug'] = Str::of($request->input('categoryname'))->slug('-');

        Category::create($categories);
    }

    public function update($request, $category) {
        $category->fill($request->all());
        $category->slug = Str::of($request->input('categoryname'))->slug('-');

        $category->save();
    }

    public function destroy($id) {
        $category = Category::find($id);

        if ($category) {
            // Kiểm tra xem category có sản phẩm nào không
            $products = $category->product()->get(['id', 'productname']);
            if ($products->isNotEmpty()) {
                return [
                    'success' => false,
                    'productCount' => $products->count(),
                    'products' => $products
                ]; // Category có sản phẩm, không cho phép xóa
            }

            // Kiểm tra xem category có con nào có sản phẩm không
            $childCategories = $category->childs;
            foreach ($childCategories as $childCategory) {
                $products = $childCategory->product()->get(['id', 'productname']);
                if ($products->isNotEmpty()) {
                    return [
                        'success' => false,
                        'productCount' => $products->count(),
                        'products' => $products
                    ]; // Category con có sản phẩm, không cho phép xóa
                }
            }

            // Xóa category và các category con
            Category::where('id', $id)->orWhere('parent_id', $id)->delete();
            return ['success' => true];
        }
        return ['success' => false, 'productCount' => 0, 'products' => collect()];
    }
    
}
