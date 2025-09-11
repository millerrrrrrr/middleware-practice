<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminHome(){

        return view('admin.home');
    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('login')->with('success', 'logout successfully');
    }
}
