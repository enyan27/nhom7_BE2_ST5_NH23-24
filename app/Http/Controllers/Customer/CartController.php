<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Cart\CartService;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Category\CategoryService;
use App\Models\Coupon;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    protected $cartService;
    protected $productService;
    protected $categoryService;

    public function __construct(
        CartService $cartService,
        ProductService $productService,
        CategoryService $categoryService
    ) {
        $this->cartService = $cartService;
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    public function view()
    {

        $categories = $this->categoryService->getParent();
        $productBestSolds = $this->cartService->getProductBestSold();
        $cartItems = $this->cartService->view();

        return view('customer.main.cart', compact('cartItems', 'categories', 'productBestSolds'));
    }

    public function addCart(Request $request)
    {

        $result = $this->cartService->addCart($request);
        return $result;
    }

    public function removeCart(Request $request)
    {

        $result = $this->cartService->removeCart($request);
        return $result;
    }

    public function updateCart(Request $request)
    {

        $result = $this->cartService->updateCart($request);
        return $result;
    }

    public function clearCart(Request $request)
    {

        $result = $this->cartService->clearCart($request);
        return $result;
    }

    // Coupon 
    public function applyCoupon(Request $request)
    {
        $couponCode = $request->input('coupon_code');


        $coupon = Coupon::where('code', $couponCode)->first();

        if (!$coupon) {
            return response()->json(['error' => 'Coupon code is invalid.'], 400);
        }

        // Lấy danh sách các mục trong giỏ hàng
        $cartItems = $this->cartService->view();

        // Tính toán giảm giá dựa trên phần trăm
        $subTotal = 0;
        foreach ($cartItems as $cartItem) {
            $subTotal += ($cartItem->quantity * $cartItem->productDetail->product->price_sale);
        }
        $discount = ($coupon->percent / 100) * $subTotal;
        $total = $subTotal - $discount;

        // Trả về giá trị giảm giá và tổng
        return response()->json(['message' => 'Coupon applied successfully.', 'discount' => number_format($discount, 2), 'total' => number_format($total, 2)]);
    }
}
