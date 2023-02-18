<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\supplier;
use App\Models\Company_datails;
use Illuminate\Support\Facades\DB;

class SupplierLedgerReportController extends Controller
{
    public function index(){
        $supplier=supplier::all();
        $balance=DB::table('suppliers')->sum('supplierCurrentBalance');
        return view('admin.supplierLedgerReport.index',compact('supplier','balance'));
    }
    public function invoice(){
        $company = Company_datails::find(1);
        $supplier=supplier::all();
        $balance=DB::table('suppliers')->sum('supplierCurrentBalance');
        return view('admin.supplierLedgerReport.supplierinvoic',compact('supplier','balance','company'));
    }
}
