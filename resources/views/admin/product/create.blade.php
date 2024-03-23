@extends('admin.layout.master')

@section('title','Create New Product')

@section('body')

    <div class="details details2">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Add New Product</h2>
            </div>
            <form class="formProduct" action="/admin/product/store" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="row justify-content-center">
                    <div class="col-9">
                        
                        <div class="form-group">
                            <label for="productName">Product Name
                                <span class="text-danger">*</span>
                            </label>
                            <input class="form-control" name="productname" type="text" placeholder="Name Product" id="productName" required>
                            <div class="invalid-feedback">Please type product name</div>
                        </div>
                        
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="category">Category
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select" name="category_id" id="category" required>
                                        <option selected disabled value="">--- Choose Category ---</option>
                                        <?php showCategories($categories) ?>
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
                                        <option selected disabled value="">--- Choose Brand ---</option>
                                        @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brandname }}</option>
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
                                    <input class="form-control" name="price" type="number" placeholder="0" min="0" id="price" required>
                                <div class="invalid-feedback">Please type price</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="discount">Price Sale</label>
                                    <input type="number" name="price_sale" placeholder="0" id="discount">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="price">SKU
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" name="sku" type="text" placeholder="SKU" required>
                                <div class="invalid-feedback">Please type price</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="featured">Featured</label>
                                    <select name="featured" id="featured">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="trending">Trending</label>
                                    <select name="trending" id="trending">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                <div class="invalid-feedback">Please type price</div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="newarrival">New Arrival</label>
                                    <select name="newarrival" id="newarrival">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description
                                <span class="text-danger">*</span>
                            </label>
                            <textarea name="description" id="description" cols="30" rows="10" ></textarea>
                            <div class="invalid-feedback">Please type product description </div>
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
                        <button type="submit" class="btn btnAdd mt-30" data-bs-toggle="modal" >Add Product</button>
                    </div>
                </div>
                
            </form>
        </div>

    </div>

@endsection
