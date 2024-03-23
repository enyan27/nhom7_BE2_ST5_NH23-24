//menu toggle
let toggle = document.querySelector('.toggle');
let navigation = document.querySelector('.navigation');
let main = document.querySelector('.main');

toggle.onclick = function(){
    navigation.classList.toggle('active');
    main.classList.toggle('active');
};

// Validation Form

(function () {
    'use strict'
    var formProducts = document.querySelectorAll('.formProduct')
  
    Array.prototype.slice.call(formProducts)
      .forEach(function (formProduct) {
        formProduct.addEventListener('submit', function (event) {
          if (!formProduct.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
          
          formProduct.classList.add('was-validated')
        }, false)
      })
  })()

// Add Variant



var dataVariants = []

function addVariant(){
    // var img1 = document.getElementById("productImg")
    // var img2 = document.getElementById("productImg2").files[0]
    var sku = document.getElementById("sku").value
    var color = document.getElementById("color").value
    var size = document.getElementById("size").value
    var quantity = document.getElementById("quantity").value

    var items ={
        // Img1:img1,
        // Img2:img2,
        Sku:sku,
        Color:color,
        Size:size,
        Quantity:quantity
    }
    dataVariants.push(items)
    renderVariant()
    cleanVariant()
}

function renderVariant(){
    var tableVariant = `<thead>
        <tr>
            <th>Product Images</th>
            <th>SKU</th>
            <th>Color</th>
            <th>Size</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
    </thead>`
    
    for (let i=0; i<dataVariants.length; i++){
        tableVariant += `<tbody>
            <tr>
                <td>
                    <img src="" id="imgProduct1-${dataVariants[i].Sku}">
                    <img src="" id="imgProduct2-${dataVariants[i].Sku}">
                </td>
                <td>${dataVariants[i].Sku}</td>
                <td>${dataVariants[i].Color}</td>
                <td>${dataVariants[i].Size}</td>
                <td>${dataVariants[i].Quantity}</td>
                <td>
                    <button type="button" class="btn" onclick="editVariant(${dataVariants[i].Sku})">Edit</button>
                    <button type="button" class="btn" data-bs-toggle="modal" href="#modalDeleteVariant-${dataVariants[i].Sku}">Delete</button>
                    <div class="modal fade" id="modalDeleteVariant-${dataVariants[i].Sku}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                        tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalToggleLabel">Confirm</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-start">
                                    <strong>Are you sure you want to do this?</strong>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btnNo" data-bs-dismiss="modal">No</button>
                                    <button type="button" class="btn" data-bs-target="#modalDeleteSuccess" data-bs-toggle="modal"
                                    data-bs-dismiss="modal" onclick="deleteVariant(${dataVariants[i].Sku})">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr> 
        </tbody>`
        idImg = dataVariants[i].Sku
    }
    document.querySelector(".tableVariant").innerHTML = tableVariant + ``
    readURL( document.getElementById("productImg1"), document.getElementById("imgProduct1-" + idImg))
    readURL( document.getElementById("productImg2"), document.getElementById("imgProduct2-" + idImg))
}
function readURL(input1, input2){
    const reader = new FileReader();
    reader.onload = (e) =>{
        input2.setAttribute('src', e.target.result)
    }
    reader.readAsDataURL(input1.files[0]);
}

function cleanVariant(){
    document.getElementById("sku").value = ""
    document.getElementById("color").value = ""
    document.getElementById("size").value = ""
    document.getElementById("quantity").value = "1"
}
function deleteVariant(sku){
    for (let i=0; i<dataVariants.length; i++){
        if(dataVariants[i].Sku == sku){
            dataVariants.splice(i, 1)

            renderVariant()
        }
    }
    
}

function previewImg(fileInput, showImg){
    if(fileInput.files && fileInput.files[0]){
        const reader = new FileReader();
        
        reader.onload = (e) =>{ 
            document.getElementById(showImg).setAttribute('src', e.target.result)
        }
        reader.readAsDataURL(fileInput.files[0]);
    }
}

// Action customer
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready( function(e){

    // Update Order Status
    var btnConfirms = $('.btn-confirm')

    $.each(btnConfirms, function(index, value){

        $(value).click(function(){
            var order_id = $(this).attr('data-id')

            $.ajax({
                type: 'POST',
                url: 'admin/order/confirm',
                data: {order_id:order_id},
                success:function(){

                    $("[data-id=" + order_id + "]").hide()
                    var status = $('#order-' + order_id).children()
                    status.removeClass("pending")
                    status.addClass("inprogress")
                    status.text("In Progress")
                    
                    createNotify('success', 'Order confirmation successfully!')
                },
                error:function(){
                    createNotify('error', 'Order confirmation failed!')
                }
            })
        })
    })
    
})

function action_customer(user_id){
    
    active = $('#customer_' + user_id).attr('data-active')

    $.ajax({
        type: 'POST',
        url: 'admin/customer/action',
        data: {user_id:user_id, active:active},
        success:function(result){

            var actionBtn = $('#customer_' + user_id)
            if(active == 0){
                actionBtn.addClass('btnOff')
                actionBtn.text('Lock')
                actionBtn.attr('data-active', 1)

                createNotify('success', 'Account locked successfully')
            }
            else{

                actionBtn.removeClass('btnOff')
                actionBtn.text('Active')
                actionBtn.attr('data-active', 0)

                createNotify('success', 'Account unlocked successfully')
            }

        },
        error:function(){
            createNotify('error', 'Failed Action')
        }
    })
}

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

 // Create chart
