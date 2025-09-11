<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function loginPost(Request $request) {

        // Validate the input fields
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    // Get the credentials from the request
    $creds = $request->only('username', 'password');

    // Attempt to authenticate the user with the credentials
    if (Auth::attempt($creds)) {
        // Check the authenticated user's role
        $user = Auth::user();
        
        // Redirect based on user role
        switch ($user->role) {
            case 'admin':
                return redirect()->route('adminHome')->with('success', 'Login success');
            case 'staff':
                return redirect()->route('staffHome')->with('success', 'Login success');
            case 'teacher':
                return redirect()->route('teacherHome')->with('success', 'Login success');
            default:
                // Default redirection (if user has no valid role)
                return redirect()->route('home')->with('success', 'Login success');
        }
    }

    // If authentication fails, return to the login page with an error message
    return back()->with('error', 'Login failed');

    }

    public function registerPost(Request $request)
    {

        $request->validate([
            'username' => 'required|string|unique:accounts,username',
            'password' => 'required|string|min:8',
            'age' => 'required|integer|max:100',
            'role' => 'required|string',

        ]);

        if ($request->age < 18) {
            return back()->with('warning', 'Minors arent allowed to register');
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
