<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Category\CategoryService;
use App\Http\Services\Login\LoginService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $categoryService;
    protected $loginService;

    public function __construct(CategoryService $categoryService, LoginService $loginService) {
        
        $this->categoryService = $categoryService;
        $this->loginService = $loginService;
    }

    public function login() {

        $categories = $this->categoryService->getParent();

        if(Auth::check()) {
            return redirect('/');
        }
        else {
            return view('customer.main.login', compact('categories')); 
        }
    }

    public function checkLogin(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $result = $this->loginService->checkLogin($request);

        if($result == true) {
            return redirect('/');
        }

        return back()->with('error','ERORR: Incorrect email or password, or your account has been locked ');
    }

    public function register() {

        $categories = $this->categoryService->getParent();

        if(Auth::check()) {
            return redirect('/');
        }
        else{
            return view('customer.main.register', compact('categories'));
        }
    }

    public function checkRegister(Request $request) {

        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'phonenumber'=> 'required|numeric|min:10',
            'email'=> 'required|email:filter|unique:users,email',
            'password'=> 'required|confirmed|min:6',
            'password_confirmation' =>'required'
        ], [
            'email.unique' => 'This email is already in use.',
            'phonenumber.numeric' => 'Phone number must include digits.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $result = $this->loginService->checkRegister($request);

        if($result == true) {
            return redirect('login')->with('success', 'Your account created successfully!');
        }
    }
    
    public function logout(Request $request) {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
 
        return redirect('/');
    }
}
