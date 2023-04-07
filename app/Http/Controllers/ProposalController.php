<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->name == 'admin@sales' || Auth::user()->name == 'Admin')
        {
            $proposals = DB::table('proposals')
            ->select('*')
            ->get();
        }
        else
        {
            $proposals = DB::table('proposals')
            ->select('*')
            ->where('userid','=',Auth::user()->id)
            ->get();
        }


        return view('pages.proposalsdetails',compact('proposals'));
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

    public function saveproposal(Request $request)
    {
        $quoteno = $request->quoteno;
        $date = $request->date;
        $subject = $request->subject;
        $toaddress = $request->toaddress;
        $leadid = $request->leadid;
        $taxes = $request->taxes;
        $freight = $request->freight;
        $payment = $request->payment;
        $delivery = $request->delivery;
        $validity = $request->validity;
        $yourstruely = $request->yourstruely;
        $kindattn = $request->kindattn;
        $userid = Auth::user()->id;
        $bankid = $request->bankdetails;

        $invID =0;
        $maxValue = DB::table('proposals')->max('id');
        $invID=$maxValue+1;
        $invID = str_pad($invID, 4, '0', STR_PAD_LEFT);

        $proposalid="PROP".$invID;

        DB::table('proposals')
                ->insert([
                    "proposalid"=>$proposalid,
                    "leadid"=>$leadid,
                    "quoteno"=>$quoteno,
                    "quotedate"=>$date,
                    "subject"=>$subject,
                    "toaddress"=>$toaddress,
                    "taxes"=>$taxes,
                    "freight"=>$freight,
                    "payment"=>$payment,
                    "validity"=>$validity,
                    "delivery"=>$delivery,
                    "yourstruely"=>$yourstruely,
                    "filename"=>$proposalid."_".date("d-m-Y")."_proposal.pdf",
                    "userid"=>$userid,
                    "kindattn"=>$kindattn,
                    "bankid"=>$bankid
                ]);

        $quotedproducts = $request->quotedproducts;

        foreach($quotedproducts as $key => $products)
            {
                $products = $request->quotedproducts[$key];
                // $description = $request->description[$key];
                // $ltrs = $request->ltrs[$key];
                // $size = $request->size[$key];
                // $hp = $request->hp[$key];
                // $thickness = $request->thickness[$key];
                // $pump = $request->pump[$key];
                // $modaltype = $request->modaltype[$key];
                // $aircooled = $request->aircooled[$key];
                // $modaltype = $request->modaltype[$key];
                $rate = $request->rate[$key];
                // $guardrate = $request->guardrate[$key];
                // $withelectric = $request->withelectric[$key];
                // $withoutlectric = $request->withoutlectric[$key];
                $price = $request->totamt[$key];
                $qty = $request->qty[$key];

                DB::table('proposalproducts')
                ->insert([
                    "proposalid"=>$proposalid,
                    "leadid"=>$leadid,
                    "productdescription"=>$products,
                    // "productdescription"=>$description,
                    "qty"=>$qty,
                    "price"=>$price,
                    // "ltrs"=>$ltrs,
                    // "size"=>$size,
                    "rate"=>$rate,
                    // "hp"=>$hp,
                    // "guard_rate"=>$guardrate,
                    // "thickness"=>$thickness,
                    // "pump"=>$pump,
                    // "model_type"=>$modaltype,
                    // "withele"=>$withelectric,
                    // "withoutele"=>$withoutlectric,
                    // "air_cooled"=>$aircooled,
                ]);
            }

            $getproposal = DB::table('proposals')
            ->select('*')
            ->where('proposalid','=',$proposalid)
            ->first();

            $getproposalproducts = DB::table('proposalproducts')
            ->select('*')
            ->where('proposalid','=',$proposalid)
            ->get();

            // $dateformat = date_format($date,"d-m-Y");

            $pdf1 = PDF::loadView('pages.proposal',compact('getproposal','getproposalproducts'))->setOptions(['defaultFont' => 'sans-serif'])
                    // $content = $pdf1->download()->getOriginalContent();
                    ->save(public_path('proposal/'.$proposalid."_".date("d-m-Y")."_proposal.pdf"));

    }
}
