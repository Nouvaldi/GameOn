<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('register', [
            'title' => 'Sign Up',
            'active' => 'Sign Up'
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|min:3|max:20',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:20',
            'confirm_password' => 'required|same:password',
            'agree' => 'required'
        ]);

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'wallet' => 1,
            'admin' => false
        ]);

        return redirect('/login')->with('success', 'Please login to continue.');
    }
}
