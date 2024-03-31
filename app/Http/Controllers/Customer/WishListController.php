<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Category\CategoryService;
use App\Http\Services\Product\ProductService;
use App\Models\WishList;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    protected $categoryService;
    protected $productService;

    public function __construct(CategoryService $categoryService, ProductService $productService) {

        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }

    public function index() {

        $categories = $this->categoryService->getParent();
        $wishLists = WishList::where('user_id', Auth::id())->orderByDesc('id')->paginate(10);
        $products = Product::orderByDesc('view_count')->limit(10)->get();
        
        return view('customer.main.wishlist', compact('categories','wishLists','products'));
    }

    public function addWishList(Request $request) {
        
        if($request->ajax()) {

            $wishListItem_check = WishList::where(['product_id' => $request->product_id, 
                                                    'user_id' => Auth::id()])
                                                    ->exists();

            if($wishListItem_check == false) {

                $wishListItem = new WishList();
                $wishListItem->product_id = $request->product_id;
                $wishListItem->user_id = Auth::id();
                $wishListItem->save();

                return WishList::where('user_id', Auth::id())->get()->count();
            }  
        }
    }

    public function removeWishList(Request $request) {       // test again *

        if($request->ajax()) {
            WishList::where('user_id', Auth::id())
                    ->where('product_id', $request->product_id)
                    ->delete();
    
            return WishList::where('user_id', Auth::id())->count();
        }
    }
}
