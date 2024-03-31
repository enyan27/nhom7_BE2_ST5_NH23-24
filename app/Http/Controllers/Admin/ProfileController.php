<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    public function index() {

        return view('admin.profile.index');
    }

    public function update(Request $request) {

        Auth::user()->fill($request->all())->save();

        return redirect()->back()->with('success','SUCCESS: Your profile has been updated!');
    }

    public function changePassword() {

        return view('admin.profile.changePassword');
    }

    public function changePasswordPost(Request $request) {

        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' =>'required|confirmed|min:6',
            'password_confirmation' =>'required|min:6'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        if(Auth::attempt([
            'email' => Auth::user()->email,
            'password' => $request->input('current_password')
        ])) {
            Auth::user()->password = Hash::make($request->input('password'));
            Auth::user()->save();
            Auth::logout();
            return redirect()->route('login')->with('success', 'SUCCESS: Your password changed successfully');
        }
        else {
            return back()->with('error2', 'Password is not correct');
        };
    }
}
