@extends('customer.layout.master')

@section('title',  'Reset Password - Online Shopping' )

@section('body')
<section class="login-section section-padding">
    <div class="login-wrapper">
        <form action="/reset-password/{{$token}}" method="POST">
            @csrf
            <div class="account-login">
                <div class="account-login-header mb-25">
                    <h2 class="account-login-header-title h3 mb-10">Create New Password</h2>
                </div>
                <div class="account-login-inner">
                    @error('password')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    <input class="account-login-input" name="password" placeholder="New Password" type="password">

                    @error('confirm_password')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    <input class="account-login-input" name="confirm_password" placeholder="Confirm Password" type="password">
                    <button class="account-login-btn primary-btn" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection