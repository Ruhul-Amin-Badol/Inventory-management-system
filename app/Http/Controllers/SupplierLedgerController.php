<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\supplier;
use App\Models\SupplierLedger;
use App\Models\Company_datails;
use Illuminate\Support\Facades\DB;

class SupplierLedgerController extends Controller
{
    public function index(){
        $supplier = supplier::all();
        return view('admin.supplierPaymentLedger.index',compact('supplier'));
    }

    public function store(Request $supID)
    {
        $company = Company_datails::find(1);
        $supplierID = $supID->supID;
        $supplier = supplier::find($supID);
        $supplier = $supplier[0];
        $supplierData = SupplierLedger::where('supplierID','=',$supplierID)->get();
        $supPayment = SupplierLedger::where('supplierID','=',$supplierID)->sum('paymentAmount');
        $supPurchase = SupplierLedger::where('supplierID','=',$supplierID)->sum('supPrevBal');
        return view('admin.supplierPaymentLedger.printData',compact('supplierData','supPayment','supPurchase','company','supplier'));
    }
}
