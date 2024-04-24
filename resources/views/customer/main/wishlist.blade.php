@extends('customer.layout.master')

@section('title',  'Wish List - Online Shopping' )
 
@section('body')
      <section class="cart-section section-padding">
        <div class="my-container2">
            <div class="cart-section-inner">
                <form action="#">
                    <h2 class="cart-title mb-30">Wish List</h2>
                    <div class="cart-table">
                      <table class="cart-table-inner">
                          <thead>
                              <tr>
                                  <th>Product</th>
                                  <th>Price</th>
                                  <th class="text-center">Stock status</th>
                                  <th class="text-right">View Product</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($wishLists as $wishList)
                              <tr class='prodId-{{$wishList->product_id}}'>
                                  <td>
                                      <div class="cart-product d-flex align-items-center">
                                          <button class="cart-remove-btn" type="button" onclick="removeWishList('{{$wishList->product_id}}')">
                                              <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16px" height="16px">
                                                  <path
                                                      d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z">
                                                  </path>
                                              </svg>
                                          </button>
                                          <div class="cart-thumbnail">
                                              <a href="/{{$wishList->product->slug}}.html">
                                                  <img src="{{$wishList->product->image_1}}" alt="{{$wishList->product->productname}}">
                                              </a>
                                          </div>
                                          <div class="cart-content">
                                              <h4 class="cart-content-title">
                                                  <a href="/{{$wishList->product->slug}}.html">{{$wishList->product->productname}}</a>
                                              </h4>
                                          </div>
                                      </div>
                                  </td>
                                  <td>
                                      <span class="cart-price">${{number_format($wishList->product->price_sale, 2)}}</span>
                                  </td>
                                  <td class="text-center">
                                    @if($wishList->product->quantity != 0)
                                        <span class="in-stock text-main-color">In Stock</span>
                                    @else
                                        <span class="in-stock text-main-color">Sold Out</span>
                                    @endif
                                  </td>
                                  <td class="text-right">
                                    <a class="wishlist-cart-btn primary-btn" href="/{{$wishList->product->slug}}.html">View</a>
                                  </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                      {{ $wishLists->links()}}
                      <div class="cart-table-footer d-flex justify-content-between">
                          <a class="continue-shopping" href="/shop">Continue shopping</a>
                          <a href="/cart" class="clear-cart" type="submit">View cart</a>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="product-section section-padding">
      <div class="my-container2">
        <div class="section-heading text-center">
          <h2 class="section-heading-title">You may also like</h2>
        </div>
        <div class="product-section-inner product-swiper2 swiper">
          <div class="swiper-wrapper">
            @foreach($products as $product)
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
  @include('customer.component.shipping_banner')
@endsection
