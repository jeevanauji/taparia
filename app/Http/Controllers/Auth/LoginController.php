<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('backend.login');  // Show the login form view
    }

    public function auth(Request $request)
    {
        // Validate email and password
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        // Check if the user exists with the provided email
        $user = User::where('email', $request->email)->first();
        
        // If the user exists, check password
        if ($user && Hash::check($request->password, $user->password)) {
            // Log the user in
            Auth::login($user);
            session()->flash('status', 'Login successful!');
    
            return redirect()->route('dashboard');
        } else {
            // If user does not exist or credentials are invalid
            session()->flash('error', 'Invalid credentials. Please try again.');
            return back();  // Redirect back if credentials are invalid
        }
    }

    public function logOut()
    {
        Auth::logout();
        return redirect()->route('login'); // Redirect to the login page
    }
}
