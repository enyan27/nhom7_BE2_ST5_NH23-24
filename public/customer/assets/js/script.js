// Load Avatar

function previewImg(fileInput, showImg) {
    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = (e) => {
            document
                .getElementById(showImg)
                .setAttribute("src", e.target.result);
        };
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
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
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
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    loop: true,
});

const toggler = document.querySelectorAll(".widget-categories-menu-label");
var check = -1;

toggler.forEach((item, index) => {
    item.onclick = function () {
        if (
            document.querySelector(".widget-categories-menu-list.active") !=
            null
        ) {
            document
                .querySelector(".widget-categories-menu-list.active")
                .classList.remove("active");
        }

        if (
            document.querySelector(".widget-categories-sub-menu.d-block") !=
            null
        ) {
            document
                .querySelector(".widget-categories-sub-menu.d-block")
                .classList.remove("d-block");
        }

        if (check != index || check == -1) {
            this.parentElement.classList.add("active");
            this.parentElement
                .querySelector(".widget-categories-sub-menu")
                .classList.add("d-block");

            check = index;
        } else if (check == index) {
            this.parentElement.classList.remove("active");
            this.parentElement
                .querySelector(".widget-categories-sub-menu")
                .classList.remove("d-block");

            check = -1;
        }
    };
});

const elements = document.querySelectorAll(".pagination-item");

