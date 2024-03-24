@extends('admin.layout.master')

@section('title','Create Product Details')

@section('body')
        
        <div class="details details2">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Create New Product Detail</h2>
                </div>
                <form class="formProduct" method="POST" action="admin/product/{{$product->id}}/detail/create/store" enctype="multipart/form-data"  novalidate>
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
                                <input disabled class="form-control"  name="productname" value="{{$product->productname}}" required>
                            </div>
                            <div class="form-group">
                                <label for="color">Color
                                    <span class="text-danger">*</span>
                                </label>
                                <input class="form-control" type="text" name="color" id="color" placeholder="Color" required>
                                @error('color')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="size">Size
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" name="size" id="size" required>
                                    <option selected disabled value="">--- Choose Size ---</option>
                                    <option value="XS">XS</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>
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
                                        <input class="form-control" type="file" name="imageProduct_1" id="image_1" onchange="previewImg(this,'product-detail-img1')" required>
                                    </div>    
                                    <div class="d-flex justify-content-center">
                                        <img id="product-detail-img1" class="img-product-detail" src="/storage/uploads/product/no_image.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Image 2</label>
                                        <input class="form-control" type="file" name="imageProduct_2" id="image_2" onchange="previewImg(this,'product-detail-img2')" required>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <img id="product-detail-img2" class="img-product-detail" src="/storage/uploads/product/no_image.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btnAdd btnSaveProfile mt-30 ">Create</button>
                        </div>
                    </div>
                    
                </form>
            </div>

        </div>
            
@endsection
