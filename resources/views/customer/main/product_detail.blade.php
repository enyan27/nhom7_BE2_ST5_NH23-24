@extends('customer.layout.master')

@section('title',  'SURUCHI' )

@section('body')
    <section class="breadcrumb-section breadcrumb-bg">
        <div class="my-container2 w-100">
            <div class="row row-cols-1">
            <div class="col">
                <div class="breadcrumb-content text-center">
                <h1 class="breadcrumb-content-title text-white">Product Details</h1>
                <ul class="breadcrumb-content-menu d-flex justify-content-center mb-0">
                    <li class="breadcrumb-content-menu-items"><a class="text-white" href="/">Home</a></li>
                    <div class="breadcrumb-divider"></div>
                    <li class="breadcrumb-content-menu-items"><a href="{{$product->category->slug}}.htm" class="text-white">{{$product->category->categoryname}}</a></li>
                </ul>
                </div>
            </div>
            </div>
        </div>
    </section>

    <section class="product-details-section section-padding">
        <div class="my-container2">
            <div class="row row-cols-lg-2 row-cols-md-2">
                <div class="col">
                    <div class="product-details-media">
                        <div class="product-media-preview swiper">
                            <div class="swiper-wrapper">
                                @foreach($productDetails as $productDetail)
                                <div class="swiper-slide">
                                    <div class="product-media-preview-items">
                                        <img src="{{$productDetail['colorImg_1']}}" alt="{{$product->productname}}">
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-media-preview-items">
                                        <img src="{{$productDetail['colorImg_2']}}" alt="{{$product->productname}}">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="product-media-nav swiper" thumbsSlider="">
                            <div class="swiper-wrapper">
                                @foreach($productDetails as $productDetail)
                                    <div class="swiper-slide">
                                        <div class="product-media-nav-items">
                                            <img src="{{$productDetail['colorImg_1']}}" alt="{{$product->productname}}">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-media-nav-items">
                                            <img src="{{$productDetail['colorImg_2']}}" alt="{{$product->productname}}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <form action="/buy-now" method="POST">
                        @csrf
                        <div class="product-details-info">
                            <input type="hidden" class="product_id" name="product_id" value="{{$product->id}}" >
                            <input type="hidden" class="price" name="price" value="{{$product->price_sale}}" >
                            <h2 class="product-details-info-title mb-15">{{$product->productname}}</h2>
                            <div class="product-details-info-price mb-10">
                                <span class="current-price">${{number_format($product->price_sale,2)}}</span>
                                <span class="price-divided"></span>
                                <span class="old-price">${{number_format($product->price, 2)}}</span>
                            </div>
                            <div class="product-details-info-rating d-flex align-items-center mb-15">
                                <ul class="rating d-flex">
                                    <li class="rating-list">
                                        <span class="rating-list-icon">
                                            <svg class="rating-list-icon-svg" xmlns="http://www.w3.org/2000/svg"
                                                width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                <path data-name="star - Copy"
                                                    d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                    transform="translate(0 -0.018)" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="rating-list">
                                        <span class="rating-list-icon">
                                            <svg class="rating-list-icon-svg" xmlns="http://www.w3.org/2000/svg"
                                                width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                <path data-name="star - Copy"
                                                    d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                    transform="translate(0 -0.018)" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="rating-list">
                                        <span class="rating-list-icon">
                                            <svg class="rating-list-icon-svg" xmlns="http://www.w3.org/2000/svg"
                                                width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                <path data-name="star - Copy"
                                                    d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                    transform="translate(0 -0.018)" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="rating-list">
                                        <span class="rating-list-icon">
                                            <svg class="rating-list-icon-svg" xmlns="http://www.w3.org/2000/svg"
                                                width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                <path data-name="star - Copy"
                                                    d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                    transform="translate(0 -0.018)" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="rating-list">
                                        <span class="rating-list-icon">
                                            <svg class="rating-list-icon-svg" xmlns="http://www.w3.org/2000/svg"
                                                width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                                <path data-name="star - Copy"
                                                    d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                                                    transform="translate(0 -0.018)" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </li>
                                </ul>
                                <span class="product-items-rating-count-number">(24)</span>
                            </div>
                            <div class="product-variant">
                                <div class="product-variant-list mb-10">
                                    <fieldset class="variant-input-fieldset">
                                        <legend class="product-variant-title mb-8">Color: </legend>
                                        <div class="d-flex">
                                            @foreach($productDetails as $productDetail)
                                            <input class="getColor" value="{{$productDetail['color']}}" type="radio" name="color" id="{{$productDetail['color']}}-color" hidden>
                                            <label class="variant-color-value" for="{{$productDetail['color']}}-color" title="{{$productDetail['color']}}">
                                                <span style= "background: {{$productDetail['color']}} "></span>
                                            </label>
                                            @endforeach
                                        </div>
                                            @error('color')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                    </fieldset>
                                </div>
                                <div class="product-variant-list mb-15">
                                    <fieldset id="test" class="variant-input-fieldset" >
                                        <legend class="product-variant-title mb-8">Select Size :</legend>
                                        @if($product->quantity != 0)
                                            <input class="product-size" value="XS" type="radio" name="size" id="XS-size" hidden>
                                            <label class="variant-size-value" for="XS-size">XS</label>
                                            <input class="product-size" value="S" type="radio" name="size" id="S-size" hidden>
                                            <label class="variant-size-value" for="S-size">S</label>
                                            <input class="product-size" value="M" type="radio" name="size" id="M-size" hidden>
                                            <label class="variant-size-value" for="M-size">M</label>
                                            <input class="product-size" value="L" type="radio" name="size" id="L-size" hidden>
                                            <label class="variant-size-value" for="L-size">L</label>
                                            <input class="product-size" value="XL" type="radio" name="size" id="XL-size" hidden>
                                            <label class="variant-size-value" for="XL-size">XL</label>
                                            <input class="product-size" value="XXL" type="radio" name="size" id="XXL-size" hidden>
                                            <label class="variant-size-value" for="XXL-size">XXL</label>
                                        @else
                                            <span class="text-danger text-uppercase">
                                                <strong>Sold Out</strong>
                                            </span>
                                        @endif    
                                        @error('size')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </fieldset>
                                </div>
                                <p id="instock" class="mb-8">Available {{$product->quantity}} products in stock</p>

                                <div class="product-variant-list d-flex align-items-center mb-20">
                                    <div class="quantity-box">
                                        <button type="button" class="quantity-value decrease" value="Decrease Value">-</button>
                                        <input type="number" name="quantity" class="quantity-number text-center" value="1">
                                        <button type="button" class="quantity-value increase" value="Increase Value">+</button>
                                    </div>
                                    <button class="quickview-cart-btn primary-btn" type="button">Add To Cart</button>
                                </div>
                                <div class="product-variant-list mb-15">
                                @if(Auth::check())
                                    @if(in_array($product->id, array_column(Auth::user()->wishListItems->toArray(), 'product_id')))
                                        <button type="button" class="variant-wishlist-btn {{$product->id}} added" onclick="removeWishList({{$product->id}})">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path
                                                    d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                    fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="32">
                                                </path>
                                            </svg>
                                            <span>Added to Wishlist</span>
                                        </button>
                                    @else
                                        <button type="button" class="variant-wishlist-btn {{$product->id}}" onclick="addWishList({{$product->id}})">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path
                                                    d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                    fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="32">
                                                </path>
                                            </svg>
                                            <span>Add to Wishlist</span>
                                        </button>
                                    @endif
                                @else
                                    <button type="button" class="variant-wishlist-btn {{$product->id}}" onclick="addWishList({{$product->id}})">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path
                                                d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="32">
                                            </path>
                                        </svg>
                                        <span>Add to Wishlist</span>
                                    </button>
                                @endif
                                    <button class="variant-buy-now-btn primary-btn" type="submit">Buy Now</button>
                                </div>

                            </div>

                            <div>
                                <p class="mb-10">
                                    <strong>Brand: </strong>{{$product->brand->brandname}}
                                </p>
                                <!-- <p class="mb-10"> <strong>Color: </strong>
                                @foreach($productDetails as $productDetail)
                                    {{$productDetail['color']}}
                                @endforeach
                                </p > -->
                                <p class="mb-10">
                                    <strong>Style code: </strong>{{$product->sku}}
                                </p>
                                <p class="mb-10">
                                    <strong>Type: </strong>{{$product->category->categoryname}}
                                </p>
                            </div>    

                            <div class="quickview-social d-flex align-items-center mb-15">
                                <label class="quickview-social-title">Social Share :</label>
                                <ul class="quickview-social-wrapper d-flex">
                                    <li class="quickview-social-list">
                                        <a href="fb.com" class="quickview-social-icon color-main">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="7.667" height="16.524"
                                                viewBox="0 0 7.667 16.524">
                                                <path data-name="Path 237"
                                                    d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z"
                                                    transform="translate(-960.13 -345.407)" fill="currentColor"></path>
                                            </svg>
                                            <span class="visually-hidden">Facebook</span>
                                        </a>
                                    </li>
                                    <li class="quickview-social-list">
                                        <a href="twitter.com" class="quickview-social-icon color-main">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16.489" height="13.384"
                                                viewBox="0 0 16.489 13.384">
                                                <path data-name="Path 303"
                                                    d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z"
                                                    transform="translate(-951.23 -1140.849)" fill="currentColor"></path>
                                            </svg>
                                            <span class="visually-hidden">Twitter</span>
                                        </a>
                                    </li>
                                    <li class="quickview-social-list">
                                        <a href="instagram.com" class="quickview-social-icon color-main">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16.497" height="16.492"
                                                viewBox="0 0 19.497 19.492">
                                                <path data-name="Icon awesome-instagram"
                                                    d="M9.747,6.24a5,5,0,1,0,5,5A4.99,4.99,0,0,0,9.747,6.24Zm0,8.247A3.249,3.249,0,1,1,13,11.238a3.255,3.255,0,0,1-3.249,3.249Zm6.368-8.451A1.166,1.166,0,1,1,14.949,4.87,1.163,1.163,0,0,1,16.115,6.036Zm3.31,1.183A5.769,5.769,0,0,0,17.85,3.135,5.807,5.807,0,0,0,13.766,1.56c-1.609-.091-6.433-.091-8.042,0A5.8,5.8,0,0,0,1.64,3.13,5.788,5.788,0,0,0,.065,7.215c-.091,1.609-.091,6.433,0,8.042A5.769,5.769,0,0,0,1.64,19.341a5.814,5.814,0,0,0,4.084,1.575c1.609.091,6.433.091,8.042,0a5.769,5.769,0,0,0,4.084-1.575,5.807,5.807,0,0,0,1.575-4.084c.091-1.609.091-6.429,0-8.038Zm-2.079,9.765a3.289,3.289,0,0,1-1.853,1.853c-1.283.509-4.328.391-5.746.391S5.28,19.341,4,18.837a3.289,3.289,0,0,1-1.853-1.853c-.509-1.283-.391-4.328-.391-5.746s-.113-4.467.391-5.746A3.289,3.289,0,0,1,4,3.639c1.283-.509,4.328-.391,5.746-.391s4.467-.113,5.746.391a3.289,3.289,0,0,1,1.853,1.853c.509,1.283.391,4.328.391,5.746S17.855,15.705,17.346,16.984Z"
                                                    transform="translate(0.004 -1.492)" fill="currentColor"></path>
                                            </svg>
                                            <span class="visually-hidden">Instagram</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="guarantee-safe-checkout">
                                <label>Guaranteed Safe Checkout : </label>
                                <img src="./customer/assets/img/safe-checkout.png" alt="Payment Image">
                            </div>
                        </div>
                    </form>    
                </div>
            </div>
        </div>
    </section>

    <section class="product-details-tab-section section-padding">
        <div class="my-container2">
            <div class="row row-cols-1">
                <div class="col">
                    <ul class="product-details-tab nav d-flex mb-30">
                        <li class="product-details-tab-list">
                            <button class="product-details-tab-list-btn active" data-bs-toggle="tab" data-bs-target="#description"
                                type="button">Description</button>
                        </li>
                        <li class="product-details-tab-list">
                            <button class="product-details-tab-list-btn" data-bs-toggle="tab"
                                data-bs-target="#warrantypolicy" type="button">Warranty
                                Policy</button>
                        </li>
                        <li class="product-details-tab-list">
                            <button class="product-details-tab-list-btn" data-bs-toggle="tab"
                                data-bs-target="#preserveguide" type="button">Preserve
                                Guide</button>
                        </li>
                        <li class="product-details-tab-list">
                            <button class="product-details-tab-list-btn" data-bs-toggle="tab"
                                data-bs-target="#sizeguide" type="button">Size
                                Guide</button>
                        </li>
                    </ul>
                    <div class="product-details-tab-inner">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="description">
                                <div class="product-tab-content">
                                    <div class="product-tab-content-step mb-30">
                                        <p class="product-tab-content-desc">{!! $product->description !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="warrantypolicy">
                                <div class="product-tab-content">
                                    <div class="product-tab-content-step mb-30">
                                        <h2 class="product-tab-content-title mb-10">Nam provident sequi</h2>
                                        <p class="product-tab-content-desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam provident sequi, nemo
                                            sapiente culpa nostrum rem eum perferendis quibusdam, magnam a vitae corporis! Magnam enim modi, illo harum suscipit
                                            tempore aut dolore doloribus deserunt voluptatum illum, est porro? Ducimus dolore accusamus impedit ipsum maiores,
                                            ea iusto temporibus numquam eaque mollitia fugiat laborum dolor tempora eligendi voluptatem quis necessitatibus nam
                                            ab?
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="preserveguide">
                                <div class="product-tab-content">
                                    <div class="product-tab-content-step mb-30">
                                        <h2 class="product-tab-content-title mb-10">Nam provident sequi</h2>
                                        <p class="product-tab-content-desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam provident sequi, nemo
                                            sapiente culpa nostrum rem eum perferendis quibusdam, magnam a vitae corporis! Magnam enim modi, illo harum suscipit
                                            tempore aut dolore doloribus deserunt voluptatum illum, est porro? Ducimus dolore accusamus impedit ipsum maiores,
                                            ea iusto temporibus numquam eaque mollitia fugiat laborum dolor tempora eligendi voluptatem quis necessitatibus nam
                                            ab?
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sizeguide">
                                <div class="product-tab-content">
                                    <div class="product-tab-content-step mb-30">
                                        <h2 class="product-tab-content-title mb-10">Nam provident sequi</h2>
                                        <p class="product-tab-content-desc">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nam provident sequi, nemo
                                            sapiente culpa nostrum rem eum perferendis quibusdam, magnam a vitae corporis! Magnam enim modi, illo harum suscipit
                                            tempore aut dolore doloribus deserunt voluptatum illum, est porro? Ducimus dolore accusamus impedit ipsum maiores,
                                            ea iusto temporibus numquam eaque mollitia fugiat laborum dolor tempora eligendi voluptatem quis necessitatibus nam
                                            ab?
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Slide Product -->

    <section class="product-section section-padding">
        <div class="my-container2">
            <div class="section-heading text-center">
                <h2 class="section-heading-title">Related Products</h2>
            </div>
            <div class="product-section-inner product-swiper2 swiper">
                <div class="swiper-wrapper">
                    @foreach ($relatedProducts as $product)
                    <div class="swiper-slide">
                        @include('customer.component.product_items')
                    </div>
                    @endforeach
                </div>
                <div class="swiper-nav-btn swiper-button-next color-main"></div>
                <div class="swiper-nav-btn swiper-button-prev color-main"></div>
            </div>
        </div>
    </section>

    @include('customer.component.shipping_banner')

@endsection