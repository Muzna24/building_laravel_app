<?php

namespace App\Imports;

use App\Issue;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class IssuesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Issue([
            'name'=> Auth::user()->name,
            'email'=> Auth::user()->email,
            'phone'=> $row[0],
            'message'=> $row[1],
            'building_number'=> $row[2],
            'apartment_number'=> $row[3],
            'user_id'=> Auth::user()->id,
        ]);
    }
}
