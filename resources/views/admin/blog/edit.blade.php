@extends('admin.layout.master')

@section('title', 'View Blogs')

@section('body')

<div class="details details2">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Edit Blog</h2>
        </div>
        <form class="formProduct" method="POST" action="{{url("admin/blog/update/$blog->id")}}" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="col-7">
                    @include('admin.component.alert')
                    <div class="form-group">
                        <label for="blogname">Blog Title
                            <span class="text-danger">*</span>
                        </label>
                        <input class="form-control" type="text" name="blogname" placeholder="Blog Title" id="blogname" required value="{{$blog->title}}">
                        <div class="invalid-feedback">Please type a blog title valid</div>
                        @error('blogname')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description
                            <span class="text-danger">*</span>
                        </label>
                        <textarea class="textarea-category" name="description" id="description" cols="30" rows="10"> {{$blog->description}} </textarea>
                        <div class="invalid-feedback">Please enter a description category</div>
                        @error('description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row">
                        <div style="border: 1px solid #C0C0C0; padding: 10px; border-radius: 10px; margin-left: 10px;" class="col-lg-3">
                        <div class="form-group">
                                <label for="imageOld">Old Image</label>
                                <input type="" value="{{$blog->thump}}" name="imageOld" id="imageOld" hidden>
                                
                                <img class="img-fluid" src="{{asset("/image/$blog->thump")}}" alt="">
                                </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" accept="image/*">
                                <small class="form-text text-muted">Choose an image for the blog</small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">Status
                            <span class="text-danger">*</span>
                        </label>
                        <select name="status" id="status">
                            <option value="1" {{ $blog->status == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="2" {{ $blog->status == 2 ? 'selected' : '' }}>No</option>
                        </select>
                        @error('status')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btnAdd btnSaveProfile">Edit</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection