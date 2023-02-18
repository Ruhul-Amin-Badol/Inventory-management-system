<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $allcustomer = customer::all();
        return view('admin.customer.index')->with('customer', $allcustomer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $customerName = $request->customerName;
            $customerEmail = $request->customerEmail;
            $customerPhone = $request->customerPhone;
            $customerAddress = $request->customerAddress;
            $note = $request->note;
            $custoPrevBalance = $request->custoPrevBalance;
            $customerCurrentBalance = $request->customerCurrentBalance;

        $customer = customer::create([
            'customerName' => $customerName,
            'customerEmail' => $customerEmail,
            'customerPhone' => $customerPhone,
            'customerAddress' => $customerAddress,
            'note' => $note,
            'custoPrevBalance' => $custoPrevBalance,
            'customerCurrentBalance' => $customerCurrentBalance,
        ]);

        return redirect('customer');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit (customer $customer)
    {
       return view('admin.customer.edit',)->with('customer', $customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update (Request $request, customer $customer)
    {
        $input = $request->all();
        $customer->update($input);
        return redirect('customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        customer::destroy($id);
        return redirect()->back();
    }
}
