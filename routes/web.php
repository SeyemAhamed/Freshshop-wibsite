<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SettingController;
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
Route::get('/addtocart-delete/{id}',[HomeController::class, 'addtoCartDelete']);

//Make Order....
Route::post('/confirm-order',[HomeController::class, 'confirmOrder']);
Route::get('/order-confirmed/{invoiceId}',[HomeController::class, 'thankyouPgae']);

//Search Products...
Route::get('/search-products',[HomeController::class,'searchProducts']);

//Category Products....
Route::get('/category-product/{id}',[HomeController::class, 'categoryProducts']);
Route::get('/sub-category-product/{id}',[HomeController::class, 'subCategoryProducts']);

//Settings.....
Route::get('/admin/general-setting',[SettingController::class, 'generalSetting']);
Route::post('/admin/general-setting/update',[SettingController::class, 'updateSetting']);
Route::get('/admin/home-banner',[SettingController::class, 'homeBanner']);
Route::post('/admin/home-banner/update',[SettingController::class, 'updatehomeBanner']);


//Orders....
Route::get('/admin/order/edit/{id}',[OrderController::class, 'editOrders']);
Route::post('/admin/order/update/{id}',[OrderController::class, 'updateOrders']);
Route::get('/admin/order/all-orders',[OrderController::class, 'allOrders']);
Route::get('/admin/order/today-orders',[OrderController::class, 'todayOrders']);
Route::get('/admin/order/pending-orders',[OrderController::class, 'pendingOrders']);
Route::get('/admin/order/confirmed-orders',[OrderController::class, 'confirmedOrders']);
Route::get('/admin/order/delivered-orders',[OrderController::class, 'deliveredOrders']);
Route::get('/admin/order/cancelled-orders',[OrderController::class, 'cancelledOrders']);
Route::get('/admin/order/status-pending/{id}',[OrderController::class, 'statusPending']);
Route::get('/admin/order/status-confirmed/{id}',[OrderController::class, 'statusConfirmed']);
Route::get('/admin/order/status-delivered/{id}',[OrderController::class, 'statusDelivered']);
Route::get('/admin/order/status-cancelled/{id}',[OrderController::class, 'statusCancelled']);
Route::get('/admin/order/details/{id}',[OrderController::class, 'orderDetails']);
Route::post('/admin/order/update/{id}',[OrderController::class, 'orderUpdate']);

//Authentication...
Route::get('/admin/logout',[SettingController::class, 'adminLogout']);
Route::get('/admin/credntials',[SettingController::class, 'admincredntials']);
Route::post('/admin/credntials/update',[SettingController::class, 'admincredntialsUpdate']);

//Employee...
Route::get('/admin/employee-list',[AdminController::class, 'employeeList']);
Route::get('/admin/employee-create',[AdminController::class, 'employeeCreate']);
Route::post('/admin/employee-store',[AdminController::class, 'employeeStore']);
Route::get('/admin/employee-edit/{id}',[AdminController::class, 'employeeEdit']);
Route::post('/admin/employee-update/{id}',[AdminController::class, 'employeeUpdate']);