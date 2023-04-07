<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PurchaseItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $purchaseitem = DB::table('purchaseitems')
        ->select('*')
        ->get();
        return view('pages.purchaseitem',compact('purchaseitem'));
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

    public function savepurchaseitem(Request $request)
    {
        $products = $request->approvedproducts;
        $descriptionofworks = $request->descriptionofworks;
        $price = $request->price;
        $suppliername = $request->suppliername;
        $openstock = $request->openstock;

        DB::table('purchaseitems')
        ->insert([
            "productname"=>$products,
            "descriptions"=>$descriptionofworks,
            "price"=>$price,
            "supplier_name"=>$products,
            // "supplier_name"=>$suppliername,
            "openstock"=>$openstock
        ]);

        return back()->with('success','Product Description added Successfully...');

    }


    public function getproductdesc($id)
    {
        $productdesc = DB::table('purchaseitems')
        ->select('*')
        ->where('id','=',$id)
        ->first();

        return $productdesc;
    }

    public function saverequest(Request $request)
    {
        $requestid = $request->requestid;

        $productdesc = $request->productdesc;

        $i=1;
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
                                'requestid' => $requestid,
                                'description' => $productdesc,
                                'price' => $price,
                                'status' => 0,
                                'request_serial_no'=>$i++,
                                'desc_text'=>$desc_text
                            ]);
         }

         return redirect('/purchaserequest')->with('success','Product Request Created');

    }

    public function getsupplierdesc($suplierid)
    {
        $purchaseitems = DB::table('purchaseitems')
        ->select('*')
        ->where('supplier_name','=',$suplierid)
        ->get();

        return $purchaseitems;

    }

    public function purchaseitemedit($id)
    {
        $purchaseitemedit = DB::table('purchaseitems')
        ->select('*')
        ->where('id','=',$id)
        ->first();

        return $purchaseitemedit;
    }

    public function deletepurchaseitem($id)
    {
        DB::table('purchaseitems')
        ->select('*')
        ->where('id','=',$id)
        ->delete();

        return back()->with('success','Purchase Item Deleted');
    }

    public function updatepurchaseitem(Request $request)
    {
        $products = $request->approvedproducts;
        $descriptionofworks = $request->descriptionofworks;
        $price = $request->price;
        $suppliername = $request->suppliername;
        $id = $request->id;

        DB::table('purchaseitems')
        ->select('*')
        ->where('id','=',$id)
        ->update([
            "productname"=>$products,
            "descriptions"=>$descriptionofworks,
            "price"=>$price,
            "supplier_name"=>$suppliername,
        ]);

        return back()->with('success','Purchase Item Updated');
    }
}
