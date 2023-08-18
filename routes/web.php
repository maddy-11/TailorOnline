<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company\CompanyController;

use App\Http\Controllers\Customer\CustomerController;

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

Route::get('/', [CompanyController::class, 'login'])->name('company-login');
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Auth::routes();
});
Route::group(['namespace' => 'Company', 'prefix' => 'company', 'as' => 'company.'], function () {
    Route::get('/login', [CompanyController::class, 'login'])->name('company-login');
    Route::post('/login', [CompanyController::class, 'loginProcess'])->name('company-loginProcess');
});
Route::group(['namespace' => 'Customer', 'prefix' => 'customer', 'as' => 'customer.'], function () {
    Route::get('/login', [CustomerController::class, 'login'])->name('customer-login');
    Route::post('/login', [CustomerController::class, 'loginProcess'])->name('customer-loginProcess');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
