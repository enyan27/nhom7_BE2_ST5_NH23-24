@extends('admin.layout.master')

@section('title','Edit Coupon')

@section('body')
<div class="container">
    <h2>Edit Coupon</h2>
    <form method="POST" action="{{url("admin/coupon/update",$coupon->id)}}">
        @csrf
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control">
                <option value="1" {{ $coupon->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="2" {{ $coupon->status == 2 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" class="form-control" value="{{ date('Y-m-d', strtotime($coupon->start_date)) }}">
        </div>
        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" class="form-control" value="{{ date('Y-m-d', strtotime($coupon->end_date)) }}">
        </div>

        <div class="form-group">
            <label for="discount_amount">Discount Amount (%):</label>
            <select name="discount_amount" class="form-control">
                @for ($i = 1; $i <= 100; $i++) <option value="{{ $i }}" {{ $coupon->discount_amount == $i ? 'selected' : '' }}>{{ $i }}%</option>
                    @endfor
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Edit Coupon</button>
    </form>
</div>
@endsection