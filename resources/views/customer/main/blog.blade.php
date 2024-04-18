
<!-- @extends('customer.layout.master') -->

@section('title',  'Blog - Online Shopping' )

@section('body') 
 
     
<!-- Start breadcrumb section -->
<section class="breadcrumb__section breadcrumb__bg bg-warning">
    <div class="container">
        <div class="row row-cols-1">
            <div class="col">
                <div class="breadcrumb__content text-center">
                    <h1 class="breadcrumb__content--title text-white mb-25">Blog Grid</h1>
                    <ul class="breadcrumb__content--menu d-flex justify-content-center">
                        <li class="breadcrumb__content--menu__items"><a class="text-white" href="https://risingtheme.com/html/demo-suruchi-v1/suruchi/index.html">Home</a></li>
                        <li class="breadcrumb__content--menu__items"><span class="text-white">Blog Grid</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End breadcrumb section -->

<!-- Start blog section -->
<section class="blog__section section--padding">
    <div class="container">
        <div class="section__heading text-center mb-50">
            <h2 class="section__heading--maintitle">From The Blog</h2>
        </div>
        <div class="blog__section--inner">
            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-sm-u-2 row-cols-1 mb--n30">
                <?php foreach ($blogs as $blog) { ?>
                    <div class="col mb-30">
                        <div class="blog__items">
                            <div class="blog__thumbnail">
                                <a class="blog__thumbnail--link" href="{{url("blog/detail/$blog->id")}}"><img class="blog__thumbnail--img" src="{{asset("/image/$blog->thump")}}" alt="blog-img"></a>
                            </div>
                            <div class="blog__content">
                                <span class="blog__content--meta">{{$blog->update_at}}</span>
                                <h3 class="blog__content--title"><a href="{{url("blog/detail/$blog->id")}}">{{$blog->title}}</a></h3>
                                <a class="blog__content--btn primary__btn" href="{{url("blog/detail/$blog->id")}}">Read more </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        {{$blogs->links()}}
    </div>
</section>
<!-- End blog section -->


        <!-- Start shipping section -->
        <section class="shipping__section2 shipping__style3 section--padding pt-0">
            <div class="container">
                <div class="shipping__section2--inner shipping__style3--inner d-flex justify-content-between">
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="/customer/assets/img/shipping1.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Shipping</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="/customer/assets/img/shipping2.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Payment</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="/customer/assets/img/shipping3.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Return</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                    <div class="shipping__items2 d-flex align-items-center">
                        <div class="shipping__items2--icon">
                            <img src="/customer/assets/img/shipping4.png" alt="">
                        </div>
                        <div class="shipping__items2--content">
                            <h2 class="shipping__items2--content__title h3">Support</h2>
                            <p class="shipping__items2--content__desc">From handpicked sellers</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End shipping section -->
@endsection