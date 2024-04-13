<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryCustomerController extends Controller // Khai*
{
    //
    public function index() {
        return view('customer.categoryLeftSideBar');
    }

    public function getAllCategories() {
        $categories = Category::all();
        return view('customer.categoryLeftSideBar', ['categories' => $categories]);
    }
}
