@extends('admin.layout.master')

@section('title', 'View Category')

@section('body')
    <div class="details details2">
        @if(session('success'))
            <div class="alert alert-success d-flex justify-content-between" role="alert">
                <strong>{{session('success')}}</strong>
            </div>
        @endif
        <div class="recentOrders">
        
            <div class="cardHeader">
                <h2>Brand List</h2>
                <a href="/admin/brand/create" class="btn btn2">
                    <span class="icon"><ion-icon name="add-circle-outline"></ion-icon></span>
                    <span class="title">Create New Brand</span>
                </a>
            </div>
            <table class="table-brand">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Brand Name</td>
                        <td>Description</td>
                        <td>Active</td>
                        <td>Update</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $brands as $brand)
                    <tr>
                        <td>#{{$brand->id }}</td>
                        <td>{{ $brand->brandname }}</td>
                        <td style="width: 500px">{{ $brand->description }}</td>
                        <td style="padding-left: 20px">{{ active($brand->active) }}</td>
                        <td>{{ $brand->updated_at }}</td>
                        <td class="d-flex justify-content-end">
                            <a href="/admin/brand/edit/{{$brand->id}}" class="btn mr-10">Edit</a>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDeleteBrand-{{$brand->id}}">Delete</button>
                            <div class="modal fade" id="modalDeleteBrand-{{$brand->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                                tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalToggleLabel">Confirm</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-start">
                                            <strong>Are you sure you want to delete <span class="text-danger">{{$brand->brandname}}</span> brand?</strong>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btnNo" data-bs-dismiss="modal">No</button>
                                            <form action="/admin/brand/delete/{{$brand->id}}" method="POST">
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
</div>
            
@endsection