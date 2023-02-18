<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Catagory;
use App\Models\Subcatagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $allproduct = DB::select('SELECT  products.id as id,products.productName, products.productCode,products.productRate,products.stockBalance,catagories.catagoryName,subcatagories.subCatagoryName FROM products INNER JOIN catagories ON products.`categoryId` = catagories.id INNER JOIN subcatagories ON products.`subCategoryId` = subcatagories.id');
        $allproduct=DB::table('products')
        ->join('catagories','products.categoryId','=','catagories.id')
        ->join('subcatagories','products.subCategoryId','=','subcatagories.id')
        ->select('products.*','catagories.catagoryName','subcatagories.subCatagoryName')->get();
        return view('admin.product.index')->with('prdcpass',$allproduct);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $catagories = DB::select('SELECT id,catagoryName FROM `catagories` ORDER BY catagoryName ASC');
        // $subCatagoryName = DB::select('SELECT id,subCatagoryName FROM `subcatagories` ORDER BY subCatagoryName ASC');
        $catagories=catagory::all();
        $subCatagoryName=subcatagory::all();
        return view('admin.product.create')->with('catagories',$catagories)->with('subCatagoryName',$subCatagoryName);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::insert([
            'productName'=>$request->productName,
            'productCode'=>$request->productCode,
            'categoryId'=>$request->catID,
            'subCategoryId'=>$request->subCatID,
            'productRate'=>$request->productRate,
            'stockBalance'=>$request->stockBalance,
        ]);
        return redirect('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {   
        // $catagories = DB::select('SELECT id,catagoryName FROM `catagories` ORDER BY catagoryName ASC');
        // $subCatagoryName = DB::select('SELECT id,subCatagoryName FROM `subcatagories` ORDER BY subCatagoryName ASC');
        $catagories=catagory::all();
        $subCatagoryName=subcatagory::all();
        return view ('admin.product.edit')->with('proshow',$product)->with('catagories',$catagories)->with('subCatagoryName',$subCatagoryName);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $alldata=Product::find($id);
        $alldata->update([
            'productName'=>$request->productName,
            'productCode'=>$request->productCode,
            'categoryId'=>$request->catID,
            'subCategoryId'=>$request->subCatID,
            'productRate'=>$request->productRate,
            'stockBalance'=>$request->stockBalance,
        ]);
        return redirect('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        Product::destroy($product);
        return redirect('product');
        
    }
}
