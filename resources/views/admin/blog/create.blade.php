@extends('admin.layout.master')

@section('title', 'View Blogs')

@section('body')

<div class="details details2">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Create New Blog</h2>
        </div>
        <form class="formProduct" method="POST" action="{{url('admin/blog/store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="col-7">
                    @include('admin.component.alert')
                    <div class="form-group">
                        <label for="blogname">Blog Title
                            <span class="text-danger">*</span>
                        </label>
                        <input class="form-control" type="text" name="blogname" placeholder="Blog Title" id="blogname" required>
                        <div class="invalid-feedback">Please type a blog title valid</div>
                        @error('blogname')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description
                            <span class="text-danger">*</span>
                        </label>
                        <textarea class="textarea-category" name="description" id="description" cols="30" rows="10"></textarea>
                        <div class="invalid-feedback">Please enter a description category</div>
                        @error('description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" accept="image/*">
                        <small class="form-text text-muted">Choose an image for the blog</small>
                        @error('image')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status
                            <span class="text-danger">*</span>
                        </label>
                        <select name="status" id="status">
                            <option selected value="1">Yes</option>
                            <option value="2">No</option>
                        </select>
                        @error('status')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btnAdd btnSaveProfile">Create</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection