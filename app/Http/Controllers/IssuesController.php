<?php

namespace App\Http\Controllers;

use App\User;
use App\Issue;
use Illuminate\Http\Request;
use App\Imports\IssuesImport;
use App\Mail\IssueRequestSubmited;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

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

    public function importExcelFile(Request $request){
        $request->validate([
             'excelFile'=>'mimes:xlsx',

        ]);
        Excel::import(new IssuesImport, $request->excelFile);
        
        Alert::success('File Importing', 'file imported successfully!');
        return back();
    }
}
