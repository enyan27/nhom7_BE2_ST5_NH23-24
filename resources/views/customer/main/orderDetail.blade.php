@extends('customer.layout.master')

@section('title', 'Check Out - Online Shopping')
 
@section('body')
    <section class="checkout-section section-padding">
        <div class="my-container2">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="mb-30">Shipping Information</h3>
                    <div class="shipping-wrapper">
                        <div class="form-group">
                            <label for="fullname">Full Name</label>
                            <input class="form-control" name="user_fullname" value="{{$order->user_fullname}}" type="text" placeholder="Full Name" id="fullname" disabled>
                        </div>
                        <div class="form-group">
                            <label for="phonenumber">Phone Number</label>
                            <input class="form-control" type="number" value="{{$order->user_phonenumber}}" name="user_phonenumber" placeholder="Phone Number" id="phonenumber" disabled>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" type="text" value="{{$order->user_email}}" name="user_email" placeholder="Email" id="email" disabled>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input class="form-control" type="text" value="{{$order->user_address}}" name="user_address" placeholder="Address" id="address" disabled>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input class="form-control" type="text" value="{{$order->user_country}}"  name="user_country" placeholder="Country" id="country" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="postcode">Postcode</label>
                                    <input class="form-control" type="number" value="{{$order->user_postcode}}" name="user_postcode" placeholder="Postcode" id="postcode" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="return-cart" href="/my-account/order">
                        <ion-icon name="arrow-back-outline"></ion-icon>
                        <div class="title">Return</div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <h3 class="mb-30">Your Order</h3>
                    <div class="order-total">
                        <ul class="order-table">
                            <li class=" text-uppercase">Product <span>Total</span></li>
                            @foreach ($order->orderDetails as $orderDetail)
                            <li class="fw-normal">
                                <div hret class="d-flex align-items-center">
                                    <div class="product-thumbnail_checkout">
                                        <a href="/{{ $orderDetail->productDetail->product->slug }}.html">
                                            <img src="/{{ $orderDetail->productDetail->colorImg_1 }}" alt="{{ $orderDetail->productDetail->product->productname }}">
                                        </a>
                                        <span>{{ $orderDetail->quantity }}</span>
                                    </div>
                                    <div class="product-detail_checkout">
                                        <a href="/{{$orderDetail->productDetail->product->slug }}.html">{{ $orderDetail->productDetail->product->productname }}</a>
                                        <div class="d-flex">
                                            <p>Color: {{$orderDetail->productDetail->color}} </p>
                                            <p style="margin-left: 10px">Size: {{$orderDetail->ordered_size}} </p>
                                        </div>
                                    </div>
                                </div>
                                <span>${{ number_format($orderDetail->quantity * $orderDetail->unit_price, 2) }}</span>
                            </li>
                            @endforeach
                            <?php
                                $subTotal = 0;
                                foreach($order->orderDetails as $orderDetail){
                                    $subTotal += ($orderDetail->quantity * $orderDetail->unit_price);
                                }
                                $total = $subTotal - ($subTotal * $order->discount / 100);
                            ?>
                            <li class="fw-normal text-uppercase">Subtotal <span>${{number_format($subTotal, 2)}}</span></li>
                            <li class="total-price text-uppercase">Total <span>${{number_format($total,2)}}</span></li>
                        </ul>
                        <div class="payment-method-wrapper">
                            <h4 class="mb-15">Payment Methods</h4>
                            <span class="text-uppercase">{{$order->payment}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('customer.component.shipping_banner')
@endsection
