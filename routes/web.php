<?php

use App\Http\Controllers\ChapterController;
use App\Http\Controllers\DanhmucController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TruyenController;
use Illuminate\Support\Facades\Auth;
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
//page
Route::get('', [IndexController::class, 'home']);
Route::get('/xemtruyen/{slug}', [IndexController::class, 'doctruyen'])->name('page.doctruyen');
Route::get('/xemchapter/{slug}', [IndexController::class, 'docchapter'])->name('page.docchapter');
Route::get('/the-loai/{slug}', [IndexController::class, 'theloai'])->name('page.theloai');
Route::get('/search', [IndexController::class, 'search'])->name('page.search');
Route::get('/tag/{tag}', [IndexController::class, 'tag'])->name('page.tag');
Route::get('/top-truyen/duoi-100-chuong', [IndexController::class, 'duoi100']);
Route::get('/top-truyen/100-500-chuong', [IndexController::class, 'duoi500']);
Route::get('/top-truyen/tren-500-chuong', [IndexController::class, 'tren500']);
Route::post('/truyennoibat',[TruyenController::class, 'truyennoibat']);
Route::post('/tab-danhmuc',[IndexController::class, 'tabdanhmuc']); 
Route::post('/chontheloai',[IndexController::class, 'chontheloai']); 

//admin
Auth::routes();

Route::get('/admincp', [App\Http\Controllers\HomeController::class, 'admincp'])->name('home');


Route::resource('/danhmuc', DanhmucController::class);
Route::resource('/truyen', TruyenController::class);
Route::resource('/chapter', ChapterController::class);
