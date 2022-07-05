<?php

namespace App\Http\Controllers;

use App\Order;
use Dotenv\Result\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function store(Request $request){

        $data = Order::where('product_name', $request->product_name)->first();
        if(!$data){

            $order = new Order();
            $order->price = $request->price;
            $order->product_name = $request->product_name;
            $order->code = Str::random(10);
            $order->save();
    
            return response()->json([
                "success" => true,
                "description" => "Order created Successfully"
            ]);
        }
        return response()->json([
            "success"=> false,
            "description"=> "this product already added"
        ]);
    }

    public function checkout(){

    }

    public function prepareData(){
        
    }
}
