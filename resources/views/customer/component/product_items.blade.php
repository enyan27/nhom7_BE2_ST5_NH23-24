<div class="product-items">
    <div class="product-items-thumbnail">
        <a href="/{{$product->slug}}.html">
            <img class="product-items-img product-primary-img" src="{{ $product->image_1}}"
                alt="{{$product->productname}}">
            <img class="product-items-img product-secondary-img" src="{{$product->image_2}}"
                alt="{{$product->productname}}">
        </a>
        <!-- badge left -->
        <div class="product-badge">
            <span class="product-badge-items text-white color-main">Sale</span>
        </div>
        <!-- /badge left -->

        <!-- badge right -->
        <div class="product-badge2">
            <ul class="product-items-action d-flex flex-column align-items-end">
            <li class="product-items-action-list mb-2">
                @if(Auth::check())    
                @if(in_array($product->id, array_column(Auth::user()->wishListItems->toArray(), 'product_id')))
                <button type="button" class="add-to-wishlist {{$product->id}}" onclick="removeWishList('{{$product->id}}')" >
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18.5" viewBox="0 0 512 512">
                    <path
                    d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                    fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="32"></path>
                </svg>
                <span></span>
                </button>
                @else
                <button type="button" class="add-to-wishlist {{$product->id}}" onclick="addWishList('{{$product->id}}')" >
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18.5" viewBox="0 0 512 512">
                    <path
                    d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                    fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="32"></path>
                </svg>
                <span></span>
                </button>
                @endif
                @else
                <button type="button" class="add-to-wishlist {{$product->id}}" onclick="addWishList('{{$product->id}}')" >
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18.5" viewBox="0 0 512 512">
                    <path
                    d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                    fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="32"></path>
                </svg>
                <span></span>
                </button>
                @endif    
            </li>

            <!-- View btn -->
            <li class="product-items-action-list">
                <a href="/{{$product->slug}}.html">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512">
                    <path
                        d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z"
                        fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="32"></path>
                    <circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10"
                        stroke-width="32"></circle>
                    </svg>
                    <span></span>
                </button>
                </a>
            </li>
            </ul>
        </div>
    </div>


    <div class="product-items-content">
        <span class="product-items-content-subtitle ">{{$product->brand->brandname}}</span>
        <div class="product-items-content-title">
            <a href="/{{$product->slug}}.html">{{$product->productname}}</a>
        </div>
        <div class="product-items-price">
            @if ($product->price_sale != 0)
            <span style="color: #ee2761; font-size: 18px" class="current-price">${{number_format($product->price_sale,
                2)}}</span>
            <span class="price-divided"></span>
            <span class="old-price">${{number_format($product->price, 2)}}</span>
            @else
            <span style="color: #ee2761; font-size: 18px" class="current-price">${{number_format($product->price_sale,
                2)}}</span>
            @endif

        </div>
        <ul class="product-rating d-flex">
            <li class="rating-list">
                <span class="rating-list-icon">
                    <svg class="rating-list-icon-svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732"
                        viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy"
                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                            transform="translate(0 -0.018)" fill="currentColor"></path>
                    </svg>
                </span>
            </li>
            <li class="rating-list">
                <span class="rating-list-icon">
                    <svg class="rating-list-icon-svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732"
                        viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy"
                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                            transform="translate(0 -0.018)" fill="currentColor"></path>
                    </svg>
                </span>
            </li>
            <li class="rating-list">
                <span class="rating-list-icon">
                    <svg class="rating-list-icon-svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732"
                        viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy"
                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                            transform="translate(0 -0.018)" fill="currentColor"></path>
                    </svg>
                </span>
            </li>
            <li class="rating-list">
                <span class="rating-list-icon">
                    <svg class="rating-list-icon-svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732"
                        viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy"
                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                            transform="translate(0 -0.018)" fill="currentColor"></path>
                    </svg>
                </span>
            </li>
            <li class="rating-list">
                <span class="rating-list-icon">
                    <svg class="rating-list-icon-svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732"
                        viewBox="0 0 10.105 9.732">
                        <path data-name="star - Copy"
                            d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z"
                            transform="translate(0 -0.018)" fill="currentColor"></path>
                    </svg>
                </span>
            </li>
        </ul>

        <!-- Color -->
        <div class="product-variant-list">
            <fieldset class="variant-input-fieldset">
            <div class="d-flex">
                @foreach($product->productDetail->pluck('color')->unique() as $color)
                <label class="variant-color-value" for="{{$color}}-color" title="{{$color}}">
                    <span style="background: {{$color}}"></span>
                </label>
                @endforeach
            </div>
            </fieldset>
        </div>

    </div>
</div>