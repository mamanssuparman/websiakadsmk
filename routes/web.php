<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\GtkController;
use App\Http\Controllers\Users\ArticleController;
use App\Http\Controllers\Users\GalleryController;
use App\Http\Controllers\Users\ProfileController;
use App\Http\Controllers\Users\ProgramstudiController;
use App\Http\Controllers\Users\EkstrakurikulerController;

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

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/profile', [ProfileController::class, 'detail']);
Route::get('/programstudi', [ProgramstudiController::class, 'detail']);
Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'detail']);
Route::get('/gtk',[GtkController::class,'index']);
Route::get('/article', [ArticleController::class, 'index']);
Route::get('/article/detail', [ArticleController::class, 'detail']);
Route::get('/gallery', [GalleryController::class, 'foto']);
Route::get('/video', [GalleryController::class, 'video']);
