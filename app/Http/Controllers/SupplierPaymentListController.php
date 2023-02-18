<?php

namespace App\Http\Controllers;

use App\Models\SupplierPaymentList;
use App\Models\supplier;
use App\Models\SupplierLedger;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SupplierPaymentListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $suppayment=SupplierPaymentList::all();
        return view('admin.supplierledger_list.index',compact('suppayment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $suppayment=supplier::get(['id', 'supplierName']);
        return view('admin.supplierledger_list.create',compact('suppayment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $supID=$request->supID ;
        $suppliername=$request->supplierName;
        $paymentDate=$request->paymentDate;
        $note=$request->note;
        $transactionMethod=$request->transactionMethod;
        $paymentAmount=$request->paymentAmount;

        $findSupp = supplier::find($supID);
        $peymentlistinsert=[
                'supplierID'=> $supID,
                'supplierName'=> $suppliername,
                'paymentDate'=> $paymentDate,
                'invNumber'=> 0,
                'transactionMethod'=> $transactionMethod,
                'supplierPrevBalance'=> $findSupp->supplierCurrentBalance,
                'paymentAmount'=>$paymentAmount,
                'supplierCurrentBalance'=>$findSupp->supplierCurrentBalance-$paymentAmount
        ];
         $dataInsert = supplierPaymentList::create($peymentlistinsert);
         if($dataInsert){
            $findsupplier=supplier::find($supID);
            $supBlncUpdate = $findsupplier->supplierCurrentBalance - $paymentAmount;
            $UpdateBlnc =[
                'supplierCurrentBalance'=> $supBlncUpdate,
                'supplierprevioustBalance'=> $findSupp->supplierCurrentBalance
            ];
            $findsupplier->update($UpdateBlnc);
         }
         $supleger = [
            'supplierID' =>$request->supID,
            'supplierName' =>$suppliername,
            'invNumber' =>0,
            'particular' =>$request->transactionMethod,
            'paymentDate' => $request->paymentDate,
            'supPrevBal' => 0,
            'paymentAmount'=>$request->paymentAmount,
        ];
        SupplierLedger::create($supleger);
        return redirect('SupplierPaymentList');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SupplierPaymentList  $supplierPaymentList
     * @return \Illuminate\Http\Response
     */
    public function show(SupplierPaymentList $supplierPaymentList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SupplierPaymentList  $supplierPaymentList
     * @return \Illuminate\Http\Response
     */
    public function edit(SupplierPaymentList $supplierPaymentList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SupplierPaymentList  $supplierPaymentList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupplierPaymentList $supplierPaymentList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SupplierPaymentList  $supplierPaymentList
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupplierPaymentList $supplierPaymentList)
    {
        //
    }
}
