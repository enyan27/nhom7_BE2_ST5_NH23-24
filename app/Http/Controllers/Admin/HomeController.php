<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders =  Order::orderByDesc('id')->limit(10)->get();
        
        $customers =  User::where('level' ,2)->orderByDesc('id')->limit(8)->get();

        $count['order'] =  Order::count();
        $count['customer'] = User::where('level' ,2)->count();
        $count['product'] = Product::count();

        $earn = array_sum(array_column(Order::where('status', 2)->get()->toArray(), 'total_price'));
        return view('admin.home.index', compact('orders','customers','count','earn'));
    }
}
