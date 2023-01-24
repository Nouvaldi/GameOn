<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

// login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

// register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('signUp');
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    // Home
    Route::get('/home', [GameController::class, 'index'])->name('home');
    Route::get('/detail/{id}/{title}', [GameController::class, 'detail']);
    Route::get('/home/all-games', [GameController::class, 'indexAllGames']);
    Route::get('/home/category/{id}/{name}', [GameController::class, 'indexCategory']);
    Route::get('/home/search', [GameController::class, 'search']);


    // Wallet
    Route::get('/user/wallet', [WalletController::class, 'index'])->name('wallet');
    Route::post('/user/wallet', [WalletController::class, 'store']);


    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'indexEdit'])->name('editProfile');
    Route::post('/profile/edit', [ProfileController::class, 'editProfile']);
    Route::get('/profile/password', [ProfileController::class, 'indexPassword'])->name('changePass');
    Route::post('/profile/password', [ProfileController::class, 'changePass']);


    // library
    Route::get('/library', [LibraryController::class, 'index'])->name('library');
    Route::post('/library/{id}', [LibraryController::class, 'store']);
});


// admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/manage-games', [AdminController::class, 'index']);
    Route::get('/admin/add-new-game', [AdminController::class, 'indexAdd']);
    Route::post('/admin/add-new-game', [AdminController::class, 'addGame']);
    Route::get('/admin/update/{id}', [AdminController::class, 'indexUpdate']);
    Route::post('/admin/update/{id}', [AdminController::class, 'updateGame']);
    Route::delete('/admin/delete/{id}', [AdminController::class, 'delete']);
});
