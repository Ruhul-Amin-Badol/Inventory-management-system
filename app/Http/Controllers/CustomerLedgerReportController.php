<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\customer;
use Illuminate\Support\Facades\DB;

class CustomerLedgerReportController extends Controller
{
    public function index(){
        $customer=customer::all();
        $balance=DB::table('customers')->sum('customerCurrentBalance');
        return view('admin.customerledgerReport.index',compact('customer','balance'));
    }
    public function invoice(){
        $customer=customer::all();
        $balance=DB::table('customers')->sum('customerCurrentBalance');
        return view('admin.customerledgerReport.customerInvoice',compact('customer','balance'));
    }
}
