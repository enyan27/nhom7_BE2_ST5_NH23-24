<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Customer\CustomerService;

class CustomerController extends Controller
{   
    protected $customerService;

    public function __construct(CustomerService $customerService) {

        $this->customerService = $customerService;
    }

    public function index() {

        $users = $this->customerService->view();
        return view('admin.customer.view', compact('users'));
    }

    public function show($id) {

        $user = $this->customerService->show($id);
        return view('admin.customer.detail', compact('user'));
    }

    public function action(Request $request) {
        
        $result = $this->customerService->action($request);
        return $result;
    }
}
