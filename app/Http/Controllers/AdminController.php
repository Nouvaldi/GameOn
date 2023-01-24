<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Game;
use App\Models\Spec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index() {
        $game_data = Game::paginate(5);
        $category_data = Category::all();

        return view('manage', compact('game_data', 'category_data'), [
            'title' => 'Manage Games',
            'active' => 'manage'
        ]);
    }

    public function indexAdd() {
        $category_data = Category::all();
        $spec_data = Spec::all();

        return view('add', compact('category_data', 'spec_data'), [
            'title' => 'Add Game',
            'active' => 'add'
        ]);
    }

    public function indexUpdate($id) {
        $game_data = Game::all()->where('id', $id)->first();
        $category_data = Category::all();
        $spec_data = Spec::all();

        return view('update', compact('game_data', 'category_data', 'spec_data'), [
            'title' => 'Update Game',
            'active' => 'manage'
        ]);
    }

    public function addGame(Request $request) {
        $request->validate([
            'title' => 'required|min:5|max:50',
            'category' => 'required',
            'desc' => 'required|min:5|max:500',
            'price' => 'required|integer|min:1000',
            'discount' => 'required|integer|min:0|max:100',
            'size' => 'required|numeric|min:0.1',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        $total = $request->price - ($request->price * ($request->discount / 100));

        if ($request->file('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public/game-images', $fileName);

            DB::table('games')->insert([
                'title' => $request->title,
                'category_id' => $request->category,
                'desc' => $request->desc,
                'discount' => $request->discount,
                'price' => $request->price,
                'total' => $total,
                'size' => $request->size,
                'image' => $fileName,
                'spec_id' => $request->specs
            ]);

            return redirect('/admin/manage-games');
        }
        return redirect('/admin/add-new-game');
    }

    public function updateGame($id, Request $request) {
        $request->validate([
            'title' => 'required|min:5|max:50',
            'category' => 'required',
            'desc' => 'required|min:5|max:500',
            'price' => 'required|integer|min:1000',
            'discount' => 'required|integer|min:0|max:100',
            'size' => 'required|numeric|min:0.1',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        $total = $request->price - ($request->price * ($request->discount / 100));

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete('public/game-images/' . $request->oldImage);
            }
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public/game-images', $fileName);

            DB::table('games')->where('id', $id)->update([
                'title' => $request->title,
                'category_id' => $request->category,
                'desc' => $request->desc,
                'discount' => $request->discount,
                'price' => $request->price,
                'total' => $total,
                'size' => $request->size,
                'image' => $fileName,
                'spec_id' => $request->specs
            ]);

            return redirect('/admin/update/' . $id)->with('success', 'Game successfully updated!');
        }
        return redirect('/admin/update/' . $id)->with('failed', 'Update game failed!');
    }

    public function delete($id) {
        $game_data = Game::all()->where('id', $id)->first();
        Storage::delete('public/game-images/' . $game_data->image);
        DB::table('games')->where('id', $id)->delete();

        return redirect('/admin/manage-games');
    }
}
