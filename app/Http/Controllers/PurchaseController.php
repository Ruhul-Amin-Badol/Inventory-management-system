<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Product;
use App\Models\supplier;
use App\Models\SupplierPaymentList;
use App\Models\purchase_short;
use App\Models\SupplierLedger;
use App\Models\Company_datails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = purchase_short::all();
        return view('admin.purchase.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        $supplier = supplier::all();
        return view('admin.purchase.create',compact('product','supplier'));
    }
    public function proData($id)
    {
        return $proData = Product::where('id','=',$id)->select('productRate','productCode')->get();
        // $data = response()->json($proData,200);
    }
    public function purMax()
    {
        $pmax = Purchase::select(DB::raw('max(purchaseShortID) as pMax'))->get();
        foreach ($pmax as $value) {
            $max = $value['pMax'];
        }
        $newMax = 1;
        if($max<1)
        {
            $newMax = 1;
        }
        else {
            $newMax +=1;
        }
        return $newMax;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pid = PurchaseController::purMax();
        $supplierID = $request->supplierID;
        $invNumber = $request->invNumber;
        $supplierName = $request->supplierName;
        $purchaseDate = $request->purchaseDate;
        $productID = $request->productID;
        $prodCode = $request->prodCode;
        $prodQty = $request->prodQty;
        $prodRate = $request->prodRate;
        $totalPrice = $request->totalPrice;
        $grandTotal = $request->grandTotal;
        $paidAmount = $request->paidAmount;
        $duesAmount = $request->duesAmount;
        $transection = $request->transactionMethod;
        $note = $request->note;
        for($i =0; $i<count($productID);$i++)
        {
            $data = [
                'purchaseShortID'=>$pid,
                'productID'=>$productID[$i],
                'prodCode'=>$prodCode[$i],
                'invNumber'=>$invNumber,
                'purchaseDate'=>$purchaseDate,
                'supplierID'=>$supplierID,
                'supplierName'=>$supplierName,
                'prodQty'=>$prodQty[$i],
                'prodRate'=>$prodRate[$i],
                'totalPrice'=>$totalPrice[$i],
            ];
            $purInsert = Purchase::create($data);
        }
        $grandTotal;
        $short_data = [
            'purchaseSID'=>$pid,
            'invNumber'=>$invNumber,
            'supplierName'=>$supplierName,
            'purchaseDate'=>$purchaseDate,
            'grandTotal'=>$grandTotal,
            'paidAmount'=>$paidAmount,
            'duesAmount'=>$duesAmount,
            'note'=>$note
        ];
        $purShort = purchase_short::create($short_data);
        if($purShort)
        {
            $sFind = supplier::find($supplierID);
            $supPaymentData = [
                'purchaseSID'=>$pid,
                'invNumber'=>$invNumber,
                'supplierID'=>$supplierID,
                'supplierName'=>$supplierName,
                'paymentDate'=>$purchaseDate,
                'transactionMethod'=>$transection,
                'supplierPrevBalance'=>$sFind->supplierCurrentBalance,
                'paymentAmount'=>$paidAmount,
                'duesAmount'=>$duesAmount,
                'supplierCurrentBalance'=>$sFind->supplierCurrentBalance+$duesAmount,
                'note'=>$note
            ];
            SupplierPaymentList::create($supPaymentData);
        }
        if($purInsert)
        {
            //Supplier balance update...
            $sFind = supplier::find($supplierID);
            $supCurrBal = $duesAmount+$sFind->supplierCurrentBalance;
            $supPrevBal = $sFind->supplierCurrentBalance;
            $update =[
                'supplierCurrentBalance'=>$supCurrBal,
                'supplierprevioustBalance'=>$supPrevBal,
            ];

            //stockBalance Update...
            $sFind->update($update);
            for($i=0;$i<count($productID);$i++)
            {
                $findPro = Product::find($productID[$i]);
                $newProBal = $prodQty[$i]+$findPro->stockBalance;
                $stockUpdate = [
                    'stockBalance'=> $newProBal
                ];
                $findPro->update($stockUpdate);
            }
        }

        if($purInsert)
        {
            $supLedgerData = [
                'supplierID'=>$supplierID,
                'supplierName'=>$supplierName,
                'invNumber'=>$invNumber,
                'paymentDate'=>$purchaseDate,
                'particular'=>0,
                'supPrevBal'=>$grandTotal,
                'paymentAmount'=>$paidAmount,
            ];
            SupplierLedger::create($supLedgerData);
        }
        return redirect('purchase')->with('success' , 'Purchase Data and Related Stocks Updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }
    public function invoice($pSID)
    {
        $companyData = Company_datails::find(1);
        $purFind = Purchase::where('purchaseShortID','=',$pSID)->get();
        $purSFind = purchase_short::find($pSID);
        $proName;
        for($i=0;$i<count($purFind);$i++)
        {
            $products = Product::find($purFind[$i]['productID']);
            $proName[$i] = $products['productName'];
        }
        $supplier = supplier::find($purFind[0]['supplierID']);
        return view('admin.purchase.purchaseInvoice',compact('purFind','purSFind','companyData','supplier','proName'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Purchase::where('purchaseShortID','=',$id)->delete();
        purchase_short::where('purchaseSID','=',$id)->delete();
        return redirect()->back();
    }
}
