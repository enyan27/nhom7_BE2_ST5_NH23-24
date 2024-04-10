    <!-- Slide product  -->
    <!-- Start section best seller product -->
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
    <!-- End section best seller product -->