elements.forEach((item) => {
    item.onclick = function () {
        if (
            document.querySelectorAll(
                ".pagination-item.pagination-item-current"
            ) != null
        ) {
            document
                .querySelector(".pagination-item.pagination-item-current")
                .classList.remove("pagination-item-current");
        } else {
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
    watchSlidesProgress: true,
});

var swiperPMPreview = new Swiper(".product-media-preview", {
    loop: true,
    spaceBetween: 10,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
        swiper: swiperPMNav,
    },
});
// You may also like - Slide Product
var swiperProduct = new Swiper(".product-swiper2", {
    slidesPerView: 4,
    spaceBetween: 30,
    freeMode: true,
    // pagination: {},
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    loop: true,
});

// Increase and Decrease -- Product detail Page

const increase = document.querySelectorAll(".increase"),
    decrease = document.querySelectorAll(".decrease");

increase.forEach((item) => {
    item.onclick = function () {
        const input = this.parentNode.children[1];
        if (input.value < input.max) {
            input.value = parseInt(input.value) + 1;
        }
        // Kiểm tra nếu số lượng == max thì disable nút +
        if (input.value == input.max) {
            item.disabled = true;
        }
        // Khi tăng số lượng, nút - sẽ được enable
        if (input.value > 0) {
            this.parentNode.children[0].disabled = false;
        }
    };
});

decrease.forEach((item) => {
    item.onclick = function () {
        const input = this.parentNode.children[1];
        if (input.value > 1) {
            input.value = parseInt(input.value) - 1;
        }
        // Kiểm tra nếu số lượng <= 1 thì disable nút -
        if (input.value <= 1) {
            item.disabled = true;
        }
        // Khi giảm số lượng, nút + sẽ được enable
        if (input.value < input.max) {
            this.parentNode.children[2].disabled = false;
        }
    };
});

// Increase and Decrease -- Cart Page

const decreaseCart = document.querySelectorAll(".decrease.cart"),
    increaseCart = document.querySelectorAll(".increase.cart");

increaseCart.forEach((item) => {
    item.onclick = function () {
        const input = this.parentNode.children[1];
        var num = parseInt(input.value) + 1;
        input.value = num;

        // update cart
        var newVal = input.value;
        var cartItem_id = $(this).attr("data-id");
        updateCart(cartItem_id, newVal);
    };
});

decreaseCart.forEach((item) => {
    item.onclick = function () {
        const input = this.parentNode.children[1];
        if (parseInt(input.value) > 1) {
            var num = parseInt(input.value) - 1;
            input.value = num;
        } else {
            input.value = 0;
        }
        // update cart
        var newVal = input.value;
        var cartItem_id = $(this).attr("data-id");
        updateCart(cartItem_id, newVal);
    };
});

//Count Up Number -- About Us Page

let valueDisplays = document.querySelectorAll(".js-counter");
let time = 4000;

valueDisplays.forEach((valueDisplay) => {
    let startValue = 0;
    let endValue = parseInt(valueDisplay.getAttribute("data-count"));
    let duration = Math.floor(time / endValue);
    let counter = setInterval(function () {
        startValue += 1;
        valueDisplay.textContent = startValue;
        if (startValue == endValue) {
            clearInterval(counter);
        }
    }, duration);
});

// Ajax setup
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

$(document).ready(function () {
    $(".getColor").change(function () {
        var color = $(this).val();
        var product_id = $(".product_id").val();

        $.ajax({
            url: "/get-size",
            data: { color: color, product_id: product_id },
            type: "POST",
            success: function (result) {
                arr_size = [];
                result.forEach((item) => {
                    arr_size.push(item.size);
                });

                var size = `<legend class="product-variant-title mb-8">Select Size :</legend>`;
                var default_size = ["XS", "S", "M", "L", "XL", "XXL"];

                for (var i = 0; i < default_size.length; i++) {
                    console.log($.inArray(default_size[i], arr_size));

                    if ($.inArray(default_size[i], arr_size) != -1) {
                        size += `<input class="visually-hidden product-size" value="${default_size[i]}" type="radio" name="size" id="${default_size[i]}-size">
                  <label class="variant-size-value" for="${default_size[i]}-size">${default_size[i]}</label>`;
                    } else {
                        size += `<input class="visually-hidden product-size" value="${default_size[i]}" type="radio" name="size" id="${default_size[i]}-size" disabled>
                  <label class="variant-size-value disable-m" for="${default_size[i]}-size">${default_size[i]}</label>`;
                    }
                }
                $("#test").html(size);
            },
            error: function () {
                alert("ERROR");
            },
        });
    });

    // Add to cart

    $(".quickview-cart-btn").click(function (e) {
        e.preventDefault();

        var product_id = $(".product_id").val();
        var size = $(".product-size:checked").val();
        var color = $(".getColor:checked").val();
        var quantity = $(".quantity-number").val();

        $.ajax({
            url: "/add-to-cart",
            data: {
                product_id: product_id,
                size: size,
                color: color,
                quantity: quantity,
            },
            type: "POST",
            success: function (result) {
                if (result == false) {
                    window.location.href = "/login";
                } else if (result == "error") {
                    createNotify("error", "Exceeded the number of products!");
                } else {
                    $(".mycart").text(result);
                    createNotify("success", "Product added to cart");
                }
            },
            error: function () {
                createNotify("error", "Add to cart failed");
            },
        });
    });
    // Get link reset password
    $(".getlink-btn").click(function (e) {
        e.preventDefault();

        const email = $("input[name=email]").val();
        const token = $('meta[name="csrf-token"]').attr("content");

        $.ajax({
            type: "POST",
            url: "/forgot-password",
            data: { token: token, email: email },
            success: function (result) {
                const element = $(".account-login-inner");

                if (result == true) {
                    element.find("input").hide();
                    $(".account-login-header p").text(
                        "An email has been sent to your email address. Follow the instructions in the email to reset your password."
                    );
                    element.html(
                        '<a href="/login" style="width: 100%; border-radius: 5px;" class="primary-btn text-center">Back To Login</a>'
                    );
                } else {
                    element.find("input").css("border", "1px solid red");
                    element.find("p").removeAttr("hidden");
                }
            },
            error: function () {
                createNotify("error", "ERROR!");
            },
        });
    });
});

// Create Notify

function createNotify(status, title) {
    new Notify({
        status: status,
        title: title,
        // text: '',
        effect: "fade",
        speed: 300,
        showIcon: true,
        showCloseButton: true,
        autoclose: true,
        autotimeout: 3000,
        gap: 20,
        distance: 20,
        type: 1,
        position: "right top",
    });
}

// Remove Cart

function removeCart(cartItem_id) {
    $.ajax({
        type: "POST",
        url: "/remove-cart",
        data: { cartItem_id: cartItem_id },
        success: function (result) {
            $(".mycart").text(result["count"]);
            $(".subTotal").text("$" + result["subTotal"].toFixed(2));
            $(".grandTotal").text("$" + result["subTotal"].toFixed(2));

            var cart_tbody = $(".cart-table-inner tbody");
            var cart_exist = cart_tbody.find(".cartItem_id-" + cartItem_id);
            cart_exist.remove();

            createNotify("success", "Cart deleted successfully");
        },
        error: function () {
            createNotify("error", "Delete cart failed");
        },
    });
}

// Update cart

function updateCart(cartItem_id, quantity) {
    $.ajax({
        type: "POST",
        url: "/update-cart",
        data: { cartItem_id: cartItem_id, quantity: quantity },
        success: function (result) {
            const cart_tbody = $(".cart-table-inner tbody");
            const cart_exist = cart_tbody.find(".cartItem_id-" + cartItem_id);

            if (result == false) {
                $(".quantity-number").val(quantity - 1);
                createNotify("error", "Exceeded the number of products!");
            } else {
                if (quantity == 0) {
                    cart_exist.remove();
                } else {
                    cart_exist
                        .find(".cart-price.end")
                        .text("$" + (result["price"] * quantity).toFixed(2));
                }

                $(".mycart").text(result["count"]);
                $(".cart-summary-footer-btn.checkout").attr(
                    "data-qty",
                    result["count"]
                );
                $(".subTotal").text("$" + result["subTotal"].toFixed(2));
                $(".grandTotal").text("$" + result["subTotal"].toFixed(2));

                createNotify("success", "Cart updated successfully");
            }
        },
        error: function () {
            createNotify("error", "Update cart failed");
        },
    });
}

// Clear cart

function clearCart() {
    $.ajax({
        type: "POST",
        url: "/clear-cart",
        data: {},
        success: function (result) {
            var cart_tbody = $(".cart-table-inner tbody");
            cart_tbody.children().remove();
            $(".mycart").text(0);
            $(".subTotal").text("$0.00");
            $(".grandTotal").text("$0.00");
            $(".cart-summary-footer-btn.checkout").attr("data-qty", 0);
            createNotify("success", "Cart deleted successfully");
        },
        error: function () {
            createNotify("error", "Clear cart failed");
        },
    });
}
// Add Wish List
function addWishList(product_id) {
    $.ajax({
        url: "/add-to-wishlist",
        data: {
            product_id: product_id,
        },
        type: "POST",
        success: function (result) {
            $(".wish-list").text(result);

            // Button add WishList on Product Item
            var btnAdd = $(".add-to-wishlist." + product_id);
            btnAdd.attr("onclick", "removeWishList(" + product_id + ")");
            btnAdd.addClass("added");

            // Button add WishList on Product Detail
            var btnAdd_PD = $(".variant-wishlist-btn." + product_id);
            btnAdd_PD.attr("onclick", "removeWishList(" + product_id + ")");
            btnAdd_PD.addClass("added");
            btnAdd_PD.children("span").text("Added to wishlist");

            createNotify("success", "Product added to wishlist");
        },
        error: function () {
            window.location.href = "/login";
        },
    });
}

// Remove Wish List
function removeWishList(product_id) {
    $.ajax({
        url: "/remove-wishlist",
        data: {
            product_id: product_id,
        },
        type: "POST",
        success: function (result) {
            $(".wish-list").text(result);

            //Button add WishList on Product Item
            btnAdd = $(".add-to-wishlist." + product_id);
            btnAdd.attr("onclick", "addWishList(" + product_id + ")");
            btnAdd.removeClass("added");
            // btnAdd.children("span").text("Add to wishlist");

            // Button add WishList on Product Detail
            var btnAdd_PD = $(".variant-wishlist-btn." + product_id);
            btnAdd_PD.attr("onclick", "addWishList(" + product_id + ")");
            btnAdd_PD.removeClass("added");
            btnAdd_PD.children("span").text("Add to wishlist");

            // Remove row in table
            var wishList_tbody = $(".cart-table-inner tbody");
            var wish_list = wishList_tbody.find(".prodId-" + product_id);
            wish_list.remove();

            createNotify("success", "Product removed from wishlist");
        },
        error: function () {
            createNotify("error", "Remove product failed!");
        },
    });
}

// Notify Cart

var checkoutBtn = $(".cart-summary-footer-btn.checkout");
checkoutBtn.click(function () {
    var count_cart = $(this).attr("data-qty");
    if (count_cart == 0) {
        createNotify(
            "error",
            "Your shopping cart must have least one product!"
        );
    } else {
        window.location.href = "/checkout";
    }
});

// Update Order Status
function updateStatus(order_id, status) {
    $.ajax({
        type: "POST",
        url: "/my-account/order/updateOrderStatus",
        data: { order_id: order_id, status: status },
        success: function (result) {
            const orderRow = $("#ord-" + order_id);
            const statusCol = orderRow.children("td:nth-child(4)");
            console.log(statusCol);
            // return = 4
            if (status == 4) {
                statusCol.html('<span class="status cancel">Cancel</span>');
                orderRow.find(".btn.cancel").hide();
                createNotify("success", "Order has been cancelled!");
            }
            // delivered = 2
            else if (status == 2) {
                statusCol.html(
                    '<span class="status delivered">Delivered</span>'
                );
                orderRow.find(".btn.return").hide();
                orderRow.find(".btn.received").hide();
                createNotify("success", "Order has been received!");
                orderRow.children("td:nth-child(3)").text("Paid");
            }
            //return = 3
            else {
                statusCol.html('<span class="status return">Return</span>');
                orderRow.find(".btn.return").hide();
                orderRow.find(".btn.received").hide();
                createNotify("success", "Order has been returned!");
            }
        },
        error: function () {
            createNotify("error", "Update order failed!");
        },
    });
}

// Customer's Reviews
$(document).ready(function () {
    $(".star").on("click", function () {
        var rating = $(this).data("rating");
        $("#ratingValue").val(rating);
        $(".star").removeClass("selected");
        $(this).addClass("selected");
        $(this).prevAll(".star").addClass("selected");
    });

    $("#ratingFormAjax").on("submit", function (e) {
        e.preventDefault();

       
            // Lấy giá trị số sao đã chọn
        var rating = $("#ratingValue").val();

        var user_name = $("#user_name").val();

        // Lấy thời gian hiện tại
        var currentDate = new Date();

        // Định dạng ngày theo dd/mm/yyyy
        var formattedDate = currentDate.toLocaleDateString("vi-VN", {
            day: "2-digit",
            month: "2-digit",
            year: "numeric",
        });

        // Gán giá trị created_at cho trường input ẩn
        $("#created_at_input").val(formattedDate);

        // Thêm giá trị số sao vào dữ liệu gửi
        var formData = $(this).serialize() + "&rating=" + rating;

        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: formData,
            success: function (response) {
                // Xử lý dữ liệu trả về từ backend
                var newReview = response.review;
                var newCommentHTML = `
                  <div class="row mt-4">
                      <div class="col-lg-2">
                          <div class="review-info">
                              <p class="review-author">${user_name}</p>
                              <p class="review-date">Date: ${formattedDate}</p>
                          </div>
                      </div>
                      <div class="col-lg-10">
                          <div class="review-content">
                              <p class="review-rating">Đánh giá: ${getStars(
                                  newReview.rating
                              )}</p>
                              <p class="review-comment">${newReview.comment}</p>
                          </div>
                      </div>
                  </div>`;

                // Thêm bình luận mới vào phần hiển thị bình luận
                $(".new-comment").prepend(newCommentHTML);

                // Reset nội dung của ô bình luận
                $("#comment").val("");
                // Xóa lớp "selected" khỏi tất cả các sao
                $(".star").removeClass("selected");

                // Gửi yêu cầu AJAX để tính toán số sao trung bình
                // updateAverageRating();

                var totalStars = 0;
                var totalReviews = $(".review-rating").length;
                $(".review-rating").each(function () {
                    var starCount = $(this).find(".star").length;
                    totalStars += starCount;
                });
                if (totalReviews > 0) {
                    var averageRating = totalStars / totalReviews;
                    $("#averageRating").text(
                        "Số sao trung bình: " + averageRating.toFixed(2)
                    );
                } else {
                    $("#averageRating").text("Chưa có đánh giá");
                }
            },
            error: function (xhr, status, error) {
                var errors = xhr.responseJSON.errors;
                if (errors && errors.comment) {
                    $("#commentError").text(errors.comment[0]);
                }
            },
        });
        
    });

    // Hàm chuyển đổi số sao thành biểu tượng sao
    function getStars(rating) {
        var stars = "";
        for (var i = 1; i <= 5; i++) {
            if (i <= rating) {
                stars += '<span class="star selected">&#9733;</span>'; // Dấu sao đầy
            }
        }
        return stars;
    }

    // Hàm gửi yêu cầu AJAX để tính toán số sao trung bình
    function updateAverageRating() {
        $.ajax({
            type: "POST",
            url: "/calculate-average-rating", // Đường dẫn đến route xử lý tính toán số sao trung bình
            data: $("#ratingFormAjax").serialize(),
            success: function (response) {
                // Cập nhật số sao trung bình trên giao diện người dùng
                $("#averageRating").text(
                    "Số sao trung bình: " + response.averageRating
                );
            },
            error: function (xhr, status, error) {
                // Xử lý lỗi nếu có
            },
        });
    }

    // Gọi hàm updateAverageRating() khi trang được tải
    // updateAverageRating();

    // Coupon
    function applyCoupon() {
        var couponCode = $(".coupon-code-field-input").val();
        $.ajax({
            type: "POST",
            url: "/apply-coupon",
            data: {
                coupon_code: couponCode,
            },
            success: function (response) {
                //alert(response.message);
                // Cập nhật tổng giảm giá và tổng cộng trong HTML
                $(".subTotal").text("$" + response.total);
                $(".grandTotal").text("$" + response.total);
            },
            error: function (xhr, status, error) {
                alert(xhr.responseJSON.error);
            },
        });
    }

    const btnCoupon = document.querySelector("#btn-coupon");
    btnCoupon.addEventListener("click", function () {
        applyCoupon();
    });
});
// TODO: - Test lai tat ca truong hop ajax
