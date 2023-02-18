<?php

namespace App\Http\Controllers;

use App\Models\customer;
use App\Models\CustomerLedger;
use App\Models\CustomerPaymentList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerPaymentListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $custpayment = CustomerPaymentList::all();
        return view('admin.customerpaymentList.index',compact('custpayment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $custpayment = customer::get(['id','customerName']);
        return view('admin.customerpaymentList.create',compact('custpayment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cusID=$request->cusID ;
        $customerName=$request->customerName;
        $paymentDate=$request->paymentDate;
        $note=$request->note;
        $transactionMethod=$request->transactionMethod;
        $paymentAmount=$request->paymentAmount;

        $findcust = customer::find($cusID);
        $peymentlistinsert = [
            'customerID'=> $cusID,
            'customerName'=> $customerName,
            'paymentDate'=> $paymentDate,
            'invNumber'=> 0,
            'transactionMethod'=> $transactionMethod,
            'custPrevBalance'=> $findcust->customerCurrentBalance,
            'paymentAmount'=>$paymentAmount,
            'custCurrBalance'=>$findcust->customerCurrentBalance - $paymentAmount,
            'note'=>$note,
        ];

        $dataInsert=CustomerPaymentList::create($peymentlistinsert);
        if($dataInsert){
            $findcustomer = customer::find($cusID);
            $custBlncUpdate=$findcustomer->customerCurrentBalance - $paymentAmount;
            $UpdateBlnc=[
                'customerCurrentBalance'=>$custBlncUpdate,
                'custoPrevBalance'=>$findcust->customerCurrentBalance
            ];
            $findcustomer->update($UpdateBlnc);
        }
        $custledger =
        [
            'customerID' =>$request->cusID,
            'customerName' =>$customerName,
            'invNumber' =>0,
            'particular' =>$request->transactionMethod,
            'paymentDate' => $request->paymentDate,
            'supPrevBal' => 0,
            'paymentAmount'=>$request->paymentAmount,
        ];
        customerledger::create($custledger);
        return redirect('customerPaymentList');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerPaymentList  $customerPaymentList
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerPaymentList $customerPaymentList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerPaymentList  $customerPaymentList
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerPaymentList $customerPaymentList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerPaymentList  $customerPaymentList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerPaymentList $customerPaymentList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerPaymentList  $customerPaymentList
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerPaymentList $customerPaymentList)
    {
        //
    }
}
