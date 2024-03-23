<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Category\CategoryService;
use App\Http\Services\Brand\BrandService;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Database\Eloquent\Collection;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;
    protected $brandService;

    public function __construct(ProductService $productService, 
                                CategoryService $categoryService,
                                BrandService $brandService)
    {

        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->brandService = $brandService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productService->getAll();

        return view('admin.product.view', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = $this->brandService->getAll();
        $categories = $this->categoryService->getAll();

        return view('admin.product.create',['brands' => $brands, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $this->productService->store($request);
        
        return redirect('admin/product/'. $product->id)
                        ->with('success', 'SUCESSS: New product was successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.detail', ['product' => $product ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = $this->categoryService->getAll();
        $brands = $this->brandService->getAll();
        return view('admin.product.edit', ['product' => $product , 'categories' => $categories, 'brands' => $brands]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {
        $this->productService->update($request, $product_id);
        return redirect('admin/product') -> with('success','SUCCESS: Product was successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
        $result = $this->productService->destroy($product_id);
        
        if($result){
            return back()->with('success', 'SUCCESS: Product was successfully deleted! ');
        }
    }
}
