<?php

use App\Models\Histoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function (Request $request) {
    $cat = $request->input('cat', null);
    $value = $request->cookie('cat', null);

    if (!isset($cat)) {
        if (!isset($value)) {
            $histoires = Histoire::inRandomOrder()->get();
            $cat = 'All';
            Cookie::expire('cat');
        } else {
            $histoires = Histoire::where('genre_id', $value)->get();
            $cat = $value;
            Cookie::queue('cat', $cat, 10);            }
    } else {
        if ($cat == 'All') {
            $histoires = Histoire::inRandomOrder()->get();
            Cookie::expire('cat');
        } else {
            $histoires = Histoire::where('genre_id', $cat)->get();
            Cookie::queue('cat', $cat, 10);
        }
    }
    $genres = \App\Models\Genre::distinct()->pluck("id");
    return view('accueil', ['histoires' => $histoires, 'cat' => $cat, 'genres' => $genres]);
})->name("index");

Route::get('/contact', function () {
    return view('contact');
})->name("contact");

Route::get('/test-vite', function () {
    return view('test-vite');
})->name("test-vite");

