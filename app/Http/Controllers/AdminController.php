<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show(){
        $orders =Order::all();
        return response()->json([

            "orders"=>$orders,
        ],200);
    }

}
