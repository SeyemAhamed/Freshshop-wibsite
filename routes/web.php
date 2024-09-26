<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\BackendCategoryControoler;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[HomeController::class, 'index']);
Route::get('/product/detalis/{id}', [HomeController::class, 'productDetalis']);
Route::get('/product/view-cart',[HomeController::class,'viewCart']);
Route::get('/product/Checkout',[HomeController::class,'productCheckout']);
Route::get('/shop/product',[HomeController::class,'shopProduct']);
Route::get('/return/product',[HomeController::class,'returnProduct']);
Route::get('/privacy/policy',[HomeController::class,'privacyPolicy']);
Route::get('/terms/Conditions',[HomeController::class,'termsConditions']);
Route::get('/refund/policy',[HomeController::class,'refundPolicy']);
Route::get('/about-us',[HomeController::class,'aboutUs']);
Route::get('/contact-us',[HomeController::class,'contactUs']);
Route::get('/blog-page',[HomeController::class,'blogPage']);
Route::get('/careers-page',[HomeController::class,'careersPage']);


 
Auth::routes();


Route::get('/admin/login',[AdminController::class,'login']);
Route::post('/admin/login-access',[AdminController::class,'loginAccess']);

Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

//Category.....
Route::get('/admin/category/list',[CategoryController::class, 'categoryList']);
Route::get('/admin/category/create',[CategoryController::class, 'categoryCreate']);
Route::post('/admin/category/Store',[CategoryController::class, 'categoryStore']);
Route::get('/admin/category/delete{id}',[CategoryController::class, 'categoryDelete']);
Route::get('/admin/category/edit{id}',[CategoryController::class, 'categoryEdit']);
Route::post('/admin/category/update{id}',[CategoryController::class, 'categoryUpdate']);

//SubCategory....
Route::get('/admin/sub-category/list',[SubCategoryController::class, 'subCategoryList']);
Route::get('/admin/sub-category/create',[SubCategoryController::class, 'subCategoryCreate']);
Route::post('/admin/sub-category/Store',[SubCategoryController::class, 'subCategoryStore']);
Route::get('/admin/sub-category/delete{id}',[SubCategoryController::class, 'subCategoryDelete']);
Route::get('/admin/sub-category/edit{id}',[SubCategoryController::class, 'subCategoryEdit']);
Route::post('/admin/sub-category/update{id}',[SubCategoryController::class, 'subCategoryUpdate']);

//Products.....
Route::get('/admin/product/list',[ProductController::class, 'productList']);
Route::get('/admin/product/create',[ProductController::class, 'productCreate']);
Route::post('/admin/product/Store',[ProductController::class, 'productStore']);
Route::get('/admin/product/delete{id}',[ProductController::class, 'productDelete']);
Route::get('/admin/product/edit{id}',[ProductController::class, 'productEdit']);
Route::post('/admin/product/update{id}',[ProductController::class, 'productUpdate']);

//Add to Cart....
Route::post('/addtocart-detalis/{id}',[HomeController::class, 'addtoCartDetalis']);
Route::get('/addtocart-home/{id}',[HomeController::class, 'addtoCartHome']);