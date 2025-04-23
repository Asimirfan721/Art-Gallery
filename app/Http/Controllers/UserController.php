<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    // Show the registration form is called here
    public function create()    //
    {
        // return view('user.create');  // here is the view for registration called
        return view('user.create');  // here is the view for registration called
    }
    // Show the registration form

    //e a new user
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:4'],
            'email' => ['required', 'email', Rule::unique('users', 'email')], // mail is created
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        // Hash the password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create the user
        User::create($formFields);

        // Redirect to login page with success message
        return redirect('/login')->with('message', 'Registration successful! Please login.');
    }

    // Show the login form
    public function login()
    {
        return view('user.login');
    }

    // Authenticate user
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'You have successfully logged in.');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }

    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('message', 'You have been logged out.');
    }
}