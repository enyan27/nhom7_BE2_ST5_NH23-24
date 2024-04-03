<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    //
    function index(){
        return view('customer.aboutUs');
    }
}
