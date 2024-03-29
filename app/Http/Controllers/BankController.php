<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank = DB::table('bank_details')
        ->select('*')
        ->get();



        return view('pages.bankdetails',compact('bank'));
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

    public function savebank(Request $request)
    {
        $accountname = $request->accountname;
        $accountcode = $request->accountcode;
        $currency = $request->currency;
        $accountnum = $request->accountnum;
        $bankname = $request->bankname;
        $ifsc = $request->ifsc;
        $swiftcode = $request->swiftcode;
        $micrcode = $request->micrcode;
        $branch = $request->branch;
        $description = $request->description;

        $bank= DB::table('bank_details')
        ->insert(array(
            'accountname'=>$accountname,
            'accountcode'=>$accountcode,
            'currency'=>$currency,
            'accountnum'=>$accountnum,
            'bankname'=>$bankname,
            'ifsc'=>$ifsc,
            'swiftcode'=>$swiftcode,
            'micrcode'=>$micrcode,
            'branch'=>$branch,
            'description'=>$description
        ));

        return redirect('/bankdetails');
    }

    public function deletebank($bankid)
    {
        DB::table('bank_details')
        ->select('*')
        ->where('id','=',$bankid)
        ->delete();

        return back()->with('success','Bank Details Deleted Successfully...');
    }

    public function editbank($bankid)
    {
        $bankdetails = DB::table('bank_details')
        ->select('*')
        ->where('id','=',$bankid)
        ->first();

        return $bankdetails;
    }

    public function updatebank(Request $request)
    {

        $accountname = $request->accountname;
        $accountcode = $request->accountcode;
        $currency = $request->currency;
        $accountnum = $request->accountnum;
        $bankname = $request->bankname;
        $ifsc = $request->ifsc;
        $swiftcode = $request->swiftcode;
        $micrcode = $request->micrcode;
        $branch = $request->branch;
        $description = $request->description;
        $id = $request->id;

        $updateqry = DB::table('bank_details')
        ->where('id','=',$id)
        ->update([
            'accountname'=>$accountname,
            'accountcode'=>$accountcode,
            'currency'=>$currency,
            'accountnum'=>$accountnum,
            'bankname'=>$bankname,
            'ifsc'=>$ifsc,
            'swiftcode'=>$swiftcode,
            'micrcode'=>$micrcode,
            'branch'=>$branch,
            'description'=>$description
        ]);

        return back()->with('success','Updated Successfully...');
     }
}
