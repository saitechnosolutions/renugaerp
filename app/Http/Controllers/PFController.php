<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pf = DB::table('deduction')
        ->select('*')
        ->where('id','=',1)
        ->first();


        return view('pages.pfdata',compact('pf'));
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

    public function updatepf(Request $request)
    {
        $pf = $request->pf;
        $esi = $request->esi;
        $bonus = $request->bonus;
        $esiamt = $request->esiamt;
        $pfamt = $request->pfamt;

        $update = DB::table('deduction')->where('id',1)->update(array(
            'esi'=>$esi,
            'pf'=>$pf,
            'bonus'=> $bonus,
            'esi_aboveamt'=>$esiamt,
            'pf_fixed_amt'=>$pfamt
        ));

        if($update)
        {
            return back()->with('success','Data Updated');
        }
    }
}
