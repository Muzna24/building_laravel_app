<?php

namespace App\Http\Controllers;

use App\Issue;
use Illuminate\Http\Request;
use App\Mail\IssueRequestSubmited;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class IssuesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['test']);
    }

    public function store(Request $request){

        //return $request;
        $issue = new Issue();
        $issue->name = $request->name;
        $issue->email = $request->email;
        $issue->phone = $request->phone;
        $issue->message = $request->message;
        $issue->building_number = $request->building_number;
        $issue->apartment_number = $request->apartment_number;
        $issue->attachment = $request->attachment;
        $issue->user_id = Auth::user()->id;
        $issue->save();

        \Mail::to($issue->email)->send(new IssueRequestSubmited($issue));

        return "Done";
    }

    public function test(){
        return "this is a test function"; 
    }

    public function list(){
        $data['users'] = User::all();
        return view('issues.listIssue', $data);
    }
}
