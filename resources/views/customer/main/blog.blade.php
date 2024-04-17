@extends('customer.layout.master')

@section('title', 'Blog' )

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
                                <a class="blog__thumbnail--link" href="#detail"><img class="blog__thumbnail--img" src="{{asset("/image/$blog->thump")}}" alt="blog-img"></a>
                            </div>
                            <div class="blog__content">
                                <span class="blog__content--meta">{{$blog->update_at}}</span>
                                <h3 class="blog__content--title"><a href="#detail">{{$blog->title}}</a></h3>
                                <a class="blog__content--btn primary__btn" href="#detail">Read more </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!-- End blog section -->

@endsection