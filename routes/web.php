<?php

use App\Http\Controllers\AvisController;
use App\Http\Controllers\ChapitreController;
use App\Http\Controllers\EquipeController;
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

Route::get('/interview', function () {
    return view('interview');
})->name("interview");

Route::get('/equipe', function () {
    return view('equipe');
})->name("equipe");

Route::get('/equipe', [EquipeController::class, 'index'])->name("equipe");

Route::resource('chapitre', ChapitreController::class);
Route::get('/chapitre/{histoire}/create', [ChapitreController::class, 'createChap'])->middleware(['auth'])->name('creaChapitre');
Route::post('/liaison', [ChapitreController::class, 'liaison'])->name('chapitre.liaison');
Route::get('/chapitre/{histoire}/activate', [ChapitreController::class, 'activate'])->name('activate');

Route::resource('histoires', HistoireController::class);

Route::get('/user', [UserController::class, 'user'])->middleware(['auth'])->name('user');

Route::resource('avis', AvisController::class);