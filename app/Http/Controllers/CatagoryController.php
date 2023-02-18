<?php

namespace App\Http\Controllers;
use App\Models\Catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allcatagory = Catagory::all();
        return view('admin.catagory.index')->with('allcatagory',$allcatagory);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catagory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Catagory::insert(
            [
                'catagoryName'=>$request->categoryName,
                'catagoryCode'=>$request->categoryCode
            ]
        );
        return CatagoryController::index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function show(Catagory $catagory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function edit(Catagory $catagory)
    {
        return view('admin.catagory.edit')->with('catagory',$catagory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catagory $catagory)
    {
        $catagory->catagoryName=$request->categoryName;
        $catagory->catagoryCode=$request->categoryCode;
        $catagory->update();
        return $this :: index();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catagory  $catagory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Catagory::destroy($id);
        return redirect()->back();
    }
}
