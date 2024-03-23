<!DOCTYPE html>
<html>
    <head>
        <base href="/">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="/admin/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.css" />
        <link rel="stylesheet" type= "text/css" href="/admin/assets/css/style.css">
    </head>
    <body>
        <div class="myContainer">
            <div class="navigation">
                <ul>
                    <li> 
                        <a href="/admin/home">
                            <span class="icon"><ion-icon name="logo-xing"></ion-icon></span>
                            <span class="title" style="font-weight: 600; font-size: 30px;">STABLE</span>
                        </a>
                    </li>
                    <li class="{{(request()->segment(2) == 'home') ? 'hovered' : ''}}">
                        <a href="/admin/home">
                            <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li class="{{(request()->segment(2) == 'statistic') ? 'hovered' : ''}}" id="statistic">
                        <a href="./admin/statistic">
                            <span class="icon"><ion-icon name="bar-chart-outline"></ion-icon></span>
                            <span class="title">Statistics</span>
                        </a>
                    </li>
                    <li class="{{(request()->segment(2) == 'category') ? 'hovered' : ''}}">
                        <a href="./admin/category">
                            <span class="icon"><ion-icon name="reader-outline"></ion-icon></span>
                            <span class="title">Category</span>
                        </a>
                    </li>
                    <li class="{{(request()->segment(2) == 'product') ? 'hovered' : ''}}">
                        <a href="./admin/product">
                            <span class="icon"><ion-icon name="shirt-outline"></ion-icon></span>
                            <span class="title">Products</span>
                        </a>
                    </li>
                    <li  class="{{(request()->segment(2) == 'brand') ? 'hovered' : ''}}">
                        <a href="./admin/brand">
                            <span class="icon"><ion-icon name="cube-outline"></ion-icon></ion-icon></span>
                            <span class="title">Brand</span>
                        </a>
                    </li>
                    <li  class="{{(request()->segment(2) == 'customer') ? 'hovered' : ''}}">
                        <a href="./admin/customer">
                            <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                            <span class="title">Customers</span>
                        </a>
                    </li>
                    <li  class="{{(request()->segment(2) == 'order') ? 'hovered' : ''}}">
                        <a href="./admin/order">
                            <span class="icon"><ion-icon name="cart-outline"></ion-icon></span>
                            <span class="title">Orders</span>
                        </a>
                    </li>
                    <li  class="{{(request()->segment(2) == 'user') ? 'hovered' : ''}}">
                        <a href="./admin/user">
                            <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                            <span class="title">Employees</span>
                        </a>
                    </li>
                    <hr style="color: white">
                    <li  class="{{(request()->segment(2) == 'profile') ? 'hovered' : ''}}">
                        <a href="/admin/profile">
                            <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                            <span class="title">Profile</span>
                        </a>
                    </li>
                    <li  class="{{(request()->segment(2) == 'password') ? 'hovered' : ''}}">
                        <a href="admin/password">
                            <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                            <span class="title">Password</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- topbar -->
            <div class="main">
                <div class="topbar">
                    <div class="toggle">
                        <ion-icon name="menu-outline"></ion-icon>
                    </div>
                    <!-- search -->
                    <div class="search">
                        <label for="">
                            <input type="text" placeholder="Search here">
                            <ion-icon name="search-outline"></ion-icon>
                        </label>
                    </div>
                    <!-- user -->
                    <div class="user d-flex align-items-center ">
                        @if(Auth::check())
                        <div class="user-name">
                            <div class="user-name--inner">{{Auth::user()->fullname}}</div>
                            <form action="{{route ('logout')}}" method="POST">
                                @csrf
                                <button type="submit" class="user-logout">Log Out</button>
                            </form>
                        </div>
                        @endif
                        <div class="user-img">
                            <img src="{{Auth::user()->avatar ?? '/storage/uploads/user/no_avatar.png'}}">
                        </div>
                    </div>
                </div>

                <!-- Main Content  -->
                @yield('body')
            </div>

        </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.js"></script>
    <script src="admin/assets/js/bootstrap.min.js"></script>
    <script src="admin/assets/js/jquery-3.6.1.min.js"></script>
    <script src="admin/assets/js/ckeditor.js"></script>
    <script src="admin/assets/js/script.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    </body>
</html>