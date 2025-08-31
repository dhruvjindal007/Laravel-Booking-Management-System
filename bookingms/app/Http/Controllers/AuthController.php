<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('auth.login');
    }
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password))) {
            // Authentication passed...
            if (Auth::user()->user_type == 1) {
                return redirect()->route('dashboard.admin');
            } else if (Auth::user()->user_type == 2) {
                return redirect()->route('dashboard.user');
            }
        } else {
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
    }
    public function signup()
    {
        return view('auth.register');
    }
    public function createUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_no' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            // 'confirmpassword' => 'required|same:password',
        ]);
        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_no' => $request->get('phone_no'),
            'password' => Hash::make($request->get('password')),
            'user_type' => 2 // 1 for admin, 2 for user
        ]);
        $user->save();
        return redirect()->route('login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }

}
