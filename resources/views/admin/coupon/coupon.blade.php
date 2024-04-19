@extends('admin.layout.master')

@section('title', 'View Category')

@section('body')
    <div class="details details2">
        @if(session('success'))
            <div class="alert alert-success d-flex justify-content-between" role="alert">
                <strong>{{session('success')}}</strong>
            </div>
        @endif
        <div class="recentOrders">
        
            <div class="cardHeader">
                <h2>Coupon List</h2>
                <a href="{{url("admin/coupon/create")}}" class="btn btn2">
                    <span class="icon"><ion-icon name="add-circle-outline"></ion-icon></span>
                    <span class="title">Create New Coupon</span>
                </a>
            </div>
            <table class="table-coupon">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Coupon Code</td>
                        <td>Discount Amount</td>
                        <td>Start Date</td>
                        <td>End Date</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $coupons as $coupon)
                    <tr>
                        <td>#{{$coupon->id }}</td>
                        <td>{{ $coupon->coupon_code }}</td>
                        <td style="width: 500px">{{ $coupon->discount_amount }}%</td>
                        <td style="padding-left: 20px">{{ $coupon->start_date = date('d/m/Y',strtotime($coupon->start_date))}}</td>
                        <td>{{ $coupon->end_date = date('d/m/Y',strtotime($coupon->end_date)) }}</td>
                        <td>
                            @if($coupon->status == 1) 
                            Active
                            @else 
                            Inactive
                            @endif
                        </td>
                        <td class="d-flex justify-content-end">
                            <a href="/admin/brand/edit/{{$coupon->id}}" class="btn mr-10">Edit</a>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDeleteBrand-{{$coupon->id}}">Delete</button>
                            <div class="modal fade" id="modalDeleteBrand-{{$coupon->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
                                tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalToggleLabel">Confirm</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-start">
                                            <strong>Are you sure you want to delete <span class="text-danger">{{$coupon->brandname}}</span> brand?</strong>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btnNo" data-bs-dismiss="modal">No</button>
                                            <form action="/admin/brand/delete/{{$coupon->id}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn">Yes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
            
@endsection