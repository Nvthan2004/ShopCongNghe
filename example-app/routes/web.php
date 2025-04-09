<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;

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

Route::get('dashboard', [CrudUserController::class, 'dashboard']);
//admin
Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home');
Route::get('/admin/product', [AdminController::class, 'crud_product'])->name('admin.product');
// Route::get('/admin/brands', [AdminController::class, 'crud_brand'])->name('admin.brand');
Route::get('/admin/dashboard', [AdminController::class, 'drashboard'])->name('admin.dashboard');

// list brand
Route::get('/admin/brands', [BrandController::class, 'list_brand'])->name('admin.brand');
//add brand
Route::get('/admin/add_brand', [BrandController::class, 'add_brand'])->name('admin.add_brand');
Route::post('/admin/add_brand', [BrandController::class, 'store'])->name('brands.store');


Route::get('login', [CrudUserController::class, 'login'])->name('login');
Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');

Route::get('create', [CrudUserController::class, 'createUser'])->name('user.createUser');
Route::post('create', [CrudUserController::class, 'postUser'])->name('user.postUser');

Route::get('read', [CrudUserController::class, 'readUser'])->name('user.readUser');

Route::get('delete', [CrudUserController::class, 'deleteUser'])->name('user.deleteUser');

Route::get('update', [CrudUserController::class, 'updateUser'])->name('user.updateUser');
Route::post('update', [CrudUserController::class, 'postUpdateUser'])->name('user.postUpdateUser');

Route::get('list', [CrudUserController::class, 'listUser'])->name('user.list');

Route::get('signout', [CrudUserController::class, 'signOut'])->name('signout');

Route::get('/', function () {
    return view('welcome');
});





