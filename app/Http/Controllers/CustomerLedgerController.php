<?php

namespace App\Http\Controllers;

use App\Models\CustomerLedger;
use App\Models\customer;
use App\Models\Company_datails;
use Illuminate\Http\Request;

class CustomerLedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = customer::all();
        return view('admin.customerPaymentLedger.index',compact('customer'));
    }

    public function store(Request $id)
    {
        $company = Company_datails::find(1);
        $custID = $id->custID;
        $customer = customer::find($custID);
        $customerData = CustomerLedger::where('customerID','=',$custID)->get();
        $custPayment = CustomerLedger::where('customerID','=',$custID)->sum('paidAmount');
        $custPurchase = CustomerLedger::where('customerID','=',$custID)->sum('purchaseAmount');
        return view('admin.customerPaymentLedger.printData',compact('customerData','custPayment','custPurchase','company','customer'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerLedger  $customerLedger
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerLedger $customerLedger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerLedger  $customerLedger
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerLedger $customerLedger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerLedger  $customerLedger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerLedger $customerLedger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerLedger  $customerLedger
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerLedger $customerLedger)
    {
        //
    }
}
