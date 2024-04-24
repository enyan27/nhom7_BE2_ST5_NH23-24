@extends('customer.layout.account')
 
@section('account_body')
    <h3 class="account-content-title mb-20">Orders History</h3>
    <div class="account-table-area">
        <table class="account-table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date / Time</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Total Price</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr id="ord-{{$order->id}}">
                    <td>#{{$order->id}}</td>
                    <td>{{date_format($order->created_at, 'M d, Y')}}</td>
                    <td>{{$order->payment == 'cod' && $order->status != 2 ? 'Unpaid' : 'Paid'}}</td>

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

                    <td>${{number_format($order->total_price,2)}}</td>
                    <td>
                        @if($order->status == 0)
                        <button class="btn btn-secondary cancel" onclick="updateStatus('{{$order->id}}',4)">Cancel</button>
                        @elseif($order->status == 1)
                        <button class="btn btn-secondary return" onclick="updateStatus('{{$order->id}}',3)">Return</button>
                        <button class="btn btn-danger received" onclick="updateStatus('{{$order->id}}',2)">Received</button>
                        @endif
                        <a href="/my-account/order/{{$order->id}}" class="btn btn-primary detail">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $orders->links() }}
@endsection