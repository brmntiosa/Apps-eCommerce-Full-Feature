<?php

use App\Models\Wishlist;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\AuthController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\UserController;
use App\Http\Controllers\Site\AdminController;
use App\Http\Controllers\Site\SessionController;
use App\Http\Controllers\Site\WishlistController;
use App\Http\Controllers\Site\AdminUserController;
use App\Http\Controllers\Site\AdminProductController;
use App\Http\Controllers\Site\VerificationController;
use App\Http\Controllers\site\AdminCategoriController;

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


//Login, Logout dan register
Route::get('/sesi/logout', [SessionController::class, 'logout'])->name('logoutuser')->middleware('auth');
Route::get('/register', [UserController::class, 'loadRegister']);
Route::post('/register', [UserController::class, 'userRegister'])->name('userRegister');
Route::get('/', [UserController::class, 'loadLogin']);
Route::get('/login', [UserController::class, 'loadLogin'])->name('index.userLogin');
Route::post('/login', [UserController::class, 'userLogin'])->name('process.userLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/verification/process/{id}', [UserController::class, 'verificationProcess'])->name('process.verification');
Route::get('/verification/register/{id}', [UserController::class, 'verificationRegisterIndex'])->name('indexRegister.verification');
Route::get('/verification/login/{id}', [UserController::class, 'verificationLoginIndex'])->name('indexLogin.verification');

Route::post('/verified', [UserController::class, 'verifiedOtp'])->name('verifiedOtp');
Route::get('/resend-otp', [UserController::class, 'resendOtp'])->name('resendOtp');

Route::group(['middleware' => 'custom.login'], function () {
    Route::get('/dashboard', [UserController::class, 'loadDashboard']);
});

//User
Route::group(['middleware' => ['isUser']], function () {
    Route::get('/home', [HomeController::class, 'getIndex'])->name('site.home.getIndex');
    Route::get('/kategori/search', 'App\Http\Controllers\Site\KategoriController@getIndex')->name('site.kategori.searchByName');
    Route::get('/kategori', 'App\Http\Controllers\Site\KategoriController@getIndex')->name('site.kategori.getIndex');
    Route::get('/produk/{id}', [HomeController::class, 'show'])->name('site.produk.getIndex');
    Route::get('/wishlist', [WishlistController::class, 'index'])->name('site.wishlist.index');
    Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('site.wishlist.addToWishlist');
    Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'removeFromWishlist'])->name('site.wishlist.removeFromWishlist');
});

//Admin
Route::group(['middleware' => ['isAdmin']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('site.admin.dashboardGetIndex');
    Route::get('/admin/user', [AdminUserController::class, 'index'])->name('getIndex.users');
    Route::delete('/admin/delete/{id}', [AdminUserController::class, 'deleteUser'])->name('site.admin.deleteUser');
    Route::get('/admin/edit/{id}', [AdminUserController::class, 'editUser'])->name('site.admin.editUser');
    Route::put('/admin/update/{id}', [AdminUserController::class, 'updateUser'])->name('site.admin.updateUser');
    Route::post('/admin/addUser', [AdminUserController::class, 'addUser'])->name('site.admin.addUser');
    Route::delete('/admin/product/delete/{id}', [AdminProductController::class, 'deleteProduct'])->name('site.admin.deleteProduct');
    Route::get('/admin/product', [AdminProductController::class, 'index'])->name('site.admin.getIndex');
    Route::get('/admin/categories', [AdminCategoriController::class, 'index'])->name('site.admin.category.index');
    Route::post('/admin/addCategory', [AdminCategoriController::class, 'addCategory'])->name('site.admin.addCategory');
    Route::delete('/admin/categories/{id}', [AdminCategoriController::class, 'deleteCategory'])->name('site.admin.category.delete');
    Route::get('/admin/product/edit/{id}', [AdminProductController::class, 'editProduct'])->name('site.admin.editProduct');
    Route::put('/admin/product/update/{id}', [AdminProductController::class, 'updateProduct'])->name('site.admin.updateProduct');
    Route::get('/admin/product/add', [AdminProductController::class, 'layoutAddProduct'])->name('site.admin.addProduct');
    Route::post('/admin/product/add', [AdminProductController::class, 'addProduct'])->name('admin.addProduct');
});
Route::get('/admin/logout', [AdminProductController::class, 'logout'])->name('admin.logout')->middleware('auth');
