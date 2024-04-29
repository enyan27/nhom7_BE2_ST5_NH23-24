<?php

namespace App\Http\Services\Checkout;

use Illuminate\Support\Facades\Redirect;
use App\Models\CartItem;
use App\Models\OrderDetail;
use App\Models\ProductDetail;
use App\Models\Order;
use App\Models\Product;
use App\Helpers\VNPay;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutService
{
    public function addOrder($request) {

        $data = $request->all();
        $data['user_id'] = Auth::id();
        $order = Order::create($data);
        
        // Thanh toán COD
        if($data['payment'] == 'cod') {

            $this->addOrderDetail($order->id);
            $this->sendMail($order);

            return true;
        }

        // Thanh toán VNPay
        if($data['payment'] == 'vnpay') {

            // Lấy URL thanh toán VNPay
            $data = [
                'vnp_TxnRef' => $order->id,
                'vnp_OrderInfo' => 'Order Payment No.' .$order->id,
                'vnp_Amount' => $order->total_price * 25000, // (1 USD = 25000 VND) 4/13/2024

            ];

            $data_url = VNPay::vnpay_create_payment($data);
            Redirect::to($data_url)->send();    // Chuyển hướng đến URL lấy được
        }

        if($data['payment'] == 'paypal') {
           Redirect::to('/process-transaction')->with(['order' => $order])->send();  
        }
    }

    public function addOrderDetail($order_id) {

        $cartItems = Auth::user()->cart->cartItems;

        foreach($cartItems as $cartItem) {
            $data = [
                'order_id' => $order_id,
                'product_detail_id' => $cartItem->product_detail_id,

                // get 'size' from 'cartItem->selected_size'
                'ordered_size' => $cartItem->selected_size,

                'quantity' => $cartItem->quantity,
                'unit_price' => $cartItem->productDetail->product->price_sale,
                'amount' => $cartItem->quantity * $cartItem->productDetail->product->price_sale
            ];
            // Tạo chi tiết đơn hàng
            OrderDetail::create($data);

            $productDetail = ProductDetail::find($cartItem->product_detail_id);
            $productDetail->quantity -= $cartItem->quantity;
            $productDetail->save();
            
            Product::updateQty($productDetail->product_id);

            //xóa item trong giỏ hàng
            $cartItem->delete();
        }
        return true;
    }

    public function vnPayCheck($request) {
        //Lấy data từ URL (VNPay gửi về qua $vnp_Returnurl)
        $vnp_ResponseCode = $request->get('vnp_ResponseCode'); //Mã phản hồi kết quả thanh toán
        $vnp_TxnRef = $request->get('vnp_TxnRef'); // ID đơn  hàng

        // Kiểm tra mã phản hồi
        if($vnp_ResponseCode != null) {
            //00: TH thành công
            if($vnp_ResponseCode == 00) {

                $this->addOrderDetail($vnp_TxnRef);
                $order = Order::find($vnp_TxnRef);
                $this->sendMail($order);
                return true;
            }
            elseif($vnp_ResponseCode == 24) { //24: Hủy thanh toán
                Order::where('id',$vnp_TxnRef)->delete();
                return false;
            }
            else {
                return Order::where('id',$vnp_TxnRef)->delete();
            }
        }
    }

    public function sendMail($order) {

        $email_to = $order->user_email;

        Mail::send('customer.main.sendmail', compact('order'), function($message) use($email_to) {
            $message->from(env('MAIL_USERNAME'), 'Furin eShop');
            $message->to($email_to);
            $message->subject('Order Notification');
        });
    }
}