@extends('admin.layout.master')

@section('title','Create Product Details')

@section('body')
        
<div class="details details2">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Create New Product Detail</h2>
        </div>
        <form class="formProduct" method="POST" action="admin/product/{{$product->id}}/detail/create/store" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="row justify-content-center">
                <div class="col-7">
                    @if(session('success'))
                    <div class="alert alert-success d-flex justify-content-between" role="alert">
                        <strong>{{session('success')}}</strong>
                        <a href="./admin/product/{{$product->id}}/detail">View Product Details List</a>
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="productname">Product Name</label>
                        <input disabled class="form-control" name="productname" value="{{$product->productname}}" required>
                    </div>

                    <div class="form-group">
                        <label for="quantity">Color Name
                            <span class="text-danger">*</span>
                        </label>
                        <input class="form-control" name="name" placeholder="Color Name" required>
                        @error('quantity')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="color">Color Value
                            <span class="text-danger">*</span>
                        </label>
                        <div style="display: flex; position: relative;">
                            <input value="#e8e8e8" style="height: 46px; width: 56px; position: absolute; z-index: 1;" class="form-control" type="color" name="colorPicker" id="colorPicker" placeholder="Color" required>
                            <input style="height: 46px; flex-grow: 1; padding-left: 68px;" class="form-control" type="text" name="color" id="color" placeholder="Color Value" required>
                        </div>
                        @error('color')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="size">Size
                            <span class="text-danger">*</span>
                        </label>
                        <input class="form-control" type="text" name="size" id="size" placeholder="Enter sizes separated by commas" required>
                        @error('size')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity
                            <span class="text-danger">*</span>
                        </label>
                        <input class="form-control" type="number" name="quantity" id="quantity" placeholder="0" min="0" required>
                        @error('quantity')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Image 1</label>
                                <input class="form-control" type="file" name="imageProduct_1" id="image_1" accept="image/*" onchange="validateImage(this); previewImg(this,'product-detail-img1')">
                            </div>    
                            <div class="d-flex justify-content-center">
                                <img id="product-detail-img1" class="img-product-detail" src="/storage/uploads/product/no_image.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Image 2</label>
                                <input class="form-control" type="file" name="imageProduct_2" id="image_2" accept="image/*" onchange="validateImage(this); previewImg(this,'product-detail-img2')">
                            </div>
                            <div class="d-flex justify-content-center">
                                <img id="product-detail-img2" class="img-product-detail" src="/storage/uploads/product/no_image.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btnAdd btnSaveProfile mt-30">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function validateImage(input) {
        const file = input.files[0];
        if (file) {
            const fileType = file['type'];
            const validImageTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/svg+xml'];
            if (!validImageTypes.includes(fileType)) {
                alert('Please select a valid image file (jpeg, png, jpg, gif, svg).');
                input.value = '';
            }
        }
    }

    function previewImg(input, imgId) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(imgId).src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
