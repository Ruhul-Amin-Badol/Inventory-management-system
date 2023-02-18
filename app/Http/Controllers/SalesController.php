<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Sales_short;
use App\Models\Product;
use App\Models\customer;
use App\Models\CustomerLedger;
use App\Models\CustomerPaymentList;
use App\Models\Company_datails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Sales_short::all();
        return view('admin.sales.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        $customer = customer::all();
        return view('admin.sales.create',compact('product','customer'));
    }
    public function maxsSID()
    {
        $max = Sales::select(DB::raw('max(salesSID) as maxsSID'))->get();
        $maxsSID;
        foreach($max as $value)
        {
            $maxsSID = $value['maxsSID'];
        }
        if($maxsSID<1)
        {
            $maxsSID +=1;
        }
        else
        {
            $maxsSID+=1;
        }
        return $maxsSID;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $maxSSID = SalesController::maxsSID();
        $customerID = $request->customerID;
        $invNumber = $request->invNumber;
        $customerName = $request->customerName;
        $purchaseDate = $request->purchaseDate;

        $prodCode = $request->prodCode;
        $productID = $request->productID;
        $prodQty = $request->prodQty;
        $prodRate = $request->prodRate;
        $totalPrice = $request->totalPrice;

        $transactionMethod = $request->transactionMethod;
        $note = $request->note;
        $grandTotal = $request->grandTotal;
        $paidAmount = $request->paidAmount;
        $duesAmount = $request->duesAmount;



        for($i=0;$i<count($productID);$i++)
        {
            $sales =
            [
                'salesSID'=>$maxSSID,
                'invNumber'=>$invNumber,
                'customerID'=>$customerID,
                'customerName'=>$customerName,
                'purchaseDate'=>$purchaseDate,
                'proID'=>$productID[$i],
                'prodCode'=>$prodCode[$i],
                'prodQty'=>$prodQty[$i],
                'prodRate'=>$prodRate[$i],
                'totalPrice'=>$totalPrice[$i],
            ];
            $salesInsert = Sales::create($sales);
        }
        if($salesInsert)
        {
            $salesShort = [
                'salesShortID'=>$maxSSID,
                'invNumber'=>$invNumber,
                'customerName'=>$customerName,
                'salesDate'=>$purchaseDate,
                'grandTotal'=>$grandTotal,
                'paidAmount'=>$paidAmount,
                'duesAmount'=>$duesAmount,
                'note'=>$note,
            ];
            $saleShortInsert = Sales_short::create($salesShort);
        }
        if($saleShortInsert)
        {
            $customerLedger =
            [
                'customerID'=>$customerID,
                'customerName'=>$customerName,
                'invNumber'=>$invNumber,
                'paymentDate'=>$purchaseDate,
                'particular'=>0,
                'purchaseAmount'=>$grandTotal,
                'paidAmount'=>$paidAmount,
                'totalBalance'=>$duesAmount,
            ];
            $customerLedgerInsert = CustomerLedger::create($customerLedger);
        }

        if($customerLedgerInsert)
        {
            $customer = customer::find($customerID);
            $custPmtListData =
            [
                'salesShortID'=>$maxSSID,
                'invNumber'=>$invNumber,
                'customerID'=>$customerID,
                'customerName'=>$customerName,
                'paymentDate'=>$purchaseDate,
                'transactionMethod'=>$transactionMethod,
                'custPrevBalance'=>$customer->customerCurrentBalance,
                'paymentAmount'=>$paidAmount,
                'duesAmount'=>$duesAmount,
                'custCurrBalance'=>$customer->customerCurrentBalance+$duesAmount,
                'note'=>$note
            ];
            $CustomerPaytList = CustomerPaymentList::create($custPmtListData);
            $custUpdateBal =
            [
                'custoPrevBalance'=>$customer->customerCurrentBalance,
                'customerCurrentBalance'=>$customer->customerCurrentBalance+$duesAmount,
            ];
            $customer->update($custUpdateBal);
        }
        if($salesInsert)
        {
            //stockBalance Update...
            for($i=0;$i<count($productID);$i++)
            {
                $findPro = Product::find($productID[$i]);
                $newProBal = $findPro->stockBalance-$prodQty[$i];
                $stockUpdate = [
                    'stockBalance'=> $newProBal
                ];
                $findPro->update($stockUpdate);
            }
        }
        return redirect('sales');
    }

    public function invoice($pSID)
    {
        $companyData = Company_datails::find(1);
        $purFind = Sales::where('salesSID','=',$pSID)->get();
        $purSFind = Sales_short::find($pSID);
        $proName;
        for($i=0;$i<count($purFind);$i++)
        {
            $products = Product::find($purFind[$i]['proID']);
            $proName[$i] = $products['productName'];
        }
        $supplier = customer::find($purFind[0]['customerID']);
        return view('admin.sales.salesInvoice',compact('purFind','purSFind','companyData','supplier','proName'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales)
    {
        //
    }
}
