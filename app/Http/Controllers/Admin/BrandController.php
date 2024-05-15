<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Brand\BrandService;
use App\Models\Brand;

class BrandController extends Controller
{
    protected $brandService;

    public function __construct(BrandService $brandService) {

        $this->brandService = $brandService;
    }

    public function index() {

        $brands = $this->brandService->getAll();

        return view('admin.brand.view', compact('brands'));
    }

    public function create() {

        return view('admin.brand.create');
    }

    public function store(Request $request) {

        $this->brandService->create($request);

        return redirect('admin/brand/create')->with('success','SUCCESS: New brand was successfully added!');
    } 

    public function show(Brand $brand) {

        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand) {
        
        $this->brandService->update($request, $brand);
        return redirect('admin/brand')->with('success','SUCCESS: Brand was successfully edited!');
    }
    public function destroy($id) {
        $result = $this->brandService->destroy($id);
    
        if ($result['success']) {
            return redirect('admin/brand')->with('success', 'SUCCESS: Brand was successfully deleted!');
        } else {
            $productCount = $result['productCount'];
            $productDetails = $result['products']->map(function($product) {
                return '#' . $product->id . ' - ' . $product->productname;
            })->implode('<br>');
    
            return redirect('admin/brand')->with([
                'error' => "ERROR: Cannot delete brand that has $productCount products.",
                'error_details' => "Error details:<br>$productDetails"
            ]);
        }
    }    
}
