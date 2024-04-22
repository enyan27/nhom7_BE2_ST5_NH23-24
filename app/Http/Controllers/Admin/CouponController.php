<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::where('parent_id', 0)->get();
        $coupons = Coupon::all();
        return view('admin.coupon.coupon', compact('categories', 'coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // Hàm này tạo một chuỗi ngẫu nhiên có độ dài 8 ký tự
        function generateUniqueString()
        {
            do {
                $randomString = Str::random(8);
            } while (\App\Models\Coupon::where('coupon_code', $randomString)->exists());

            return $randomString;
        }

        // Sử dụng hàm generateUniqueString() để tạo chuỗi không trùng lặp
        $uniqueString = generateUniqueString();

        $coupon = new Coupon();
        $coupon->coupon_code = $uniqueString;
        $coupon->status = $request->status;
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        $coupon->discount_amount = $request->discount_amount;
        $coupon->save();
        return redirect('/admin/coupon/')->with('success', 'Coupon created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $coupon = Coupon::findOrFail($id);
        $coupon->status = $request->status;
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        $coupon->discount_amount = $request->discount_amount;
        $coupon->save();
        return redirect('/admin/coupon/')->with('success', 'Coupon update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $coupon = Coupon::find($id);
        $coupon->delete();
        return redirect('/admin/coupon/')->with('success', 'Coupon deleted successfully!');
    }


    
}
