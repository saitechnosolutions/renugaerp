<?php

namespace App\Http\Controllers;

use App\Models\follow_up;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CallupdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = date("d-m-Y");
        if(Auth::user()->name== "admin@sales" || Auth::user()->name== "Admin")
        {
            $callupdate = DB::table('follow_ups')
            ->select('*')
            ->where('created_at','like','%'.$date.'%')
            ->orderBy('id','desc')
            ->groupBy('leadid')
            ->get();
        }
        else
        {
            $callupdate = DB::table('follow_ups')
            ->select('*')
            ->where('created_at','like','%'.$date.'%')
            ->where('userid',Auth::user()->id)
            ->orderBy('id','desc')
            ->groupBy('leadid')
            ->get();
        }


        return view('pages.callupdate',compact('callupdate'));
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

    public function getcallupdate(Request $request)
    {
        $leadid = $request->notesid;
        // return "data";

        $notes = DB::table('follow_ups')
        ->select('*')
        ->where('leadid','=',$leadid)
        ->orderBy('id','desc')
        ->get();

        return $notes;
    }

    public function getfilternotes(Request $request)
    {
        $date = $request->filterdate;
        $originalDate = $date;
        $newDate = date("d-m-Y", strtotime($originalDate));
        // $result = Carbon::createFromFormat('Y/m/d', $date)->format('d/m/Y');
        // $notes = DB::table('follow_ups')
        // ->select('*')
        // ->where('created_at','like','%'.$newDate.'%')
        // ->get();

        $notes = DB::table('follow_ups')
        ->join('leads', 'follow_ups.leadid', '=', 'leads.leadid')
        ->get();

        return $notes;
    }
}
