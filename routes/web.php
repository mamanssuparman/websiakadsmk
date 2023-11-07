<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\GtkController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\GtkDataController;
use App\Http\Controllers\Users\ArticleController;
use App\Http\Controllers\Users\GalleryController;
use App\Http\Controllers\Users\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\VideodataController;
use App\Http\Controllers\Admin\ArticledataController;
use App\Http\Controllers\Admin\GallerydataController;
use App\Http\Controllers\Admin\ProfileuserController;
use App\Http\Controllers\Users\ProgramstudiController;
use App\Http\Controllers\Admin\ProfileSekolahController;
use App\Http\Controllers\Admin\CategoryarticleController;
use App\Http\Controllers\Users\EkstrakurikulerController;
use App\Http\Controllers\Admin\EkstrakurikulersekolahController;

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

// Admin Panel
Route::get('/auth', [AuthController::class, 'index'])->name('login');
Route::get('/signout',[AuthController::class, 'logout']);
Route::post('/auth', [AuthController::class, 'check']);
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile',[ProfileSekolahController::class,'index']);
    Route::get('/profile/add', [ProfileSekolahController::class, 'add']);
    Route::get('/profile/edit', [ProfileSekolahController::class, 'edit']);
    Route::get('/gtk', [GtkDataController::class, 'index']);
    Route::get('/gtk/add', [GtkDataController::class, 'add']);
    Route::get('/gtk/detail', [GtkDataController::class, 'detail']);
    Route::get('/mapel',[MapelController::class, 'index']);
    Route::get('/prodi', [ProdiController::class, 'index']);
    Route::get('/prodi/add', [ProdiController::class, 'add']);
    Route::get('/prodi/detail', [ProdiController::class, 'detail']);
    Route::get('/ekstrakurikuler', [EkstrakurikulersekolahController::class, 'index']);
    Route::get('/ekstrakurikuler/add', [EkstrakurikulersekolahController::class, 'add']);
    Route::get('/ekstrakurikuler/edit', [EkstrakurikulersekolahController::class, 'edit']);
    Route::get('/categoryarticle', [CategoryarticleController::class, 'index']);
    Route::get('/getCategoryarticle', [CategoryarticleController::class, 'getCategoryarticle']);
    Route::post('/categoryarticle/store', [CategoryarticleController::class, 'store']);
    Route::post('/categoryarticle/activenon', [CategoryarticleController::class, 'activenon']);
    Route::get('/categoryarticle/{category}/edit', [CategoryarticleController::class, 'edit']);
    Route::put('/categoryarticle/{category}/update', [CategoryarticleController::class, 'update']);
    Route::get('/article', [ArticledataController::class, 'index']);
    Route::get('/article/add', [ArticledataController::class, 'add']);
    Route::get('/article/edit', [ArticledataController::class, 'edit']);
    Route::get('/comment', [CommentController::class, 'index']);
    Route::get('/comment/detail', [CommentController::class, 'detail']);
    Route::get('/gallery', [GallerydataController::class, 'index']);
    Route::get('/video', [VideodataController::class, 'index']);
    Route::get('/profileuser',[ProfileuserController::class, 'index']);
});
// LFM
// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['guest']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });
Route::middleware(['auth', 'second'])->group(function () {

});
