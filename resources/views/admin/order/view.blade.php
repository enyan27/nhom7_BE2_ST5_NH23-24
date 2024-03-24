@extends('admin.layout.master')

@section('title', 'Orders List')

@section('body')

    <div class="details details2">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Orders List</h2>
            </div>
            <table>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Full Name</td>
                        <td>Phone Number</td>
                        <td>Order Date</td>
                        <td>Total Price</td>
                        <td>Order Status</td>
                        <td class="text-center">Payment Method</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>#{{$order->id}}</td>
                        <td>
                            <a href="admin/customer/{{$order->user_id}}">
                                <img class="user-img mr-10" src="{{ $order->user->avatar ?? '/storage/uploads/user/no_avatar.png'}}" alt="">
                                <strong style="color: #ee2761">{{$order->user_fullname}}</strong>
                            </a>
                        </td>
                        <td>{{$order->user_phonenumber}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>${{$order->total_price}}</td>
                        <td id='order-{{$order->id}}'>
                            @if($order->status == 0)
                                <span class="status pending">Pending</span>
                            @elseif($order->status == 1)
                                <span class="status inprogress">In Progress</span>
                            @elseif($order->status == 2)
                                <span class="status delivered">Delivered</span>
                            @elseif($order->status == 3)
                                <span class="status return">Return</span>
                            @else
                                <span class="status cancel">Cancel</span>    
                            @endif
                        </td>
                        <td class="text-center text-uppercase">
                            {{$order->payment}}
                        </td>
                        <td>
                            @if($order->status == 0)
                            <button class="btn btn-confirm" data-id="{{$order->id}}">Confirm</button>
                            @endif
                            <a href="admin/order/{{$order->id}}" class="btn">Detail</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $orders->links() }}
            
        </div>

    </div>

@endsection