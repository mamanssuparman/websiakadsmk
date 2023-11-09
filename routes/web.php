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
Route::get('/gtk/getDataGtk', [GtkDataController::class, 'getDataGtk']);
Route::get('/prodi/getDataProdi', [ProdiController::class, 'getDataProdi']);
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile',[ProfileSekolahController::class,'index']);
    Route::get('/profile/add', [ProfileSekolahController::class, 'add']);
    Route::get('/profile/edit', [ProfileSekolahController::class, 'edit']);
    Route::get('/gtk', [GtkDataController::class, 'index']);
    Route::get('/gtk/add', [GtkDataController::class, 'add']);
    Route::post('/gtk/add',[GtkDataController::class, 'stored']);
    Route::get('/gtk/detail/{id}', [GtkDataController::class, 'detail']);
    Route::get('/gtk/getData/{id}', [GtkDataController::class, 'getData']);
    Route::get('/gtk/getDataMapel', [GtkDataController::class, 'getDataMapel']);
    Route::post('/gtk/activenon',[GtkDataController::class, 'activenon']);
    Route::post('/gtk/removemapelajar',[GtkDataController::class, 'removemapelajar']);
    Route::post('/gtk/addmapelajar', [GtkDataController::class, 'addMapelAjar']);
    Route::post('/gtk/updateprofile',[GtkDataController::class, 'updateprofile']);
    Route::post('/gtk/updatepassword',[GtkDataController::class, 'updatepassword']);
    Route::get('/mapel',[MapelController::class, 'index']);
    Route::get('/prodi', [ProdiController::class, 'index']);
    Route::get('/prodi/add', [ProdiController::class, 'add']);
    Route::get('/prodi/detail/{id}', [ProdiController::class, 'detail']);
    Route::post('/prodi/detail/{id}', [ProdiController::class, 'updateProdi']);
    Route::post('/prodi/saveProdi',[ProdiController::class, 'saveprodi']);
    Route::get('/prodi/checkSlug', [ProdiController::class, 'checkslug']);
    Route::post('/prodi/activenon', [ProdiController::class, 'activenon']);
    Route::get('/prodi/getData/{id}', [ProdiController::class,'getData']);
    Route::post('/prodi/addPrestasi',[ProdiController::class, 'addPrestasi']);
    Route::post('/prodi/addPekerjaan',[ProdiController::class, 'addPekerjaan']);
    Route::post('/prodi/removePekerjaan',[ProdiController::class, 'removePekerjaan']);
    Route::post('/prodi/removePrestasi',[ProdiController::class, 'removePrestasi']);
    Route::post('/prodi/addMapelAjar',[ProdiController::class, 'addMapelAjar']);
    Route::post('/prodi/removeMapelAjar',[ProdiController::class, 'removeMapelAjar']);


    Route::get('/ekstrakurikuler', [EkstrakurikulersekolahController::class, 'index']);
    Route::get('/ekstrakurikuler/checkSlug', [EkstrakurikulersekolahController::class, 'checkslug']);
    Route::get('/ekstrakurikuler/add', [EkstrakurikulersekolahController::class, 'add']);
    Route::post('/ekstrakurikuler/store', [EkstrakurikulersekolahController::class, 'store']);
    Route::post('/ekstrakurikuler/update/{ekstra}', [EkstrakurikulersekolahController::class, 'update']);
    Route::get('/ekstrakurikuler/edit/{ekstra}', [EkstrakurikulersekolahController::class, 'edit']);
    Route::get('/getEkstrakulikuler', [EkstrakurikulersekolahController::class, 'getEkstrakulikuler']);
    Route::post('/ekstrakurikuler/activenon', [EkstrakurikulersekolahController::class, 'activenon']);

    Route::get('/categoryarticle', [CategoryarticleController::class, 'index']);
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
