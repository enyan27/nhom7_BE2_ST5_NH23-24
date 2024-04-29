<?php

namespace App\Http\Services\Cart;

use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\Main\MainService;

class CartService
{
    public function view() {

        return CartItem::where('cart_id', Auth::user()->cart->id)->orderByDesc('id')->get();
    }

    public function getProductBestSold() {

        $mainService = new MainService();

        return $mainService->getProductBestSold();
    }

    public function addCart($request) {
        if(Auth::check()) {
            if($request->ajax()) {
                $data = $request->all();
    
                $product_check = Product::where('id', $data['product_id'])->exists();
                $productDetail = ProductDetail::where('product_id', $data['product_id'])
                                                ->whereJsonContains('size', $data['size'] ) // fix bug - (4/29/24)
                                                ->where('color', $data['color'] )
                                                ->first();
                $cart_id = Auth::user()->cart->id;
                    
                if($product_check) {
                    if($data['quantity'] > $productDetail->quantity) {
                        return 'error';
                    }
                    else {
                        $cartItem = CartItem::where('product_detail_id', $productDetail->id)
                                            ->where('selected_size', $data['size'])
                                            ->where('cart_id', $cart_id);
                
                        if($cartItem->exists()) {
                
                            $cartItem = $cartItem->first();
                            $cartItem->quantity += $data['quantity'];
                
                            $cartItem->save();
                        }
                        else {
                            $data['product_detail_id'] = $productDetail->id;
                            $data['selected_size'] = $data['size'];
                            $data['quantity'] = $data['quantity'];
                            $data['cart_id'] = $cart_id;
                    
                            CartItem::create($data);
                        }   
                    }
                }
                $result = CartItem::where('cart_id', $cart_id)->get()->count();
                return $result;
            }
        }
        else {
            return false;
        }
    }
    

    public function removeCart($request) {

        if($request->ajax()) {
            $cartItem_id = $request->cartItem_id;
            $cartItem = CartItem::find($cartItem_id)->delete();

            $cartItems = Auth::user()->cart->cartItems;
            $result['count'] = count($cartItems);
            $result['subTotal'] = 0;

            foreach ($cartItems as $cartItem){
                $result['subTotal'] += ($cartItem->productDetail->product->price_sale * $cartItem->quantity);
            }
            return $result;
        }
    }

    public function updateCart($request) {

        if($request->ajax()) {
            $cartItem = CartItem::find($request->cartItem_id);

            if($request->quantity > $cartItem->productDetail->quantity) {
                return false;
            }
            else {
                if($request->quantity == 0) {
                    $cartItem->delete();
                }
                else {
                    $cartItem->update(["quantity" => $request->quantity]);
                    $result['price'] = $cartItem->productDetail->product->price_sale;
                }

                $cartItems = Auth::user()->cart->cartItems;
                $result['count'] = count($cartItems);
                $result['subTotal'] = 0;

                foreach ($cartItems as $cartItem) {
                    $result['subTotal'] += ($cartItem->productDetail->product->price_sale * $cartItem->quantity);
                }
                return $result;
            }
        }
    }

    public function clearCart($request) {

        if($request->ajax()) {

            $cartItems = CartItem::where('cart_id', Auth::user()->cart->id);
            
            if($cartItems->delete()) {
                return true;
            }
        }
    }
}