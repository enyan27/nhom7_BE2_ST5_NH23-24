@extends('customer.layout.master')

@section('title',  'About Us' )

@section('body')

    <section class="about-section section-padding">
        <div class="my-container2">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-thumb d-flex">
                        <div class="about-thumb-items">
                            <img src="/customer/assets/img/about-thumb-list1.png" alt="about-thumb">
                        </div>
                        <div class="about-thumb-items">
                            <img src="/customer/assets/img/about-thumb-list2.png" alt="about-thumb">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content">
                        <span class="about-content-title mb-20"> Why Choose us</span>
                        <h2 class="mb-25">We do not buy from the open market & traders.</h2>
                        <p class="mb-20">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit illo, est
                            repellendus are quia voluptate neque reiciendis ea placeat labore maiores cum, hic
                            ducimus ad a dolorem soluta consectetur adipisci. Perspiciatis quas ab quibusdam is.</p>
                        <p class="mb-25">Itaque accusantium eveniet a laboriosam dolorem? Magni suscipit est corrupti explicabo non
                            perspiciatis, excepturi ut asperiores assumenda rerum? Provident ab corrupti sequi, voluptates repudiandae eius odit
                            aut.</p>
                    </div>
                    <div class="about-author d-flex align-items-center">
                        <div class="about-author-left">
                            <h4>Bruce Sutton</h4>
                            <span>CEO - Founder</span>
                        </div>
                        <img src="/customer/assets/img/sign.png" alt="signature">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="counterup-banner-section counterup-banner-bg">
        <div class="my-container2">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="counterup-banner-inner d-flex align-items-center justify-content-between">
                        <div class="counterup-banner-items text-center">
                            <h2 class="text-white">YEARS OF
                                <br>
                                FOUNDATION
                            </h2>
                            <span class="text-white js-counter" data-count="25">0</span>
                        </div>
                        <div class="counterup-banner-items text-center">
                            <h2 class="text-white">SKILLED TEAM
                                <br>
                                MEMBERS
                            </h2>
                            <span class="text-white js-counter" data-count="70">0</span>
                        </div>
                        <div class="counterup-banner-items text-center">
                            <h2 class="text-white">HAPPY
                                <br>
                                CUSTOMERS
                            </h2>
                            <span class="text-white js-counter" data-count="250">0</span>
                        </div>
                        <div class="counterup-banner-items text-center">
                            <h2 class="text-white">MONTHLY
                                <br>
                                ORDERS
                            </h2>
                            <span class="text-white js-counter" data-count="300">0</span>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection