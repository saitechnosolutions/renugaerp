<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $purchaseorder = DB::table('purchaseorders')
        ->select('*')
        ->get();
        return view('pages.purchase_order',compact('purchaseorder'));
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

    public function savepurchaseorder(Request $request)
    {
        $order_date = $request->order_date;
        $delivery_date = $request->delivery_date;
        $requestno = $request->requestno;
        $suppliername = $request->vendor;

        $order_no = $request->order_no;

        $productdesc = $request->productdesc;
        $total1 = $request->subtotal;
        $txtcgst = $request->txtcgst;
        $txtsgst = $request->txtsgst;
        $finalamt = $request->finalamt;


        DB::table('purchaseorders')
        ->insert([
            "orderid"=>$order_no,
            "order_date"=>$order_date,
            "due_date"=>$delivery_date,
            "vendor_name"=>$suppliername,
            "requestid"=>$requestno,
            "total_amt"=>$total1,
            "cgst"=>$txtcgst,
            "sgst"=>$txtsgst,
            "totalamt"=>$finalamt,


        ]);

     $productdesc = $request->productdesc;
            $requestsn = $request->requestsn;
            $qty = $request->qty;
            $price = $request->price;
            $amt = $request->amt;
            $unit = $request->unit;

            DB::table('purchaseorderproducts')
            ->insert([
                "requestsno"=>$requestsn,
                "orderno"=>$order_no,
                "supplier_name"=>$suppliername,
                "itemdescription"=>$productdesc,
                "price"=>$price,
                "qty"=>$qty,
                "totamt"=>$amt,
                "pending_count"=>$qty,
                "uom"=>$unit
            ]);

         return redirect('/purchaseorder')->with('success','Purchase Order Created successfully...');
    }


    public function getpodetails($poid)
    {
        $vendorname = DB::table('purchaseorders')
        ->select('*')
        ->where('orderid','=',$poid)
        ->first();

        $supplier = DB::table('suppliers')
        ->select('*')
        ->where('id','=',$vendorname->vendor_name)
        ->first();

        return $supplier;
    }

    public function getpoproductdetails($poid)
    {
        // $productdetails = DB::table('purchaseorderproducts')
        // ->select('*')
        // ->where("orderno",'=',$poid)
        // ->get();

       $productdetails= DB::table('purchaseorderproducts')
        ->select('purchaseorderproducts.id','purchaseorderproducts.requestsno','purchaseorderproducts.orderno','purchaseorderproducts.supplier_name','purchaseorderproducts.itemdescription','purchaseorderproducts.price','purchaseorderproducts.qty','purchaseorderproducts.totamt','purchaseorderproducts.pending_count','purchaseorderproducts.received_count','purchaseitems.descriptions','purchaseitems.id')
        ->join('purchaseitems','purchaseitems.id','=','purchaseorderproducts.itemdescription')
        ->where('orderno','=',$poid)
        ->get();

        return $productdetails;
    }


    public function editpurchaseorder($id)
    {
        $purchaseorder = DB::table('purchaseorders')
        ->select('*')
        ->where('orderid','=',$id)
        ->first();

        $purchaseorderproducts = DB::table('purchaseorderproducts')
        ->select('*')
        ->where('orderno','=',$id)
        ->get();

        return view('pages.edit_purchase_order',compact('purchaseorder','purchaseorderproducts'));
    }

    public function updatepurchaseorder(Request $request)
    {
        $id = $request->id;
        DB::table('purchaseorders')
        ->select('*')
        ->where('orderid','=',$id)
        ->delete();

        DB::table('purchaseorderproducts')
        ->select('*')
        ->where('orderno','=',$id)
        ->delete();

        $order_date = $request->order_date;
        $delivery_date = $request->delivery_date;
        $requestno = $request->requestno;
        $suppliername = $request->vendor;
        $order_no = $request->order_no;

        $productdesc = $request->productdesc;

        $total1 = $request->subtotal;
        $txtcgst = $request->txtcgst;
        $txtsgst = $request->txtsgst;
        $finalamt = $request->finalamt;

        DB::table('purchaseorders')
        ->insert([
            "orderid"=>$order_no,
            "order_date"=>$order_date,
            "due_date"=>$delivery_date,
            "vendor_name"=>$suppliername,
            "requestid"=>$requestno,
            "total_amt"=>$total1,
            "cgst"=>$txtcgst,
            "sgst"=>$txtsgst,
            "totalamt"=>$finalamt
        ]);

        foreach($productdesc as $key => $productdesc)
        {
            $productdesc = $request->productdesc[$key];
            $requestsn = $request->requestsn[$key];
            $qty = $request->qty[$key];
            $price = $request->price[$key];
            $amt = $request->amt[$key];

            DB::table('purchaseorderproducts')
            ->insert([
                "requestsno"=>$requestsn,
                "orderno"=>$order_no,
                "supplier_name"=>$suppliername,
                "itemdescription"=>$productdesc,
                "price"=>$price,
                "qty"=>$qty,
                "totamt"=>$amt
            ]);

         }

         return redirect('/purchaseorder')->with('success','Purchase Order Successfully...');
    }

    public function deletepurchaseorder($id)
    {
        DB::table('purchaseorders')
        ->select('*')
        ->where('orderid','=',$id)
        ->delete();

        DB::table('purchaseorderproducts')
        ->select('*')
        ->where('orderno','=',$id)
        ->delete();

        return redirect('/purchaseorder')->with('success','Purchase Order Deleted Successfully...');
    }

    public function pendingstock($id)
    {
        $purchaseorderdetail = DB::table('purchaseorders')
        ->select('*')
        ->where('orderid','=',$id)
        ->first();

        $purchaseorderproducts = DB::table('purchaseorderproducts')
        ->select('*')
        ->where('orderno','=',$id)
        ->get();

        return view('pages.pending-stock',compact('purchaseorderdetail','purchaseorderproducts'));
    }

    public function printpo($id)
    {
        $purchaseorderdetail = DB::table('purchaseorders')
        ->select('*')
        ->where('orderid','=',$id)
        ->first();

        $purchaseorderproducts = DB::table('purchaseorderproducts')
        ->select('*')
        ->where('orderno','=',$id)
        ->get();

        return view('pages.po_print_format',compact('purchaseorderdetail','purchaseorderproducts'));
    }
}
