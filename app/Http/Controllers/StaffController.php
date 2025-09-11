<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function staffHome(){

        return view('staff.home');
    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('login')->with('success', 'logout successfully');
    }
}
