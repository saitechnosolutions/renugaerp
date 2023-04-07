<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PurchaseRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $purchaserequest = DB::table('purchaserequests')
        ->select('*')
        ->groupBy('requestid')
        ->get();
        return view('pages.purchaserequest',compact('purchaserequest'));
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

    public function deletepurchasereq($id)
    {
        DB::table('purchaserequests')
        ->select('*')
        ->where('requestid','=',$id)
        ->delete();

        return back()->with('success','Purchase Request Deleted');
    }


    public function viewrequestdetail($id)
    {
        $viewrequest = DB::table('purchaserequests')
        ->select('*')
        ->where('requestid','=',$id)
        ->get();

        return $viewrequest;
    }

    public function editpurchaserequest($id)
    {
        $requestdetails = DB::table('purchaserequests')
        ->select('*')
        ->where('requestid','=',$id)
        ->get();

        return view('pages.editpurchaserequest',compact('requestdetails'));
    }

    public function updaterequest(Request $request)
    {
        $reqid = $request->reqid;

        DB::table('purchaserequests')
        ->select('*')
        ->where('requestid','=',$reqid)
        ->delete();
        $i=1;

        $productdesc = $request->productdesc;
        // dd($productdesc);

        foreach($productdesc as $key => $productdesc)
        {
            $productdesc = $request->productdesc[$key];
            $pitem = DB::table('purchaseitems')
            ->select('*')
            ->where('id','=',$productdesc)
            ->first();
            $desc_text = $pitem->descriptions;
            $price = $request->price[$key];

            $purchaserequest = DB::table('purchaserequests')->insert(
                            [
                                'requestid' => $reqid,
                                'description' => $productdesc,
                                'price' => $price,
                                'status' => 0,
                                'request_serial_no'=>$i++,
                                'desc_text'=>$desc_text
                            ]);


         }

         return redirect('/purchaserequest')->with('success','Purchase Request Updated Successfully');
    }
}
