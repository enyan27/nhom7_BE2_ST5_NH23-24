@extends('customer.layout.master')

@section('title', 'Cart - Online Shopping')
 
@section('body')
    <style>
        .btn-primary:hover{
            background: #ee2761;
        }
    </style>
    <section class="cart-section section-padding">
        <div class="my-container">
            <div class="cart-section-inner">
                <form action="#">
                    <h2 class="cart-title mb-30">Shopping Cart</h2>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="cart-table">
                                @if(count($cartItems) != 0)
                                <table class="cart-table-inner">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cartItems as $cartItem)
                                        <tr class="cartItem_id-{{ $cartItem->id }}">
                                            <td>
                                                <div class="cart-product d-flex align-items-center">
                                                    <button class="cart-remove-btn" data-bs-toggle="modal" data-bs-target="#modalDeleteCart{{$cartItem->id}}" type="button">
                                                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16px" height="16px">
                                                            <path
                                                                d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z">
                                                            </path>
                                                        </svg>
                                                    </button>

                                                    <div class="modal fade" id="modalDeleteCart{{$cartItem->id}}" aria-hidden="true" tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title text-dark" >Confirm</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body text-start text-dark">
                                                                    <strong>Are you sure you want to delete this product? </strong>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary border-0" data-bs-dismiss="modal">No</button>
                                                                    <button type="button" onclick="removeCart('{{$cartItem->id}}')" data-bs-dismiss="modal" class="btn btn-primary color-main border-0" >Yes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="cart-thumbnail">
                                                        <a href="/{{ $cartItem->productDetail->product->slug}}.html">
                                                            <img src="/{{$cartItem->productDetail->colorImg_1}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="cart-content">
                                                        <h4 class="cart-content-title">
                                                            <a href="/{{ $cartItem->productDetail->product->slug}}.html">{{$cartItem->productDetail->product->productname}}</a>
                                                        </h4>
                                                        <span class="cart-content-variant">Color: {{$cartItem->productDetail->color}}</span>
                                                        <span class="cart-content-variant">Size: {{$cartItem->productDetail->size}}</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="cart-price">${{number_format($cartItem->productDetail->product->price_sale, 2)}}</span>
                                            </td>
                                            <td>
                                                <div class="quantity-box">
                                                    <button type="button" class="quantity-value decrease cart" data-id="{{$cartItem->id}}">-</button>
                                                    <input type="number" style="pointer-events: none" class="quantity-number text-center" value="{{$cartItem->quantity}}" >
                                                    <button type="button" class="quantity-value increase cart" data-id="{{$cartItem->id}}">+</button>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="cart-price end">${{ number_format($cartItem->quantity * $cartItem->productDetail->product->price_sale,2) }}</span>
                                            </td>
                                        </tr>
                                    @endforeach    
                                    </tbody>
                                </table>
                                <div class="cart-table-footer d-flex justify-content-between">
                                    <a class="continue-shopping" href="/shop">Continue shopping</a>
                                    <button type="button" class="clear-cart" data-bs-toggle="modal" data-bs-target="#modalClearCart">Clear cart</button>
                                </div>
                                @else
                                <div class="empty-product section-padding text-center">
                                    <div class="empty-product-img">
                                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg"> 
                                            <path d="M65.2622 22.5H14.7374C14.1222 22.5 13.5285 22.7269 13.0701 23.1372C12.6117 23.5475 
                                                12.3206 24.1124 12.2527 24.7239L7.80826 64.7239C7.76943 65.0734 7.80475 65.4271 7.91191 65.7619C8.01907 
                                                66.0968 8.19566 66.4053 8.43015 66.6673C8.66464 66.9293 8.95175 67.1389 9.27274 67.2824C9.59373 67.4258 9.94137 
                                                67.5 10.293 67.5H69.7066C70.0582 67.5 70.4059 67.4258 70.7269 67.2824C71.0479 67.1389 71.335 66.9293 71.5695 
                                                66.6673C71.8039 66.4053 71.9805 66.0968 72.0877 65.7619C72.1949 65.4271 72.2302 65.0734 72.1914 64.7239L67.7469 
                                                24.7239C67.679 24.1124 67.3879 23.5475 66.9295 23.1372C66.4711 22.7269 65.8774 22.5 65.2622 22.5Z" 
                                                fill="#F7F8F9" stroke="#868D95" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            </path> 
                                            <path d="M27.5 32.5V22.5C27.5 19.1848 28.817 16.0054 31.1612 13.6612C33.5054 11.317 36.6848 10 40 10C43.3152 10 
                                                46.4946 11.317 48.8388 13.6612C51.183 16.0054 52.5 19.1848 52.5 22.5V32.5" 
                                                stroke="#868D95" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            </path> 
                                        </svg>
                                    </div>
                                    <div class="empty-product-content">
                                        <h3>No Product!</h3>
                                        <p>Shopping now to enjoy great deals just for you.</p>
                                    </div>
                                    <div class="cart-table-footer">
                                        <a class="continue-shopping" href="/shop">Continue shopping</a>
                                    </div>
                                </div>
                                @endif
                                
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="cart-summary">
                                <div class="coupon-code mb-30">
                                    <h3 class="coupon-code-title">Coupon</h3>
                                    <p class="coupon-code-desc">Enter your coupon code if you have one.</p>
                                    <div class="coupon-code-field d-flex">
                                        <label>
                                            <input class="coupon-code-field-input" placeholder="Coupon code" type="text">
                                        </label>
                                        <button class="coupon-code-field-btn primary-btn" type="submit">Apply Coupon</button>
                                    </div>
                                </div>
                                <div class="cart-note mb-20">
                                    <h3 class="cart-note-title">Note</h3>
                                    <p class="cart-note-desc">Add special instructions for your seller...</p>
                                    <textarea class="cart-note-textarea"></textarea>
                                </div>
                                <div class="cart-summary-total mb-20">
                                    <div class="cart-summary-total-list">
                                        <span>Subtotal</span>
                                        <?php $subTotal = 0;
                                            foreach($cartItems as $cartItem){
                                                $subTotal += ($cartItem->quantity * $cartItem->productDetail->product->price_sale);
                                            }
                                            echo '<span class="subTotal">$'.number_format($subTotal,2).'</span>';
                                            $count_cart = count($cartItems);
                                            $total = $subTotal
                                        ?>
                                        
                                    </div>
                                    <div class="cart-summary-total-list ">
                                        <span>Grand total</span>
                                        <span class="grandTotal">${{ number_format($total , 2) }}</span>
                                    </div>
                                </div>
                                <div class="cart-summary-footer">
                                    <p class="cart-summary-footer-desc">Shipping fees calculated at checkout</p>
                                    <ul class="d-flex justify-content-between">
                                        <li>
                                            <button class="cart-summary-footer-btn cart primary-btn" type="submit">Update Cart</button>
                                        </li>
                                        <li>
                                            <button type='button' class="cart-summary-footer-btn checkout primary-btn "  data-qty="{{$count_cart}}">Check Out</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <div class="modal fade" id="modalClearCart" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" >Confirm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start text-dark">
                    <strong>Are you sure you want to clear your cart? </strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary border-0" data-bs-dismiss="modal">No</button>
                    <button type="button" onclick="clearCart()" data-bs-dismiss="modal" class="btn btn-primary color-main border-0" >Yes</button>
                </div>
            </div>
        </div>
    </div>

    <section class="product-section section-padding pt-0">
        <div class="my-container">
            <div class="section-heading text-center">
            <h2 class="section-heading-title">Our Best Seller</h2>
            </div>
            <div class="product-section-inner product-swiper swiper">
            <div class="swiper-wrapper">
                @foreach($productBestSolds as $product)
                <div class="swiper-slide">
                    @include('customer.component.product_items')
                </div>
                @endforeach
            </div>
            <div class="swiper-nav-btn swiper-button-next color-main"></div>
            <div class="swiper-nav-btn swiper-button-prev color-main"></div>
            </div>
        </div>
        </div>
    </section>
@endsection
