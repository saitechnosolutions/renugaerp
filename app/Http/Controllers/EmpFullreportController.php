<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpFullreportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = DB::table('employees')
        ->select('*')
        ->get();
        return view('pages.emp_full_report',compact('employee'));
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

    public function getreport(Request $request)
    {
        $fromdate1 = $request->fromdate;
        $todate1 = $request->todate;
        $empid = $request->empid;

        $fromdate = date("d-m-Y", strtotime($fromdate1));
        $todate = date("d-m-Y", strtotime($todate1));

        // $empdata = DB::table('employees')
        // ->join('salary_calulation', 'employees.emp_id', '=', 'salary_calulation.emp_no')
        // ->join('excel_import_attedances', 'employees.emp_id', '=', 'excel_import_attedances.empid')
        // ->where('from_date','=',$fromdate)
        // ->where('to_date','=',$todate)
        // ->where("emp_id",$empid)
        // ->get();

        $attendancedetails = DB::table('excel_import_attedances')
        ->select('*')
        ->where('empid','=',$empid)
        ->whereBetween('attedance_date',[$fromdate,$todate])
        ->groupBy('attedance_date')
        ->get();

        $emp = DB::table('employees')
        ->select('*')
        ->where('emp_id','=',$empid)
        ->first();


        $salarydetails = DB::table('salary_calulation')
        ->select('*')
        ->where('from_date','=',$fromdate)
        ->where('to_date','=',$todate)
        ->where('emp_no','=',$empid)
        ->first();
        // dd($salarydetails->count());
        if($salarydetails == '')
        {
            $salary = '';
        }
        else
        {
            $salary = $salarydetails;
        }

        // dd($empdata);
        return view('pages.empfullreport',compact('attendancedetails','emp','fromdate','todate','salary'));


    }
}
