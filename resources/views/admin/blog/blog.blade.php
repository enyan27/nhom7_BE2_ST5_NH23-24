@extends('admin.layout.master')

@section('title', 'View Blogs')

@section('body')
    <div class="details details2">
        @if(session('success'))
            <div class="alert alert-success d-flex justify-content-between" role="alert">
                <strong>{{session('success')}}</strong>
            </div>
        @endif
        <div class="recentOrders">
        
            <div class="cardHeader">
                <h2>Blogs List</h2>
                <a href="{{url('admin/blog/create')}}" class="btn btn2">
                    <span class="icon"><ion-icon name="add-circle-outline"></ion-icon></span>
                    <span class="title">Create New Blog</span>
                </a>
            </div>
            <table class="table-brand">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>User ID</td>
                        <td>Blog Title</td>
                        <td>Created</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $blogs as $blog)
                    <tr>
                        <td>#{{$blog->id }}</td>
                        <td>{{$blog->user->fullname }}</td>
                        <td class="d-flex align-items-center">
                            <div>
                            <img class="imgProduct" src="{{ asset("image/$blog->thump") }}" alt="{{ $blog->title }}">
                            </div>
                            <div class="product-content-list">
                                <strong>{{$blog->title}}</strong>
                                <div class="d-flex">
                                    <p>View: {{$blog->view}}</p>
                                </div>
                            </div>
                        </td>
                        <td style="width: 500px">{{ $blog->create_at }}</td>
                        <td class="d-flex justify-content-end">
                            <a href="/admin/blog/edit/{{$blog->id}}" class="btn mr-10">Edit</a>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDeleteBrand-{{$blog->id}}">Delete</button>
                            <div class="modal fade" id="modalDeleteBrand-{{$blog->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                                tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalToggleLabel">Confirm</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-start">
                                            <strong>Are you sure you want to delete <span class="text-danger">{{$blog->brandname}}</span> brand?</strong>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btnNo" data-bs-dismiss="modal">No</button>
                                            <form action="{{route('blog.destroy',$blog->id)}}" method="POST">
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
