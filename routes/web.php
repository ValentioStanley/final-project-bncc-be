<?php

use App\Models\Item;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\itemController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\userController;
use App\Http\Controllers\authController;

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

Route::get('/', [itemController::class, 'allItem'])->name('allItem');

Route::get('/add/item', [itemController::class, 'addItem'])->name('addItem');
Route::POST('/store/item', [itemController::class, 'storeItem'])->name('storeItem');
Route::get('/item/{id}', [itemController::class, 'itemDetail'])->name('itemDetail');

Route::get('/edit/item/{id}', [itemController::class, 'editItem'])->name('editItem');
Route::PATCH('/update/item/{id}', [itemController::class, 'updateItem'])->name('updateItem');
Route::delete('/delete/item/{id}', [itemController::class, 'deleteItem'])->name('deleteItem');
Route::get('confirm/delete/{id}', [itemController::class, 'confirmDelete'])->name('confirmDelete');

Route::resource('/item', itemController::class);

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

Route::get('/welcome/user', [userController::class, 'user'])->name('user');

Route::get('/checkout', [userController::class, 'checkoutUser'])->name('checkout');
