<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
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

//delete brand
Route::delete('/admin/brands/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');
//update brand
Route::get('/admin/brands/{id}/edit', [BrandController::class, 'edit'])->name('brands.edit');
Route::put('/admin/brands/{id}', [BrandController::class, 'update'])->name('brands.update');


//List Category
Route::get('/admin/categorys', [CategoryController::class, 'list_category'])->name('admin.category');

//add Category
Route::get('/admin/add_category', [CategoryController::class, 'add_category'])->name('admin.add_category');
Route::post('/admin/add_category', [CategoryController::class, 'create_cate'])->name('categorys.create_cate');

//delete cate
Route::delete('/admin/categorys/{id}', [CategoryController::class, 'destroy_category'])->name('categorys.destroy_category');

//update cate
Route::get('/admin/categorys/{id}/edit', [CategoryController::class, 'edit_cate'])->name('categorys.edit_cate');
Route::put('/admin/categorys/{id}', [CategoryController::class, 'update_cate'])->name('categorys.update_cate');

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





