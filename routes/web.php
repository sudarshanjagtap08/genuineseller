<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\InformationController;
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
 
Route::get('', [WelcomeController::class, 'index']);
Route::get('/forgotpass/sendOPTon', [WelcomeController::class, 'sendOPTon']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/seller/register', [RegisterController::class, 'sellerinsert'])->name('seller.register');
Route::post('/buyer/register', [RegisterController::class, 'buyerinsert'])->name('buyer.register');
/////////////////////////information//////////////////
Route::get('profile', [InformationController::class, 'informationEdit'])->name('profile');
Route::post('profile/update', [InformationController::class, 'profileupdate'])->name('profile.update');
Route::post('profile/update/seller', [InformationController::class, 'profileupdateseller'])->name('profile.update.seller');
////////////////////buyer/list///////////////////////
Route::get('buyer/list', [InformationController::class, 'informationbuyer'])->name('information.buyer');
Route::get('seller/list', [InformationController::class, 'informationseller'])->name('information.seller');
Route::get('seller/information/edit/{num}', [InformationController::class, 'informationsellerEdit']);
Route::post('information/update/seller/{num}', [InformationController::class, 'Sellerupdate']);
Route::get('buyer/information/edit/{num}', [InformationController::class, 'informationbuyerEdit']);
Route::post('information/update/buyer/{num}', [InformationController::class, 'Buyerupdate']);
///////////////////search///////////////
Route::post('/search', [InformationController::class, 'search'])->name('search');