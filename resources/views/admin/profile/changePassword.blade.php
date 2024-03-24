
@extends('admin.layout.master')

@section('title', 'Statistics')

@section('body')
    <div class="details details2">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Change Password</h2>
            </div>
            <form action="/admin/password" method="POST">
                @csrf
                <div class="password-wrapper">
                    <div class="row justify-content-center">
                        <div class="col-6">
                            @include('admin.component.alert')
                            <div class="form-group">
                                <label for="current_password">Current Password
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" id="current_password" name="current_password" placeholder="Current Password">
                                @error('current_password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                @if(session('error2'))
                                    <p class="text-danger">{{ session('error2') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password">New Password
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" id="password" name="password" placeholder="New Password">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirm Password
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                                @error('password_confirmation')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btnSaveProfile">Save Password</button>
                        </div>
                    </div>
                </div>  
            </form>
        </div>

    </div>
@endsection
            
