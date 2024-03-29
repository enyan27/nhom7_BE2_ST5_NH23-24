<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Order;

class StatisticController extends Controller //*
{
    public function index(Request $request){
        $result = DB::table('orders')->whereMonth('created_at', date('m'))
                ->whereYear('created_at', date('Y'))
                ->select( DB::raw('CAST(created_at as date) as date'), DB::raw('COUNT(*) as orders'),
                          DB::raw('SUM(total_price) as total_price'))
                ->groupBy(DB::raw('CAST(created_at as date)'))
                ->get();

        $barCharData['date'] = array();
        $barCharData['orders'] = array();
        foreach($result as $val){
            array_push($barCharData['date'], $val->date);
            array_push($barCharData['orders'], $val->orders);
        }

        $orders = DB::table('orders')->select(DB::raw('COUNT(*) as orders'))
                                     ->groupBy('status')
                                     ->get();
        
        $pieChartData = array();
        foreach($orders as $val){
            array_push($pieChartData, $val->orders);
        }

        $year = $request->year ?? date("Y");
        
        $dataRevenue = DB::table('orders')->whereYear('created_at', $year)
                ->select(DB::raw('Month(created_at) as month'), DB::raw('SUM(total_price) as total_price'))
                ->where('status', 2)
                ->groupBy(DB::raw('MONTH(created_at )'))
                ->get();
        $barCharData['revenue'] = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($dataRevenue as $val){
            for($i = 0; $i<12; $i++){
                if($val->month -1 == $i){
                    $barCharData['revenue'][$i] = $val->total_price;
                }
            }
        }
        return view ('admin.statistic.index', compact('barCharData','pieChartData'));
    }



}
