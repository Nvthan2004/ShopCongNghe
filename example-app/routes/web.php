<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
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


//cart
Route::middleware('auth')->get('/cart', [CartController::class, 'showCart'])->name('user.carts');


// thêm giỏ hàng
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
// sửa số lượng giỏ hàng
Route::put('/cart/update/{user_id}/{product_id}', [CartController::class, 'updateQuantity'])->name('cart.update');

Route::get('/cart/count', [CartController::class, 'getCartCount']);


//xóa giỏ hàng
Route::delete('/cart/delete/{userId}/{productId}', [CartController::class, 'delete'])->name('cart.delete');





//dao dien nguoi dung
// Đổi URL để tránh trùng lặp
// Route::get('/home', [CrudUserController::class, 'home_user'])->middleware('auth')->name('user.home');
// Route::get('/home', [ProductController::class, 'product_new'])->name('product.home');
Route::middleware('auth')->get('/home', [CrudUserController::class, 'home'])->name('user.home');


Route::middleware('auth')->get('/product/{id}', [ProductController::class, 'show_product'])->name('product.show');


//  Route::get('/products/detail', [UserController::class, 'product_detail'])->name('user.detail_product');

// chi tiết sản phẩm
Route::middleware('auth')->get('/product/{id}', [ProductController::class, 'show_product'])->name('product.show');
// danh sách sản phẩm
Route::middleware('auth')->get('/products', [ProductController::class, 'product_user_view'])->name('user.product_view');

//admin
Route::middleware('auth')->get('/admin/home', [AdminController::class, 'home'])->name('admin.home');
Route::middleware('auth')->get('/admin/product', [AdminController::class, 'crud_product'])->name('admin.product');
// Route::get('/admin/brands', [AdminController::class, 'crud_brand'])->name('admin.brand');

// list brand
Route::middleware('auth')->get('/admin/brands', [BrandController::class, 'list_brand'])->name('admin.brand');
//add brand
Route::middleware('auth')->get('/admin/add_brand', [BrandController::class, 'add_brand'])->name('admin.add_brand');
Route::post('/admin/add_brand', [BrandController::class, 'store'])->name('brands.store');

//delete brand
Route::delete('/admin/brands/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');
//update brand
Route::middleware('auth')->get('/admin/brands/{id}/edit', [BrandController::class, 'edit'])->name('brands.edit');
Route::put('/admin/brands/{id}', [BrandController::class, 'update'])->name('brands.update');

//list product
Route::middleware('auth')->get('/admin/product', [ProductController::class, 'list_product'])->name('admin.product');

Route::middleware('auth')->get('/admin/add_product', [ProductController::class, 'add_product'])->name('admin.add_product');
Route::post('/admin/add_product', [ProductController::class, 'create_product'])->name('products.add_product');

//update product
Route::middleware('auth')->get('/admin/product/{id}/edit', [ProductController::class, 'edit_product'])->name('products.edit');
Route::put('/admin/product/{id}', [ProductController::class, 'update_product'])->name('products.update');
//delete
Route::delete('/admin/product/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

//List Category
Route::middleware('auth')->get('/admin/categorys', [CategoryController::class, 'list_category'])->name('admin.category');

//add Category
Route::middleware('auth')->get('/admin/add_category', [CategoryController::class, 'add_category'])->name('admin.add_category');
Route::post('/admin/add_category', [CategoryController::class, 'create_cate'])->name('categorys.create_cate');

//delete cate
Route::delete('/admin/categorys/{id}', [CategoryController::class, 'destroy_category'])->name('categorys.destroy_category');

//update cate
Route::middleware('auth')->get('/admin/categorys/{id}/edit', [CategoryController::class, 'edit_cate'])->name('categorys.edit_cate');
Route::put('/admin/categorys/{id}', [CategoryController::class, 'update_cate'])->name('categorys.update_cate');




/// login User

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
// tiem kiem
Route::middleware('auth')->get('/search', [ProductController::class, 'search'])->name('user.product.search');






