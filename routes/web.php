<?php

use App\Http\Controllers\HistoireController;
use App\Http\Controllers\UserController;
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
    return redirect()->route('histoires.index');
})->name("index");

Route::get('/contact', function () {
    return view('contact');
})->name("contact");

Route::get('/test-vite', function () {
    return view('test-vite');
})->name("test-vite");


Route::resource('histoires', HistoireController::class);

Route::get('/user', [UserController::class, 'user'])->middleware(['auth'])->name('user');

Route::get('/histoire', [Controller::class, 'histoire'])->middleware(['auth'])->name('histoire');