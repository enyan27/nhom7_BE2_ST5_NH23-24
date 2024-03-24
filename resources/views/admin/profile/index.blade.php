@extends('admin.layout.master')

@section('title', 'Profile')

@section('body')    
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif
    <div class="details details2">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Profile Settings</h2>
            </div>
            @if(Auth::check())
            <div class="profile-wrapper">
                <div class="row">
                    <div class="col-4 position-relative border-right">
                        <div class="avatar">
                            <div class="avatar-img">
                                <img src="{{Auth::user()->avatar ?? '/storage/uploads/user/no_avatar.png'}}" alt="">
                            </div>
                            <div class="avatar-name">{{Auth::user()->fullname}}</div>
                            <div class="text-center">{{level(Auth::user()->level)}}</div>
                        </div>
                        <a class="backToHome" href="admin/home">
                            <span class="icon"><ion-icon name="chevron-back-outline"></ion-icon></span>
                            <span class="title">Back To Home</span>
                        </a>
                    </div>
                    <div class="col-8">
                        <form action="admin/profile" method="POST">
                            @csrf
                            <div class="profile-details">
                                <div class="form-group">
                                    <label for="fullNameAdmin">Full Name</label>
                                    <input type="text" id="fullNameAdmin" name="fullname" value="{{Auth::user()->fullname}}">
                                </div>
                                <div class="form-group">
                                    <label for="phoneNumberAdmin">Phone Number</label>
                                    <input type="number" id="phoneNumberAdmin" name="phonenumber" value="{{Auth::user()->phonenumber}}">
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <select name="gender" id="gender">
                                        <option value="0" {{Auth::user()->gender == 0 ? 'selected' : '' }} >Male</option>
                                        <option value="1" {{Auth::user()->gender == 1 ? 'selected' : '' }}>Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="addressAdmin">Address</label>
                                    <input type="text" id="addressAdmin" name="address" value="{{Auth::user()->address}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" disabled type="text" id="email" value="{{Auth::user()->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="level">Level</label>
                                    <input type="text" value="{{level(Auth::user()->level)}}" disabled>
                                </div>
                            </div>
                            <button type="submit" class="btn btnSaveProfile">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection