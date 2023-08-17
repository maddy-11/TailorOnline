<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Company\SupplierController;
use App\Http\Controllers\Company\LoanApplicationController;
use App\Http\Controllers\Company\CompanyController;

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

Route::get('/', [CompanyController::class, 'index'])->name('dashboard');
Route::get('/signout', [CompanyController::class, 'signOut'])->name('signout');

Route::post('/signout', [CompanyController::class, 'signOut'])->name('signout');
Route::resource('company',CompanyController::class);


Route::get('suppliers/list', [SupplierController::class, 'list'])->name('suppliers.list');
Route::get('suppliers/change-password/{id}', [SupplierController::class, 'changePassword'])->name('suppliers.change-password');
Route::post('suppliers/update-password', [SupplierController::class, 'update_password'])->name('supplier.update-password');
Route::resource('suppliers', SupplierController::class);
 
Route::get('loanapplications/list', [LoanApplicationController::class, 'list'])->name('loanapplications.list');

Route::get('loanapplications/loan-applications-deliverorderinvoice/{id}',[LoanApplicationController::class,'changeLoanApplication'])->name('loanapplication.deliverorderinvoice.form');
Route::post('loanapplications/loan-applications/deliverorderinvoice',[LoanApplicationController::class,'updateLoanApplication'])->name('loanapplication.deliverorderinvoice'); 

Route::get('loanapplications/repayloan/{id}',[LoanApplicationController::class,'LoanRepayment'])->name('loanapplication.repayloan.form');
Route::post('loanapplications/repayloan',[LoanApplicationController::class,'LoanRepaymentUpdate'])->name('loanapplication.repayloan'); 


Route::resource('loanapplications',(LoanApplicationController::class));
