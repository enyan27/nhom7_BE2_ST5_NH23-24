<?php

namespace App\Http\Services\Account;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AccountService
{
    // Update->Avatar
    public function update($request) {

        $user = User::find(Auth::id());

        if($request->hasFile('image')){
            $slug = Str::of($request->input('fullname'))->slug('-');
            $original_name = $request->file('image')->getClientoriginalName();
            $new_name = 'avatar-' . $slug . '-' . $original_name;
            $path = 'uploads/user/' . date('Y/m/d');
            $request->file('image')->storeAs('public/' . $path , $new_name);
            $user->avatar = 'storage/'. $path. '/' . $new_name;
        }

        $user->fullname = $request->input('fullname');
        $user->phonenumber = $request->input('phonenumber');
        $user->gender = $request->input('gender');
        $user->address = $request->input('address');
        $user->country = $request->input('country');
        $user->postcode = $request->input('postcode');
        $user->save();

        return true;
    }

    // Update->Order status
    public function updateOrderStatus($request) {
        if($request->ajax()) {
            $order = Order::find($request->order_id);
            $order->status = $request->status;
            $order->save();

            foreach ($order->orderDetails as $orderDetail) {
                if($request->status == 3 or $request->status == 4) {
                    $orderDetail->productDetail->quantity += $orderDetail->quantity;
                    $orderDetail->productDetail->save();

                    Product::updateQty($orderDetail->productDetail->product_id);
                }
                else {
                    $product = $orderDetail->productDetail->product;
                    $product->sold += $orderDetail->quantity;
                    $product->save();
                }
            };
        }
    }
}
