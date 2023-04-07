<?php

namespace App\Http\Controllers;

use App\Models\Purchaserequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class createpurchaseOrder extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $purchasereq = Purchaserequest::all();
        $purchasereq = DB::table('purchaserequests')
        ->select('*')
        ->groupBy('requestid')
        ->orderBy('id','DESC')
        ->get();
        return view('pages.create_purchase_order',compact('purchasereq'));
    }

    public function getpurreq($reqid){
        $getpurreq = DB::table('purchaserequests')
        ->select('*')
        ->where('requestid',$reqid)
        ->get();

        return response()->json($getpurreq);
    }

    public function getrate($desc){
        $getrate = DB::table('purchaseitems')
        ->select('*')
        ->where('id',$desc)
        ->first();

        return response()->json($getrate);
    }

    public function getsupplier($supp){
        $getsupplier = DB::table('suppliers')
        ->select('*')
        ->where('approvedproducts',$supp)
        ->get();

        return response()->json($getsupplier);
    }

    public function getsno($desc,$purreq){
        $getsno = DB::table('purchaserequests')
        ->select('*')
        ->where([
            ['description','=',$desc],
            ['requestid','=',$purreq],
        ])
        ->first();

        return response()->json($getsno);
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
}
