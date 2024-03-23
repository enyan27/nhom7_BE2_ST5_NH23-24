@extends('admin.layout.master')

@section('title','Create User')

@section('body')
        
        <div class="details details2">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Create New Account</h2>
                </div>
                <form class="formProduct" method="POST" action="admin/user/store" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-7">
                        @if(session('success'))
                        <div class="alert alert-success d-flex justify-content-between" role="alert">
                            <strong>{{session('success')}}</strong>
                            <a href="./admin/user">View Employee List</a>
                        </div>
                        @endif
                            <div class="row">
                                <div class="col-7">
                                    <div class="form-group ">
                                        <label for="userAvatar">Avatar</label>
                                        <input class="form-control" type="file" id="userAvatar" name="image" onchange="previewImg(this,'user-avatar')">
                                    </div>
                                </div>
                                <div class="col-5">
                                    <img id="user-avatar" class="userAvatar" src="./admin/assets/img/no_avatar.png" alt="User Avatar">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="userFullName">Full Name
                                    <span class="text-danger">*</span>
                                </label>
                                <input class="form-control" type="text" name="fullname" placeholder="Full Name" value="{{ old('fullname') }}" id="userFullName" required>
                                <div class="invalid-feedback">Please type full name</div>
                                @error('fullname')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phoneNumber">Phone Number
                                    <span class="text-danger">*</span>
                                </label>
                                <input class="form-control" type="number" name="phonenumber" value="{{ old('phonenumber')}}" placeholder="Phone Number" id="phoneNumber" required>
                                <div class="invalid-feedback">Please type phone number</div>
                                @error('phonenumber')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="userGender">Gender
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" name="gender" id="userGender" required>
                                    <option disabled selected value="">--- Choose Gender ---</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                </select>
                                <div class="invalid-feedback">Please choose a gender</div>
                            </div>
                            <div class="form-group">
                                <label for="userEmail">Email
                                    <span class="text-danger">*</span>
                                </label>
                                <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Email" id="userEmail" required>
                                <div class="invalid-feedback">Please type a a valid email address</div>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="userAddress">Address
                                    <span class="text-danger">*</span>
                                </label>
                                <input class="form-control" type="text" name="address" value="{{ old('address') }}" placeholder="Address" id="userAddress" required>
                                <div class="invalid-feedback">Please type a address</div>
                            </div>
                            <div class="form-group">
                                <label for="userPassword">Password
                                    <span class="text-danger">*</span>
                                </label>
                                <input class="form-control" type="password" name="password" placeholder="Password" id="userPassword" required>
                                <div class="invalid-feedback">Please type password</div>
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="userConfirmPassword">Confirm Password
                                    <span class="text-danger">*</span>
                                </label>
                                <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" id="userConfirmPassword" required>
                                <div class="invalid-feedback">Please type re-password</div>
                            </div>
                            <div class="form-group">
                                <label for="userLevel">Level
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" name="level" id="userLevel" required>
                                    <option disabled selected value="">--- Choose Level ---</option>
                                    <option value="0">Admin</option>
                                    <option value="1">Employee</option> 
                                </select>
                                <div class="invalid-feedback">Please choose a level</div>
                            </div>
                            <button type="submit" class="btn btnAdd btnSaveProfile">Create</button>
                        </div>
                    </div>
                    
                </form>
            </div>

        </div>
            
@endsection
