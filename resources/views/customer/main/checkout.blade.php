@extends('customer.layout.master')

@section('title', 'Check Out')

@section('body')
    <section class="checkout-section section-padding">
        <div class="my-container2">
            <form action="/checkout" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="mb-30">Shipping Information</h3>
                        <div class="shipping-wrapper">
                            <div class="form-group">
                                <label for="fullname">Full Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input class="form-control" name="user_fullname" value="{{Auth::user()->fullname}}" type="text" placeholder="Full Name" id="fullname" required>
                            </div>
                            <div class="form-group">
                                <label for="phonenumber">Phone Number
                                    <span class="text-danger">*</span>
                                </label>
                                <input class="form-control" type="number" value="{{Auth::user()->phonenumber}}" name="user_phonenumber" placeholder="Phone Number" id="phonenumber" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email
                                    <span class="text-danger">*</span>
                                </label>
                                <input class="form-control" type="text" value="{{Auth::user()->email}}" name="user_email" placeholder="Email" id="email" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address
                                    <span class="text-danger">*</span>
                                </label>
                                <input class="form-control" type="text" value="{{Auth::user()->address}}" name="user_address" placeholder="Address" id="address" required>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="country">Country
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input class="form-control" type="text" value="{{Auth::user()->country}}"  name="user_country" placeholder="Country" id="country" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="postcode">Postcode
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input class="form-control" type="number" value="{{Auth::user()->postcode}}" name="user_postcode" placeholder="Postcode" id="postcode" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="return-cart" href="cart">
                            <ion-icon name="arrow-back-outline"></ion-icon>
                            <div class="title">Return to cart</div>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <h3 class="mb-30">Your Order</h3>
                        <div class="order-total">
                            <ul class="order-table">
                                <li class=" text-uppercase">Product <span>Total</span></li>
                                @foreach($cartItems as $cartItem)
                                <li class="fw-normal">
                                    <div hret class="d-flex align-items-center">
                                        <div class="product-thumbnail_checkout">
                                            <a href="/{{ $cartItem->productDetail->product->slug }}.html">
                                                <img src="/{{ $cartItem->productDetail->colorImg_1 }}" alt="{{ $cartItem->productDetail->product->productname }}">
                                            </a>
                                            <span>{{$cartItem->quantity}}</span>
                                        </div>
                                        <div class="product-detail_checkout">
                                            <a href="/{{$cartItem->productDetail->product->slug }}.html">{{ $cartItem->productDetail->product->productname }}</a>
                                            <div class="d-flex">
                                                <p>Color: {{$cartItem->productDetail->color}}</p>
                                                <p style="margin-left: 10px">Size: {{$cartItem->productDetail->size}} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <span>${{ number_format($cartItem->quantity * $cartItem->productDetail->product->price_sale, 2) }}</span>
                                </li>
                                @endforeach
                                <?php
                                    $subTotal = 0;
                                    foreach($cartItems as $cartItem){
                                        $subTotal += ($cartItem->quantity * $cartItem->productDetail->product->price_sale);
                                    }
                                    $total = $subTotal;
                                ?>
                                <li class="fw-normal text-uppercase">Subtotal <span>${{number_format($subTotal, 2)}}</span></li>
                                <li class="total-price text-uppercase">Total <span>${{number_format($total,2)}}</span></li>
                            </ul>
                            <div class="payment-method-wrapper">
                                <h4 class="mb-15">Payment Methods</h4>
                                <ul class="d-flex justify-content-between">
                                    <li class="payment-method vnpay">
                                        <label for="vnpay">
                                            <input type="radio" value="vnpay" id="vnpay" name="payment" hidden>
                                            <span> <img src="/customer/assets/img/vnpay.jpg" alt="vnpay"> </span>
                                        </label>
                                    </li>
                                    <li class="payment-method paypal">
                                        <label for="paypal">
                                            <input type="radio" value="paypal" id="paypal" name="payment" hidden>
                                            <span> <img src="/customer/assets/img/paypal.png" alt="paypal"> </span>
                                        </label>
                                    </li>
                                    <li class="payment-method cod">
                                        <label for="cod">
                                            <input hidden type="radio" value="cod" id="cod" name ="payment" checked>
                                            <span> <img src="/customer/assets/img/cod.jpg" alt="cod"> </span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <input value={{$total}} name="total_price" hidden>
                            @if(\Session::has('error'))
                                <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                                {{ \Session::forget('error') }}
                            @endif
                            <div class="order-btn">
                                <button type="submit" class="primary-btn">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
