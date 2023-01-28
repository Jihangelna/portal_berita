<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\BannerController;



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
    return redirect('beranda');
});

Route::get('/default', function () {
    return view('layouts.default');
});

Route::resource('beranda', BannerController::class);
Route::get('detail_artikel/{slug}', [BannerController::class, 'detail'])->name('detail_artikel');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('kategori', KategoriController::class);
    Route::get('kategori/hapus/{kategori}',[KategoriController::class,'destroy']);
    Route::resource('artikel', ArtikelController::class);
    Route::resource('slide', SlideController::class);
});

Route::get('slide/hapus/{slide}',[SlideController::class,'destroy']);

Route::get('artikel/hapus/{artikel}',[ArtikelController::class,'destroy']);