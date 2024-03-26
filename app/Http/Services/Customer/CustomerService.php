<?php

namespace App\Http\Services\Customer;

use App\Models\User;

class CustomerService
{
    public function view() {

        return User::where('level', 2)->orderByDesc('id')->paginate(10);
    }

    public function show($id) {

        return User::find($id);
    }

    public function action($request) {

        if($request->ajax()) {
            $user = User::find($request->user_id);

            if($request->active == 0) {
                $user->active = 1;
            }
            else {
                $user->active = 0;
            }
            $user->save();
    
            return true;
        }
    }
}
