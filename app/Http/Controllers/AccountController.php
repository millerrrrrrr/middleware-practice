<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function loginPost() {}

    public function registerPost(Request $request)
    {

        $request->validate([
            'username' => 'required|string|unique:accounts,username',
            'password' => 'required|string|min:8',
            'age' => 'required|integer|max:100',
            'role' => 'required|string',

        ]);

        if ($request->age < 18) {
            return back()->with('warning', 'Minors aren\'t allowed to register');
        }
    
        // Create the user if all validation passes and the age is valid
        $user = Account::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'age' => $request->age,
            'role' => $request->role,
        ]);
    
        // Check if the user was created successfully
        if ($user) {
            return redirect()->route('login')->with('success', 'Registered successfully');
        }
    
        return back()->with('error', 'Registration failed');




    }
}
