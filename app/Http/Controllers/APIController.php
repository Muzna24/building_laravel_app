<?php

namespace App\Http\Controllers;

use App\Issue;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIController extends Controller
{
    public function getData($id){
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');
        $min = 0;
        $max = 99;
        if($id<$min || $id>$max){
            return "False";
        }
        return "Title: ".$response[$id]['title']." || Body:".$response[$id]['body'];
        
    }

    public function test(){
        return response()->json(
            Issue::all()
        );
    }

    public function login(Request $request){
        $user = User::where('email', $request->email)->first();

        if(!$user){
            return response()->json([
                "success" => false,
                "description" => "User not found"
            ]);
        }
        return response()->json([
            "success" => true,
            "description" => "User found",
            "data"=> $user
        ]);
    }
}
