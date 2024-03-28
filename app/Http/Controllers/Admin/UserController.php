<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class UserController extends Controller
{
    public function index() {

        $users = User::where('level', 1)->orWhere('level', 0)->orderByDesc('id')->paginate(10);

        return view('admin.user.view',  ['users' => $users]);
    }

    public function create() {

        return view('admin.user.create');
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'email' => 'required|email:filter',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
            'gender' => 'required',
            'phonenumber' => 'required|min:10|numeric',
            'level' => 'required'
        ], [
            'phonenumber.numeric' => 'Phone number must include digits.',
            'password.confirmed' => 'Confirm password does not match.'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        elseif($request->hasFile('image')) {

            $slug = Str::of($request->input('fullname'))->slug('-');
            $original_name = $request->file('image')->getClientoriginalName();

            $new_name = 'avatar-' . $slug . '-' . $original_name;
            $path = 'uploads/user/' . date('Y/m/d');

            $request->file('image')->storeAs('public/' . $path , $new_name);
        }
        
        $request->merge(['avatar' => 'storage/'. $path . '/' . $new_name]);
        $user = $request->all();
        $user['password'] = Hash::make($request->get('password'));

        if (User::create($user)) {
            return redirect('admin/user/create')->with('success','SUCCESS: New user was successfully added!');
        }
    }

    public function show($id) {

        $user = User::find($id);

        return view('admin.user.show', compact('user'));
    }

    public function destroy($id) {   

        $user = User::Find($id);
        $user->delete();

        return redirect('admin/user')->with('success','WELL DONE: User has been deleted successfully!');
    }
}
