<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Category\CategoryService;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Brand\BrandService;
use App\Models\ProductDetail;
use App\Models\Product;
use App\Models\Review;

class ShopController extends Controller
{
    protected $categoryService;
    protected $productService;
    protected $brandService;

    public function __construct(CategoryService $categoryService,
                                ProductService $productService,
                                BrandService $brandService)
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->brandService = $brandService;
    }
    
    public function index(Request $request) {

        $categories = $this->categoryService->getParent();
        $products = $this->productService->getProductOnIndex($request);

        $brands = $this->brandService->getAll();
        $topViewedProducts = Product::orderByDesc('view_count')->limit(3)->get();

        return view('customer.main.shop', compact('categories','products','brands','topViewedProducts'));
    }

    public function showProductByCategory($category_slug, Request $request) {

        $categories = $this->categoryService->getParent();
        $brands = $this->brandService->getAll();

        $products = $this->productService->getProductByCategory($category_slug, $request);
        $topViewedProducts = Product::orderByDesc('view_count')->limit(3)->get();

        return view('customer.main.shop', compact('categories','products','brands','topViewedProducts'));
    }

    public function showProductDetail($product_slug) {

        $categories = $this->categoryService->getParent();
        $product = $this->productService->getProductBySlug($product_slug);

        $relatedProducts = $this->productService->getRelatedProduct($product->category_id);
        $productDetails = array();

        foreach($product->productDetail as $item) {
            $productDetails[] = array('colorImg_1' => $item->colorImg_1,
                                    'colorImg_2' => $item->colorImg_2,
                                    'color' => $item->color);
        }
        //loại bỏ những phần tử trùng nhau trong mảng đa chiều
        $productDetails = array_map("unserialize", array_unique(array_map("serialize", $productDetails)));
        $reviews = Review::where('product_id', $product->id)->orderBy('created_at', 'desc')->get();
        $averageRating = $reviews->avg('rating');
        return view('customer.main.product_detail', compact( 'categories','product','relatedProducts','productDetails','reviews','averageRating'));
    }
    
    public function getSize(Request $request){
        if($request->ajax()){
            $data = $request->all();
            $productDetails = ProductDetail::where('product_id' ,$data['product_id'])
                                            ->where('color', $data['color'])
                                            ->where('quantity','>', 0)
                                            ->pluck('size')
                                            ->toArray();
            
            return response()->json(['sizes' => $productDetails]);
        }
    }
    
    

    public function buyNow(Request $request) {

        $data = $request->all();
        return 'Chức năng chưa hoàn thiện'; //*
    }
}
