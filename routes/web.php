<?php

use App\Http\Controllers\Backend\AdminController;
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
Route::get('/product/detalis', [HomeController::class, 'productDetalis']);
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