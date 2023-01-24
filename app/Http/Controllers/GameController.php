<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function index() {
        $game_data = Game::all()->sortBy([
            ['title','asc']
        ])->take(3);
        $category_data = Category::all();
        $feat_discount = Game::all()->sortBy([
            ['discount','desc']
        ])->take(5);

        return view('home', compact('game_data', 'feat_discount', 'category_data'), [
            'title' => 'Store',
            'active' => 'home'
        ]);
    }

    public function indexAllGames() {
        $search = null;
        $game_data = Game::all()->sortBy([
            ['title','asc']
        ]);
        $category_data = Category::all();

        // $feat_rating = Game::all()->sortBy([
        //     ['ratings.rating','desc']
        // ])->take(3);

        return view('allGames', compact('game_data', 'category_data', 'search'), [
            'title' => 'Store',
            'active' => 'home'
        ]);
    }

    public function indexCategory($id, $name) {
        $search = null;
        $game_data = Game::all()->where('category_id', $id)->sortBy([
            ['title','asc']
        ]);
        $category_data = Category::all();

        return view('allGames', compact('game_data', 'category_data', 'search'), [
            'title' => 'Store',
            'active' => 'home'
        ]);
    }

    public function search(Request $request) {
        $search = $request->search;
        $game_data = Game::where('title', 'LIKE', "%$search%")->get()->sortBy([
            ['title','asc']
        ]);
        $category_data = Category::all();

        return view('allGames', compact('game_data', 'category_data', 'search'), [
            'title' => 'Store',
            'active' => 'home'
        ]);
    }

    public function detail($id, $title) {
        $game_data = Game::all()->where('id', '=', $id)->where('title', '=', $title)->first();
        $library_data = Library::all()->where('user_id', Auth::user()->id)->where('game_id', $id)->first();
        $category_data = Category::all();

        return view('detail', compact('game_data', 'category_data', 'library_data'), [
            'title' => 'Store',
            'active' => 'home'
        ]);
    }
}
