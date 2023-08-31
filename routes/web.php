<?php

use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\itemController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\authController;
use App\Http\Controllers\guestController;
use App\Http\Controllers\userController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [guestController::class, 'index'])->name('index');
Route::get('/welcome/admin', [itemController::class, 'allItem'])->name('welcomeAdmin')->middleware('authAdmin');

Route::get('/add/item', [itemController::class, 'addItem'])->name('addItem')->middleware('authAdmin');
Route::POST('/store/item', [itemController::class, 'storeItem'])->name('storeItem')->middleware('authAdmin');
Route::get('/item/{id}', [itemController::class, 'itemDetail'])->name('itemDetail')->middleware('auth');

Route::get('/edit/item/{id}', [itemController::class, 'editItem'])->name('editItem')->middleware('authAdmin');
Route::PATCH('/update/item/{id}', [itemController::class, 'updateItem'])->name('updateItem')->middleware('authAdmin');
Route::delete('/delete/item/{id}', [itemController::class, 'deleteItem'])->name('deleteItem')->middleware('authAdmin');
Route::get('confirm/delete/{id}', [itemController::class, 'confirmDelete'])->name('confirmDelete')->middleware('authAdmin');

// Category sudah termasuk authorization, cek di Category controller
Route::get('/add/category', [categoryController::class, 'addCategory'])->name('addCategory');
Route::post('/store/category', [categoryController::class, 'storeCategory'])->name('storeCategory');
Route::get('/show/category', [categoryController::class, 'showCategory'])->name('showCategory');
Route::get('/category/{id}', [categoryController::class, 'categoryDetail'])->name('categoryDet');
Route::get('/edit/category/{id}', [categoryController::class, 'editCategory'])->name('editCategory');
Route::patch('/update/category/{id}', [categoryController::class, 'updateCategory'])->name('updateCategory');
Route::delete('/delete/category/{id}', [categoryController::class, 'deleteCategory'])->name('deleteCategory');

Route::get('/register', [authController::class, 'registerPage'])->name('registerUser');
Route::post('/register', [authController::class, 'fillRegister'])->name('fillRegister');

Route::get('/login', [authController::class, 'login'])->name('login');
Route::post('/login', [authController::class, 'authenticate'])->name('auth');
Route::post('/logout', [authController::class, 'logout'])->name('logout');

Route::get('/welcome/user', [userController::class, 'user'])->name('user')->middleware('auth');

Route::get('/add/checkout/{id}', [orderController::class, 'createOrder'])->name('checkout')->middleware('auth');
Route::post('/store/checkout/{id}', [orderController::class, 'storeOrder'])->name('storeOrder')->middleware('auth');

// tidak ada showorder di blade karena tidak ada req nya di project
Route::get('/show/order', [orderController::class, 'showOrder'])->name('showOrder')->middleware('auth');
