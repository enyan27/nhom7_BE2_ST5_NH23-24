@extends('admin.layout.master')

@section('title','Account Information')

@section('body')

    <div class="details details2">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Account Information #{{$user->id}}</h2>
            </div>
            <div class="profile-wrapper">
                <div class="row">
                    <div class="col-4 position-relative border-right">
                        <div class="avatar">
                            <div class="avatar-img">
                                <img src="{{ $user->avatar ?? 'storage/uploads/user/2022/11/15/no_avatar.png' }}" alt="">
                            </div>
                            <div class="avatar-name">{{ $user->fullname }}</div>
                            <div class="text-center">{{level($user->level)}}</div>
                        </div>
                        <a class="backToHome" href="./admin/user ">
                            <span class="icon"><ion-icon name="chevron-back-outline"></ion-icon></span>
                            <span class="title">Back</span>
                        </a>
                    </div>
                    <div class="col-8">
                        <div class="profile-details">
                            <div class="form-group">
                                <label for="fullNameAdmin">Full Name
                                </label>
                                <input disabled type="text" id="fullNameAdmin" value="{{ $user->fullname }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="phoneNumberAdmin">Phone Number
                                </label>
                                <input disabled type="number" id="phoneNumberAdmin" value="{{ $user->phonenumber }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender
                                </label>
                                <input disabled type="text" id="gender" value="{{ gender($user->gender) }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="addressAdmin">Address
                                </label>
                                <input disabled type="text" id="addressAdmin" value="{{ $user->address }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="emailAdmin">Email
                                </label>
                                <input disabled type="text" id="emailAdmin" value="{{ $user->email }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="userLevel">Level
                                </label>
                                <input disabled type="text" id="userLevel" value="{{level($user->level)}}" readonly>
                            </div>
                        </div>
                        <form action="/admin/user/delete/{{$user->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btnSaveProfile">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
@endsection