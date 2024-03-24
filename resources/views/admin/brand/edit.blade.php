@extends('admin.layout.master')

@section('title','Edit Brand')

@section('body')
        
        <div class="details details2">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Edit Brand #{{$brand->id}}</h2>
                </div>
                <form class="formProduct" method="POST" action="" novalidate>
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-7">
                            <div class="form-group">
                                <label for="brandname">Brand Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input class="form-controll" type="text" value="{{$brand->brandname}}" name="brandname" placeholder="Brand Name" id="brandname">
                                <div class="invalid-feedback">Please type a brand name valid</div>
                                @error('brandname')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description
                                    <span class="text-danger">*</span>
                                </label>
                                <textarea class="textarea-category"name="description" id="description" cols="30" rows="10">{{$brand->description}}</textarea>
                                <div class="invalid-feedback">Please enter a description brand</div>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="active">Active
                                    <span class="text-danger">*</span>
                                </label>
                                <select name="active" id="active" >
                                    <option value="1" {{$brand->active == 1 ? 'selected' : '' }}>Yes</option>
                                    <option value="2" {{$brand->active == 2 ? 'selected' : '' }}>No</option>
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
