<?php

namespace App\Http\Services\Order;

use Illuminate\Support\Str;
use App\Models\Order;

class OrderService 
{
    public function getAll() {

        return Order::orderByDesc('id')->paginate(10);
    }

    public function find($id) {

        return Order::Find($id);
    }

    public function getOrderDetails($id) {

        return Order::where('orders.id', $id)->first();
    }

    public function confirmOrder($request) {

        if($request->ajax()) {

            $order = Order::find($request->order_id);
            $order->status = 1;
            $order->save();

            return true;
        }
    }
}
