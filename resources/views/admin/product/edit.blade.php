@extends('admin.layout.master')

@section('title','Edit Product')

@section('body')

    <div class="details details2">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Eidt Product #{{ $product->id}}</h2>
            </div>
            <form class="formProduct" action="/admin/product/edit/{{$product->id}}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="row justify-content-center">
                    <div class="col-9">
                        <div class="form-group">
                            <label for="productName">Product Name
                                <span class="text-danger">*</span>
                            </label>
                            <input class="form-control" value="{{ $product->productname}}" name="productname" type="text" placeholder="Name Product" id="productName" required>
                            <div class="invalid-feedback">Please type product name</div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="category">Category
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select" name="category_id" id="category" required>
                                        <option disabled value="">--- Choose Category ---</option>
                                        <?php 
                                            showCategories($categories, 0, '', $product->category_id);
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">Please choose a category</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="brand">Brand
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select" name="brand_id" id="brand" required>
                                        <option value="">--- Choose Brand ---</option>
                                        @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->brandname }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Please choose a brand</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="price">Price
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" value="{{$product->price}}" name="price" type="number" placeholder="0" min="0" id="price" required>
                                <div class="invalid-feedback">Please type price</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="discount">Price Sale</label>
                                    <input type="number" value="{{$product->price_sale}}" name="price_sale" placeholder="0" id="discount">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="price">SKU
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" value="{{$product->sku}}" name="sku" type="text" placeholder="SKU" required>
                                <div class="invalid-feedback">Please type price</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="featured">Featured</label>
                                    <select name="featured" id="featured">
                                        <option value="0" {{ $product->featured == 0 ? 'selected' : '' }}>No</option>
                                        <option value="1" {{ $product->featured == 1 ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="trending">Trending</label>
                                    <select name="trending" id="trending">
                                        <option value="0" {{ $product->trending == 0 ? 'selected' : '' }}>No</option>
                                        <option value="1" {{ $product->trending == 1 ? 'selected' : '' }}>Yes</option>
                                    </select>
                                <div class="invalid-feedback">Please type price</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="newarrival">New Arrival</label>
                                    <select name="newarrival" id="newarrival">
                                        <option value="0" {{ $product->newarrival == 0 ? 'selected' : '' }}>No</option>
                                        <option value="1" {{ $product->newarrival == 1 ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description
                                <span class="text-danger">*</span>
                            </label>
                            <textarea name="description" id="description" cols="30" rows="10" >{{$product->description}}</textarea>
                            <div class="invalid-feedback">Please type product description </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Image 1</label>
                                    <input value="{{$product->image_1}}" class="form-control" type="file" name="imageProduct_1" id="image_1" onchange="previewImg(this,'product-detail-img1')">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <img id="product-detail-img1" class="img-product-detail" src="{{$product->image_1}}" alt="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Image 2</label>
                                    <input value="{{$product->image_2}}" class="form-control" type="file" name="imageProduct_2" id="image_2" onchange="previewImg(this,'product-detail-img2')">
                                </div>
                                <div class="d-flex justify-content-center">
                                    <img id="product-detail-img2" class="img-product-detail" src="{{$product->image_2}}" alt="">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btnAdd" data-bs-toggle="modal" >Save</button>
                    </div>
                </div>
                
            </form>
        </div>

    </div>

@endsection
