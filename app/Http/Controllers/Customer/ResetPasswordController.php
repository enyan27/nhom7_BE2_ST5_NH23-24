<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\User;

class ResetPasswordController extends Controller
{
    public function forgotPassword() {

        $categories = Category::where('parent_id', 0)->get();

        if(Auth::check()) {
            return redirect('/');
        }
        else{
            return view('customer.main.forgot_password', compact('categories'));
        }
    }
    
    public function forgotPasswordPost(Request $request) {

        if($request->ajax()) {
            $email = $request->email;
            $token = $request->token;
            $email_check = User::where(['email' => $email, 'level' => 2])->exists();

            if($email_check) {
                DB::table('password_resets')->updateOrInsert(['email' => $email], ['token' => $token]);
                
                Mail::send('customer.main.reset_password_email', compact('token'), function($message) use($email) {
                            $message->from(env('MAIL_USERNAME'), 'Stable eShop');
                            $message->to($email);
                            $message->subject('Reset Password');
                });
                return true;
            }
            else {
                return false;
            }            
        }
    }

    public function resetPassword($token) {

        $categories = Category::where('parent_id', 0)->get();
        $token_check = DB::table('password_resets')->where('token', $token)->exists();

        if($token_check) {
            return view('customer.main.reset_password', compact('categories','token'));
        }
        else {
            return('404 Error!');
        }
    }

    public function resetPasswordPost(Request $request, $token) {

        $data = DB::table('password_resets')->where('token', $token)->first();
        $user = User::where('email', $data->email)->first();
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect('/login')->with('success','Password reset successful!');
    }
}
