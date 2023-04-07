<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PurchaseEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $purchaseentry = DB::table('purchaseentries')
        ->select('*')
        ->get();

        return view('pages.purchaseentrydetails',compact('purchaseentry'));
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

    public function savepurchaseentry(Request $request)
    {
        $entrydate = $request->entrydate;
        $invoice_date = $request->invoice_date;
        $invoiceno = $request->invoiceno;
        $poid = $request->poid;
        $oldsuppliername = $request->oldsuppliername;

        DB::table('purchaseentries')
        ->insert([
            "entry_date"=>$entrydate,
            "invoice_date"=>$invoice_date,
            "invoice_number"=>$invoiceno,
            "po_id"=>$poid,
            "supplier_name"=>$oldsuppliername,
        ]);

        $id = DB::table('purchaseentries')->max('id');
        $descriptionid = $request->descriptionid;

        foreach($descriptionid as $key => $productdesc)
        {
            $product_desc = $request->descriptionid[$key];
            $price = $request->price[$key];
            $reqsno = $request->reqsno[$key];
            $qty = $request->qty[$key];
            $amt = $request->amt[$key];

            DB::table('purchaseentryproduct')->insert(
                            [
                                'product_desc' => $product_desc,
                                'qty' => $qty,
                                'requestsno'=>$reqsno,
                                'rate' => $price,
                                'amount' => $amt,
                                'poid'=> $poid,
                                'purchaseentryid'=>$id
                            ]);

            DB::table('purchaseorderproducts')
            ->select('*')
            ->where('orderno','=',$poid)
            ->where('requestsno','=',$reqsno)
            ->update([
                "calculate_qty"=>$qty,
                "pending_count"=>DB::raw('pending_count-calculate_qty'),
                "received_count"=>DB::raw('qty-pending_count'),
            ]);

            $overallqty = DB::table('purchaseorderproducts')
            ->select('*')
            ->where('orderno','=',$poid)
            ->sum('qty');

            $receivedqty = DB::table('purchaseorderproducts')
            ->select('*')
            ->where('orderno','=',$poid)
            ->sum('received_count');

            if($receivedqty > 1)
            {
                DB::table('purchaseentries')
                ->select('*')
                ->where('po_id','=',$poid)
                ->update([
                    "status"=>2
                ]);
            }

            if($receivedqty == $overallqty)
            {
                DB::table('purchaseentries')
                ->select('*')
                ->where('po_id','=',$poid)
                ->update([
                    "status"=>1
                ]);
            }
         }

         return redirect('/purchaseentry')->with('success','Purchase Entry Saved Successfully');
    }


    public function deletepurchaseentry($id)
    {
        DB::table('purchaseentries')
        ->select('*')
        ->where('po_id','=',$id)
        ->delete();

        DB::table('purchaseentryproduct')
        ->select('*')
        ->where('poid','=',$id)
        ->delete();

        return redirect('/purchaseentry')->with('success','Purchase Entry deleted...');
    }

    public function editpurchaseentry($id)
    {
        $purchaseentry = DB::table('purchaseentries')
        ->select('*')
        ->where('id','=',$id)
        ->first();

        $purchaseentryproducts = DB::table('purchaseentryproduct')
        ->select('*')
        ->where('purchaseentryid','=',$id)
        ->get();

        return view('pages.editpurchaseentry',compact('purchaseentry','purchaseentryproducts'));
    }

    public function updatepurchaseentry(Request $request)
    {

        $id = $request->id;


        DB::table('purchaseentryproduct')
        ->select('*')
        ->where('purchaseentryid','=',$id)
        ->delete();

        $entrydate = $request->entrydate;
        $invoice_date = $request->invoice_date;
        $invoiceno = $request->invoiceno;
        $poid = $request->poid;
        $oldsuppliername = $request->oldsuppliername;

        DB::table('purchaseentries')
        ->where('id','=',$id)
        ->update([
            "entry_date"=>$entrydate,
            "invoice_date"=>$invoice_date,
            "invoice_number"=>$invoiceno,
            "po_id"=>$poid,
            "supplier_name"=>$oldsuppliername,
        ]);


        $descriptionid = $request->productdesc;

        foreach($descriptionid as $key => $descriptionid)
        {
            $product_desc = $request->productdesc[$key];
            $price = $request->price[$key];
            $reqsno = $request->requestsn[$key];
            $qty = $request->qty[$key];
            $amt = $request->amt[$key];

            DB::table('purchaseentryproduct')->insert(
                            [
                                'product_desc' => $product_desc,
                                'qty' => $qty,
                                'requestsno'=>$reqsno,
                                'rate' => $price,
                                'amount' => $amt,
                                'poid'=> $poid,
                                'purchaseentryid'=>$id
                            ]);
         }

         return redirect('/purchaseentry')->with('success','Purchase Entry Updated Successfully');
    }
}
