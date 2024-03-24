@extends('admin.layout.master')

@section('title', 'Order Detail')

@section('body')

    <div class="details details2">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Order Detail #{{$order->id}}</h2>
            </div>
            <table class="tableCustomerDetails">
                <tbody>
                    <tr>
                        <td>ID</td>
                        <td style="width: 70%">#{{$order->id}}</td>
                    </tr>
                    <tr>
                        <td>Full name</td>
                        <td>{{$order->user_fullname}}</td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>{{$order->user_phonenumber}}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{$order->user_address}}, {{$order->user_country}}</td>
                    </tr>
                    <tr>
                        <td>Order Date</td>
                        <td>{{$order->created_at}}</td>
                    </tr>
                    <tr>
                        <td>Order Status</td>
                        
                        @if($order->status == 0)
                        <td>Pending</td>
                        @elseif($order->status == 1)
                        <td>In Progress</td>
                        @elseif($order->status == 2)
                        <td>Delivered</td>
                        @else
                        <td>Return</td>
                        @endif
                        
                    </tr>
                    <tr>
                        <td>Payment Method</td>
                        <td class="text-uppercase">{{$order->payment}}</td>
                    </tr>
                </tbody>
            </table>
            <table>
                <thead>
                    <tr>
                        <td class="text-start">Product Name </td>
                        <td>Color</td>
                        <td>Size</td>
                        <td>Unit Price</td>
                        <td>Quantity</td>
                        <td>Discount</td>
                        <td>Subtotal</td>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($order->orderDetails as $orderDetail)
                    <tr>
                        <td class="d-flex align-items-center">
                            <img class="imgProduct" src="{{$orderDetail->productDetail->colorImg_1}}">
                            <strong>{{$orderDetail->productDetail->product->productname}}</strong>
                        </td>
                        <td>{{$orderDetail->productDetail->color}}</td>
                        <td>{{$orderDetail->productDetail->size}}</td>
                        <td>${{number_format($orderDetail->productDetail->product->price_sale, 2)}}</td>
                        <td>{{$orderDetail->quantity}}</td>
                        <td>{{$order->discount}}%</td>
                        <td>
                            <strong>${{$orderDetail->amount}}</strong>
                        </td>
                    </tr>
                     @endforeach

                </tbody>
            </table>
            <div class="totalPrice d-flex justify-content-between">
                <strong>Total:</strong>
                <strong>${{$order->total_price}}</strong>
            </div>
        </div>
    </div>

@endsection