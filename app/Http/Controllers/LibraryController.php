<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LibraryController extends Controller
{
    public function index() {
        $library_data = Library::all()->where('user_id', Auth::user()->id);
        $category_data = Category::all();

        return view('library', compact('library_data', 'category_data'), [
            'title' => 'Library',
            'active' => 'library'
        ]);
    }

    public function store($game_id, Request $request) {
        if (Auth::user()->wallet >= $request->total) {
            DB::table('libraries')->insert([
                'game_id' => $game_id,
                'user_id' => Auth::user()->id,
            ]);

            DB::table('histories')->insert([
                'game_id' => $game_id,
                'user_id' => Auth::user()->id,
                'date' => Carbon::now()->toDateString(),
                'total' => $request->total
            ]);

            DB::table('users')->where('id', Auth::user()->id)->decrement('wallet', $request->total);

            return back()->with('success', 'Game Successfully Purchased!');
        }

        return back()->with('failed', 'Insufficient Fund!');
    }
}
