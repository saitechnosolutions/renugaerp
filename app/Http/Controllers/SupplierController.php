<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $suppliers = DB::table('suppliers')
        ->select('*')
        ->get();

        return view('pages.vendor',compact('suppliers'));
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

    public function savesupplier(Request $request)
    {
        $suppliercode = $request->suppliercode;
        $suppliername = $request->suppliername;
        $gstnumber = $request->gstnumber;
        $address = $request->address;
        $cpersonname = $request->cpersonname;
        $cpersonnum = $request->cpersonnum;
        $approvedproducts = $request->approvedproducts;
        $paymentterms = $request->paymentterms;
        $associatedfrom = $request->associatedfrom;
        $validityapproval = $request->validityapproval;
        $basicapproval = $request->basicapproval;
        $remarks = $request->remarks;

        DB::table('suppliers')->insert([
            "name"=>$suppliername,
            "suppliercode"=>$suppliercode,
            "gstnum"=>$gstnumber,
            "address"=>$address,
            "contactpersonname"=>$cpersonname,
            "contactpersonnum"=>$cpersonnum,
            "approvedproducts"=>$approvedproducts,
            "paymentterms"=>$paymentterms,
            "associatedfrom"=>$associatedfrom,
            "validityofapproval"=>$validityapproval,
            "basisofapproval"=>$basicapproval,
            "remarks"=>$remarks
        ]);

        return back()->with('success','Supplier Added successfully..');

    }


    public function supplieredit($editid)
    {
        $supplieredit = DB::table('suppliers')
        ->select('*')
        ->where('id','=',$editid)
        ->first();

        return $supplieredit;
    }

    public function updatesupplier(Request $request)
    {
        $suppliercode = $request->suppliercode;
        $suppliername = $request->suppliername;
        $gstnumber = $request->gstnumber;
        $address = $request->address;
        $cpersonname = $request->cpersonname;
        $cpersonnum = $request->cpersonnum;
        $approvedproducts = $request->approvedproducts;
        $paymentterms = $request->paymentterms;
        $associatedfrom = $request->associatedfrom;
        $validityapproval = $request->validityapproval;
        $basicapproval = $request->basicapproval;
        $remarks = $request->remarks;
        $id = $request->id;

       $updatesupplier = DB::table('suppliers')
        ->select('*')
        ->where('id','=',$id)
        ->update([
            "name"=>$suppliername,
            "suppliercode"=>$suppliercode,
            "gstnum"=>$gstnumber,
            "address"=>$address,
            "contactpersonname"=>$cpersonname,
            "contactpersonnum"=>$cpersonnum,
            "approvedproducts"=>$approvedproducts,
            "paymentterms"=>$paymentterms,
            "associatedfrom"=>$associatedfrom,
            "validityofapproval"=>$validityapproval,
            "basisofapproval"=>$basicapproval,
            "remarks"=>$remarks
        ]);

        return back()->with('success','Supplier Updated Successfully...');
    }

    public function deletesupplier($id)
    {
        DB::table('suppliers')
        ->select('*')
        ->where('id','=',$id)
        ->delete();

        return back()->with('success','Supplier Deleted Successfully');
    }
}
