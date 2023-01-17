<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;


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
    return view('welcome');
});


Route::get(
    '/login',
    [LoginController::class, 'show']
)->name('login');

Route::get(
    '/register',
    [RegisterController::class, 'show']
)->name('register');



Route::get(
    '/album',
    [AlbumController::class, 'showAlbum']
)->name('album');




Route::get(
    '/homePhotos',
    [AlbumController::class, 'showMain']
)->name('homePhotos');


Route::post(
    '/register',
    [RegisterController::class, 'store']
)->name('insertUser');

Route::post(
    '/photoAlbumInsert',
    [AlbumController::class, 'store']
)->name('photoAlbumInsert');

Route::post(
    '/photoInsert',
    [PhotoController::class, 'store']
)->name('photoInsert');


Route::post(
    '/login',
    [LoginController::class, 'authenticate']
)->name('authenticate');


Route::post(
    '/logout',
    [SessionController::class, 'logout']
)->name('logout');
