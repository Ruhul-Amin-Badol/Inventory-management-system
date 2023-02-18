<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $allsupplier=supplier::all();
        return view('admin.supplier.supplier_entry')->with('supplierpass',$allsupplier);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.supplier.supplier_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        supplier::insert([
            'supplierName'=>$request->name,
            'supplierEmail'=>$request->email,
            'supplierPhone'=>$request->phone,
            'supplierAddress'=>$request->address,
            'note'=>$request->note,
            'supplierprevioustBalance'=>$request->prvbalance,
            'supplierCurrentBalance'=>$request->curbalance
        ]);
        return redirect('supplier');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(supplier $supplier)
    {
        return view('admin.supplier.supplier_show')->with('supshow',$supplier);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(supplier $supplier)
    {
        return view ('admin.supplier.supplier_edit')->with('supshow',$supplier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, supplier $supplier)
    {
        $input=$request->all();
        $supplier->supplierName=$request->name;
        $supplier->supplierEmail=$request->email;
        $supplier->supplierPhone=$request->phone;
        $supplier->note=$request->note;
        $supplier->supplierAddress=$request->address;
        $supplier->supplierprevioustBalance=$request->prvbalance;
        $supplier->supplierCurrentBalance=$request->curbalance;
        $supplier->update();
        return redirect('supplier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($supplier)
    {
        supplier::destroy($supplier);
        return redirect('supplier');
    }
}
