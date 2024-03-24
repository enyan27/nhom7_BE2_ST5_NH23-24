@extends('admin.layout.master')

@section('title','Product List')

@section('body')
    @include('admin.component.alert')
    <div class="details details2">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Products Details List #{{$product->id}}</h2>
                <a href="admin/product/{{$product->id}}/detail/create" class="btn btn2">
                    <span class="icon"><ion-icon name="add-circle-outline"></ion-icon></span>
                    <span class="title">Create New Product Detail</span>
                </a>
            </div>
            <table>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Product Name</td>
                        <td>Color</td>
                        <td>Size</td>
                        <td>Quantity</td>
                        <td>Images</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                     @foreach($productDetails as $productDetail)
                     <tr>
                        <td>#{{$productDetail->id}}</td>
                        <td>{{$productDetail->product->productname}}</td>
                        <td>
                            {{$productDetail->color}} 
                        </td>
                        <td>{{$productDetail->size}}</td>
                        <td>{{$productDetail->quantity}}</td>
                        <td>
                            <img class="imgProduct" src="{{$productDetail->colorImg_1}}" alt="{{$productDetail->product->productname}}">
                        </td>
                        <td>
                            <a href="admin/product/{{$product->id}}/detail/edit/{{$productDetail->id}}" class="btn">Edit</a>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDeleteProductDetail-{{$productDetail->id}}">Delete</button>
                            <div class="modal fade" id="modalDeleteProductDetail-{{$productDetail->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                                tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalToggleLabel">Confirm</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-start">
                                            <strong>Are you sure you want to delete product detail <span class="text-danger">#{{$productDetail->id}}</span>?</strong>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btnNo" data-bs-dismiss="modal">No</button>
                                            <form action="/admin/product/{{$productDetail->product_id}}/detail/delete/{{$productDetail->id}}" method="POST">
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
        </div>
    </div>
@endsection