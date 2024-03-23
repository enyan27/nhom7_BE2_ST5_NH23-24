@extends('admin.layout.master')

@section('title', 'Home')

@section('body')
        <!-- cards -->
        <div class="cardBox">
            <div class="card">
                <div>
                    <div class="numbers">{{$count['product']}}</div>
                    <div class="cardName">Products</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="file-tray-stacked-outline"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">{{$count['customer']}}</div>
                    <div class="cardName">Customers</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="person-circle-outline"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">{{$count['order']}}</div>
                    <div class="cardName">Orders</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="document-text-outline"></ion-icon>   
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">${{number_format($earn, 0)}}</div>
                    <div class="cardName">Earning</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="cash-outline"></ion-icon>
                </div>
            </div>
        </div>
        
        <div class="details">
            <!-- oder details list -->
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Recent Orders</h2>
                    <a href="admin/order" class="btn">View All</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Payment</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>#{{$order->id}}</td>
                            <td>{{$order->user_fullname}}</td>
                            <td>${{number_format($order->total_price, 2)}}</td>
                            <td class="text-uppercase">{{$order->payment}}</td>
                            @if($order->status == 0)
                            <td><span class="status pending">Pending</span></td>
                            @elseif($order->status == 1)
                            <td><span class="status inprogress">In Progress</span></td>
                            @elseif($order->status == 2)
                            <td><span class="status delivered">Delivered</span></td>
                            @elseif($order->status == 3)
                            <td><span class="status return">Return</span></td>
                            @else
                            <td><span class="status cancel">Cancel</span></td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- New Customers -->
            <div class="recentCustomers">
                <div class="cardHeader">
                    <h2>Recent Customers</h2>
                </div>
                <table>
                    @foreach($customers as $customer)
                    <tr>
                        <td width="60px">
                            <div class="imgBx">
                                <img src=" {{ $customer->avatar ?? 'storage/uploads/user/no_avatar.png'}}" >
                            </div>
                        </td>
                        <td>
                            <a href="admin/customer/{{$customer->id}}">
                                <h4>{{$customer->fullname}}</h4>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
@endsection
