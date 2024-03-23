<?php

namespace App\Http\Services\Login;

use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginService{

    public function checkRegister($request){

        $data = $request->all();
        $data['password'] = Hash::make($request->input('password'));
        $data['level'] = 2;
        
        $user_id = User::create($data)->id;
        
        if(Cart::create(['user_id' => $user_id])){
            return true;
        }

    }

    public function checkLogin($request){

        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->remember;

        if( Auth::attempt([
            'email' => $email, 
            'password' => $password,
            'level' => 2,
            'active' => 0
        ], $remember)){
            
            return true;
        }
    }
}