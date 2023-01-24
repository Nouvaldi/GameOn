<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{
    public function index() {
        $category_data = Category::all();

        $history_data = History::all()->where('user_id', Auth::user()->id);

        return view('wallet', compact('category_data', 'history_data'), [
            'title' => 'Wallet',
            'active' => ''
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'amount' => 'numeric'
        ]);

        DB::table('users')->where('id', Auth::user()->id)->increment('wallet', $request->amount);

        return back()->with('success', 'Top Up Successful!');
    }
}
