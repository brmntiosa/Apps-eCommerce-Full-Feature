<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SessionController;
use App\Http\Controllers\Site\AdminController;
use App\Http\Controllers\Site\AdminProductController;
use App\Http\Controllers\Site\AdminUserController;
use App\Http\Controllers\Site\AuthController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\VerificationController;
use App\Http\Controllers\Site\UserController;
use App\Http\Controllers\Site\WishlistController;
use App\Models\Wishlist;

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
    return view('welcome');
});

Route::get('/register', [UserController::class, 'loadRegister']);
Route::post('/register', [UserController::class, 'studentRegister'])->name('studentRegister');
Route::get('/login', function () {
    return redirect('/');
});
Route::get('/', [UserController::class, 'loadLogin']);
Route::post('/login', [UserController::class, 'userLogin'])->name('userLogin');
Route::post('/login', [UserController::class, 'userLogin'])->name('login');

Route::get('/verification/{id}', [UserController::class, 'verification']);
Route::post('/verified', [UserController::class, 'verifiedOtp'])->name('verifiedOtp');

Route::get('/resend-otp', [UserController::class, 'resendOtp'])->name('resendOtp');

Route::get('/home', [HomeController::class, 'getIndex'])->name('site.home.getIndex');
Route::group(['middleware' => 'custom.login'], function () {
    Route::get('/dashboard', [UserController::class, 'loadDashboard']);
});


Route::get('/admin', [AdminController::class, 'index'])->name('site.admin.getIndex');
Route::get('/admin/user', [AdminUserController::class, 'index'])->name('site.admin.getIndex');
Route::get('/admin/edit/{id}', [AdminUserController::class, 'editUser'])->name('site.admin.editUser');
Route::put('/admin/update/{id}', [AdminUserController::class, 'updateUser'])->name('site.admin.updateUser');
Route::post('/admin/delete/{id}', [AdminUserController::class, 'deleteUser'])->name('site.admin.deleteUser');
// Admin Products
Route::get('/admin/product', [AdminProductController::class, 'index'])->name('site.admin.getIndex');
Route::get('/admin/product/edit/{id}', [AdminProductController::class, 'editProduct'])->name('site.admin.editProduct');
Route::put('/admin/product/update/{id}', [AdminProductController::class, 'updateProduct'])->name('site.admin.updateProduct');
Route::delete('/admin/product/delete/{id}', [AdminProductController::class, 'deleteProduct'])->name('site.admin.deleteProduct');
Route::get('/admin/logout', [AdminProductController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/admin/product/add', [AdminProductController::class, 'layoutAddProduct'])->name('site.admin.addProduct');
Route::post('/admin/product/add', [AdminProductController::class, 'addProduct'])->name('site.admin.addProduct');


Route::get('/kategori/search', 'App\Http\Controllers\Site\KategoriController@getIndex')->name('site.kategori.searchByName');


// Wishlist

Route::middleware(['auth'])->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('site.wishlist.index');
    Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('site.wishlist.addToWishlist');

    Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'removeFromWishlist'])->name('site.wishlist.removeFromWishlist');

    // Tambahkan rute untuk menghapus produk dari wishlist jika diperlukan
});
//////////////////////////////////////////////////

// Route::get('/login', [AuthController::class, 'get_login'])->name('login');
// Route::get('/register', [AuthController::class, 'get_register'])->name('register');
// Route::post('/login', [AuthController::class, 'post_login']);
// Route::post('/register', [AuthController::class, 'post_register']);
// Route::get('/email/verify/need-verification', [VerificationController::class, 'notice'])->middleware('auth')->name('verification.notice');
// Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
// Route::get('/email/verify/resend-verification', [VerificationController::class, 'send'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Route::middleware(['auth', 'auth.session', 'verified'])->group(function () {
// });
// Route::get('/home', 'App\Http\Controllers\Site\HomeController@getIndex')->name('site.home.getIndex');
/////////////////////////////////////////////////


// Route::post('/sesi/create', [SessionController::class, 'create']);
Route::get('/sesi/logout', [SessionController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/kategori', 'App\Http\Controllers\Site\KategoriController@getIndex')->name('site.kategori.getIndex');




Route::get('/produk/{id}', 'App\Http\Controllers\Site\ProdukController@getIndex')->name('site.produk.getIndex');
// Route::get('/', 'App\Http\Controllers\Site\HomeController@getIndex')->name('site.home.getIndex');

// Route::post('/login', 'App\Http\Controllers\Site\LoginController@post')->name('site.login.post');



Route::middleware(['auth'])->group(function () {
    Route::get('/produk/{id}', [HomeController::class, 'show'])->name('site.produk.getIndex');
});
