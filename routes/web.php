<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SessionController;
use App\Http\Controllers\Site\AdminController;

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

Route::get('/', 'App\Http\Controllers\Site\HomeController@getIndex')->name('site.home.getIndex');
Route::get('/login', [SessionController::class, 'index'])->name('login');
Route::post('/sesi/login', [SessionController::class, 'login']);
Route::get('/sesi/register', [SessionController::class, 'register']);
Route::post('/sesi/create', [SessionController::class, 'create']);
Route::get('/sesi/logout', [SessionController::class, 'logout'])->name('logout')->middleware('auth');


Route::get('/kategori', 'App\Http\Controllers\Site\KategoriController@getIndex')->name('site.kategori.getIndex');

Route::get('/home', 'App\Http\Controllers\Site\HomeController@getIndex')->name('site.home.getIndex');

Route::get('/sesi', function () {
    return redirect('/login');
});

// Route::get('/', 'App\Http\Controllers\Site\HomeController@getIndex')->name('site.home.getIndex');

// Route::post('/login', 'App\Http\Controllers\Site\LoginController@post')->name('site.login.post');



Route::middleware(['auth'])->group(function () {


    Route::get('/produk/{id}', 'App\Http\Controllers\Site\ProdukController@getIndex')->name('site.produk.getIndex');
});

