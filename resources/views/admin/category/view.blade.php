@extends('admin.layout.master')

@section('title', 'View Category')

@section('body')
    <div class="details details2">
    @include('admin.component.alert')
        <div class="recentOrders">
        
            <div class="cardHeader">
                <h2>Category List</h2>
                <a href="/admin/category/create" class="btn btn2">
                    <span class="icon"><ion-icon name="add-circle-outline"></ion-icon></span>
                    <span class="title">Create New Category</span>
                </a>
            </div>
            <table>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Category Name</td>
                        <td>Category</td>
                        <td>Active</td>
                        <td>Update</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $categories as $category)
                    <tr>
                        <td>#{{ $category->id }}</td>
                        <td>{{ $category->categoryname }}</td>
                        <td>{{ $category->parent_id }}</td>
                        <td>{{ active($category->active) }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td class="d-flex justify-content-end">
                            <a href="/admin/category/edit/{{$category->id}}" class="btn mr-10">Edit</a>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDeleteCategory-{{$category->id}}">Delete</button>
                            <div class="modal fade" id="modalDeleteCategory-{{$category->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                                tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalToggleLabel">Confirm</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-start">
                                            <strong>Are you sure you want to delete <span class="text-danger">{{$category->categoryname}}</span> category?</strong>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btnNo" data-bs-dismiss="modal">No</button>
                                            <form action="/admin/category/delete/{{$category->id}}" method="POST">
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