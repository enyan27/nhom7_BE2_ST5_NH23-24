<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        
        if (Auth::check() && Auth::user()->level <= 1) {
            return redirect('/admin/home');
        }

        return view('admin.user.login');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        
        if(Auth::attempt([
            'email' => $email, 
            'password' => $password,
            'level' => [0,1]
        ]))
        {
            $user = User::where('email', $email)->first();
            Auth::login($user);
            return redirect('admin/home'); 
        }

        return back()->with('error','ERORR: Incorrect email address or password');
    }

    public function logout(Request $request) {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
 
        return redirect('/');
    }
}
