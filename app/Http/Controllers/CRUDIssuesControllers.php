<?php

namespace App\Http\Controllers;

use App\Issue;
use Illuminate\Http\Request;
use App\Mail\IssueRequestSubmited;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CRUDIssuesControllers extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['issues'] = Issue::all();
        return view('issues.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('issues.issues');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $issue = new Issue();
        $issue->name = $request->name;
        $issue->email = $request->email;
        $issue->phone = $request->phone;
        $issue->message = $request->message;
        $issue->building_number = $request->building_number;
        $issue->apartment_number = $request->apartment_number;
        if($request->hasFile('attachment')){
            $photo = $request->file('attachment');
            $file_name = 'images'.time().'.'.$photo->extension();
            $photo->move(public_path('images'), $file_name);
            $issue->attachment = $file_name;
        }
        //$issue->attachment = $request->attachment;
        $issue->user_id = Auth::user()->id;
        $issue->save();

        Mail::to($issue->email)->send(new IssueRequestSubmited($issue));

        return "Done";
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
        $data['issue']= Issue::findOrFail($id);
        return view('issues.edit', $data);
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
        $issue = Issue::findOrFail($id);
        $issue->name = $request->name;
        $issue->email = $request->email;
        $issue->phone = $request->phone;
        $issue->message = $request->message;
        $issue->building_number = $request->building_number;
        $issue->apartment_number = $request->apartment_number;
        if($request->hasFile('attachment')){
            $photo = $request->file('attachment');
            $file_name = 'images'.time().'.'.$photo->extension();
            $photo->move(public_path('images'), $file_name);
            $issue->attachment = $file_name;
        }
        //$issue->attachment = $request->attachment;
        $issue->user_id = Auth::user()->id;
        $issue->save();

        Mail::to($issue->email)->send(new IssueRequestSubmited($issue));

        return "Done";
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
        $record = Issue::findOrFail($id);
        $record->delete();

        return back();
    }
}
