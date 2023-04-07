<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $username = Auth::user()->name;
        $userid = Auth::user()->id;

        if($username == 'admin@sales' || $username == 'Admin')
        {
            $totalleads = DB::table('leads')
            ->select('*')
            ->get()
            ->count();
        }
        else
        {
            $totalleads = DB::table('leads')
            ->select('*')
            ->where('assign_userid','=',$userid)
            ->get()
            ->count();
        }



        if($username == 'admin@sales' || $username == 'Admin')
        {
            $convertedleads = DB::table('leads')
        ->select('*')
        ->where('leadstatus','=','Converted')
        ->get()
        ->count();
        }
        else
        {
        $convertedleads = DB::table('leads')
        ->select('*')
        ->where('assign_userid','=',$userid)
        ->where('leadstatus','=','Converted')
        ->get()
        ->count();
        }

        if($username == 'admin@sales' || $username == 'Admin')
        {
        $pendingleads = DB::table('leads')
        ->select('*')
        ->where('leadstatus','=','Pending')
        ->get()
        ->count();
        }
        else
        {
        $pendingleads = DB::table('leads')
        ->select('*')
        ->where('assign_userid','=',$userid)
        ->where('leadstatus','=','Pending')
        ->get()
        ->count();
        }



        if($username == 'admin@sales' || $username == 'Admin')
        {
            $proposals = DB::table('proposals')
        ->select('*')
        ->get()
        ->count();
        }
        else
        {
            $proposals = DB::table('proposals')
        ->select('*')
        ->where('userid','=',$userid)
        ->get()
        ->count();
        }



        $salesexecutive = DB::table('users')
        ->select('*')
        ->where('roll','=',"Sales")
        ->get()
        ->count();

        $supplierscount = DB::table('suppliers')
        ->select('*')
        ->get()
        ->count();

        $purchaserequests = DB::table('purchaserequests')
        ->select('*')
        ->groupBy('requestid')
        ->get()
        ->count();

        $purchaseorders = DB::table('purchaseorders')
        ->select('*')
        ->groupBy('orderid')
        ->get()
        ->count();

        $purchaseentry = DB::table('purchaseentries')
        ->select('*')
        ->get()
        ->count();


        $userlog = DB::table('userlogs')
        ->select('*')
        ->orderBy('id','DESC')
        ->get();


        if($username == 'admin@sales' || $username == 'Admin')
        {
            $tdate = date("Y-m-d");
        $todayactivities = DB::table('follow_ups')
        ->select('*')
        ->where('notification_date','=',$tdate)
        ->get();
        }
        else
        {
            $tdate = date("Y-m-d");
        $todayactivities = DB::table('follow_ups')
        ->select('*')
        ->where("userid",'=',Auth::user()->id)
        ->where('notification_date','=',$tdate)
        ->get();
        }



        // return view('pages.dashboard',compact('convertedleads','userlog','salesexecutive','proposals','pendingleads','convertedleads','totalleads'));
        return view('pages.dashboard_2',compact('convertedleads','userlog','salesexecutive','proposals','pendingleads','convertedleads','totalleads','supplierscount','purchaserequests','purchaseorders','purchaseentry','todayactivities'));
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
