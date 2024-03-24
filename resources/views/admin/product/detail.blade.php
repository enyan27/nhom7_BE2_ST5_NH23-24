@extends('admin.layout.master')

@section('title','Product Detail')

@section('body')

    @include('admin.component.alert')
    <div class="details details2">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Product Information #{{$product->id}}</h2>
            </div>
            <div class="row formProduct justify-content-center">
                <div class="col-7" style="font-size: 20px;">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4 text-end">
                                <label>Product Image:</label>
                            </div>
                            <div class="col-8">
                                <div>
                                    <img class="product-detail-img" 
                                    src="{{$product->image_1?? '/storage/uploads/product/no_image.jpg'}}"  alt="{{$product->slug}}">
                                    <img class="product-detail-img" src="{{$product->image_2 ?? '/storage/uploads/product/no_image.jpg'}}" alt="{{$product->slug}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4 text-end">
                                <label>Product Details:</label>
                            </div>
                            <div class="col-8">
                                <a class="btn" href="admin/product/{{$product->id}}/detail">Manage details</a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4 text-end">
                                <label>Product Name:</label>
                            </div>
                            <div class="col-8">
                                <div >{{$product->productname}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4 text-end">
                                <label>Category:</label>
                            </div>
                            <div class="col-8">
                                <div >{{$product->category->categoryname}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4 text-end">
                                <label>Brand:</label>
                            </div>
                            <div class="col-8">
                                <div >{{$product->brand->brandname}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4 text-end">
                                <label>Price:</label>
                            </div>
                            <div class="col-8">
                                <div>${{$product->price}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4 text-end">
                                <label>Price Sale:</label>
                            </div>
                            <div class="col-8">
                                <div>${{$product->price_sale}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4 text-end">
                                <label>Quantity:</label>
                            </div>
                            <div class="col-8">
                                <div >{{$product->quantity}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4 text-end">
                                <label>SKU:</label>
                            </div>
                            <div class="col-8">
                                <div >{{$product->sku}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4 text-end">
                                <label>Featured:</label>
                            </div>
                            <div class="col-8">
                                <div >{{note($product->featured)}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4 text-end">
                                <label>Trending:</label>
                            </div>
                            <div class="col-8">
                                <div >{{note($product->trending)}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4 text-end">
                                <label>New Arrival:</label>
                            </div>
                            <div class="col-8">
                                <div >{{note($product->newarrival)}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4 text-end">
                                <label>Created By:</label>
                            </div>
                            <div class="col-8">
                                <div >{{$product->user->fullname}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4 text-end">
                                <label>Created At:</label>
                            </div>
                            <div class="col-8">
                                <div >{{$product->created_at}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4 text-end">
                                <label>Description:</label>
                            </div>
                            <div class="col-8">
                                <div> {!! $product->description !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
