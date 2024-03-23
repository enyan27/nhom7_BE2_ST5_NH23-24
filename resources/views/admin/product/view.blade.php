@extends('admin.layout.master')

@section('title','Product List')

@section('body')
    
    @include('admin.component.alert')
    <div class="details details2">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Products List</h2>
                <a href="admin/product/create" class="btn btn2">
                    <span class="icon"><ion-icon name="add-circle-outline"></ion-icon></span>
                    <span class="title">Create new product</span>
                </a>
            </div>
            <table>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Product Name</td>
                        <td>Category</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Created by</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>#{{$product->id}}</td>
                        <td class="d-flex align-items-center">
                            <div>
                                <img class="imgProduct" src="{{$product->image_1
                                ?? '/storage/uploads/product/no_image.jpg'}}" alt="{{$product->productname}}">
                            </div>
                            <div class="product-content-list">
                                <strong>{{ $product->productname}}</strong>
                                <div class="d-flex">
                                    <p>View: {{$product->view_count}}</p>
                                    <p style="margin-left: 10px">Sold: {{$product->sold}} </p>
                                </div>
                            </div>
                        </td>
                        <td>{{$product->category->categoryname}}</td>
                        <td>
                            <strong>${{ number_format($product->price_sale, 2)}}</strong>
                            <br>
                            <del>${{ number_format($product->price, 2)}}</del>
                        </td>
                        <td class="text-center">{{ $product->quantity }}</td>
                        <td class="text-center">{{$product->user->fullname}}</td>
                        <td>
                            <a href="/admin/product/{{$product->id}}" class="btn">Detail</a>
                            <a href="admin/product/edit/{{$product->id}}" class="btn">Edit</a>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDeleteProduct-{{$product->id}}">Delete</button>
                            <div class="modal fade" id="modalDeleteProduct-{{$product->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                                tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalToggleLabel">Confirm</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-start">
                                            <strong>Are you sure you want to delete <span class="text-danger">{{$product->productname}}</span> product ?</strong>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btnNo" data-bs-dismiss="modal">No</button>
                                            <form action="/admin/product/delete/{{$product->id}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn">Yes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr> 
                    @endforeach  
                </tbody>
            </table>
            {{$products->links()}}
        </div>
    </div>
@endsection