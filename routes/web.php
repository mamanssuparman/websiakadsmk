<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\GtkController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Users\HomeController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\MitraController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\GtkDataController;
use App\Http\Controllers\Admin\SettingController;
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

Route::get('/',[HomeController::class, 'index']);
Route::get('/users/getDataMain',[HomeController::class, 'getDataFooter']);
Route::get('/profile/{slug}', [ProfileController::class, 'detail']);
Route::get('/programstudi/{slug}', [ProgramstudiController::class, 'detail']);
Route::get('/ekstrakurikuler/{slug}', [EkstrakurikulerController::class, 'detail']);
Route::get('/gtk',[GtkController::class,'index']);
Route::get('/article', [ArticleController::class, 'index']);
Route::get('/article/{id}', [ArticleController::class, 'detail']);
Route::get('/gallery', [GalleryController::class, 'foto']);
Route::get('/video', [GalleryController::class, 'video']);

// Admin Panel
Route::get('/auth', [AuthController::class, 'index'])->name('login');
Route::get('/signout',[AuthController::class, 'logout']);
Route::post('/auth', [AuthController::class, 'check']);
Route::get('/gtk/getDataGtk', [GtkDataController::class, 'getDataGtk']);
Route::get('/prodi/getDataProdi', [ProdiController::class, 'getDataProdi']);
Route::get('/articledata/getDataArticle',[ArticledataController::class, 'getDataArticle']);
Route::post('/sendComment/{id}', [ArticleController::class, 'storecomment']);
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile',[ProfileSekolahController::class,'index']);
    Route::get('/profile/add', [ProfileSekolahController::class, 'add'])->middleware('can:isSuperAdmin');
    Route::post('/profile/add', [ProfileSekolahController::class, 'stored'])->middleware('can:isSuperAdmin');
    Route::get('/profile/edit/{id}', [ProfileSekolahController::class, 'edit'])->middleware('can:isSuperAdmin');
    Route::post('/profile/edit/{id}', [ProfileSekolahController::class, 'updated'])->middleware('can:isSuperAdmin');
    Route::get('/profile/getDataProfile', [ProfileSekolahController::class, 'getDataProfile']);
    Route::get('/profile/checkSlug',[ProfileSekolahController::class, 'checkslug']);
    Route::post('/profile/activenon', [ProfileSekolahController::class, 'activenon'])->middleware('can:isSuperAdmin');
    Route::get('/profile/view/{id}', [ProfileSekolahController::class, 'views']);
    Route::get('/gtk', [GtkDataController::class, 'index']);
    Route::get('/gtk/add', [GtkDataController::class, 'add'])->middleware('can:isSuperAdmin');
    Route::post('/gtk/add',[GtkDataController::class, 'stored'])->middleware('can:isSuperAdmin');
    Route::get('/gtk/detail/{id}', [GtkDataController::class, 'detail'])->middleware('can:isSuperAdmin');
    Route::get('/gtk/getData/{id}', [GtkDataController::class, 'getData']);
    Route::get('/gtk/getDataMapel', [GtkDataController::class, 'getDataMapel']);
    Route::post('/gtk/activenon',[GtkDataController::class, 'activenon'])->middleware('can:isSuperAdmin');
    Route::post('/gtk/removemapelajar',[GtkDataController::class, 'removemapelajar'])->middleware('can:isSuperAdmin');
    Route::post('/gtk/addmapelajar', [GtkDataController::class, 'addMapelAjar'])->middleware('can:isSuperAdmin');
    Route::post('/gtk/updateprofile',[GtkDataController::class, 'updateprofile'])->middleware('can:isSuperAdmin');
    Route::post('/gtk/updatepassword',[GtkDataController::class, 'updatepassword'])->middleware('can:isSuperAdmin');




    Route::get('/mapel',[MapelController::class, 'index']);
    Route::get('/getMapel', [MapelController::class, 'getMapel']);
    Route::post('/mapel/store', [MapelController::class, 'store']);
    Route::post('/mapel/activenon', [MapelController::class, 'activenon']);
    Route::get('/mapel/{id}/edit', [MapelController::class, 'edit']);
    Route::put('/mapel/{id}/update', [MapelController::class, 'update']);





    Route::get('/prodi', [ProdiController::class, 'index']);
    Route::get('/prodi/add', [ProdiController::class, 'add'])->middleware('can:isSuperAdmin');
    Route::get('/prodi/detail/{id}', [ProdiController::class, 'detail']);
    Route::post('/prodi/detail/{id}', [ProdiController::class, 'updateProdi'])->middleware('can:isSuperAdmin');
    Route::post('/prodi/saveProdi',[ProdiController::class, 'saveprodi'])->middleware('can:isSuperAdmin');
    Route::get('/prodi/checkSlug', [ProdiController::class, 'checkslug']);
    Route::post('/prodi/activenon', [ProdiController::class, 'activenon'])->middleware('can:isSuperAdmin');
    Route::get('/prodi/getData/{id}', [ProdiController::class,'getData']);
    Route::post('/prodi/addPrestasi',[ProdiController::class, 'addPrestasi'])->middleware('can:isSuperAdmin');
    Route::post('/prodi/addPekerjaan',[ProdiController::class, 'addPekerjaan'])->middleware('can:isSuperAdmin');
    Route::post('/prodi/removePekerjaan',[ProdiController::class, 'removePekerjaan'])->middleware('can:isSuperAdmin');
    Route::post('/prodi/removePrestasi',[ProdiController::class, 'removePrestasi'])->middleware('can:isSuperAdmin');
    Route::post('/prodi/addMapelAjar',[ProdiController::class, 'addMapelAjar'])->middleware('can:isSuperAdmin');
    Route::post('/prodi/removeMapelAjar',[ProdiController::class, 'removeMapelAjar'])->middleware('can:isSuperAdmin');
    Route::get('/prodi/views/{id}', [ProdiController::class, 'views']);

    Route::get('/ekstrakurikuler', [EkstrakurikulersekolahController::class, 'index']);
    Route::get('/ekstrakurikuler/checkSlug', [EkstrakurikulersekolahController::class, 'checkslug']);
    Route::get('/ekstrakurikuler/add', [EkstrakurikulersekolahController::class, 'add'])->middleware('can:isSuperAdmin');
    Route::post('/ekstrakurikuler/stored', [EkstrakurikulersekolahController::class, 'store']);
    Route::post('/ekstrakurikuler/update/{id}', [EkstrakurikulersekolahController::class, 'update'])->middleware('can:isSuperAdmin');
    Route::get('/ekstrakurikuler/edit/{ekstra}', [EkstrakurikulersekolahController::class, 'edit'])->middleware('can:isSuperAdmin');
    Route::get('/getEkstrakulikuler', [EkstrakurikulersekolahController::class, 'getEkstrakulikuler']);
    Route::post('/ekstrakurikuler/activenon', [EkstrakurikulersekolahController::class, 'activenon'])->middleware('can:isSuperAdmin');
    Route::get('/ekstrakurikuler/views/{id}', [EkstrakurikulersekolahController::class, 'views']);
    Route::get('/ekstrakurikuler/getData/{id}', [EkstrakurikulersekolahController::class, 'getData']);

    Route::get('/categoryarticle', [CategoryarticleController::class, 'index']);
    Route::get('/getCategoryarticle', [CategoryarticleController::class, 'getCategoryarticle']);
    Route::post('/categoryarticle/store', [CategoryarticleController::class, 'store']);
    Route::post('/categoryarticle/activenon', [CategoryarticleController::class, 'activenon'])->middleware('can:isSuperAdmin');
    Route::get('/categoryarticle/{category}/edit', [CategoryarticleController::class, 'edit']);
    Route::put('/categoryarticle/{category}/update', [CategoryarticleController::class, 'update']);
    Route::get('/category/checkSlug', [CategoryarticleController::class, 'checkSlug']);

    Route::get('/article', [ArticledataController::class, 'index']);
    Route::get('/article/add', [ArticledataController::class, 'add']);
    Route::post('/article/add', [ArticledataController::class, 'stored']);
    Route::get('/article/edit/{id}', [ArticledataController::class, 'edit']);
    Route::post('/article/edit/{id}', [ArticledataController::class, 'update']);
    Route::post('/article/activenon', [ArticledataController::class, 'activenon'])->middleware('can:isSuperAdmin');
    Route::get('/article/checkSlug', [ArticledataController::class, 'checkslug']);
    Route::get('/article/views/{id}', [ArticledataController::class, 'views']);
    Route::get('/comment', [CommentController::class, 'index']);
    Route::get('/comment/detail/{id}', [CommentController::class, 'detail']);
    Route::get('/comment/getDataComments', [CommentController::class, 'getDataComments']);
    Route::post('/comment/activenon', [CommentController::class, 'activenon'])->name('activenon.comments');
    Route::post('/comment/reject/{id}', [CommentController::class, 'rejectComment']);
    Route::post('/comment/approve/{id}', [CommentController::class, 'approveComment']);
    Route::get('/gallery', [GallerydataController::class, 'index']);
    Route::get('/getGallery', [GallerydataController::class, 'getGallery']);
    Route::post('/gallery/store', [GallerydataController::class, 'store']);
    Route::get('/gallery/{photo}/edit', [GallerydataController::class, 'edit']);
    Route::post('/gallery/{photo}/update', [GallerydataController::class, 'update']);
    Route::post('/gallery/activenon', [GallerydataController::class, 'activenon']);
    Route::get('/video', [VideodataController::class, 'index']);
    Route::get('/video/data-video', [VideodataController::class, 'getDataVideo']);
    Route::post('/video/save-data', [VideodataController::class, 'stored'])->name('save.data');
    Route::get('/video/{video}/edit', [VideodataController::class, 'edit']);
    Route::put('/video/{video}/update', [VideodataController::class, 'update']);
    Route::post('/video/activenon', [VideodataController::class, 'activenon'])->name('activenon.video');

    Route::get('/profileuser',[ProfileuserController::class, 'index']);
    Route::post('/profileuser/update_profile_user', [ProfileuserController::class, 'update_profile_user']);
    Route::post('/profileuser/change_pass', [ProfileuserController::class, 'update_pass']);

    // Route Settings
    Route::get('/settings', [SettingController::class, 'index']);
    Route::post('/settings/getdatasettings', [SettingController::class, 'getdatasettings']);
    Route::post('/settings/stored', [SettingController::class, 'stored']);
    Route::post('/settings/update',[SettingController::class, 'updated']);

    //Route Banners
    Route::get('/banner', [BannerController::class, 'index']);
    Route::get('/banner/getBanner', [BannerController::class, 'getBanner']);
    Route::post('/banner/stored', [BannerController::class, 'store']);
    Route::post('/banner/getDataBanner', [BannerController::class, 'getDataBanner']);
    Route::post('/banner/{id}/update', [BannerController::class, 'update']);
    Route::post('/banner/activenon', [BannerController::class, 'activenon']);

    // Route Mitra
    Route::get('/mitra', [MitraController::class, 'index'])->middleware('can:isSuperAdmin');
    Route::post('/getListMitra', [MitraController::class, 'getListMitra'])->middleware('can:isSuperAdmin');
    Route::post('/mitra/stored', [MitraController::class, 'stored'])->middleware('can:isSuperAdmin');
    Route::get('/mitra/getDataMitra/{id}',[MitraController::class, 'getDataMitra'])->middleware('can:isSuperAdmin');
    Route::post('/mitra/Update/{id}', [MitraController::class, 'updateMitra'])->middleware('can:isSuperAdmin');
});
// LFM
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web','auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::middleware(['auth', 'second'])->group(function () {

});
