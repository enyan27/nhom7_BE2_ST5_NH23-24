// Load Avatar

function previewImg(fileInput, showImg){
  if(fileInput.files && fileInput.files[0]){
      const reader = new FileReader();
      
      reader.onload = (e) =>{ 
          document.getElementById(showImg).setAttribute('src', e.target.result)
      }
      reader.readAsDataURL(fileInput.files[0]);
  }
}

// Best Seller - Slide Product

var swiperProduct = new Swiper(".product-swiper", {
    slidesPerView: 5,
    spaceBetween: 30,
    freeMode: true,
    // pagination: {},
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    loop: true,
});

// Blog

var swiperBlog = new Swiper(".blog-swiper", {
    slidesPerView: 4,
    spaceBetween: 30,
    freeMode: true,
    // pagination: {},
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    loop: true,
});

const toggler = document.querySelectorAll(".widget-categories-menu-label");
var check = -1;

toggler.forEach((item, index) => {
  item.onclick = function () {

    if (document.querySelector(".widget-categories-menu-list.active") != null) {
      document.querySelector(".widget-categories-menu-list.active").classList.remove("active");
    }
    
    if (document.querySelector(".widget-categories-sub-menu.d-block") != null) {
      document.querySelector(".widget-categories-sub-menu.d-block").classList.remove("d-block");
    }


    if (check != index || check == -1) {
      this.parentElement.classList.add("active");
      this.parentElement.querySelector(".widget-categories-sub-menu").classList.add("d-block");

      check = index;
    } else if (check == index) {
      this.parentElement.classList.remove("active");
      this.parentElement.querySelector(".widget-categories-sub-menu").classList.remove("d-block");

      check = -1;
    }
  };
});

const elements = document.querySelectorAll(".pagination-item");

elements.forEach((item) => {
  item.onclick = function () {
    if(document.querySelectorAll(".pagination-item.pagination-item-current") !=null){
      document.querySelector(".pagination-item.pagination-item-current").classList.remove("pagination-item-current");
    }
    else{
      this.classList.add(".pagination-item-current");
    }
  };
});

// Product details
// Product-preview

var swiperPMNav = new Swiper(".product-media-nav", {
  loop: true,
  spaceBetween: 10,
  slidesPerView: 5,
  freeMode: true,
  watchSlidesProgress: true
});

var swiperPMPreview = new Swiper(".product-media-preview", {
  loop: true,
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  },
  thumbs: {
    swiper: swiperPMNav
  }
});
// You may also like - Slide Product
var swiperProduct = new Swiper(".product-swiper2", {
  slidesPerView: 4,
  spaceBetween: 30,
  freeMode: true,
  // pagination: {},
  navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  loop: true,
});



//Count Up Number -- About Us Page

let valueDisplays = document.querySelectorAll(".js-counter");
let time = 4000;

valueDisplays.forEach((valueDisplay) => {
  let startValue = 0;
  let endValue = parseInt(valueDisplay.getAttribute("data-count"));
  let duration = Math.floor (time / endValue);
  let counter = setInterval (function () {
    startValue += 1;
    valueDisplay.textContent = startValue;
    if (startValue == endValue){
      clearInterval(counter);
    }
  }, duration);
});

// Ajax setup
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(document).ready( function(){

  // Get link reset password 
  $(".getlink-btn").click(function(e){
    e.preventDefault();

    const email = $('input[name=email]').val()
    const token = $('meta[name="csrf-token"]').attr('content')

    $.ajax({
      type: 'POST',
      url: '/forgot-password',
      data: { token:token, email: email},
      success:function(result){
        
        const element = $('.account-login-inner')

        if(result == true){
          element.find('input').hide()
          $('.account-login-header p').text('An email has been sent to your email address. Follow the instructions in the email to reset your password.')
          element.html('<a href="/login" style="width: 100%; border-radius: 5px;" class="primary-btn text-center">Back To Login</a>')
        }
        else{
          element.find('input').css('border','1px solid red')
          element.find('p').removeAttr('hidden')
        }
      },
      error:function(){
        createNotify('error','ERROR!')
      }
    })
  })
})

// Create Notify
function createNotify(status,title){
  new Notify({
    status: status,
    title: title,
    // text: '',
    effect: 'fade',
    speed: 300,
    showIcon: true,
    showCloseButton: true,
    autoclose: true,
    autotimeout: 3000,
    gap: 20,
    distance: 20,
    type: 1,
    position: 'right top'
  })
}



// Update Order Status
function updateStatus(order_id, status){

  $.ajax({
    type: 'POST',
    url: '/my-account/order/updateOrderStatus',
    data: {order_id:order_id, status:status},
    success:function(result){
      const orderRow = $('#ord-'+ order_id)
      const statusCol = orderRow.children('td:nth-child(4)')
      console.log(statusCol)
      // return = 4
      if(status == 4){
        statusCol.html('<span class="status cancel">Cancel</span>')
        orderRow.find('.btn.cancel').hide();
        createNotify('success', 'Order has been cancelled!' )
      }
      // delivered = 2
      else if(status == 2){
        statusCol.html('<span class="status delivered">Delivered</span>')
        orderRow.find('.btn.return').hide();
        orderRow.find('.btn.received').hide();
        createNotify('success', 'Order has been received!' )
        orderRow.children('td:nth-child(3)').text('Paid')
      }
      //return = 3
      else{
        statusCol.html('<span class="status return">Return</span>')
        orderRow.find('.btn.return').hide();
        orderRow.find('.btn.received').hide();
        createNotify('success', 'Order has been returned!' )
      }
    },
    error:function(){
      createNotify('error', 'Update order failed!' )
    }
  })
}