@extends('admin.layout.master')

@section('title','Create Coupon')

@section('body')
<div class="container">
    <h2>Create Coupon</h2>
    <form method="POST" action="{{url("admin/coupon/store")}}">
        @csrf
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control">
                <option value="1">Active</option>
                <option value="2">Inactive</option>
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" class="form-control">
        </div>
        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" class="form-control">
        </div>

        <div class="form-group">
            <label for="discount_amount">Discount Amount (%):</label>
            <select name="discount_amount" class="form-control">
                @for ($i = 1; $i <= 100; $i++) <option value="{{ $i }}">{{ $i }}%</option>
                    @endfor
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Create Coupon</button>
    </form>
</div>
@endsection