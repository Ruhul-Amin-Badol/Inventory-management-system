<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Subcatagory;
use App\Models\catagory;
use Illuminate\Http\Request;

class SubcatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allSubCatagory=DB::table('subcatagories')
        ->join('catagories','subcatagories.catagoryID','=','catagories.id')
        ->select('subcatagories.*','catagories.catagoryName')
        ->get();
        return view('admin.subcatagory.index',compact('allSubCatagory'));
        // $allSubCatagory = Subcatagory::all();
        // $catagoryNames=[];
        // foreach($allSubCatagory as $row)
        // {

        //     $catName = DB::select("SELECT `catagoryName` FROM `catagories` WHERE `id`='$row->catagoryID'");

        //     foreach($catName as $cat)
        //     {
        //         array_push($catagoryNames,$cat->catagoryName);
        //     }
        // }
        // return view('admin.subcatagory.index')->with('allSubCatagory',$allSubCatagory)->with('catagoryNames',$catagoryNames);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $catagories=catagory::all();
        return view('admin.subcatagory.create')->with('catagory',$catagories);
        // $catagories = DB::select('SELECT id,catagoryName FROM `catagories` ORDER BY catagoryName ASC');
        // return view('admin.subcatagory.create')->with('catagories',$catagories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Subcatagory::insert(
            [
                'catagoryID'=>$request->catagoryName,
                'subCatagoryName'=>$request->subCatagoryName,
                'subCatagoryCode'=>$request->subCatagoryCode
            ]
        );
        return redirect('subcatagory');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcatagory  $subcatagory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcatagory $subcatagory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcatagory  $subcatagory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcatagory $subcatagory)
    {
        // $catagories = DB::select('SELECT id,catagoryName FROM `catagories` ORDER BY catagoryName ASC');
        $catagories=catagory::all();
        return view('admin.subcatagory.edit')->with('subcatagory',$subcatagory)->with('catagory',$catagories);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcatagory  $subcatagory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcatagory $subcatagory)
    {
        $subcatagory->catagoryID = $request->catagoryID;
        $subcatagory->subCatagoryName = $request->subCatagoryName;
        $subcatagory->subCatagoryCode = $request->subCatagoryCode;
        $subcatagory->update();
        return redirect('subcatagory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcatagory  $subcatagory
     * @return \Illuminate\Http\Response
     */
    public function destroy($subcatagory)
    {
        Subcatagory::destroy($subcatagory);
        return redirect('subcatagory');
    }
}
