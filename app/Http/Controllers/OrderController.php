<?php

namespace App\Http\Controllers;

use App\Order;
use Dotenv\Result\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use stdClass;

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
        $order = $this->prepareData();
        $respobse= Http::withHeaders([
            'thawani-api-key'=>'rRQ26GcsZzoEhbrP2HZvLYDbn9C9et', //Secret Key
        ])->withBody($order, 'application/json')
        ->post('https://uatcheckout.thawani.om/api/v1/checkout/session');
        $session_id = json_decode($respobse)->data->session_id;

        $publishable_key = 'HGvTMLDssJghr9tlN9gr4DVYt0qyBy';
        $url = 'https://uatcheckout.thawani.om/pay/'.$session_id.'?key='.$publishable_key;

        return redirect($url);
        
    }

    public function prepareData(){
        $data = new \stdClass();
        $data->client_reference_id = "Muzna"; //unique info, user_id , order_id, ...etc
        $data->mode = "payment"; //always set as payment
        $items=[]; // all products as array
        $items[0]=[ // product 1
            "name"=> "water",
            "quantity"=> 2,
            "unit_amount"=> 100
        ];
        $items[1]=[ //product 2
            "name"=> "juice",
            "quantity"=> 4,
            "unit_amount"=> 100
        ];

        $data->products = $items; //add all products in products key
        $data->success_url = env('APP_URL').'/payment-success'; //if payment process compleated successfully
        $data->cancel_url = env('APP_URL').'/payment-cancel'; //if payment proccess canceled or something gous wrong
        $data->metadata = [ //any data aboute customer contact information
            "name"=>"Muzan",
            "phone" => 3727811,
            "user_id"=> 2
        ];

        return json_encode($data);
    }

    public function success(){
        return view('payment.success');
    }

    public function cancel(){
        return view('payment.faild');
    }
}
