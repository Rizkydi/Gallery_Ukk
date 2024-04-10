<?php

use App\Http\Controllers\AuthController;
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



// Users page setelah login
Route::get('/home', function () {
    return view('welcome');
});