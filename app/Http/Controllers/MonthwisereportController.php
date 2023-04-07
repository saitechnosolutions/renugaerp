<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\attendance_detail;

class MonthwisereportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $monthyear = date("m-Y");
        $monthyear1 = date("Y-m");
        
        $query=DB::table('employees')
        ->select('*')
        ->whereIn('emp_id',(function ($query) use ($monthyear1){
            $query->from('excel_import_attedances')
                ->select('empid')
                // ->where('attedanc_date','=',$monthyear);
                ->where('attedance_date','like','%'.$monthyear1.'%');
        }))
        // ->join('workingdays', 'follow_ups.leadid', '=', 'leads.leadid')
        ->get();
        
        // dd($query);

return view('pages.month_wise_report',compact('query','monthyear','monthyear1'));

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

    public function monthwisereport(Request $request)
    {
        // $year = date("Y");
        $monthyear1 = $request->month;
        // $monthyear = date("Y-$month");
        
        $query=DB::table('employees')
        ->select('*')
        ->whereIn('emp_id',(function ($query) use ($monthyear1){
            $query->from('excel_import_attedances')
                ->select('empid')
                // ->where('attedanc_date','=',$monthyear);
                ->where('attedance_date','like','%'.$monthyear1.'%');
        }))
        // ->join('workingdays', 'follow_ups.leadid', '=', 'leads.leadid')
        ->get();
        
        // dd($query);

        // return $query;
        // return response()->json(['report' => $query, 'monthyear' => $monthyear]);
        return view('pages.month_wise_report',compact('query','monthyear1'));
    }
}
