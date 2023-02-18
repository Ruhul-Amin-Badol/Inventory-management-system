<?php

namespace App\Http\Controllers;

use App\Models\Stockledeger;
use App\Models\Catagory;
use App\Models\Subcatagory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockledegerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $category=Catagory::all();
        $subcategory=Subcatagory::all();
        $product=Product::all();
        $total=Product::all()->sum('stockBalance');
        return view('admin.stockledger.index',compact('product','total','category','subcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function prints()
    {
        $product=Product::all();
        $total=Product::all()->sum('stockBalance');
        return view('admin.stockledger.stockledgerprint',compact('product','total')); 
        return view('admin.stockledger.stockledgerprint');
        // return view('admin.stockledger.stockledgerprint');
    }

    public function stocksearch(Request $request)
    {
        $category=Catagory::all();
        $subcategory=Subcatagory::all();

       $receive_category = $request->categoryid;
       $product=Product::where('categoryId', '=', $receive_category)->get();
       $total=Product::where('categoryId', '=', $receive_category)->sum('stockBalance');
       return view('admin.stockledger.index',compact('product','total','category','subcategory'));

        return view('admin.stockledger.stockledgersearch');
        // return view('admin.stockledger.stockledgerprint');
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stockledeger  $stockledeger
     * @return \Illuminate\Http\Response
     */
    public function show(Stockledeger $stockledeger)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stockledeger  $stockledeger
     * @return \Illuminate\Http\Response
     */
    public function edit(Stockledeger $stockledeger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stockledeger  $stockledeger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stockledeger $stockledeger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stockledeger  $stockledeger
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stockledeger $stockledeger)
    {
        //
    }
}
