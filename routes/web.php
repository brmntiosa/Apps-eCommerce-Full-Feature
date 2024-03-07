<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SessionController;
use App\Http\Controllers\Site\AdminController;
use App\Http\Controllers\Site\AuthController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\VerificationController;

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

Route::get('/', [HomeController::class, 'getIndex'])->name('site.home.getIndex');
// Route::get('/login', [SessionController::class, 'index'])->name('login');
Route::post('/sesi/login', [SessionController::class, 'login']);
Route::get('/sesi/register', [SessionController::class, 'register']);

//////////////////////////////////////////////////
Route::get('/login', [AuthController::class, 'get_login'])->name('login');
Route::get('/register', [AuthController::class, 'get_register'])->name('register');
Route::post('/login', [AuthController::class, 'post_login']);
Route::post('/register', [AuthController::class, 'post_register']);
Route::get('/email/needverification', [VerificationController::class, 'notice'])->middleware('auth')->name('verification.notice');
/////////////////////////////////////////////////

Route::post('/sesi/create', [SessionController::class, 'create']);
Route::get('/sesi/logout', [SessionController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/kategori', 'App\Http\Controllers\Site\KategoriController@getIndex')->name('site.kategori.getIndex');

Route::get('/home', 'App\Http\Controllers\Site\HomeController@getIndex')->name('site.home.getIndex');

Route::get('/sesi', function () {
    return redirect('/login');
});
Route::get('/produk/{id}', 'App\Http\Controllers\Site\ProdukController@getIndex')->name('site.produk.getIndex');
// Route::get('/', 'App\Http\Controllers\Site\HomeController@getIndex')->name('site.home.getIndex');

// Route::post('/login', 'App\Http\Controllers\Site\LoginController@post')->name('site.login.post');



Route::get('/produk/{id}', [HomeController::class, 'show'])->name('site.produk.getIndex');
Route::middleware(['auth'])->group(function () {
});
