@extends('customer.layout.master')

@section('title','Order Success - Online Shopping')
 
@section('body')
    <div class="empty-product section-padding bg-grey text-center">
        @if($notification)
            <div class="d-flex justify-content-center mb-10">
                <img style=" height: 80px" src="/customer/assets/img/icons-check.png" alt="">
            </div>
            <div class="empty-product-content mb-10">
                <h3 class="mb-10">Order Success</h3>
                <p style="font-size: 20px">{{$notification}}</p>
            </div>
        @else
        <div class="d-flex justify-content-center mb-10">
                <img style=" height: 80px" src="/customer/assets/img/cart-empty.png" alt="">
            </div>
            <div class="empty-product-content mb-10">
                <h3 class="mb-10">No Product!</h3>
                <p style="font-size: 20px">Shopping now to enjoy great deals just for you.</p>
            </div>
        @endif
        
        <a class="primary-btn" href="/shop">Continue shopping</a>
        
    </div>
@endsection