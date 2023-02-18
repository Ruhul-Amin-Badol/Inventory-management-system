<?php

namespace App\Http\Controllers;
use App\Models\Purchase;
use App\Models\Product;
use App\Models\purchase_short;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class purchaseLedgerReport extends Controller
{   
    public function index()
    {
        $data = DB::table('purchases')
       ->join('purchase_shorts' , 'purchases.purchaseShortID','=','purchase_shorts.purchaseSID')
       ->join('products','products.id','=','purchases.productID')
       ->select('purchases.*','purchase_shorts.*','products.productName')
       ->get();
       return view ('admin.purchaseledgerreport.index',compact('data'));
}
}
