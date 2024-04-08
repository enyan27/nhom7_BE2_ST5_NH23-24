<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/customer/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/customer/assets/css/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.css" />
    <link rel="stylesheet" href="/customer/assets/css/style.css" />
</head>

<body>
  <header class="header-section">
    <div class="header-topbar color-main">
      <div class="my-container">
        <div class="my-container-inner d-flex align-items-center justify-content-between">
          <div class="header-shipping">
            <div class="header-shipping-wrapper d-flex">
              <div class="header-shipping-text text-white">
                Welcome to Stable online Store
              </div>
              <div class="header-shipping-text text-white border-left">
                <img class="header-shipping-text-icon" src="/customer/assets/img/bus.png" alt="bus-icon" />Track Your Order
              </div>
              <div class="header-shipping-text text-white border-left">
                <img class="header-shipping-text-icon" src="/customer/assets/img/email.png" alt="email-icon" />stablefashion@gmail.com
              </div>
            </div>
          </div>
          <div class="language-currency d-none d-lg-block">
            <div class="d-flex">
              @if(Auth::check())
              <a href="/my-account/profile" class="language-currency-list text-white d-flex">
                <img style="border-radius: 50%; height: 25px; width: 25px;" class="language-currency-list-icon" src="/{{Auth::user()->avatar ?? 'storage/uploads/user/no_avatar.png'}}"
                  alt="{{Auth::user()->fullname}}" />{{Auth::user()->fullname}}
              </a>
              <form action="/logout" method="POST">
                @csrf
                <button style="background: none" type="submit" class="language-currency-list text-white border-left">Log Out</button>
              </form>
              @else
              <a href="login" class="language-currency-list text-white">Log In</a>
              <a href="register" class="language-currency-list text-white border-left">Register</a>
              @endif
               
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="main-header">
      <div class="my-container">
        <div class="main-header-inner d-flex justify-content-between align-items-center">
          <div class="main-logo">
            <a href="/">
              <img src="/customer/assets/img/nav-log-stable.png" alt="logo-img" />
            </a>
          </div>

          <form action="shop">
            <div class="header-search d-flex">
              <div class="header-select-categories">
                <select name="cate_search" class="header-select-inner">
                  <option value="">All Categories</option>
                  @foreach ($categories as $category)
                    @if($category->childs)
                      @foreach($category->childs as $child)
                      <option {{request('cate_search') == $child->slug ? 'selected' : '' }} 
                        value="{{$child->slug}}">{{$child->categoryname}}</option>
                      @endforeach
                    @endif
                  @endforeach
                </select>
              </div>
              <div class="header-search-box">
                <input class="header-search-input" value="{{request('search')}}" name="search" type="text" placeholder="What do you need?" />
                <button type="submit" class="header-search-button text-white color-main">
                  <svg class="header__search--button__svg" xmlns="http://www.w3.org/2000/svg" width="27.51"
                    height="26.443" viewBox="0 0 512 512">
                    <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none"
                      stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path>
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                      stroke-width="32" d="M338.29 338.29L448 448"></path>
                  </svg>
                </button>
              </div>
            </div>
          </form>

          <div class="header-account">
            <ul class="d-flex justify-content-end">
              <li class="header-account-item">
                @if (Auth::check())
                <a class="header-account-btn" href="/my-account/profile">
                @else
                <a class="header-account-btn" href="/login">
                @endif
                  <svg xmlns="http://www.w3.org/2000/svg" width="26.51" height="23.443" viewBox="0 0 512 512">
                    <path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z"
                      fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="32"></path>
                    <path
                      d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z"
                      fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path>
                  </svg>
                  <span class="header-account-btn-text">My Account</span>
                </a>
              </li>
              <li class="header-account-item">
                @if(Auth::check())
                <a class="header-account-btn" href="/wishlist">
                @else
                <a class="header-account-btn" href="/login">
                @endif
                  <svg xmlns="http://www.w3.org/2000/svg" width="28.51" height="23.443" viewBox="0 0 512 512">
                    <path
                      d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                      fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="32"></path>
                  </svg>
                  <span class="header-account-btn-text">Wish List</span>
                  @if(Auth::check())
                    <?php $wishList = count(Auth::user()->wishListItems) ?>
                    <span class="items-count color-main text-white wish-list"> {{$wishList}} </span>
                  @endif
                </a>
              </li>
              <li class="header-account-item">
                @if(Auth::check())
                <a class="header-account-btn" href="/cart">
                @else
                <a class="header-account-btn" href="/login">
                @endif
                  <svg xmlns="http://www.w3.org/2000/svg" width="26.51" height="23.443" viewBox="0 0 14.706 13.534">
                    <g transform="translate(0 0)">
                      <g>
                        <path data-name="Path 16787"
                          d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z"
                          transform="translate(0 -463.248)" fill="currentColor"></path>
                        <path data-name="Path 16788"
                          d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z"
                          transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                        <path data-name="Path 16789"
                          d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z"
                          transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                      </g>
                    </g>
                  </svg>
                  <span class="header-account-btn-text">My Cart</span>
                  @if(Auth::check() && Auth::user()->level == 2)
                    <?php $carts = count(Auth::user()->cart->cartItems) ?>
                    <span class="items-count color-main text-white mycart"> {{$carts}} </span>
                  @endif
                </a>
              </li>
            </ul>
          </div>

        </div>
      </div>
    </div>
    <div class="header-bottom">
      <div class="my-container">
        <div class="header-bottom-inner d-flex justify-content-between align-items-center">
          <div class="header-menu">
            <div class="header-menu-navigation d-flex align-items-center">
              <li class="header-menu-items {{(request()->segment(1) == '') ? 'active' : ''}}">
                <a class="header-menu-link" href="/">Home</a>
              </li>
              <li class="header-menu-items {{(request()->segment(1) == 'shop') ? 'active' : ''}}">
                <a class="header-menu-link" href="/shop">Shop</a>
              </li>
              @foreach($categories as $category)
              <li class="header-menu-items">
                <a class="header-menu-link" href="#">{{$category->categoryname}}
                  <!-- <svg class="menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12" height="7.41"
                    viewBox="0 0 12 7.41">
                    <path d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z" transform="translate(-6 -8.59)"
                      fill="currentColor" opacity="0.7"></path>
                  </svg> -->
                </a>
                @if($category->childs)
                <ul class="header-sub-menu">
                  @foreach($category->childs as $child)
                  <li>
                    <a href="/{{$child->slug}}.htm">{{$child->categoryname}}</a>
                  </li>
                  @endforeach
                </ul>
                @endif
              </li>
              @endforeach
              <li class="header-menu-items">
                <a class="header-menu-link" href="#">Blog</a>
              </li>
              <li class="header-menu-items">
                <a class="header-menu-link" href="/aboutus">About US</a>
              </li>
              <li class="header-menu-items">
                <a class="header-menu-link" href="/contact">Contact</a>
              </li>
            </div>
          </div>
          <p class="header-discount-text">
            <img class="header__discount-icon" src="/customer/assets/img/lamp.png" alt="lamp-icon" />
            Special up to 60% Off all item
          </p>
        </div>
      </div>
    </div>
  </header>

  <main class="main-content-wrapper">

    @yield('body')

  </main>
  <footer class="footer-section">
    <div class="my-container">
      <div class="main-footer d-flex justify-content-between">
        <div class="footer-widget text-ofwhite  mr-30">
          <h2 class="footer-widget-title mb-30">About Us</h2>
          <div class="footer-widget-inner">
            <div class="footer-widget-text text-ofwhite">
              <p>
              Stable both spreads the luxurious-wearing culture as well
              <br>
              as delivers a value driven, customer focused and responsible
              <br>
              fashion base in our continued effort to make Vietnam a trendier
              <br>
              place for all fashionistas.
              </p>
            </div>
            <div class="footer-social text-ofwhite">
              <h3>Follow Us</h3>
              <ul class="social-shear d-flex">
                <li class="social-shear-list">
                  <a class="social-shear-list-icon" target="_blank" href="https://www.facebook.com">
                    <svg xmlns="http://www.w3.org/2000/svg" width="7.667" height="16.524" viewBox="0 0 7.667 16.524">
                      <path data-name="Path 237"
                        d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z"
                        transform="translate(-960.13 -345.407)" fill="currentColor"></path>
                    </svg>
                    <span class="visually-hidden">Facebook</span>
                  </a>
                </li>
                <li class="social-shear-list">
                  <a class="social-shear-list-icon" target="_blank" href="https://twitter.com">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16.489" height="13.384" viewBox="0 0 16.489 13.384">
                      <path data-name="Path 303"
                        d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z"
                        transform="translate(-951.23 -1140.849)" fill="currentColor"></path>
                    </svg>
                    <span class="visually-hidden">Twitter</span>
                  </a>
                </li>
                <li class="social-shear-list">
                  <a class="social-shear-list-icon" target="_blank" href="https://www.instagram.com">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16.497" height="16.492" viewBox="0 0 19.497 19.492">
                      <path data-name="Icon awesome-instagram"
                        d="M9.747,6.24a5,5,0,1,0,5,5A4.99,4.99,0,0,0,9.747,6.24Zm0,8.247A3.249,3.249,0,1,1,13,11.238a3.255,3.255,0,0,1-3.249,3.249Zm6.368-8.451A1.166,1.166,0,1,1,14.949,4.87,1.163,1.163,0,0,1,16.115,6.036Zm3.31,1.183A5.769,5.769,0,0,0,17.85,3.135,5.807,5.807,0,0,0,13.766,1.56c-1.609-.091-6.433-.091-8.042,0A5.8,5.8,0,0,0,1.64,3.13,5.788,5.788,0,0,0,.065,7.215c-.091,1.609-.091,6.433,0,8.042A5.769,5.769,0,0,0,1.64,19.341a5.814,5.814,0,0,0,4.084,1.575c1.609.091,6.433.091,8.042,0a5.769,5.769,0,0,0,4.084-1.575,5.807,5.807,0,0,0,1.575-4.084c.091-1.609.091-6.429,0-8.038Zm-2.079,9.765a3.289,3.289,0,0,1-1.853,1.853c-1.283.509-4.328.391-5.746.391S5.28,19.341,4,18.837a3.289,3.289,0,0,1-1.853-1.853c-.509-1.283-.391-4.328-.391-5.746s-.113-4.467.391-5.746A3.289,3.289,0,0,1,4,3.639c1.283-.509,4.328-.391,5.746-.391s4.467-.113,5.746.391a3.289,3.289,0,0,1,1.853,1.853c.509,1.283.391,4.328.391,5.746S17.855,15.705,17.346,16.984Z"
                        transform="translate(0.004 -1.492)" fill="currentColor"></path>
                    </svg>
                    <span class="visually-hidden">Instagram</span>
                  </a>
                </li>
                <li class="social-shear-list">
                  <a class="social-shear-list-icon" target="_blank" href="https://www.youtube.com">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16.49" height="11.582" viewBox="0 0 16.49 11.582">
                      <path data-name="Path 321"
                        d="M967.759,1365.592q0,1.377-.019,1.717-.076,1.114-.151,1.622a3.981,3.981,0,0,1-.245.925,1.847,1.847,0,0,1-.453.717,2.171,2.171,0,0,1-1.151.6q-3.585.265-7.641.189-2.377-.038-3.387-.085a11.337,11.337,0,0,1-1.5-.142,2.206,2.206,0,0,1-1.113-.585,2.562,2.562,0,0,1-.528-1.037,3.523,3.523,0,0,1-.141-.585c-.032-.2-.06-.5-.085-.906a38.894,38.894,0,0,1,0-4.867l.113-.925a4.382,4.382,0,0,1,.208-.906,2.069,2.069,0,0,1,.491-.755,2.409,2.409,0,0,1,1.113-.566,19.2,19.2,0,0,1,2.292-.151q1.82-.056,3.953-.056t3.952.066q1.821.067,2.311.142a2.3,2.3,0,0,1,.726.283,1.865,1.865,0,0,1,.557.49,3.425,3.425,0,0,1,.434,1.019,5.72,5.72,0,0,1,.189,1.075q0,.095.057,1C967.752,1364.1,967.759,1364.677,967.759,1365.592Zm-7.6.925q1.49-.754,2.113-1.094l-4.434-2.339v4.66Q958.609,1367.311,960.156,1366.517Z"
                        transform="translate(-951.269 -1359.8)" fill="currentColor"></path>
                    </svg>
                    <span class="visually-hidden">Youtube</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-widget-menu d-flex">
          <div class="footer-widget text-ofwhite mr-30">
            <h2 class="footer-widget-title mb-30">My Account</h2>
            <ul class="footer-widget-menu">
              <li class="footer-widget-menu-list">
                <a href="/my-account/profile">My Account</a>
              </li>
              <li class="footer-widget-menu-list">
                <a href="/cart">Shopping Cart</a>
              </li>
              <li class="footer-widget-menu-list">
                <a href="/login">Login</a>
              </li>
              <li class="footer-widget-menu-list">
                <a href="/register">Register</a>
              </li>
              <li class="footer-widget-menu-list">
                <a href="/checkout">Checkout</a>
              </li>
              <li class="footer-widget-menu-list">
                <a href="/wishlist">Wishlist</a>
              </li>
            </ul>
          </div>
          <div class="footer-widget text-ofwhite mr-30">
            <h2 class="footer-widget-title mb-30">Categories</h2>
            <ul class="footer-widget-menu">
              <li class="footer-widget-menu-list">
                <a href="/aboutus">About Us</a>
              </li>
              <li class="footer-widget-menu-list">
                <a href="/contact">Contact Us</a>
              </li>
              <li class="footer-widget-menu-list">
                <a href="#">Portfolio</a>
              </li>
              <li class="footer-widget-menu-list">
                <a href="#">Privacy Policy</a>
              </li>
              <li class="footer-widget-menu-list">
                <a href="#">Compare</a>
              </li>
              <li class="footer-widget-menu-list">
                <a href="#">Frequently</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="footer-widget text-ofwhite ">
          <h2 class="footer-widget-title mb-30">Instagram</h2>
          <div class="footer-instagram">
            <div class="footer-instagram-list d-flex">
              <div class="instagram-thumbnail">
                <a class="instagram-thumbnail-img" target="_blank" href="https://www.instagram.com/p/CZkF3TLBTT7">
                  <img src="/customer/assets/img/instagram1.webp" alt="instagram">
                </a>
              </div>
              <div class="instagram-thumbnail">
                <a class="instagram-thumbnail-img" target="_blank" href="https://www.instagram.com/p/CZkF60sBxhN">
                  <img src="/customer/assets/img/instagram2.webp" alt="instagram">
                </a>
              </div>
              <div class="instagram-thumbnail">
                <a class="instagram-thumbnail-img" target="_blank" href="https://www.instagram.com/p/CZkF90ZB6HG">
                  <img src="/customer/assets/img/instagram3.webp" alt="instagram">
                </a>
              </div>
            </div>
            <div class="footer-instagram-list d-flex">
              <div class="instagram-thumbnail">
                <a class="instagram-thumbnail-img" target="_blank" href="https://www.instagram.com/p/CZkGAe6BQeu">
                  <img src="/customer/assets/img/instagram4.webp" alt="instagram">
                </a>
              </div>
              <div class="instagram-thumbnail">
                <a class="instagram-thumbnail-img" target="_blank" href="https://www.instagram.com/p/CZkGCWcBbv9">
                  <img src="/customer/assets/img/instagram5.webp" alt="instagram">
                </a>
              </div>
              <div class="instagram-thumbnail">
                <a class="instagram-thumbnail-img" target="_blank" href="https://www.instagram.com/p/CZkGFDMhoid">
                  <img src="/customer/assets/img/instagram6.webp" alt="instagram">
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="footer-widget text-ofwhite">
          <h2 class="footer-widget-title mb-30">Newsletter</h2>
          <div class="footer-widget-inner">
            <p class="footer-widget-desc text-ofwhite m-0">Fill their seed open meat. Sea you great <br> Saw image stl
            </p>
            <div class="newsletter-subscribe">
              <form class="newsletter-subscribe-form" action="#">
                <label>
                  <input class="newsletter-subscribe-input" placeholder="Email Address" type="email">
                </label>
                <button class="newsletter-subscribe-button" type="submit">Subscribe</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom d-flex justify-content-between align-items-center">
        <p class="copyright-content text-ofwhite m-0">
          Copyright © 2022 <a href="/">Stable</a> . All Rights Reserved.Design By Stable
        </p>
        <div class="footer-payment text-right">
          <img class="" src="/customer/assets/img/payment-visa-card.png" alt="visa-card">
        </div>
      </div>
    </div>
  </footer>

  <!-- JS -->
  <script src="/customer/assets/js/bootstrap.min.js"></script>
  <script src="/customer/assets/js/swiper-bundle.min.js"></script>
  <script src="/customer/assets/js/jquery-3.6.1.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.js"></script>
  <script src="/customer/assets/js/script.js"></script>
</body>

</html>