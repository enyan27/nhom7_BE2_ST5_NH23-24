<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Checkout\CheckoutService;
use App\Http\Services\Cart\CartService;
use App\Http\Services\Category\CategoryService;

class CheckoutController extends Controller
{
    protected $cartService;
    protected $categoryService;
    protected $checkoutService;
    
    public function __construct(CartService $cartService,
                                CategoryService $categoryService,
                                CheckoutService $checkoutService)
    {
        $this->cartService = $cartService;
        $this->categoryService = $categoryService;
        $this->checkoutService = $checkoutService;
    }

    public function index() {

        $categories = $this->categoryService->getParent();
        $cartItems = $this->cartService->view();

        if(count($cartItems) != 0) {
            return view('customer.main.checkout', compact('categories','cartItems'));
        }
        else {
            return back();
        }
    }

    public function addOrder(Request $request) {

        $result = $this->checkoutService->addOrder($request);

        // Payment Method - COD
        if($result == true){
            return redirect('checkout/noti')->with('notification','We received your purchase request. Please check your email!' );
        }
    }

    public function vnPayCheck(Request $request) {

        $result = $this->checkoutService->vnPayCheck($request);

        if($result == true) {
            return redirect('checkout/noti')->with('notification','Order has been successfully paid. Please check your email!' );
        }
        elseif($result == false) {
            return redirect('checkout')->with('error','You have canceled the transaction.');
        }
        else {
            return redirect('checkout')->with('error','Something went wrong. Please try again!');
        }
    }

    public function noti() {

        $categories = $this->categoryService->getParent();
        $notification = session('notification');
        
        return view('customer.main.noti', compact('categories','notification'));
    }
}
