<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class idLoginController extends Controller
{
    public function userLogin($id){
        $user = User::find($id);
        /**if (! $user) {
            Auth::logout();
            return redirect('/login');
        }*/
        $user = User::findorfail($id);
        Auth::login($user);
        return redirect('/grating');
    }
}
