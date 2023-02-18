<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SubcatagoryController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CompanyDatailsController;
use App\Http\Controllers\CustomerLedgerReportController;
use App\Http\Controllers\SupplierLedgerReportController;
use App\Http\Controllers\StockledegerController;
use App\Http\Controllers\SupplierPaymentListController;
use App\Http\Controllers\CustomerPaymentListController;
use App\Http\Controllers\SupplierLedgerController;
use App\Http\Controllers\CustomerLedgerController;
use App\Http\Controllers\SalesreportController;
use App\Http\Controllers\purchaseLedgerReport;

Route::get('/', function () {
    return view('admin.auth.login');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('admin.index');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/catagory', CatagoryController::class);
    Route::resource('/subcatagory', SubcatagoryController::class);
    Route::resource('/supplier',SupplierController::class);
    Route::resource('/customer', CustomerController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/purchase', PurchaseController::class);
    Route::get('/purchaseInvoice/{id}', [PurchaseController::class,'invoice']);
    Route::get('purchase_pro_data/{id}', [PurchaseController::class,'proData']);
    Route::get('purchaseMax/{id}', [PurchaseController::class,'purMax']);
    Route::resource('/sales', SalesController::class);
    
    Route::get('/salesInvoice/{id}', [SalesController::class,'invoice']);
    Route::get('/customerledger', [CustomerLedgerReportController::class,'index']);
    Route::get('/customerinvoice', [CustomerLedgerReportController::class,'invoice']);
    Route::resource('company', CompanyDatailsController::class);
    Route::resource('SupplierPaymentList', SupplierPaymentListController::class);
    Route::resource('customerPaymentList', CustomerPaymentListController::class);
    Route::get('/supplierledger', [SupplierLedgerReportController::class,'index']);
    Route::get('/supplierinvoic', [SupplierLedgerReportController::class,'invoice']);
    Route::resource('/stockledeger', StockledegerController::class);
    Route::get('/stockprint', [StockledegerController::class,'prints']);
    Route::post('/stockledgersearch', [StockledegerController::class,'stocksearch']);
    // Route::post('/stockledgersearch', [StockledegerController::class,'stocksearch']);
    Route::resource('/supplierPaymentLedger', SupplierLedgerController::class);
    Route::resource('/customerPaymentLedger', CustomerLedgerController::class);
    Route::get('/salesreports', [SalesreportController::class, 'index']);
    Route::get('/purchasereport', [purchaseLedgerReport::class,'index']);

});

require __DIR__.'/auth.php';
