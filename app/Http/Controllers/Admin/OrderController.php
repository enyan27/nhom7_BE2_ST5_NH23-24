<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Services\Order\OrderService;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService) {

        $this->orderService = $orderService;
    }

    public function index() {

        $orders = $this->orderService->getAll();
        
        return view('admin.order.view', compact('orders'));
    }

    public function show($id) {

        $order = $this->orderService->find($id);

        return view('admin.order.detail', compact('order'));
    }

    public function confirmOrder(Request $request) {

        $result = $this->orderService->confirmOrder($request);

        return $result;
    }
}
