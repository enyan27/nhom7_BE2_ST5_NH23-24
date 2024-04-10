@extends('customer.layout.master')

@section('title',  'Forgot Password - Online Shopping' )

@section('body')
<section class="login-section section-padding">
    <div class="login-wrapper">
        <div class="account-login">
            <div class="account-login-header mb-25">
                <h2 class="account-login-header-title h3 mb-10">Reset Password</h2>
                <p>An email containing further instructions will be sent to your mailbox</p>
            </div>
            <div class="account-login-inner">
                @error('email')
                <p class="text-danger">{{$message}}</p>
                @enderror
                <input class="account-login-input" name="email" placeholder="Email Addres" type="email">
                <p class="text-danger mb-10" hidden style="margin-top: -15px;">No account found with this email address!</p>
                <button class="account-login-btn primary-btn getlink-btn" type="submit">Get Link</button>
            </div>
        </div>
    </div>
</section>
@endsection