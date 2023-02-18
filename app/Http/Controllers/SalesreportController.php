<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\customer;
use App\Models\salesreport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SalesreportController extends Controller
{
    public function index()
    {
        $searchData = DB::table('sales')
       ->join('sales_shorts' , 'sales.salesSID','=','sales_shorts.id')
       ->join('products','sales.proID','=','products.id')
       ->select('sales.*','sales_shorts.*','products.*')
       ->get();
       return view('admin.salesreports.index',compact('searchData'));
    }
}
