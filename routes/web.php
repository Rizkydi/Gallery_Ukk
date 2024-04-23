<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetailProfile;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\KomentarController;
use App\Models\komentar;
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

// Oauth Users
Route::get('/',[AuthController::class, 'login'])->name('login');
Route::post('/loginprocess',[AuthController::class, 'loginprocess'])->name('loginprocess');


Route::get('/register',[AuthController::class, 'register'])->name('register');
Route::post('/registeruser',[AuthController::class, 'registeruser'])->name('registeruser');

Route::get('/logout',[AuthController::class, 'logout'])->name('logout');

// Users setelah melakukan login (OnlyUser Fitur)
Route::get('/home',[FotoController::class, 'index'])->name('index')->middleware('auth');
Route::get('/formfoto',[FotoController::class, 'formfoto'])->name('formfoto');

// edit profile
Route::get('/userprofile',[ProfileController::class, 'userprofile'])->name('userprofile');
Route::get('/detailprofile',[ProfileController::class, 'detailprofile'])->name('detailprofile');
Route::get('/editprofile',[ProfileController::class, 'editprofile'])->name('editprofile');
Route::put('/updateprofile',[ProfileController::class, 'updateprofile'])->name('updateprofile');

//edit foto
Route::get('/changefoto',[FotoController::class, 'changefoto'])->name('changefoto');
Route::get('/changefoto/{id}',[FotoController::class, 'edit'])->name('foto.edit');
Route::put('/foto/{foto}', [FotoController::class, 'update'])->name('foto.update');

//delete foto
Route::get('/foto/delete/{foto}', [FotoController::class, 'destroy'])->name('foto.delete');

// Users Merelasikan Other Users (UserToUser Fitur)
//create photo
Route::post('/store', [FotoController::class, 'store'])->name('fotos.store');
//like fitur
Route::post('/foto/like/{foto}', [FotoController::class, 'like'])->name('foto.like');
Route::delete('/foto/unlike/{foto}', [FotoController::class, 'unlike'])->name('foto.unlike');
Route::get('/foto/checklike/{foto}', [FotoController::class, 'checkLike'])->name('foto.checklike');
Route::get('/foto/get-like-count/{foto}', [FotoController::class, 'getLikeCount'])->name('foto.getlikecount');

// buat show name di postingan user relasi
Route::get('/users/{name}', 'UserController@showByName')->name('users.showByName');

// store komentar
Route::post('/', [KomentarController::class, 'store'])->name('komentar.store');
// delete komentar
Route::delete('/komentar/{komentar}', [KomentarController::class, 'destroy'])->name('komentar.destroy');


// create album
Route::get('/createalbum',[AlbumController::class, 'createalbum'])->name('createalbum');
Route::get('/showalbum',[AlbumController::class, 'show'])->name('show');
// Route::get('/', [AlbumController::class, 'index'])->name('album');
Route::get('/makealbum', [AlbumController::class, 'makealbum'])->name('make.album');
Route::post('/storealbum', [AlbumController::class, 'store'])->name('store.album');
