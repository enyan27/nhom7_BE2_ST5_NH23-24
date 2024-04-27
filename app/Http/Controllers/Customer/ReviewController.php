<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        //Log::info('Store method called');

        // Xác định dữ liệu được gửi từ form
        //Log::info($request->all());

        // Lưu đánh giá vào cơ sở dữ liệu

        
            $review = new Review();
            $review->user_id = $request->user_id;
            $review->product_id = $request->product_id;
            $review->rating = $request->rating;
            $review->comment = $request->comment;
            $review->save();
        
            // Trả về phản hồi JSON chứa dữ liệu mới
            return response()->json(['success' => true, 'review' => $review]);
    }

    public function calculateAverageRating(Request $request)
    {
        $productId = $request->input('product_id');
        $averageRating = Review::where('product_id', $productId)->avg('rating');
        return response()->json(['averageRating' => $averageRating]);
    }
}
