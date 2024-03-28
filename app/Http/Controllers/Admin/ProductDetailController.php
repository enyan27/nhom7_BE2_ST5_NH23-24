<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;
use App\Http\Services\ProductDetail\ProductDetailService;
use App\Models\Product;
use App\Models\ProductDetail;

class ProductDetailController extends Controller
{
    protected $productService;
    protected $productDetailService;

    public function __construct(ProductService $productService, ProductDetailService $productDetailService) {

        $this->productService = $productService;

        $this->productDetailService = $productDetailService;
    }

    public function index($product_id) {

        $product = $this->productService->find($product_id);
        $productDetails = $product->productDetail;

        return view('admin.product.detail.view', ['productDetails' => $productDetails, 'product' => $product]); 
    }

    public function create(Product $product) {

        return view('admin.product.detail.create', ['product' => $product]);
    }

    public function store(Request $request, $product_id){

        $this->productDetailService->store($request, $product_id);
        $this->productService->updateQuantity($product_id);

        return redirect('admin/product/' . $product_id . '/detail/create')
                    ->with('success', 'SUCCESS: New product detail was successfully added!');
    }

    public function edit($product_id, $productDetail_id) {

        $productDetail = $this->productDetailService->find($product_id, $productDetail_id);

        return view('admin.product.detail.edit', ['productDetail' => $productDetail]); 
    }

    public function update(Request $request, $product_id, $productDetail_id) {

        $this->productDetailService->update($request, $product_id, $productDetail_id);
        $this->productService->updateQuantity($product_id);

        return redirect('admin/product/'.$product_id.'/detail')
                    ->with('success', 'SUCCESS: Product detail was successfully edited!');
    }

    public function destroy($product_id, $productDetail_id) {

       $this->productDetailService->destroy($productDetail_id);
       $this->productService->updateQuantity($product_id);

       return back()->with('success', 'SUCCESS: Product detail was successfully deleted!');
    }
}
