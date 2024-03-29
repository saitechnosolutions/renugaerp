<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PayslipController extends Controller
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
        ->where('emp_view','=','1')
        ->get();

        $employee2 = DB::table('employees')
        ->select('*')
        ->where('emp_view','=','1')
        ->where('salarytype','=','Weekly')
        ->get();

        return view('pages.pay-slip',compact('employee','employee2'));
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

    public function generatepayslip(Request $request)
    {
        $month = $request->month;
        $empid = $request->empid;

        $salarygenerationemp = DB::table('employees')
        ->join('salary_calulation', 'employees.emp_id', '=', 'salary_calulation.emp_no')
        ->where("monthyear",$month)
        ->where("emp_id",$empid)
        ->first();

        $desuc = $salarygenerationemp->LOANDEDN + $salarygenerationemp->ADVANCE_DEDN + $salarygenerationemp->EPF + $salarygenerationemp->ESI + $salarygenerationemp->uniform + $salarygenerationemp->OTH_MISC_DEDN + $salarygenerationemp->LATE_DEDN;
        $netpay = $salarygenerationemp->Net_pay;

        $finalsalary = $netpay - $desuc;

        $company = DB::table('company_details')
        ->select('*')
        ->where('id','=','1')
        ->first();

        return view('pages.payslip-report2',compact('salarygenerationemp','finalsalary','desuc','company','month'));
    }

    public function customgeneratepayslip(Request $request)
    {
        $empid = $request->empid;
        $period = $request->period;
        $str_arr = explode ("/", $period);
        // dd($str_arr[0]);
        $fromdate = $str_arr[0];
        $todate = $str_arr[1];

        $salarygenerationemp = DB::table('employees')
        ->join('salary_calulation', 'employees.emp_id', '=', 'salary_calulation.emp_no')
        ->where('from_date','=',$fromdate)
        ->where('to_date','=',$todate)
        ->where("emp_id",$empid)
        ->first();

        $desuc = $salarygenerationemp->LOANDEDN + $salarygenerationemp->ADVANCE_DEDN + $salarygenerationemp->EPF + $salarygenerationemp->ESI + $salarygenerationemp->uniform + $salarygenerationemp->OTH_MISC_DEDN + $salarygenerationemp->LATE_DEDN;
        $netpay = $salarygenerationemp->Net_pay;

        $finalsalary = $netpay - $desuc;

        $company = DB::table('company_details')
        ->select('*')
        ->where('id','=','1')
        ->first();

        return view('pages.custom_payslip_report',compact('salarygenerationemp','finalsalary','desuc','company','period'));
    }
}
