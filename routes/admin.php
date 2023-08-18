<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\FieldController;
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

Route::get('/', function () {
    return view('admin.pages.dashboard');
});

/* Route::get('/login', function () {
    return view('admin.login');
}); */

Route::get('/listing', function () {
    return view('admin.pages.listing');
});

Route::get('/form', function () {
    return view('admin.pages.form');
});

Route::resource('dashboard', DashboardController::class);

Route::get('suppliers/list',[SupplierController::class,'list'])->name('suppliers.list');
Route::get('suppliers/change-password/{id}',[SupplierController::class,'changePassword'])->name('suppliers.change-password');
Route::post('suppliers/update-password',[SupplierController::class,'update_password'])->name('supplier.update-password');

Route::get('companies/supplier-change-status/{id}',[SupplierController::class,'changeSupplierStatus'])->name('company.suppliers.change-status');
Route::post('companies/supplier-status/update',[SupplierController::class,'updateSupplierStatus'])->name('companies.supplier.update-status');

Route::resource('suppliers', SupplierController::class);

Route::get('companies/list',[CompanyController::class,'list'])->name('companies.list');
Route::get('companies/change-password/{id}',[CompanyController::class,'changePassword'])->name('companies.change-password');
Route::post('companies/update-password',[CompanyController::class,'update_password'])->name('companies.update-password'); 
//Add Credit
Route::get('companies/add-credit/{id}',[CompanyController::class,'addCredit'])->name('companies.add-credit');
Route::post('companies/update-credit',[CompanyController::class,'update_credit'])->name('companies.update-credit'); 

Route::get('companies/loan-applications',[CompanyController::class,'loanApplications'])->name('companies.loan-applications');
Route::get('companies/loan-applications-list',[CompanyController::class,'listLoanApplications'])->name('company.loanapplications.list');

Route::get('companies/loan-applications-change-status/{id}',[CompanyController::class,'changeLoanApplicationStatus'])->name('company.loanapplication.change-status');
Route::post('companies/loan-applications/update',[CompanyController::class,'updateLoanApplicationStatus'])->name('companies.loanapplication.update-status'); 


Route::resource('companies', CompanyController::class);
Route::get('fields/change-status/{id}',[FieldController::class,'changeStatus'])->name('fields.change-status');
Route::post('fields/field-status/update',[FieldController::class,'updateStatus'])->name('fields.update-status'); 

Route::get('fields/list',[FieldController::class,'list'])->name('fields.list');
Route::resource('fields', FieldController::class);

 
 
