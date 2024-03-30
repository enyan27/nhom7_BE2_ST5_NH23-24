<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAllProducts() {
        // Lấy danh sách sản phẩm mới
        $productsNewArrial = Product::where('newarrival', 1)->get();
    
        // Lấy danh sách sản phẩm đang hot (trending)
        $productsTrending = Product::where('trending', 1)->get();
    
        // Lấy danh sách sản phẩm thông thường
        $products = Product::all();
    
        return view('customer.home', [
            'productsNewArrial' => $productsNewArrial,
            'productsTrending' => $productsTrending,
            'products' => $products
        ]);
    }
    public function getProductById($id){
        $product = Product::findOrFail($id);
        return view('customer.details', ['product'=> $product]);
    }
}
