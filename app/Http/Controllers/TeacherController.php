<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnCallback;

class TeacherController extends Controller
{
    public function teacherHome(){

        return view('teacher.home');
    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('login')->with('success', 'logout successfully');
    }
}
