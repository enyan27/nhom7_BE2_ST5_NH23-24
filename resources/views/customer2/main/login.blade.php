
@extends('customer.layout.master')

@section('title',  'Account Login - Online Shopping' )

@section('body')   
    <section class="login-section section-padding">
        <div class="login-wrapper">
            <form method="POST" action="login">
                @csrf
                <div class="account-login">
                    <div class="account-login-header mb-25">
                        <h2 class="account-login-header-title h3 mb-10">Login</h2>
                        <p class="account-login-header-desc">Login if you area a returning customer.</p>
                    </div>
                    @include('admin.component.alert')
                    <div class="account-login-inner">
                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <input class="account-login-input" value="{{old('email')}}" name="email" placeholder="Email Addres" type="email">
                        @error('password')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        <input class="account-login-input" name="password" placeholder="Password" type="password">
                        <div class="account-login-remember-forgot mb-15 d-flex justify-content-between align-items-center">
                            <div class="account-login-remember position-relative">
                                <input class="checkout-checkbox-input" name="remember" id="remember" type="checkbox">
                                <label class="checkout-checkbox-label login-remember-label" for="remember">
                                    Remember me
                                </label>
                            </div>
                            <a href="/forgot-password" class="account-login-forgot" >Forgot Your Password?</a>
                        </div>
                        <button class="account-login-btn primary-btn" type="submit">Login</button>
                        <div class="account-login-divide">
                            <span class="account-login-divide-text">OR</span>
                        </div>
                        <div class="account-social d-flex justify-content-center mb-15">
                            <a class="account-social-link facebook" target="_blank" href="https://www.facebook.com">Facebook</a>
                            <a class="account-social-link google" target="_blank" href="https://www.google.com">Google</a>
                            <a class="account-social-link twitter" target="_blank" href="https://twitter.com">Twitter</a>
                        </div>
                        <p class="account-login-signup-text">Don't have an account? 
                            <a href="/register">Create an account</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection