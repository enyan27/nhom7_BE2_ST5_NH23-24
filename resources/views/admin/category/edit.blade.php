@extends('admin.layout.master')

@section('title','Edit Category')

@section('body')
        
        <div class="details details2">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Edit Category #{{$category->id}}</h2>
                </div>
                <form class="formProduct" method="POST" action="" novalidate>
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-7">
                            <div class="form-group">
                                <label for="categoryname">Category Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input class="form-controll" type="text" value="{{$category->categoryname}}" name="categoryname" placeholder="Category Name" id="categoryname">
                                <div class="invalid-feedback">Please type a category name valid</div>
                                @error('categoryname')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category">Category
                                    <span class="text-danger">*</span>
                                </label>
                                <select name="parent_id" id="category" >
                                    <option value="0" {{$category->parent_id == 0 ? 'selected' : ''}}>Parent</option>
                                    @foreach ($categories as $categoryParent)
                                        <option value="{{ $categoryParent->id}}" {{ $category->parent_id == $categoryParent->id ? 'selected' : ''}}> {{$categoryParent->categoryname}} </option>
                                    @endforeach
                                </select>
                               
                            </div>
                            <div class="form-group">
                                <label for="description">Description
                                    <span class="text-danger">*</span>
                                </label>
                                <textarea class="textarea-category"name="description" id="description" cols="30" rows="10">{{$category->description}}</textarea>
                                <div class="invalid-feedback">Please enter a description category</div>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="active">Active
                                    <span class="text-danger">*</span>
                                </label>
                                <select name="active" id="active" >
                                    <option value="1" {{$category->active == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="2" {{$category->active == 2 ? 'selected' : '' }}>No</option>
                                </select>
                                @error('active')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btnAdd btnSaveProfile">Save</button>
                        </div>
                    </div>
                    
                </form>
            </div>

        </div>
            
@endsection
