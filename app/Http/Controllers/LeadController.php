<?php

namespace App\Http\Controllers;

use App\Exports\LeadsExport;
use App\Imports\LeadImports;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;





class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->name;
        $userid = Auth::user()->id;


        $users = DB::table('users')
        ->select('*')
        ->where('roll','=','Sales')
        ->get();

        if($user =='admin@sales' || $user == 'Admin')
        {
            $leads = DB::table('leads')
            ->select('*')
            // ->orderBy('leadid', 'DESC')
            ->groupby('mobilenumber')
            ->get();
        }
        else
        {
            $leads = DB::table('leads')
            ->select('*')
            ->where('assign_userid','=',$userid)
            // >orderBy('leadid', 'DESC')
            ->groupby('mobilenumber')
            ->get();
        }


            $today = date("d-m-Y");
            $yesterday = date('d-m-Y',strtotime("-1 days"));

            $today1 = date('Y-m-d');
            $last60 = date('Y-m-d',strtotime("-60 days"));
                // $lastmonthyear = date("Y",strtotime("-1 month"));
                    //  $lastmonth = date("m",strtotime("-1 month"));

                    if($user =='admin@sales' || $user == 'Admin')
    {
        $directleads = DB::table('leads')
        ->select('*')
        ->where('leadsource','=','Direct')
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $directleads = DB::table('leads')
        ->select('*')
        ->where('leadsource','=','Direct')
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }

    if($user =='admin@sales' || $user == 'Admin')
    {
        $indiamartleads = DB::table('leads')
        ->select('*')
        ->where('leadsource','=','Indiamart')
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $indiamartleads = DB::table('leads')
        ->select('*')
        ->where('leadsource','=','Indiamart')
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }

    if($user =='admin@sales' || $user == 'Admin')
    {
        $tradeindialeads = DB::table('leads')
        ->select('*')
        ->where('leadsource','=','Tradeindia')
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $tradeindialeads = DB::table('leads')
        ->select('*')
        ->where('leadsource','=','Tradeindia')
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }


    if($user =='admin@sales' || $user == 'Admin')
    {
        $convertedleads = DB::table('leads')
        ->select('*')
        ->where('leadstatus','=','Converted')
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $convertedleads = DB::table('leads')
        ->select('*')
        ->where('leadstatus','=','Converted')
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }

    if($user =='admin@sales' || $user == 'Admin')
    {
        $indiamartconvertedleads = DB::table('leads')
        ->select('*')
        ->where('leadstatus','=','Converted')
        ->where('leadsource','=','Indiamart')
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $indiamartconvertedleads = DB::table('leads')
        ->select('*')
        ->where('leadstatus','=','Converted')
        ->where('leadsource','=','Indiamart')
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }

    if($user =='admin@sales' || $user == 'Admin')
    {
        $tradeindiaconvertedleads = DB::table('leads')
        ->select('*')
        ->where('leadstatus','=','Converted')
        ->where('leadsource','=','Tradeindia')
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $tradeindiaconvertedleads = DB::table('leads')
        ->select('*')
        ->where('leadstatus','=','Converted')
        ->where('leadsource','=','Tradeindia')
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }

    if($user =='admin@sales' || $user == 'Admin')
    {
        $directconvertedleads = DB::table('leads')
        ->select('*')
        ->where('leadstatus','=','Converted')
        ->where('leadsource','=','Direct')
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $directconvertedleads = DB::table('leads')
        ->select('*')
        ->where('leadstatus','=','Converted')
        ->where('leadsource','=','Direct')
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }


    if($user =='admin@sales' || $user == 'Admin')
    {
        $notconvertedleads = DB::table('leads')
        ->select('*')
        ->where('leadstatus','=','Pending')
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $notconvertedleads = DB::table('leads')
        ->select('*')
        ->where('leadstatus','=','Pending')
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }

    if($user =='admin@sales' || $user == 'Admin')
    {
        $indiamartnotconvertedleads = DB::table('leads')
        ->select('*')
        ->where('leadstatus','=','Pending')
        ->where('leadsource','=','Indiamart')
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $indiamartnotconvertedleads = DB::table('leads')
        ->select('*')
        ->where('leadstatus','=','Pending')
        ->where('leadsource','=','Indiamart')
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }

    if($user =='admin@sales' || $user == 'Admin')
    {
        $tradeindianotconvertedleads = DB::table('leads')
        ->select('*')
        ->where('leadstatus','=','Pending')
        ->where('leadsource','=','Tradeindia')
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $tradeindianotconvertedleads = DB::table('leads')
        ->select('*')
        ->where('leadstatus','=','Pending')
        ->where('leadsource','=','Tradeindia')
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }

    if($user =='admin@sales' || $user == 'Admin')
    {
        $directnotconvertedleads = DB::table('leads')
        ->select('*')
        ->where('leadstatus','=','Pending')
        ->where('leadsource','=','Direct')
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $directnotconvertedleads = DB::table('leads')
        ->select('*')
        ->where('leadstatus','=','Pending')
        ->where('leadsource','=','Direct')
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }

    if($user =='admin@sales' || $user == 'Admin')
    {
        $todayoverallleads = DB::table('leads')
        ->select('*')
        ->where('leadentrydate','=',$today)
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $todayoverallleads = DB::table('leads')
        ->select('*')
        ->where('leadentrydate','=',$today)
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }

    if($user =='admin@sales' || $user == 'Admin')
    {
        $indiamarttodayleads = DB::table('leads')
        ->select('*')
        ->where('leadentrydate','=',$today)
        ->where('leadsource','=','Indiamart')
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $indiamarttodayleads = DB::table('leads')
        ->select('*')
        ->where('leadentrydate','=',$today)
        ->where('leadsource','=','Indiamart')
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }

    if($user =='admin@sales' || $user == 'Admin')
    {
        $tradeindiatodayleads = DB::table('leads')
        ->select('*')
        ->where('leadentrydate','=',$today)
        ->where('leadsource','=','Tradeindia')
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $tradeindiatodayleads = DB::table('leads')
        ->select('*')
        ->where('leadentrydate','=',$today)
        ->where('leadsource','=','Tradeindia')
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }

    if($user =='admin@sales' || $user == 'Admin')
    {
        $directtodayleads = DB::table('leads')
        ->select('*')
        ->where('leadentrydate','=',$today)
        ->where('leadsource','=','Direct')
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $directtodayleads = DB::table('leads')
        ->select('*')
        ->where('leadentrydate','=',$today)
        ->where('leadsource','=','Direct')
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }

    if($user =='admin@sales' || $user == 'Admin')
    {
        $yesterdayoverallleads = DB::table('leads')
        ->select('*')
        ->where('leadentrydate','=',$yesterday)
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $yesterdayoverallleads = DB::table('leads')
        ->select('*')
        ->where('leadentrydate','=',$yesterday)
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }

    if($user =='admin@sales' || $user == 'Admin')
    {
        $indiamartyesterdayleads = DB::table('leads')
        ->select('*')
        ->where('leadentrydate','=',$yesterday)
        ->where('leadsource','=','Indiamart')
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $indiamartyesterdayleads = DB::table('leads')
        ->select('*')
        ->where('leadentrydate','=',$yesterday)
        ->where('leadsource','=','Indiamart')
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }

    if($user =='admin@sales' || $user == 'Admin')
    {
        $tradeindiayesterdayleads = DB::table('leads')
        ->select('*')
        ->where('leadentrydate','=',$yesterday)
        ->where('leadsource','=','Tradeindia')
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $tradeindiayesterdayleads = DB::table('leads')
        ->select('*')
        ->where('leadentrydate','=',$yesterday)
        ->where('leadsource','=','Tradeindia')
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }

    if($user =='admin@sales' || $user == 'Admin')
    {
        $directyesterdayleads = DB::table('leads')
        ->select('*')
        ->where('leadentrydate','=',$yesterday)
        ->where('leadsource','=','Direct')
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $directyesterdayleads = DB::table('leads')
        ->select('*')
        ->where('leadentrydate','=',$yesterday)
        ->where('leadsource','=','Direct')
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }


        $lastmonthyear = date("Y",strtotime("-1 month"));
        $lastmonth = date("m",strtotime("-1 month"));



        if($user =='admin@sales' || $user == 'Admin')
    {
        $last30overallleads = DB::table('leads')
        ->select('*')
        ->whereMonth('created_at', $lastmonth)
        ->whereYear('created_at', $lastmonthyear)
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $last30overallleads = DB::table('leads')
        ->select('*')
        ->whereMonth('created_at', $lastmonth)
        ->whereYear('created_at', $lastmonthyear)
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }

    if($user =='admin@sales' || $user == 'Admin')
    {
        $last30directleads = DB::table('leads')
        ->select('*')
        ->whereMonth('created_at', $lastmonth)
        ->whereYear('created_at', $lastmonthyear)
        ->where('leadsource','=','Direct')
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $last30directleads = DB::table('leads')
        ->select('*')
        ->whereMonth('created_at', $lastmonth)
        ->whereYear('created_at', $lastmonthyear)
        ->where('leadsource','=','Direct')
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }

    if($user =='admin@sales' || $user == 'Admin')
    {
        $last30indiamartleads = DB::table('leads')
        ->select('*')
        ->whereMonth('created_at', $lastmonth)
        ->whereYear('created_at', $lastmonthyear)
        ->where('leadsource','=','Indiamart')
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $last30indiamartleads = DB::table('leads')
        ->select('*')
        ->whereMonth('created_at', $lastmonth)
        ->whereYear('created_at', $lastmonthyear)
        ->where('leadsource','=','Indiamart')
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }

    if($user =='admin@sales' || $user == 'Admin')
    {
        $last30tradeindialeads = DB::table('leads')
        ->select('*')
        ->whereMonth('created_at', $lastmonth)
        ->whereYear('created_at', $lastmonthyear)
        ->where('leadsource','=','Tradeindia')
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $last30tradeindialeads = DB::table('leads')
        ->select('*')
        ->whereMonth('created_at', $lastmonth)
        ->whereYear('created_at', $lastmonthyear)
        ->where('leadsource','=','Tradeindia')
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }

    if($user =='admin@sales' || $user == 'Admin')
    {
        $last60overallleads = DB::table('leads')
        ->select('*')
        ->whereBetween('created_at', [$last60,$today1])
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $last60overallleads = DB::table('leads')
        ->select('*')
        ->whereBetween('created_at', [$last60,$today1])
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }

    if($user =='admin@sales' || $user == 'Admin')
    {
        $last60directleads = DB::table('leads')
        ->select('*')
        ->whereBetween('created_at', [$last60,$today1])
        ->where('leadsource','=','Direct')
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $last60directleads = DB::table('leads')
        ->select('*')
        ->whereBetween('created_at', [$last60,$today1])
        ->where('leadsource','=','Direct')
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }

    if($user =='admin@sales' || $user == 'Admin')
    {
        $last60indiamartleads = DB::table('leads')
        ->select('*')
        ->whereBetween('created_at', [$last60,$today1])
        ->where('leadsource','=','Indiamart')
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $last60indiamartleads = DB::table('leads')
        ->select('*')
        ->whereBetween('created_at', [$last60,$today1])
        ->where('leadsource','=','Indiamart')
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }

    if($user =='admin@sales' || $user == 'Admin')
    {
        $last60tradeindialeads = DB::table('leads')
        ->select('*')
        ->whereBetween('created_at', [$last60,$today1])
        ->where('leadsource','=','Tradeindia')
        ->groupby('mobilenumber')
        ->get();
    }
    else
    {
        $last60tradeindialeads = DB::table('leads')
        ->select('*')
        ->whereBetween('created_at', [$last60,$today1])
        ->where('leadsource','=','Tradeindia')
        ->where('assign_userid','=',$userid)
        ->groupby('mobilenumber')
        ->get();
    }

        $salespersons = DB::table('users')
        ->select('*')
        ->where('roll','=','Sales')
        ->get();

        $quotedproducts = DB::table('quotedproducts')
        ->select('*')
        ->get();

        return view('pages.leads',compact('leads','directleads','indiamartleads','convertedleads','indiamartconvertedleads','directconvertedleads','notconvertedleads','indiamartnotconvertedleads','directnotconvertedleads','todayoverallleads','indiamarttodayleads','directtodayleads','yesterdayoverallleads','indiamartyesterdayleads','directyesterdayleads','last30overallleads','last30directleads','last30indiamartleads','last60overallleads','last60directleads','last60indiamartleads','user','salespersons','users','quotedproducts','tradeindialeads','tradeindiaconvertedleads','tradeindianotconvertedleads','tradeindiatodayleads','tradeindiayesterdayleads','last30tradeindialeads','last60tradeindialeads'));
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

    public function savelead(Request $request)
    {
        $invID =0;
        $maxValue = DB::table('leads')->max('id');
        $invID=$maxValue+1;
        $invID = str_pad($invID, 4, '0', STR_PAD_LEFT);

        $leadid="LEAD".$invID;
        // $attendance_date = Carbon::createFromTimestamp(strtotime($request->get('attendance_date')) )->format('Y-m-d');

        // $leadentrydate = Carbon::createFromFormat('d/m/Y',strtotime($request->leadentrydate))->format('Y-m-d');

        $leadentrydate = $request->leadentrydate;
        $customername = $request->customername;
        $mobilenumber = $request->mobilenumber;
        $email = $request->email;
        $address = $request->address;
        $dealname = $request->dealname;
        $dealvalue = $request->dealvalue;
        $type = $request->type;
        $callstage = $request->callstage;
        $leadsource = $request->leadsource;
        $assignto = $request->assignto;

        $lead = DB::table('leads')->insert(
            [
                'leadid' => $leadid,
                'leadentrydate' => $leadentrydate,
                'customername' => $customername,
                'mobilenumber' => $mobilenumber,
                'email' => $email,
                'address' => $address,
                'dealname' => $dealname,
                'dealvalue' => $dealvalue,
                'type' => $type,
                'callstage' => $callstage,
                'leadsource' => $leadsource,
                'leadstatus' => 'Pending',
                'assign_userid' => $assignto
            ]);

            return redirect('/leads')->with('success','Lead Added Successfully');

    }

    public function deletelead(Request $request)
    {
        $leadid = $request->leadid;

        DB::table('leads')->where('id', $leadid)->delete();

        return redirect('/leads')->with('success','Leads Deleted Successfully');
    }

    public function viewlead(Request $request)
    {
        $leadid = $request->leadid;

        $lead= DB::table('leads')
        ->select('*')
        ->where('id','=',$leadid)
        ->first();

        $qutedproducts = DB::table('twoquotedproducts')
        ->select('*')
        ->get();

        $ltrs = DB::table('twoquotedproducts')
        ->select('ltrs')
        ->groupby('ltrs')
        ->get();

        $size = DB::table('twoquotedproducts')
        ->select('size')
        ->groupby('size')
        ->get();

        // dd($ltrs);

        $currYr = date('Y');
        $invID =0;

       $checkid = DB::table('proposalids')
        ->where('leadid','=',$lead->leadid)
        ->count();
        $userId = Auth::user()->id;
        if($checkid == 0)
        {
            $maxValue = DB::table('proposalids')->max('id');
            $invID=$maxValue+1;
            $invID = str_pad($invID, 4, '0', STR_PAD_LEFT);

                DB::table('proposalids')
                ->insert([
                    "leadid"=>$lead->leadid,
                    "proposalid"=>"RAC/".$currYr."/".$userId."/".$invID
                ]);

                $maxValueuser = DB::table('proposals')->where('leadid','=',$lead->leadid)->count();

                $invID2 = 0;
                $invID2 = $maxValueuser+1;
                $invID2 = str_pad($invID2, 2, '0', STR_PAD_LEFT);

                $Qoutid="RAC/".$currYr."/".$userId."/".$invID."-".$invID2;
        }
        else
        {
            $checkid2 = DB::table('proposalids')
            ->where('leadid','=',$lead->leadid)
            ->first();

            $maxValueuser = DB::table('proposals')->where('leadid','=',$lead->leadid)->count();

                $invID2 = 0;
                $invID2 = $maxValueuser+1;
                $invID2 = str_pad($invID2, 2, '0', STR_PAD_LEFT);

                // $Qoutid="RAC/".$currYr."/".$userId."/".$invID."-".$invID2;

            $Qoutid=$checkid2->proposalid."-".$invID2;
        }




        $bankdetails = DB::table('bank_details')
        ->select('*')
        ->get();

        $maildetails = DB::table('leadmails')
        ->select('*')
        ->where('leadid','=',$lead->leadid)
        ->get();
        return view('pages.leadview',compact('lead','qutedproducts','maildetails','ltrs','size','Qoutid','bankdetails'));
    }

    public function saveFollowup(Request $request)
    {
        $title = $request->title;
        $description = $request->description;
        $leadid = $request->leadid;
        $notificationdate = $request->notificationdate;
        $summery = $request->summery;
        date_default_timezone_set('Asia/Kolkata');
        // date('d-m-Y H:i');
        $mytime = date('d-m-Y H:i');
        $userid = Auth::user()->id;
        // dd($mytime);
        $followup = DB::table('follow_ups')->insert(
            [
                'title' => $title,
                'description' => $description,
                'leadid' => $leadid,
                'created_at' => $mytime,
                'notification_date' => $notificationdate,
                'summery' => $summery,
                'userid' => $userid
            ]);

            return back()->with('success','Followup Added Successfully');
    }

    public function leadstatus(Request $request)
    {
        $leadid = $request->leadid;
        $leadstatus = $request->leadstatus;

        $status = DB::table('leads')->where('leadid',$leadid)->update(array(
            'leadstatus'=>$leadstatus,
        ));

        return back()->with('success','Lead '.$leadstatus.' Successfully...');
    }

    public function leadedit(Request $request)
    {
        $leadid = $request->leadid;

        $leadedit = DB::table('leads')
        ->select('*')
        ->where('id','=',$leadid)
        ->first();
        // dd($leadedit);

        $quotedproducts = DB::table('quotedproducts')
        ->select('*')
        ->get();

        return view('pages.leadedit',compact('leadedit','quotedproducts'));
    }

    public function updatelead(Request $request)
    {
        $id = $request->id;
        $leadentrydate = $request->leadentrydate;
        $customername = $request->customername;
        $mobilenumber = $request->mobilenumber;
        $email = $request->email;
        $address = $request->address;
        $dealname = $request->dealname;
        $dealvalue = $request->dealvalue;
        $type = $request->type;
        $callstage = $request->callstage;
        $leadsource = $request->leadsource;

        $updatelead = DB::table('leads')->where('id',$id)->update(array(

            'leadentrydate' => $leadentrydate,
            'customername' => $customername,
            'mobilenumber' => $mobilenumber,
            'email' => $email,
            'address' => $address,
            'dealname' => $dealname,
            'dealvalue' => $dealvalue,
            'type' => $type,
            'callstage' => $callstage,
            'leadsource' => $leadsource

        ));

        return redirect('/leads');
    }

    public function getFilteration(Request $request)
    {
        $filtertype = $request->filter;
        $today = date("d-m-Y");
        $yesterday = date('d-m-Y',strtotime("-1 days"));

        $today1 = date('Y-m-d');
        $last60 = date('Y-m-d',strtotime("-60 days"));

        $lastmonthyear = date("Y",strtotime("-1 month"));
        $lastmonth = date("m",strtotime("-1 month"));

        if(Auth::user()->name== 'admin@sales' || Auth::user()->name == 'Admin')
        {
            if($filtertype == 'allleads')
            {
                $output = DB::table('leads')
                ->select('*')
                ->get();
            }
            elseif($filtertype == 'convertedleads')
            {
                $output = DB::table('leads')
                ->select('*')
                ->where('leadstatus','=','Converted')
                ->get();
            }
            elseif($filtertype == 'notconvertedleads')
            {
                $output = DB::table('leads')
                ->select('*')
                ->where('leadstatus','=','Pending')
                ->get();
            }
            elseif($filtertype == 'todayoverallleads')
            {
                $output = DB::table('leads')
                ->select('*')
                ->where('leadentrydate','=',$today)
                ->get();
            }
            elseif($filtertype == 'yesterdayoverallleads')
            {
                $output = DB::table('leads')
                ->select('*')
                ->where('leadentrydate','=',$yesterday)
                ->get();
            }
            elseif($filtertype == 'last30overallleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->whereMonth('created_at', $lastmonth)
            ->whereYear('created_at', $lastmonthyear)
            ->get();
            }
            elseif($filtertype == 'last60overallleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->whereBetween('created_at', [$last60,$today1])
            ->get();
            }

            // Indiamart Leads

            elseif($filtertype == 'indiamartleads')
            {
                $output = DB::table('leads')
                ->select('*')
                ->where('leadsource','=','Indiamart')
                ->get();
            }
            elseif($filtertype == 'indiamartconvertedleads')
            {
                $output = DB::table('leads')
                ->select('*')
                ->where('leadstatus','=','Converted')
                ->where('leadsource','=','Indiamart')
                ->get();
            }
            elseif($filtertype == 'indiamartnotconvertedleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->where('leadstatus','=','Pending')
            ->where('leadsource','=','Indiamart')
            ->get();
            }
            elseif($filtertype == 'indiamarttodayleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->where('leadentrydate','=',$today)
            ->where('leadsource','=','Indiamart')
            ->get();
            }
            elseif($filtertype == 'indiamartyesterdayleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->where('leadentrydate','=',$yesterday)
            ->where('leadsource','=','Indiamart')
            ->get();
            }
            elseif($filtertype == 'last30indiamartleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->whereMonth('created_at', $lastmonth)
            ->whereYear('created_at', $lastmonthyear)
            ->where('leadsource','=','Indiamart')
            ->get();
            }
            elseif($filtertype == 'last60indiamartleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->whereBetween('created_at', [$last60,$today1])
            ->where('leadsource','=','Indiamart')
            ->get();
            }

            // Tradeindialeads
            elseif($filtertype == 'tradeindialeads')
            {
                $output = DB::table('leads')
                ->select('*')
                ->where('leadsource','=','Tradeindia')
                ->get();
            }
            elseif($filtertype == 'tradeindiaconvertedleads')
            {
                $output = DB::table('leads')
                ->select('*')
                ->where('leadstatus','=','Converted')
                ->where('leadsource','=','Tradeindia')
                ->get();
            }
            elseif($filtertype == 'tradeindianotconvertedleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->where('leadstatus','=','Pending')
            ->where('leadsource','=','Tradeindia')
            ->get();
            }
            elseif($filtertype == 'tradeindiatodayleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->where('leadentrydate','=',$today)
            ->where('leadsource','=','Tradeindia')
            ->get();
            }
            elseif($filtertype == 'tradeindiayesterdayleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->where('leadentrydate','=',$yesterday)
            ->where('leadsource','=','Tradeindia')
            ->get();
            }
            elseif($filtertype == 'last30tradeindialeads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->whereMonth('created_at', $lastmonth)
            ->whereYear('created_at', $lastmonthyear)
            ->where('leadsource','=','Tradeindia')
            ->get();
            }
            elseif($filtertype == 'last60tradeindialeads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->whereBetween('created_at', [$last60,$today1])
            ->where('leadsource','=','Tradeindia')
            ->get();
            }
            // Direct Leads
            elseif($filtertype == 'directleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->where('leadsource','=','Direct')
            ->get();
            }
            elseif($filtertype == 'directconvertedleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->where('leadstatus','=','Converted')
            ->where('leadsource','=','Direct')
            ->get();
            }
            elseif($filtertype == 'directnotconvertedleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->where('leadstatus','=','Pending')
            ->where('leadsource','=','Direct')
            ->get();
            }
            elseif($filtertype == 'directtodayleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->where('leadentrydate','=',$today)
            ->where('leadsource','=','Direct')
            ->get();
            }
            elseif($filtertype == 'directyesterdayleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->where('leadentrydate','=',$yesterday)
            ->where('leadsource','=','Direct')
            ->get();
            }
            elseif($filtertype == 'last30directleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->whereMonth('created_at', $lastmonth)
            ->whereYear('created_at', $lastmonthyear)
            ->where('leadsource','=','Direct')
            ->get();
            }
            elseif($filtertype == 'last60directleads')
            {
                $output = DB::table('leads')
                ->select('*')
                ->whereBetween('created_at', [$last60,$today1])
                ->where('leadsource','=','Direct')
                ->get();
            }
        }
        else
        {
            if($filtertype == 'allleads')
            {
                $output = DB::table('leads')
                ->select('*')
                ->where('assign_userid','=',Auth::user()->id)
                ->get();
            }
            elseif($filtertype == 'convertedleads')
            {
                $output = DB::table('leads')
                ->select('*')
                ->where('assign_userid','=',Auth::user()->id)
                ->where('leadstatus','=','Converted')
                ->get();
            }
            elseif($filtertype == 'notconvertedleads')
            {
                $output = DB::table('leads')
                ->select('*')
                ->where('assign_userid','=',Auth::user()->id)
                ->where('leadstatus','=','Pending')
                ->get();
            }
            elseif($filtertype == 'todayoverallleads')
            {
                $output = DB::table('leads')
                ->select('*')
                ->where('assign_userid','=',Auth::user()->id)
                ->where('leadentrydate','=',$today)
                ->get();
            }
            elseif($filtertype == 'yesterdayoverallleads')
            {
                $output = DB::table('leads')
                ->select('*')
                ->where('assign_userid','=',Auth::user()->id)
                ->where('leadentrydate','=',$yesterday)
                ->get();
            }
            elseif($filtertype == 'last30overallleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->where('assign_userid','=',Auth::user()->id)
            ->whereMonth('created_at', $lastmonth)
            ->whereYear('created_at', $lastmonthyear)
            ->get();
            }
            elseif($filtertype == 'last60overallleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->where('assign_userid','=',Auth::user()->id)
            ->whereBetween('created_at', [$last60,$today1])
            ->get();
            }
            elseif($filtertype == 'indiamartleads')
            {
                $output = DB::table('leads')
                ->select('*')
                ->where('assign_userid','=',Auth::user()->id)
                ->where('leadsource','=','Indiamart')
                ->get();
            }
            elseif($filtertype == 'indiamartconvertedleads')
            {
                $output = DB::table('leads')
                ->select('*')
                ->where('assign_userid','=',Auth::user()->id)
                ->where('leadstatus','=','Converted')
                ->where('leadsource','=','Indiamart')
                ->get();
            }
            elseif($filtertype == 'indiamartnotconvertedleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->where('assign_userid','=',Auth::user()->id)
            ->where('leadstatus','=','Pending')
            ->where('leadsource','=','Indiamart')
            ->get();
            }
            elseif($filtertype == 'indiamarttodayleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->where('assign_userid','=',Auth::user()->id)
            ->where('leadentrydate','=',$today)
            ->where('leadsource','=','Indiamart')
            ->get();
            }
            elseif($filtertype == 'indiamartyesterdayleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->where('assign_userid','=',Auth::user()->id)
            ->where('leadentrydate','=',$yesterday)
            ->where('leadsource','=','Indiamart')
            ->get();
            }
            elseif($filtertype == 'last30indiamartleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->where('assign_userid','=',Auth::user()->id)
            ->whereMonth('created_at', $lastmonth)
            ->whereYear('created_at', $lastmonthyear)
            ->where('leadsource','=','Indiamart')
            ->get();
            }
            elseif($filtertype == 'last60indiamartleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->where('assign_userid','=',Auth::user()->id)
            ->whereBetween('created_at', [$last60,$today1])
            ->where('leadsource','=','Indiamart')
            ->get();
            }
            elseif($filtertype == 'directleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->where('assign_userid','=',Auth::user()->id)
            ->where('leadsource','=','Direct')
            ->get();
            }
            elseif($filtertype == 'directconvertedleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->where('assign_userid','=',Auth::user()->id)
            ->where('leadstatus','=','Converted')
            ->where('leadsource','=','Direct')
            ->get();
            }
            elseif($filtertype == 'directnotconvertedleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->where('assign_userid','=',Auth::user()->id)
            ->where('leadstatus','=','Pending')
            ->where('leadsource','=','Direct')
            ->get();
            }
            elseif($filtertype == 'directtodayleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->where('assign_userid','=',Auth::user()->id)
            ->where('leadentrydate','=',$today)
            ->where('leadsource','=','Direct')
            ->get();
            }
            elseif($filtertype == 'directyesterdayleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->where('assign_userid','=',Auth::user()->id)
            ->where('leadentrydate','=',$yesterday)
            ->where('leadsource','=','Direct')
            ->get();
            }
            elseif($filtertype == 'last30directleads')
            {
                $output = DB::table('leads')
            ->select('*')
            ->where('assign_userid','=',Auth::user()->id)
            ->whereMonth('created_at', $lastmonth)
            ->whereYear('created_at', $lastmonthyear)
            ->where('leadsource','=','Direct')
            ->get();
            }
            elseif($filtertype == 'last60directleads')
            {
                $output = DB::table('leads')
                ->select('*')
                ->where('assign_userid','=',Auth::user()->id)
                ->whereBetween('created_at', [$last60,$today1])
                ->where('leadsource','=','Direct')
                ->get();
            }
        }

        return $output;
    }

    public function getDateFilteration(Request $request)
    {
        // $fromdate = $request->fromdate;
        // $todate = $request->todate;
        $fromdate = date("d-m-Y", strtotime($request->fromdate));
        $todate = date("d-m-Y", strtotime($request->todate));
        $userid1 = $request->userid;

        $user = Auth::user()->name;
        $userid = Auth::user()->id;

        if(Auth::user()->name== 'admin@sales' || Auth::user()->name == 'Admin')
        {
            if($userid1 == null)
            {
                $filter = DB::table('leads')
                ->select('*')
                ->whereBetween('leadentrydate', [$fromdate,$todate])
                ->get();
            }
            else
            {
                $filter = DB::table('leads')
                ->select('*')
                ->whereBetween('leadentrydate', [$fromdate,$todate])
                ->where('assign_userid',$userid1)
                ->get();
            }

        }
        else
        {
            $filter = DB::table('leads')
            ->select('*')
            ->whereBetween('leadentrydate', [$fromdate,$todate])
            ->where('assign_userid','=',$userid)
            ->get();
        }


        return $filter;
    }

    public function sendMail(Request $request)
    {

    }

    public function leadassign(Request $request)
    {
        $leadid = $request->leadid;
        $username = $request->username;
        // dd($leadid);
        $assign = DB::table('leads')->where('leadid',$leadid)->update(array(
            'assign_userid'=>$username,
        ));

        return back()->with('success','Lead Assigned Successfully..');
    }


    public function getindiamartlead()
    {
        $today = date("Y-m-d");
        $todaydate = date("Y-M-d", strtotime($today));
        $beforesevendays = date("Y-M-d", strtotime($today ."-7 day"));

        // dd($beforesevendays);

        $url="https://mapi.indiamart.com/wservce/crm/crmListing/v2/?glusr_crm_key=mR20Er1k5HjHS/et4XKI7l2MpVHGnDFq&start_time=".$beforesevendays."&end_time=".$todaydate."";
        // $url="https://mapi.indiamart.com/wservce/crm/crmListing/v2/?glusr_crm_key=mR20Er1s7HbIT/ev5HyI7liOp1TAmjBnXg==&start_time=".$beforesevendays."&end_time=".$todaydate."";
        // $url="https://mapi.indiamart.com/wservce/crm/crmListing/v2/?glusr_crm_key=mR20Er1k5HjHS/et4XKI7l2MpVHGnDFq";

        $response = file_get_contents($url);
        // dd($response);
        $data = json_decode($response);

        // dd($data);
        // if($data->CODE == '429')
        // {
        //     return $data->CODE;
        // }

        // if($data->CODE == '200')
        // {
            foreach($data->RESPONSE as $d)
            {
                $duplicatecheck = DB::table('indiamartleads')
                ->select('*')
                ->where('UNIQUE_QUERY_ID','=',$d->UNIQUE_QUERY_ID)
                ->get();
                // dd($duplicatecheck);
                if($duplicatecheck->count() <= 0)
                {
                    DB::table('indiamartleads')
                    ->insert([
                        "SENDER_NAME"=>$d->SENDER_NAME,
                        "SENDER_MOBILE"=>$d->SENDER_MOBILE,
                        "SENDER_EMAIL"=>$d->SENDER_EMAIL,
                        "SENDER_COMPANY"=>$d->SENDER_COMPANY,
                        "SENDER_ADDRESS"=>$d->SENDER_ADDRESS,
                        "SENDER_CITY"=>$d->SENDER_CITY,
                        "SENDER_STATE"=>$d->SENDER_STATE,
                        "QUERY_PRODUCT_NAME"=>$d->QUERY_PRODUCT_NAME,
                        "QUERY_MESSAGE"=>$d->QUERY_MESSAGE,
                        "UNIQUE_QUERY_ID"=>$d->UNIQUE_QUERY_ID,
                        "QUERY_TIME"=>$d->QUERY_TIME
                    ]);
                    // $invID =0;
                    // $maxValue = DB::table('leads')->max('id');
                    // $invID=$maxValue+1;
                    // $invID = str_pad($invID, 4, '0', STR_PAD_LEFT);

                    // $leadid="LEAD".$invID;
                    // DB::table('leads')
                    // ->insert([
                    //     "leadentrydate" =>$d->QUERY_TIME,
                    //     "customername" =>$d->SENDER_NAME,
                    //     "mobilenumber" =>$d->SENDER_MOBILE,
                    //     "email" =>$d->SENDER_EMAIL,
                    //     "address" =>$d->SENDER_ADDRESS,
                    //     "dealname" =>$d->QUERY_PRODUCT_NAME,
                    //     "remarks" =>$d->QUERY_MESSAGE,
                    //     "leadsource" => 'Indiamart',
                    //     "type" => 'Customer',
                    //     "leadstatus"=>'Pending',
                    //     "leadid"=>$leadid
                    // ]);
                }
                // else
                // {
                //     return "No data";
                // }
            }

            return $data->CODE;
        // }


    }


   public function importindiamartleads()
    {
        $indiamartleads = DB::table('indiamartleads')
        ->select('*')
        ->get();

        foreach($indiamartleads as $leads)
        {
            $lead = DB::table('leads')
            ->select('*')
            ->where('UNIQUE_QUERY_ID','=',$leads->UNIQUE_QUERY_ID)
            ->count();

            if($lead == 0)
            {
                $invID =0;
                    $maxValue = DB::table('leads')->max('id');
                    $invID=$maxValue+1;
                    $invID = str_pad($invID, 4, '0', STR_PAD_LEFT);

                    $username = DB::table('users')
                    ->select('*')
                    ->where('name','=','Admin')
                    ->first();
                    $leadid="LEAD".$invID;
                DB::table('leads')
                ->insert([
                      "leadentrydate" =>date("d-m-Y", strtotime($leads->QUERY_TIME)),
                        "customername" =>$leads->SENDER_NAME,
                        "mobilenumber" =>$leads->SENDER_MOBILE,
                        "email" =>$leads->SENDER_EMAIL,
                        "address" =>$leads->SENDER_ADDRESS,
                        "dealname" =>$leads->QUERY_PRODUCT_NAME,
                        "remarks" =>$leads->QUERY_MESSAGE,
                        "leadsource" => 'Indiamart',
                        "type" => 'Customer',
                        "leadstatus"=>'Pending',
                        "callstage"=>'Untouched',
                        "leadid"=>$leadid,
                        "assign_userid"=>$username->id,
                        "UNIQUE_QUERY_ID"=>$leads->UNIQUE_QUERY_ID
                ]);
            }
        }

        $tradeindialeads = DB::table('tradeindialeads')
        ->select('*')
        ->get();

        foreach($tradeindialeads as $leads)
        {
            $lead = DB::table('leads')
            ->select('*')
            ->where('UNIQUE_QUERY_ID','=',$leads->unique_id)
            ->count();

            if($lead == 0)
            {
                $invID =0;
                    $maxValue = DB::table('leads')->max('id');
                    $invID=$maxValue+1;
                    $invID = str_pad($invID, 4, '0', STR_PAD_LEFT);

                    $leadid="LEAD".$invID;

                     $username = DB::table('users')
                    ->select('*')
                    ->where('name','=','Admin')
                    ->first();

                DB::table('leads')
                ->insert([
                      "leadentrydate" =>date("d-m-Y", strtotime($leads->generated_time)),
                        "customername" =>$leads->sender_name,
                        "mobilenumber" =>$leads->sender_mobile,
                        "email" =>$leads->sender_email,
                        "address" =>$leads->sender_city,
                        "dealname" =>$leads->product_name,
                        "leadsource" => 'Tradeindia',
                        "type" => 'Customer',
                        "leadstatus"=>'Pending',
                        "leadid"=>$leadid,
                        "assign_userid"=>$username->id,
                        "UNIQUE_QUERY_ID"=>$leads->unique_id
                ]);
            }
        }
    }

    public function getproductspec($proid)
    {
        $products = DB::table('twoquotedproducts')
        ->select('*')
        ->where('id','=',$proid)
        ->first();
        // dd($products);
        return $products;
    }

    public function getproductsize($ltrs,$protype)
    {
        $productssize = DB::table('twoquotedproducts')
        ->select('*')
        ->where('catid','=',$protype)
        ->where('ltrs','=',$ltrs)
        ->groupby('size')
        ->get();
        // dd($products);
        return $productssize;
    }

    public function gettradeindialeads()
    {
        $today = date("Y-m-d");
        // $todaydate = date("Y-M-d", strtotime($today));
        $yesterday = date("Y-m-d", strtotime($today ."-1 day"));

        $url="https://www.tradeindia.com/utils/my_inquiry.html?userid=17608594&profile_id=40006160&key=916401c8b3445db624ae7451f13311da&from_date=".$yesterday."&to_date=".$today."";
        // $url="https://www.tradeindia.com/utils/my_inquiry.html?userid=17608594&profile_id=40006160&key=916401c8b3445db624ae7451f13311da&from_date=2023-01-09&to_date=2023-01-10";

        $response = file_get_contents($url);
        // dd($response);
        $data = json_decode($response);

        foreach($data as $d)
            {
                $duplicatecheck = DB::table('tradeindialeads')
                ->select('*')
                ->where('unique_id','=',$d->rfi_id)
                ->get();
                // dd($d->sender_city);
                if($duplicatecheck->count() <= 0)
                {
                    if($d->inquiry_type == 'UNMODERATED')
                    {
                        DB::table('tradeindialeads')
                        ->insert([
                            "sender_name"=>$d->sender_name,
                            "sender_mobile"=>$d->sender_mobile,
                            "sender_email"=>$d->sender_email,
                            "sender_company"=>$d->sender_co,
                            "sender_city"=>$d->sender_city,
                            "sender_state"=>$d->sender_state,
                            "product_name"=>$d->subject,
                            "unique_id"=>$d->rfi_id,
                            "generated_time"=>$d->generated_date
                        ]);
                    }
                    else
                    {
                        DB::table('tradeindialeads')
                        ->insert([
                            "sender_name"=>$d->sender_name,
                            "sender_mobile"=>$d->sender_mobile,
                            "sender_email"=>$d->sender_email,
                            "sender_company"=>$d->sender_co,
                            "sender_city"=>$d->sender_city,
                            "sender_state"=>$d->sender_state,
                            "product_name"=>$d->product_name,
                            "unique_id"=>$d->rfi_id,
                            "generated_time"=>$d->generated_date
                        ]);
                    }


                }

            }

            return $data;
    }

    public function importleads(Request $request)
    {

        // dd($request->file);
        $importlead = Excel::import(new LeadImports, $request->file("importfile"));

        if($importlead)
        {
            return back()->with('success','Lead Import successfully...');
        }
        else
        {
            return back()->with('success','Lead Import Failed...');
        }

    }

}
