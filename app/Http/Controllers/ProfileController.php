<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index() {
        $category_data = Category::all();

        return view('profile', compact('category_data'), [
            'title' => 'Profile',
            'active' => 'profile'
        ]);
    }

    public function indexEdit() {
        $category_data = Category::all();

        return view('editProfile', compact('category_data'), [
            'title' => 'Profile',
            'active' => 'profile'
        ]);
    }

    public function indexPassword() {
        $category_data = Category::all();

        return view('changePass', compact('category_data'), [
            'title' => 'Profile',
            'active' => 'profile'
        ]);
    }

    public function editProfile(Request $request) {
        $request->validate([
            'name' => 'required|min:3|max:20',
            'email' => 'required|email:dns'
        ]);

        try {
            DB::table('users')->where('id', Auth::user()->id)->update([
                'name' => $request->name,
                'email' => $request->email
            ]);

            return redirect('/profile')->with('success', 'Changes saved!');
        } catch (\Throwable $th) {
            return redirect('/profile')->with('failed', 'Error occured!');
        }
    }

    public function changePass(Request $request) {
        $request->validate([
            'old_password' => 'required|min:5|max:20',
            'new_password' => 'required|min:5|max:20',
            'confirm_password' => 'required|same:new_password'
        ]);

        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return redirect('/profile/password')->with('failedPass', 'The old password does not match with current password!');
        }

        try {
            DB::table('users')->where('id', Auth::user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);

            return redirect('/profile')->with('success', 'Changes saved!');
        } catch (\Throwable $th) {
            return redirect('/profile/password')->with('failedPass', 'Make sure all inputs are correct!');
        }
    }
}
