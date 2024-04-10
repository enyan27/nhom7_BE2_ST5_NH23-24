@extends('customer.layout.master')

@section('title',  'SURUCHI' )

@section('body')    
    
    <section class="breadcrumb-section breadcrumb-bg">
      <div class="my-container2 w-100">
        <div class="row row-cols-1">
          <div class="col">
            <div class="breadcrumb-content text-center">
              <h1 class="breadcrumb-content-title text-white">Shop</h1>
              <ul class="breadcrumb-content-menu d-flex justify-content-center mb-0">
                <li class="breadcrumb-content-menu-items"><a class="text-white" href="/">Home</a></li>
                <div class="breadcrumb-divider"></div>
                <li class="breadcrumb-content-menu-items"><span class="text-white">Shop</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="shop-section section-padding">
        <div class="my-container">
            <form action="shop">
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <div class="shop-sidebar-widget">
                            <div class="single-widget widget-bg">
                                <h2 class="wiget-title">Categories</h2>
                                <ul class="widget-categories-menu">
                                    @foreach($categories as $category)
                                    <li class="widget-categories-menu-list">
                                        <label class="widget-categories-menu-label d-flex align-items-center">
                                            <img src="storage/uploads/product/no_image.jpg" alt="{{$category->categoryname}}">
                                            <span class="widget-categories-menu-text">{{$category->categoryname}}</span>
                                            <svg class="widget-categories-menu-arrowdown-icon" xmlns="http://www.w3.org/2000/svg" width="12.355"
                                                height="8.394">
                                                <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)"
                                                    fill="currentColor">
                                                </path>
                                            </svg>
                                        </label>
                                        @if($category->childs)
                                        <ul class="widget-categories-sub-menu">
                                            @foreach($category->childs as $child)
                                            <li class="widget-categories-sub-menu-list">
                                                <a href="{{$child->slug}}.htm" class="widget-categories-sub-menu-link d-flex align-items-center">
                                                    <img src="storage/uploads/product/no_image.jpg" alt="{{$child->categoryname}}">
                                                    <span class="widget-categories-sub-menu-text">{{$child->categoryname}}</span>
                                                    <svg class="widget-categories-menu-arrowdown-icon" xmlns="http://www.w3.org/2000/svg" width="12.355"
                                                        height="8.394">
                                                        <path d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)"
                                                            fill="currentColor">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="single-widget widget-bg">
                                <h2 class="wiget-title">Filter By Price</h2>
                                <div class="price-filter-form-inner d-flex align-items-center">
                                    <div class="price-filter-group">
                                        <label class="price-filter-label" for="">From</label>
                                        <div class="price-filter-input d-flex align-items-center ">
                                            <span class="price-filter-currency">$</span>
                                            <label>
                                                <input value="{{request('min_price') ?? '' }}" type="number" name="min_price" placeholder="0" min="10" max="10000">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="price-divider">
                                        <span>-</span>
                                    </div>
                                    <div class="price-filter-group">
                                        <label class="price-filter-label" for="">To</label>
                                        <div class="price-filter-input d-flex align-items-center">
                                            <span class="price-filter-currency">$</span>
                                            <label>
                                                <input value="{{request('max_price') ?? '' }}" type="number" name="max_price" placeholder="1000.0" min="50" max="10000">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button class="price-filer-btn primary-btn " type="submit">Filter</button>
                            </div>
                            <div class="single-widget widget-bg">
                                <h2 class="wiget-title">Brands</h2>
                                <ul>
                                    @foreach($brands as $brand)
                                    <li  class="widget-tagcloud-list">
                                        <label for="{{$brand->brandname}}">
                                            <input type="checkbox" class="visually-hidden" onchange="this.form.submit();"
                                            id="{{$brand->brandname}}" name="brand[{{$brand->brandname}}]"
                                            {{(request("brand")[$brand->brandname] ?? '') == 'on' ? 'checked' : '' }} />
                                            <span class="text-uppercase">{{$brand->brandname}}</span>
                                        </label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="single-widget widget-bg">
                                <h2 class="wiget-title">Sizes</h2>
                                <ul>
                                    <li  class="widget-tagcloud-list">
                                        <label for="xs-size">
                                            <input type="checkbox" class="visually-hidden" onchange="this.form.submit();"
                                            id="xs-size" name="size[XS]"
                                            {{ (request('size')['XS'] ?? '') == 'on' ? 'checked' : '' }} />
                                            <span>XS</span>
                                        </label>
                                    </li>
                                    <li  class="widget-tagcloud-list">
                                        <label for="s-size">
                                            <input type="checkbox" class="visually-hidden" onchange="this.form.submit();"
                                            id="s-size" name="size[S]"
                                            {{( request('size')['S'] ?? '') == 'on' ? 'checked' : '' }} />
                                            <span>S</span>
                                        </label>
                                    </li>
                                    <li  class="widget-tagcloud-list">
                                        <label for="m-size">
                                            <input type="checkbox" class="visually-hidden" onchange="this.form.submit();"
                                            id="m-size" name="size[M]"
                                            {{( request('size')['M'] ?? '') == 'on' ? 'checked' : '' }} />
                                            <span>M</span>
                                        </label>
                                    </li>
                                    <li  class="widget-tagcloud-list">
                                        <label for="l-size">
                                            <input type="checkbox" class="visually-hidden" onchange="this.form.submit();"
                                            id="l-size" name="size[L]"
                                            {{( request('size')['L'] ?? '') == 'on' ? 'checked' : '' }} />
                                            <span>L</span>
                                        </label>
                                    </li>
                                    <li  class="widget-tagcloud-list">
                                        <label for="xl-size">
                                            <input type="checkbox" class="visually-hidden" onchange="this.form.submit();"
                                            id="xl-size" name="size[XL]"
                                            {{( request('size')['XL'] ?? '') == 'on' ? 'checked' : '' }} />
                                            <span>XL</span>
                                        </label>
                                    </li>
                                    <li  class="widget-tagcloud-list">
                                        <label for="xxl-size">
                                            <input type="checkbox" class="visually-hidden" onchange="this.form.submit();"
                                            id="xxl-size" name="size[XXL]"
                                            {{( request('size')['XXL'] ?? '') == 'on' ? 'checked' : '' }} />
                                            <span>XXL</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="single-widget widget-bg">
                                <h2 class="wiget-title">Top Viewed Products</h2>
                                <div class="product-grid-inner">
                                @foreach($topViewedProducts as $product)
                                    <div class="product-items product-items-grid d-flex align-items-center ">
                                        <div class="product-items-grid-thumbnail position-relative">
                                            <a href="/{{$product->slug}}.html" class="product-items-link">
                                                <img class="product-items-img product-primary-img" src="{{$product->image_1}}"
                                                    alt="{{$product->productname}}">
                                                <img class="product-items-img product-secondary-img" src="{{$product->image_2}}"
                                                    alt="{{$product->productname}}">
                                            </a>
                                        </div>
                                        <div class="product-items-grid-content">
                                            <div class="product-items-content-title">
                                                <a href="/{{$product->slug}}.html">{{$product->productname}}</a>
                                            </div>
                                            <div class="product-items-price">
                                                <span class="current-price">${{number_format($product->price_sale, 2)}}</span>
                                                <span class="price-divided"></span>
                                                <span class="old-price">${{number_format($product->price, 2)}}</span>
                                            </div>
                                            <span>View: {{$product->view_count}}</span>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="shop-product-wrapper">
                            <div class="shop-product-header d-flex justify-content-between align-items-center">
                                <div class="product-view-mode d-flex align-items-center">
                                    <label class="product-view-label">Sort by :</label>
                                    <div class="select shop-product-header-select mr-30">
                                        <select name="sort_by" class="product-view-select" onchange="this.form.submit()">
                                            <option {{request('sort_by') == 'latest' ? 'selected' : '' }} value="lastest">Latest</option>
                                            <option {{request('sort_by') == 'oldest' ? 'selected' : '' }} value="oldest">Oldest</option>
                                            <option {{request('sort_by') == 'name-ascending' ? 'selected' : '' }} value="name-ascending">Name A -> Z</option>
                                            <option {{request('sort_by') == 'name-desending' ? 'selected' : '' }} value="name-desending">Name Z -> A </option>
                                            <option {{request('sort_by') == 'price-ascending' ? 'selected' : '' }} value="price-ascending">Price Increase </option>
                                            <option {{request('sort_by') == 'price-desending' ? 'selected' : '' }} value="price-desending">Price Decrease </option>
                                        </select>
                                    </div>
                                    <label class="product-view-label">Show:</label>
                                    <div class="select shop-product-header-select">
                                        <select name="show" class="product-view-select" onchange="this.form.submit()">
                                            <option {{request('show') == '12' ? 'selected' : '' }} value="12">12</option>
                                            <option {{request('show') == '8' ? 'selected' : '' }} value="8">8</option>
                                            <option {{request('show') == '4' ? 'selected' : '' }} value="4">4</option>
                                        </select>
                                    </div>
                                </div>
                                <p class="product-showing-count"></p>
                            </div>
                            <div class="shop-product-main">
                                <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-3 row-cols-2 mb--30">
                                @foreach($products as $product)
                                    <div class="col mb-30">
                                        @include('customer.component.product_items')
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection