<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class QuotedproductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('twoquotedproducts')->get();
        return view('pages.quotedproducts',compact('products'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addquotedproduct(Request $request)
    {
        $pname = $request->productname;
        $ltrs = $request->ltrs;
        $size = $request->size;
        $rate = $request->rate;
        $hp = $request->hp;
        $guardrate = $request->guardrate;
        $thickness = $request->thickness;
        $pump = $request->pump;
        $modaltype = $request->modaltype;
        $withelectric = $request->withelectric;
        $withoutelectric = $request->withoutelectric;
        $aircooled = $request->aircooled;

        $invID =0;
        $maxValue = DB::table('twoquotedproducts')->max('id');
        $invID=$maxValue+1;
        $invID = str_pad($invID, 3, '0', STR_PAD_LEFT);

        $proid="RACPRO-".$invID;

        $saveproduct = DB::table('twoquotedproducts')
        ->insert([
            "catname"=>$pname,
            "ltrs"=>$ltrs,
            "size"=>$size,
            "rate"=>$rate,
            "hp"=>$hp,
            "guard_rate"=>$guardrate,
            "thickness"=>$thickness,
            "pump"=>$pump,
            "model_type"=>$modaltype,
            "withele"=>$withelectric,
            "withoutele"=>$withoutelectric,
            "air_cooled"=>$aircooled,
            "productid"=>$proid
        ]);

        return $saveproduct;
    }


    public function deleteproduct($delid)
    {
        $delete = DB::table('twoquotedproducts')
        ->select('*')
        ->where('id','=',$delid)
        ->delete();

        return back()->with('success','Product Deleted');
    }
}
