@extends('admin.layout.master')

@section('title','Create Category')

@section('body')
        
        <div class="details details2">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Create New Category</h2>
                </div>
                <form class="formProduct" method="POST" action="admin/category/store" novalidate>
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-7">
                        @include('admin.component.alert')
                            <div class="form-group">
                                <label for="categoryname">Category Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input class="form-control" type="text" name="categoryname" placeholder="Category Name" id="categoryname" required>
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
                                    <option selected value="0">Parent</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id}}">{{$category->categoryname}}</option>
                                    @endforeach
                                </select>
                               
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
                                <label for="active">Active
                                    <span class="text-danger">*</span>
                                </label>
                                <select name="active" id="active" >
                                    <option selected value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                                @error('active')
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
