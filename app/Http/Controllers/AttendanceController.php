<?php

namespace App\Http\Controllers;

use App\Imports\AttedanceImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
// use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = date("Y-m-d");
        $yesterday = date($today,strtotime("-1 days"));

// $attendance = DB::connection('mysql2')->table('attendance')
// ->select('*')
// ->where('logdate',$today)
// ->groupBy('empid')
// ->get();


$attendance = DB::table('excel_import_attedances')
->select('*')
->groupBy('empid','attedance_date')
->get();


        $e = DB::table('employees')
        ->select('*')
        ->get();

        $lastdate = DB::table('attendance_details')
        ->select('attedance_date')
        ->orderby('attedance_date','desc')
        ->first();
        return view('pages.attendance',compact('attendance','e','lastdate','today','yesterday'));
        // return view('pages.attendance',compact('attendance','e'));
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

    public function getAttendance(Request $request)
    {
        $empid = $request->empid;
        $logindate = $request->logindate;

        $empattendance = DB::connection('mysql2')->table('attendance')
        ->select('*')
        ->where('logdate',$logindate)
        ->where('empid',$empid)
        ->get();

        return $empattendance;
    }

    public function getAttendanceFirst(Request $request)
    {
        $empid = $request->empid;
        $logindate = $request->logindate;

        $empattendancefirst = DB::connection('mysql2')->table('attendance')
        ->select('*')
        ->where('logdate',$logindate)
        ->where('empid',$empid)
        ->take(1)
        ->first();

        $empattendancesecond = DB::connection('mysql2')->table('attendance')
        ->select('*')
        ->where('logdate',$logindate)
        ->where('empid',$empid)
        ->skip(1)->first();
        // dd($empattendancefirst->punchdetails);

        $to_time = strtotime($empattendancefirst->punchdetails);
$from_time = strtotime($empattendancesecond->punchdetails);
        $diff = round(abs($to_time - $from_time) / 60,2);

        $hours = intdiv($diff, 60).':'. ($diff % 60);

        return $hours;
    }

    public function getAttendanceSecond(Request $request)
    {
        $empid = $request->empid;
        $logindate = $request->logindate;

        $empattendancethird = DB::connection('mysql2')->table('attendance')
        ->select('*')
        ->where('logdate',$logindate)
        ->where('empid',$empid)
        ->skip(1)
        ->skip(2)->first();


        $empattendancefourth = DB::connection('mysql2')->table('attendance')
        ->select('*')
        ->where('logdate',$logindate)
        ->where('empid',$empid)
        ->skip(1)
        ->skip(2)
        ->skip(3)->first();
        // dd($empattendancefirst->punchdetails);
        $to_time = strtotime($empattendancethird->punchdetails);
$from_time = strtotime($empattendancefourth->punchdetails);
        $diff = round(abs($to_time - $from_time) / 60,2);

        $hours = intdiv($diff, 60).':'. ($diff % 60);

        return $hours;
    }

    public function getAttendanceTotal(Request $request)
    {
        // Morning Time

        $empid = $request->empid;
        $logindate = $request->logindate;

        $empattendancefirst = DB::connection('mysql2')->table('attendance')
        ->select('*')
        ->where('logdate',$logindate)
        ->where('empid',$empid)
        ->take(1)
        ->first();

        $empattendancesecond = DB::connection('mysql2')->table('attendance')
        ->select('*')
        ->where('logdate',$logindate)
        ->where('empid',$empid)
        ->skip(1)->first();
        // dd($empattendancefirst->punchdetails);
        $to_time = strtotime($empattendancefirst->punchdetails);
$from_time = strtotime($empattendancesecond->punchdetails);
        $diff = round(abs($to_time - $from_time) / 60,2);

        $morninghours = intdiv($diff, 60).':'. ($diff % 60);


        // Evening Hours

        $empattendancethird = DB::connection('mysql2')->table('attendance')
        ->select('*')
        ->where('logdate',$logindate)
        ->where('empid',$empid)
        ->skip(1)
        ->skip(2)->first();


        $empattendancefourth = DB::connection('mysql2')->table('attendance')
        ->select('*')
        ->where('logdate',$logindate)
        ->where('empid',$empid)
        ->skip(1)
        ->skip(2)
        ->skip(3)->first();
        // dd($empattendancefirst->punchdetails);
        $to_time = strtotime($empattendancethird->punchdetails);
$from_time = strtotime($empattendancefourth->punchdetails);
        $diff = round(abs($to_time - $from_time) / 60,2);

        $eveninghours = intdiv($diff, 60).':'. ($diff % 60);



$secs = strtotime($eveninghours)-strtotime("00:00:00");
$endTime = date("H:i:s",strtotime($morninghours)+$secs);


// $totaltime = date('h:i:s', $endTime);
        return $endTime;
    }

    public function getfilterattendance(Request $request)
    {

        $filterdate = $request->getdate;

        $filter =  DB::table('attendance_details')
        ->select('*')
        ->where('attedance_date',$filterdate)
        ->groupBy('empid','attedance_date')

        ->get();

        return $filter;
    }

    public function importattendance(Request $request)
    {
        $fromdate = $request->fromdate;
        // dd($fromdate);
        $todate = $request->todate;
        $attendance = DB::connection('mysql2')->table('attendance')
        ->select('*')
        ->whereBetween('logdate', [$fromdate, $todate])
        // ->take(100)
        ->get();

        // dd($attendance);


        // dd($attendance);
        $count = $attendance->count();

        foreach ($attendance as $a) {

        $empid = $a->empid;
        $punchdetails = $a->punchdetails;
        $attedance_date = $a->logdate;
        $id = $a->id;

        $checkid = DB::table('attendance_details')
        ->select('*')
        ->where('attendanceid','=',$id)
        ->first();

if ($checkid == '') {
    $calendar = DB::table('calandars')
    ->select('*')
    ->where('dates', '=', $attedance_date)
    // ->whereBetween('dates', [$fromdate, $todate])
    ->first();
    // dd($calendar);
    // $employees = DB::table('employees')
    // ->select('*')
    // ->get();
    // foreach($employees as $e)
    // {
                    //     $attendance_import = DB::table('attendance_details')->insert(
                    //         [
                    //             'empid' => $e->emp_id,
                    //             'punchindetails' => $punchdetails,
                    //             'attedance_date' => $attedance_date,
                    //             'attendanceid'=> $id,
                    //             'calendar_status' =>$calendar->status
                    //         ]);
    // }


        $attendance_import = DB::table('attendance_details')->insert(
            [
                'empid' => $empid,
                'punchindetails' => $punchdetails,
                'attedance_date' => $attedance_date,
                'attendanceid'=> $id,
                'calendar_status' =>$calendar->status
            ]
        );


    // $attendance_import1= DB::table('attendance_details')
    // ->where('empid','=',$eee->emp_id)
    // ->update(array(
                        //     'punchindetails' => $punchdetails,
                        //     'attedance_date' => $attedance_date,
                        //     'attendanceid'=> $id
    // ));
}
else

{}


            $empattendancefirst = DB::connection('mysql2')->table('attendance')
            ->select('*')
            ->where('logdate',$attedance_date)
            ->where('empid',$empid)
            ->orderBy('lotime','asc')
            ->take(1)
            ->first();

            $empattendancesecond = DB::connection('mysql2')->table('attendance')
            ->select('*')
            ->where('logdate',$attedance_date)
            ->where('empid',$empid)
            ->orderBy('lotime','asc')
            ->skip(1)
            ->first();

            $empattendancethird = DB::connection('mysql2')->table('attendance')
            ->select('*')
            ->where('logdate',$attedance_date)
            ->where('empid',$empid)
            ->orderBy('lotime','asc')
            ->skip(1)
            ->skip(2)
            ->first();

            $empattendancefourth = DB::connection('mysql2')->table('attendance')
            ->select('*')
            ->where('logdate',$attedance_date)
            ->where('empid',$empid)
            ->orderBy('lotime','asc')
            ->skip(1)
            ->skip(2)
            ->skip(3)
            ->first();

            if($empattendancefirst)
            {
                $to_time = strtotime($empattendancefirst->punchdetails);
                $empattendancefirstlottime = $empattendancefirst->lotime;
            }
            else
            {
                $to_time = strtotime("00:00:00");
                $empattendancefirstlottime = "-";
            }

            if($empattendancesecond)
            {
                $from_time = strtotime($empattendancesecond->punchdetails);
                $empattendancesecondlottime = $empattendancesecond->lotime;
            }
            else
            {
                $from_time = strtotime("00:00:00");
                $empattendancesecondlottime = "-";
            }

                    $diff = round(abs($to_time - $from_time) / 60,2);

                    $morninghours = intdiv($diff, 60).':'. ($diff % 60);

                    if($empattendancethird)
                    {
                        $to_time = strtotime($empattendancethird->punchdetails);
                        $empattendancethirdlottime = $empattendancethird->lotime;
                    }
                    else
                    {
                        $to_time = strtotime("00:00:00");
                        $empattendancethirdlottime = "-";
                    }

                    if($empattendancefourth)
                    {
                        $from_time = strtotime($empattendancefourth->punchdetails);
                        $empattendancefourthlottime = $empattendancefourth->lotime;
                    }
                    else
                    {
                        $from_time = strtotime("00:00:00");
                        $empattendancefourthlottime = "-";
                    }

                            $diff = round(abs($to_time - $from_time) / 60,2);

                            $eveninghours = intdiv($diff, 60).':'. ($diff % 60);


                    // Work Hours Calculation

                    if($empattendancefourth)
                    {
                        $secs = strtotime($eveninghours)-strtotime("00:00:00");
                        $endTime = date("H:i:s",strtotime($morninghours)+$secs);
                    }
                    else
                    {
                        $endTime = "00:00:00";
                    }

                    // OT Calculation

                    if($endTime > "08:00:00")
                    {
                        $to_time = strtotime($endTime);
                        $from_time = strtotime("08:00:00");
                        $ot = round(abs($to_time - $from_time) / 60,2);

                        if($ot)
                        {
                            $overtime = intdiv($ot, 60).':'. ($ot % 60);
                        }
                        else
                        {
                            $overtime = "00:00:00";
                        }
                    }
                    else
                    {
                        $overtime = "00:00:00";
                    }



                    // Status Calculation

                    if($endTime < '07:45:00')
                    {
                        $status = "P-LATE";
                    }
                    else
                    {
                        $status = "P";
                    }

                    if($empattendancefirstlottime > "09:00:00")
                    {
                        $to_time = strtotime($empattendancefirstlottime);
                        $from_time = strtotime("09:00:00");
                        $morning = round(abs($to_time - $from_time) / 60,2);

                        if($morning)
                        {
                            $morninglate = intdiv($morning, 60).':'. ($morning % 60);


                        }
                        else
                        {
                            $morninglate = "00:00:00";
                        }
                    }
                    else
                    {
                        $morninglate = "00:00:00";
                    }

                    if($empattendancesecondlottime)
                    {

                        // $to_time = strtotime($empattendancesecondlottime);
                        // $from_time = strtotime("01:00:00");
                        // $selectedTime = $empattendancesecondlottime;


                        $endTime1 = strtotime("+60 minutes", strtotime($empattendancesecondlottime));

                        $onehr =  date('H:i:s', $endTime1);

                        if($empattendancethirdlottime > $onehr)
                        {
                            $to_time = strtotime($empattendancethirdlottime);
                            $from_time = strtotime($onehr);
                            $afternoon = round(abs($to_time - $from_time) / 60,2);

                            if($afternoon)
                            {
                                $afternoonlate = intdiv($afternoon, 60).':'. ($afternoon % 60);
                            }
                            else
                            {
                                $afternoonlate = "00:00:00";
                            }
                        }
                        else
                        {
                            $afternoonlate = "00:00:00";
                        }
                    }

                    if($afternoonlate)
                    {
                        $secs = strtotime($afternoonlate)-strtotime("00:00:00");
                        $totaltime = date("H:i:s",strtotime($morninglate)+$secs);
                    }
                    else
                    {
                        $totaltime = "00:00:00";
                    }




                    // if($afternoonlate >= "00:05:00")
                    // {
                    //     $status = "A-LATE";

                    //     $to_time = strtotime("04:00:00");
                    //     $from_time = strtotime("00:30:00");
                    //     $ot = round(abs($to_time - $from_time) / 60,2);

                    //     if($ot)
                    //     {
                    //         $overtime = "00:30";
                    //     }
                    //     else
                    //     {
                    //         $overtime = "00:00";
                    //     }
                    // }


                        if($empattendancesecondlottime > "12:30:00")
                        {
                            $empattendancesecondlottime = $empattendancesecondlottime;
                        }
                        else
                        {
                            $empattendancesecondlottime = "00:00:00";
                        }

                        if($empattendancethirdlottime > "12:30:00")
                        {
                            $empattendancethirdlottime = $empattendancethirdlottime;
                        }
                        else
                        {
                            $empattendancethirdlottime = "00:00:00";
                        }

                        if($empattendancefourthlottime > "05:30:00")
                        {
                            $empattendancefourthlottime = $empattendancefourthlottime;
                        }
                        else
                        {
                            $empattendancefourthlottime = "00:00:00";
                        }




            $attendance_import1= DB::table('attendance_details')
            ->where('empid','=',$empid)
            ->where('attedance_date','=',$attedance_date)
            ->update(array(
                'morning_in'=>$empattendancefirstlottime,
                'lunch_out'=>$empattendancesecondlottime,
                'lunch_in'=>$empattendancethirdlottime,
                'eveningout'=>$empattendancefourthlottime,
                'status'=>$status,
                'totalworkhrs'=>$endTime,
                'ot'=>$overtime,
                'morning_late'=>$morninglate,
                'lunch_in_late'=>$afternoonlate,
                'total_late'=>$totaltime
            ));


            $m = DB::table('attendance_details')
            ->select('*')
            ->where('empid','=',$empid)
            ->where('attedance_date','=',$attedance_date)
            ->first();

            if($m->morning_late > "00:05:00")
            {
                $status = "A-LATE";
                    DB::table('attendance_details')
                    ->where('empid','=',$empid)
                    ->where('attedance_date','=',$attedance_date)
                    ->update(array(
                        'ot'=>'03:30:00',
                        'morning_ot'=>"00:30:00",

                    ));
            }
            else
            {
                DB::table('attendance_details')
                ->where('empid','=',$empid)
                ->where('attedance_date','=',$attedance_date)
                ->update(array(
                    // 'ot'=>'00:00:00',
                    'morning_ot'=>"00:00:00",
                ));

            }

            if($m->lunch_in_late > "00:05:00")
            {
                $status = "A-LATE";

                    DB::table('attendance_details')
                    ->where('empid','=',$empid)
                    ->where('attedance_date','=',$attedance_date)
                    ->update(array(
                        'afternoon_ot'=>"00:30:00",
                    ));
            }
            else
            {
                DB::table('attendance_details')
                ->where('empid','=',$empid)
                ->where('attedance_date','=',$attedance_date)
                ->update(array(
                    'afternoon_ot'=>"00:00:00",
                ));
            }


            $secs = strtotime($m->morning_ot)-strtotime("00:00:00");
            $total_late_ot = date("H:i:s",strtotime($m->afternoon_ot)+$secs);

            if($total_late_ot == '01:00:00')
            {
                $total_late_ot = '00:30:00';
            }

            DB::table('attendance_details')
            ->where('empid','=',$empid)
            ->where('attedance_date','=',$attedance_date)
            ->update(array(
                'total_late_ot'=>$total_late_ot,
            ));

            $t = DB::table('attendance_details')
            ->where('empid','=',$empid)
            ->where('attedance_date','=',$attedance_date)
            ->first();


            if($t->total_late_ot >= "00:30:00")
            {
                $o1 = strtotime($t->totalworkhrs)-strtotime("00:00:00");
                // $totot = date("H:i:s",strtotime($o1));
                $totot = date("H:i:s",$o1-strtotime("00:30:00"));
                // dd($totot);
                DB::table('attendance_details')
                ->where('empid','=',$empid)
                ->where('attedance_date','=',$attedance_date)
                ->update(array(
                    'ot'=>$totot,
                    'status'=>"A-LATE"
                ));

                $e = DB::table('employees')
                ->select('*')
                ->where('emp_id','=',$empid)
                ->first();
                // dd($e);
                if($e)
                {
                    $salary = $e->daily_salary/8;
                    $halfhrsalary = $salary/2;

                    DB::table('attendance_details')
                    ->where('empid','=',$empid)
                    ->where('attedance_date','=',$attedance_date)
                    ->update(array(
                        'LATE_DEDN_AMT'=>$halfhrsalary
                    ));
                }



            }




            // $gettotlateot = DB::table('attendance_details')
            // ->where('empid','=',$empid)
            // ->where('attedance_date','=',$attedance_date)
            // ->where('total_late_ot','>',"00:30:00")
            // ->get();

            // if($gettotlateot->count()>1)
            // {
            //         DB::table('attendance_details')
            //         ->where('empid','=',$empid)
            //         ->where('attedance_date','=',$attedance_date)
            //         ->update(array(
            //             'ot'=>DB::raw("totalworkhrs - ot"),
            //         ));
            // }


            $workingdays = DB::table('calandars')
            ->select('*')
            ->where('status','=','1')
            ->whereBetween('dates', [$fromdate, $todate])
            ->get();

            foreach($workingdays as $work)
            {
                if($work->dates == date($work->dates,strtotime("-1 days")))
                {
                    $getyesterday = DB::table('attendance_details')
                    ->select('*')
                    ->where('attedance_date','=',date("Y-m-d",strtotime("-1 days")))
                    ->where('empid','=',$empid)
                    ->get();

                    $ducheck = DB::table('attendance_details')
                    ->select('*')
                    ->where('attedance_date','=',$work->dates)
                    ->where('empid','=',$empid)
                    ->get()
                    ->count();

                    if($ducheck == 0)
                    {
                        if($getyesterday->count() == 0)
                        {
                            $insertuser = DB::table('attendance_details')->insert([
                                'attedance_date' => $work->dates,
                                'empid' => $empid,
                                'morning_in'=>'00:00:00',
                                'lunch_out'=>'00:00:00',
                                'lunch_in'=>'00:00:00',
                                'eveningout'=>'00:00:00',
                                'status'=>'A',
                                'totalworkhrs'=>'00:00:00',
                                'ot'=>'00:00:00',
                                'morning_late'=>'00:00:00',
                                'lunch_in_late'=>'00:00:00',
                                'total_late'=>'00:00:00'
                            ]);
                        }
                        else
                        {

                        }
                    }
                    else
                    {

                    }

                }

            }

            // $joinempattendancedetails = DB::table('employees')
            // ->select('employees.emp_id','employees.name','attendance_details.attedance_date')
            // ->join('attendance_details','attendance_details.empid','!=','employees.emp_id')
            // ->join('calandars','calandars.dates','=','attendance_details.attedance_date')
            // ->where('attendance_details.attedance_date','=',1)
            // ->groupBy('employees.emp_id')
            // ->get();

            // dd($joinempattendancedetails);
        }

        $affectedRow = DB::delete('DELETE S1 FROM attendance_details AS S1 INNER JOIN attendance_details AS S2 WHERE S1.id > S2.id AND S1.attedance_date = S2.attedance_date AND S1.empid = S2.empid');

        return back()->with('success','Attendance Imported Successfully');



    }


    public function salarygenerate(Request $request)
    {
        $monthyear = $request->getmonthyear;
        $monthyear1 = $todate = date("m-Y", strtotime($monthyear));
        // dd($monthyear);
          $workingdays =  DB::table('calandars')
            ->select('*')
            ->where('mon_year','=',$monthyear)
            ->first();

            $totaldays =  DB::table('calandars')
            ->select('*')
            ->where('mon_year','=',$monthyear)
            ->count();

            $workingdays1 =  DB::table('calandars')
            ->select('*')
            ->where('mon_year','=',$monthyear)
            ->where('status','=','1')
            ->count();

            $weekoff =  DB::table('calandars')
            ->select('*')
            ->where('mon_year','=',$monthyear)
            ->where('status','=','0')
            ->where('days','=','Sunday')
            ->count();

            $govtholidays =  DB::table('calandars')
            ->select('*')
            ->where('mon_year','=',$monthyear)
            ->where('status','=','0')
            ->where('days','!=','Sunday')
            ->count();

            // dd($workingdays);
            $employee =  DB::table('employees')
            ->select('*')
            ->where('salarytype','=','Monthly')
            ->get();


            foreach($employee as $emp)
            {
                $duplicatecheck = DB::table('salary_calulation')
                ->select('*')
                ->where('monthyear','=',$monthyear)
                ->where('emp_no','=',$emp->emp_id)
                ->first();
                // dd($duplicatecheck);
                if($duplicatecheck == '')
                {
                    $salaryinsert = DB::table('salary_calulation')->insert(
                        [
                           'emp_no' => $emp->emp_id,
                           'monthyear' => $monthyear,
                           'Total_days' => $totaldays,
                           'Actual_basic'=> $emp->actualbasic,
                           'OTH_MISC_DEDN' => '',
                           'workingdays'=>$workingdays1,
                           'weekoff'=>$weekoff,
                           'govt_holidays'=>$govtholidays
                        ]);

                        //Holiday Worked

                        $holidayworkdays = DB::table('excel_import_attedances')
                        ->select('*')
                        ->where('attedance_date','like','%'.$monthyear.'%')
                        ->where('empid','=',$emp->emp_id)
                        ->whereIn('status',['P','LATE','P-LATE'])
                        ->where('calendar_status','=','0')
                        ->groupBy('empid','attedance_date')
                        ->get()
                        ->count();

                        $holidaywork= DB::table('salary_calulation')
                        ->where('emp_no','=',$emp->emp_id)
                        ->where('monthyear','=',$monthyear)
                        ->update(array(
                            'Holiday_worked'=>$holidayworkdays,
                        ));


                        // Present Days
                        $presentdays = DB::table('excel_import_attedances')
                        ->select('*')
                        ->where('attedance_date','like','%'.$monthyear.'%')
                        ->where('empid','=',$emp->emp_id)
                        ->whereIn('status',['P','LATE','P-LATE'])
                        ->where('calendar_status','=','1')
                        ->groupBy('empid','attedance_date')
                        ->get()
                        ->count();

                        $allpresent = $presentdays;

                        $presentdays= DB::table('salary_calulation')
                        ->where('emp_no','=',$emp->emp_id)
                        ->where('monthyear','=',$monthyear)
                        ->update(array(
                            'Present_days'=>$presentdays,
                        ));

                        $absentdays = DB::table('excel_import_attedances')
                        ->select('*')
                        ->where('attedance_date','like','%'.$monthyear.'%')
                        ->where('empid','=',$emp->emp_id)
                        // ->where('status','=','p')
                        ->whereIn('status',['A','A-LATE'])
                        ->groupBy('empid','attedance_date')
                        ->get()
                        ->count();

                        $absentdays1= DB::table('salary_calulation')
                        ->where('emp_no','=',$emp->emp_id)
                        ->where('monthyear','=',$monthyear)
                        ->update(array(
                            'Holidays'=>$absentdays,
                        ));

                        // dd($emp->emp_id);
                        $otcheck =  DB::table('employees')
                        ->select('*')
                        ->where('ot','=','Yes')
                        ->where('emp_id','=',$emp->emp_id)
                        ->first();
                        if($absentdays>=1)
                        {
                            $absentdays1= DB::table('salary_calulation')
                            ->where('emp_no','=',$emp->emp_id)
                            ->where('monthyear','=',$monthyear)
                            ->update(array(
                                'CL'=>1,
                                'Present_days'=>$allpresent+1,
                                'Holidays'=>$absentdays-1,
                         ));
                        }
                        else
                        {
                            $absentdays1= DB::table('salary_calulation')
                            ->where('emp_no','=',$emp->emp_id)
                            ->where('monthyear','=',$monthyear)
                            ->update(array(
                                // 'CL/SL'=>1,
                                'Holidays'=>$absentdays,
                         ));

                        }
                            if($otcheck)
                            {
                                $getot = DB::table('excel_import_attedances')
                                ->select('attedance_date','empid','morning_in','lunch_out','lunch_in','status','created_at','eveningout','totalworkhrs','ot','morning_late','lunch_in_late','total_late')
                                // ->select('*')
                                ->where('empid','=',$otcheck->emp_id)
                                ->where('attedance_date','like','%'.$monthyear.'%')
                                ->groupBy('attedance_date')
                                ->get();

                                $time_arr = [];
                                foreach($getot as $oo)
                                {
                                    $time_arr[]= $oo->ot;
                                }
                                    $time = strtotime('00:00:00');
                                    $total_time = 0;

                                    foreach( $time_arr as $ele )
                                    {
                                        $sec_time = strtotime($ele) - $time;
                                        $total_time = $total_time + $sec_time;
                                    }
                                    $hours = intval($total_time / 3600);
                                    $total_time = $total_time - ($hours * 3600);
                                    $min = intval($total_time / 60);
                                    $sec = $total_time - ($min * 60);

                                    $ttime = $hours.":".$min.":00";

                                    // print_r($ttime);
                                    // dd($ttime);
                                    $salarydays= DB::table('salary_calulation')
                                    // ->where('emp_no','=',$emp->emp_id)
                                    ->where('emp_no','=',$otcheck->emp_id)
                                    ->update(array(
                                        'OT'=>$ttime
                                    ));

                                    // Holiday Work time Calculation

                                $getholidayot = DB::table('excel_import_attedances')
                                ->select('*')
                                // ->select('*')
                                ->where('empid','=',$otcheck->emp_id)
                                ->where('attedance_date','like','%'.$monthyear.'%')
                                ->where('calendar_status','=',0)
                                ->groupBy('attedance_date')
                                ->get();
                                    // dd($getholidayot);
                                $time_arr = [];
                                foreach($getholidayot as $oo)
                                {
                                    $time_arr[]= $oo->totalworkhrs;
                                }
                                    $time = strtotime('00:00:00');
                                    $total_time1 = 0;

                                    foreach( $time_arr as $ele )
                                    {
                                        $sec_time = strtotime($ele) - $time;
                                        $total_time1 = $total_time1 + $sec_time;
                                    }
                                    $hours1 = intval($total_time1 / 3600);
                                    $total_time1 = $total_time1 - ($hours1 * 3600);
                                    $min = intval($total_time1 / 60);
                                    $sec = $total_time1 - ($min * 60);

                                    $ttime1 = $hours1.":".$min.":00";
                                    // print_r($ttime1);
                                    // dd($ttime);
                                    $salarydays= DB::table('salary_calulation')
                                    // ->where('empid','=',$otcheck->emp_id)
                                    ->where('emp_no','=',$otcheck->emp_id)
                                    ->update(array(
                                        'holiday_work_hrs'=>$ttime1
                                    ));

                                    $totalworkhrs= DB::table('salary_calulation')
                                    ->where('emp_no','=',$otcheck->emp_id)
                            ->where('monthyear','=',$monthyear)
                            ->update(array(
                        'totalworkhrs'=>DB::raw("OT + holiday_work_hrs"),

                ));
                        $totalwrkhrsout = $hours+$hours1;


                                    // OT Amount Calculation

                                    $monthlysalary = $emp->actualbasic;

                                    //working days
                                    //Monthly salary
                                    $onedaysalary = $monthlysalary/$workingdays->working_days;
                                    $onehrsalary = $onedaysalary/8;

                                    if($ttime > '00:30:00')
                                    {
                                        // dd($totworkhrs);
                                        $oott = $totalwrkhrsout * $onehrsalary;
                                        // dd($oott);
                                        $ottimeupdate= DB::table('salary_calulation')
                                    // ->where('emp_no','=',$emp->emp_id)
                                    ->where('emp_no','=',$otcheck->emp_id)
                                    ->update(array(
                                        'OT_AMT'=>$oott
                                        // 'OT_AMT'=>$hours
                                    ));
                                    }
                                    else
                                    {

                                    }
                            }
                            else
                            {
                                // dd("ot no");
                            }



                        // foreach($ot as $o)
                        // {


                        // }


                }
                else{}


                // Old Calculation

                // $salarydays= DB::table('salary_calulation')
                // // ->where('emp_no','=',$emp->emp_id)
                // ->where('monthyear','=',$monthyear)
                // ->update(array(
                //     'salary_days'=>$workingdays1,
                //     // 'basic_salary'=>DB::raw("(Actual_basic+DA) /Total_days * salary_days"),
                //     'basic_salary'=>DB::raw("(Actual_basic / salary_days)*Present_days/100*45"),
                //     'HRA'=>DB::raw("(basic_salary/100*40)"),
                //     'Conveyance_allowance'=>DB::raw("(1600/salary_days)*Present_days"),
                //     'medica_allowance'=>DB::raw("(1250/salary_days)*Present_days"),
                //     'special_allowance'=>DB::raw("(Actual_basic / salary_days)*Present_days-(basic_salary+HRA+Conveyance_allowance+medica_allowance)"),
                //     'GROSS_CR'=>DB::raw("basic_salary+HRA+Conveyance_allowance+medica_allowance+special_allowance"),
                //     // 'GROSS_DR'=>DB::raw("(Actual_basic+DA) /Total_days * salary_days"),
                //     'GROSS_DR'=>DB::raw("EPF+ESI"),
                //     'Net_pay'=>DB::raw("(Actual_basic+DA) /salary_days * Present_days"),
                //     // 'Holidays'=>DB::raw("Total_days - salary_days")
                // ));

                // New Calculation

                $salarydays= DB::table('salary_calulation')
                // ->where('emp_no','=',$emp->emp_id)
                ->where('monthyear','=',$monthyear)
                ->update(array(
                    'salary_days'=>$workingdays1,
                    // 'basic_salary'=>DB::raw("(Actual_basic+DA) /Total_days * salary_days"),
                    'basic_salary'=>DB::raw("(Actual_basic/100*60)"),
                    'HRA'=>DB::raw("(Actual_basic/100*10)"),
                    'Conveyance_allowance'=>DB::raw("(Actual_basic/100*10)"),
                    'medica_allowance'=>DB::raw("(Actual_basic/100*10)"),
                    'special_allowance'=>DB::raw("(Actual_basic/100*10)"),
                    'GROSS_CR'=>DB::raw("basic_salary+HRA+Conveyance_allowance+medica_allowance+special_allowance"),
                    // 'GROSS_DR'=>DB::raw("(Actual_basic+DA) /Total_days * salary_days"),
                    'GROSS_DR'=>DB::raw("EPF+ESI"),
                    'Net_pay'=>DB::raw("(Actual_basic+DA) /salary_days * Present_days"),
                    // 'Holidays'=>DB::raw("Total_days - salary_days")
                ));



                $bonus = DB::table('salary_calulation')
                ->select('emp_no', 'basic_salary')
                ->whereIn('emp_no',(function ($query) {
                    $query->from('employees')
                        ->select('emp_id')
                        ->where('allowance_type','=','WithPF');
                }))
                ->get();

                foreach($bonus as $b)
                {

                    $deduction = DB::table('deduction')
                    ->select('*')
                    ->where('id','=',1)
                    ->first();
                            $emp_id=$b->emp_no;
                            $Net_pay=$b->basic_salary;
                            $bonus=(($Net_pay * $deduction->bonus) / 100);

                    $bonuscalc= DB::table('salary_calulation')
                    ->where('emp_no','=',$emp_id)
                    ->where('monthyear','=',$monthyear)
                    ->update(array(
                        'bonus'=>$bonus,
                    ));
                }

                $calc2= DB::table('salary_calulation')
                // ->where('emp_no','=',$emp->emp_id)
                ->where('monthyear','=',$monthyear)
                ->update(array(
                    // 'GROSS_CR'=>DB::raw("Net_pay+(HRA + WA + Misc_allow + OT_AMT + OT_HRS + bonus)"),
                    // 'GROSS_CR'=>DB::raw("(basic_salary+HRA+Conveyance_allowance+medica_allowance+special_allowance)/ (salary_days*Present_days)"),
                    'GROSS_CR'=>DB::raw("(basic_salary+HRA+Conveyance_allowance+medica_allowance+special_allowance)/salary_days*Present_days"),

                ));

                $salarydays= DB::table('salary_calulation')
                // ->where('emp_no','=',$emp->emp_id)
                ->where('monthyear','=',$monthyear)
                ->update(array(
                    'salary_days'=>$workingdays1,
                    // 'basic_salary'=>DB::raw("(Actual_basic+DA) /Total_days * salary_days"),
                    'basic_salary'=>DB::raw("(GROSS_CR/100*60)"),
                    'HRA'=>DB::raw("(GROSS_CR/100*10)"),
                    'Conveyance_allowance'=>DB::raw("(GROSS_CR/100*10)"),
                    'medica_allowance'=>DB::raw("(GROSS_CR/100*10)"),
                    'special_allowance'=>DB::raw("(GROSS_CR/100*10)"),
                    // 'GROSS_CR'=>DB::raw("basic_salary+HRA+Conveyance_allowance+medica_allowance+special_allowance"),
                    // 'GROSS_DR'=>DB::raw("(Actual_basic+DA) /Total_days * salary_days"),
                    'GROSS_DR'=>DB::raw("EPF+ESI"),
                    'Net_pay'=>DB::raw("(GROSS_CR+DA) /salary_days * Present_days"),
                    // 'Holidays'=>DB::raw("Total_days - salary_days")
                ));

                // $calc3= DB::table('salary_calulation')
                // ->where('emp_no','=',$emp->emp_id)
                // ->where('monthyear','=',$monthyear)
                // ->update(array(
                //     'Net_pay'=>DB::raw("GROSS_CR"),
                // ));

                $calc4 = DB::table('salary_calulation')
                ->select('emp_no', 'Net_pay','Actual_basic','GROSS_CR','basic_salary')
                ->whereIn('emp_no',(function ($query) {
                    $query->from('employees')
                        ->select('emp_id')
                        ->where('allowance_type','=','WithPF');
                }))
                ->get();

                foreach($calc4 as $c)
                {
                    $deduction = DB::table('deduction')
                    ->select('*')
                    ->where('id','=',1)
                    ->first();
                            $emp_id=$c->emp_no;
                            $Net_pay=$c->Net_pay;
                            if($c->Actual_basic<=$deduction->esi_aboveamt)
                            {
                                $esicalc=$c->GROSS_CR*$deduction->esi/100;
                                // $esicalc=$deduction->esi;
                            }
                            else
                            {
                                $esicalc =0;
                            }
                            // $ESI=$Net_pay*($deduction->esi/100);
                            $ESI = $esicalc;
                            if($c->basic_salary>=$deduction->pf_fixed_amt)
                            {
                                $PF=$deduction->pf_fixed_amt*$deduction->pf/100;
                            }
                            else
                            {
                                $PF=$c->basic_salary*$deduction->pf/100;
                                // $PF=0;
                            }


                    $bonuscalc= DB::table('salary_calulation')
                    ->where('emp_no','=',$emp_id)
                    ->where('monthyear','=',$monthyear)
                    ->update(array(
                        'ESI'=>number_format($ESI,0),
                        'EPF'=>round($PF)
                    ));
                }

                $calc2= DB::table('salary_calulation')
                // ->where('emp_no','=',$emp->emp_id)
                ->where('monthyear','=',$monthyear)
                ->update(array(
                    'GROSS_DR'=>DB::raw("EPF+ESI"),
                ));

                $calc2= DB::table('salary_calulation')
                // ->where('emp_no','=',$emp->emp_id)
                ->where('monthyear','=',$monthyear)
                ->update(array(
                    // 'Net_pay'=>DB::raw("GROSS_CR-GROSS_DR+OT_AMT"),
                    'Net_pay'=>DB::raw("GROSS_CR-GROSS_DR"),
                ));
            }

        return $employee;
        // return $ttime;


    }


    public function salarygenerateemployee(Request $request)
    {
        $empid = $request->employeeid;
        $monthyear = $request->monthyear;

        $salarygenerationemp = DB::table('employees')
        ->join('salary_calulation', 'employees.emp_id', '=', 'salary_calulation.emp_no')
        ->where("monthyear",$monthyear)
        ->where("emp_id",$empid)
        ->where("salarytype",'=','Monthly')
        ->first();

        return $salarygenerationemp;
    }

    public function customsalarygenerateemployee(Request $request)
    {
        $empid = $request->employeeid;
        $fromdate = $request->fromdate;
        $todate = $request->todate;
        // $fromdate = date("d-m-Y", strtotime($fromdate1));
        // $todate = date("d-m-Y", strtotime($todate1));
        // dd($todate);

        $salarygenerationemp = DB::table('employees')
        ->join('salary_calulation', 'employees.emp_id', '=', 'salary_calulation.emp_no')
        ->where('from_date','=',$fromdate)
        ->where('to_date','=',$todate)
        ->where("emp_id",$empid)
        ->first();

        return $salarygenerationemp;
    }

    public function salaryReportgeneration(Request $request)
    {
        $monthyear = $request->month;

        $salarygenerationemp = DB::table('employees')
        ->join('salary_calulation', 'employees.emp_id', '=', 'salary_calulation.emp_no')
        ->where("monthyear",$monthyear)
        ->get();

        $company = DB::table('company_details')
        ->select('*')
        ->where('id','=','1')
        ->first();

        return view('pages.salary_report2',compact('salarygenerationemp','monthyear','company'));
    }

    public function customsalaryReportgeneration(Request $request)
    {
        $fromdate = $request->fromdate;
        $todate = $request->todate;

        $monthyear = $fromdate." - ".$todate;
        $salarygenerationemp = DB::table('employees')
        ->join('salary_calulation', 'employees.emp_id', '=', 'salary_calulation.emp_no')
        ->where('from_date','=',$fromdate)
        ->where('to_date','=',$todate)
        ->get();

        $company = DB::table('company_details')
        ->select('*')
        ->where('id','=','1')
        ->first();

        return view('pages.custom_salary_report2',compact('salarygenerationemp','monthyear','company','fromdate','todate'));
    }

    public function updatesalarydetails(Request $request)
    {
        $totaldays = $request->totaldays;
        $presentday = $request->presentday;
        $holiday = $request->holiday;
        $weekoff = $request->weekoff;
        $salaryday = $request->salaryday;
        $actualbasic1 = $request->actualbasic1;
        $da = $request->da;
        $basicsalary = $request->basicsalary;
        $netsalary = $request->netsalary;
        $hra = $request->hra;
        $wa = $request->wa;
        $bonus = $request->bonus;
        $misc = $request->misc;
        $amt = $request->amt;
        $hrs = $request->hrs;
        $grosscr = $request->grosscr;
        $epf1 = $request->epf1;
        $esi = $request->esi;
        // $loan = $request->loan;
        $advance = $request->advance;
        // $misc1 = $request->misc1;
        $late = $request->late;
        $grossdr = $request->grossdr;
        $employeeid = $request->employeeid;
        $monthyear = $request->month;
        $conveyanceallowance = $request->conveyanceallowance;
        $medicalallowance = $request->medicalallowance;
        $specialallowance = $request->specialallowance;
        $professionaldeduction = $request->professionaldeduction;
        $othdeduc = $request->othdeduc;
        $canteendeduc = $request->canteendeduc;
        $loandedu = $request->loandedu;



        $salaryupdate= DB::table('salary_calulation')
        ->where('monthyear','=',$monthyear)
        ->where('emp_no','=',$employeeid)
        ->update(array(
            'Present_days'=>$presentday,
            'Conveyance_allowance'=>$conveyanceallowance,
            'medica_allowance'=>$medicalallowance,
            'special_allowance'=>$specialallowance,
        'Holidays'=>$holiday,
        'weekoff'=>$weekoff,
        'salary_days'=>$salaryday,
        'Actual_basic'=>$actualbasic1,
        'DA'=>$da,
        'basic_salary'=>$basicsalary,
        'Net_pay'=>$netsalary,
        'HRA'=>$hra,
        'WA'=>$wa,
        'bonus'=>$bonus,
        'Misc_allow'=>$misc,
        'OT_AMT'=>$amt,
        'OT_HRS'=>$hrs,
        'GROSS_CR'=>$grosscr,
        'EPF'=>$epf1,
        'ESI'=>$esi,
        'LOANDEDN'=>$loandedu,
        'ADVANCE_DEDN'=>$advance,
        'OTH_MISC_DEDN'=>$othdeduc,
        'LATE_DEDN'=>$late,
        'GROSS_DR'=>$grossdr,
        'CANTEEN_DEDU'=>$canteendeduc
        ));

        return back();
    }

    public function attendanceentry(Request $request)
    {
        $empname = $request->empname;
        $date = $request->date;
        $time = $request->time;

        $totaltime = date("H:i:s",strtotime($time));

            $manualentry = DB::connection('mysql2')->table('attendance')->insert(
            [
                'empid' => $empname,
                'punchdetails' => $date." ".$time,
                'Deviceid' => 1,
                'logdate'=> $date,
                'lotime'=>$totaltime,
            ]);
            return back();
    }

    public function customsalarygenerate(Request $request)
    {
        $fromdate = $request->fromdate;
        $todate = $request->todate;
        
        

        // $fromdate = date("d-m-Y", strtotime($fromdate1));
        // $todate = date("d-m-Y", strtotime($todate1));
        // dd($fromdate);
        $time=strtotime($fromdate);
        $month=date("m",$time);
        $year=date("Y",$time);

        $datetime1 = strtotime($fromdate);
        $datetime2 = strtotime($todate);
        $days = (($datetime2 - $datetime1)/86400)+1;

        // $month=date("F",$fromdate);
        // $year=date("Y",$fromdate);
            $workingdays =  DB::table('calandars')
            ->select('*')
            ->whereBetween('dates',[$fromdate,$todate])
            ->where('status','=','1')
            ->count();

            // dd($workingdays);

            $weekoff =  DB::table('calandars')
            ->select('*')
            ->whereBetween('dates',[$fromdate,$todate])
            ->where('status','=','0')
            ->where('days','=','Sunday')
            ->count();

            $govtholidays =  DB::table('calandars')
            ->select('*')
            ->whereBetween('dates',[$fromdate,$todate])
            ->where('status','=','0')
            ->where('days','!=','Sunday')
            ->count();

            // dd($workingdays);
        $employee =  DB::table('employees')
            ->select('*')
            ->where('salarytype','=','Weekly')
            ->groupBy('emp_id')
            ->get();

            foreach($employee as $emp)
            {
                $duplicatecheck = DB::table('salary_calulation')
                ->select('*')
                ->where('from_date','=',$fromdate)
                ->where('to_date','=',$todate)
                ->where('emp_no','=',$emp->emp_id)
                ->first();
                // dd($duplicatecheck);
                if($duplicatecheck == '')
                {
                    $salaryinsert = DB::table('salary_calulation')->insert(
                        [
                           'emp_no' => $emp->emp_id,
                           'monthyear' => $year.'-'.$month,
                           'Total_days' => $days,
                           'daily_salary'=> $emp->daily_salary,
                           'from_date'=> $fromdate,
                           'to_date'=> $todate,
                           'workingdays'=>$workingdays,
                           'weekoff'=>$weekoff,
                           'govt_holidays'=>$govtholidays
                        ]);
                        
                        $halfdayscalc1 = DB::table('excel_import_attedances')
                        ->select('*')
                        ->whereBetween('attedance_date',[$fromdate,$todate])
                        ->where('empid','=',$emp->emp_id)
                        // ->where('calendar_status','=','1')
                        ->whereIn('status',['P-Half'])
                        ->groupBy('empid','attedance_date')
                        ->get()
                        ->count();
                        
                        $gethalf = $halfdayscalc1/2;
                        
                        $presentdays1 = DB::table('excel_import_attedances')
                        ->select('*')
                        ->whereBetween('attedance_date',[$fromdate,$todate])
                        ->where('empid','=',$emp->emp_id)
                        // ->where('calendar_status','=','1')
                        ->whereIn('status',['P','LATE','P-LATE'])
                        ->groupBy('empid','attedance_date')
                        ->get()
                        ->count();
                        
                        $pre = $gethalf+$presentdays1;

                        $holidayworkdays = DB::table('excel_import_attedances')
                        ->select('*')
                        ->whereBetween('attedance_date',[$fromdate,$todate])
                        ->where('empid','=',$emp->emp_id)
                        ->whereIn('status',['P','LATE','P-LATE'])
                        ->where('calendar_status','=','0')
                        ->groupBy('empid','attedance_date')
                        ->get()
                        ->count();

                        $holidaywork= DB::table('salary_calulation')
                        ->where('emp_no','=',$emp->emp_id)
                        ->where('from_date','=',$fromdate)
                        ->where('to_date','=',$todate)
                        ->update(array(
                            'Holiday_worked'=>$holidayworkdays,
                        ));

                        $presentdays= DB::table('salary_calulation')
                        ->where('emp_no','=',$emp->emp_id)
                        ->where('from_date','=',$fromdate)
                        ->where('to_date','=',$todate)
                        ->update(array(
                            'Present_days'=>$pre,
                        ));
                        
                        
                        $absentdays = DB::table('excel_import_attedances')
                        ->select('*')
                        ->whereBetween('attedance_date',[$fromdate,$todate])
                        ->where('empid','=',$emp->emp_id)
                        // ->where('status','=','p')
                        ->whereIn('status',['A'])
                        ->groupBy('empid','attedance_date')
                        ->get()
                        ->count();
                        if($halfdayscalc1 != 0)
                        {
                            $abs = $gethalf+$absentdays;
                        }
                        else
                        {
                            $abs = $absentdays-$gethalf;
                        }

                        $absentdays1= DB::table('salary_calulation')
                        ->where('emp_no','=',$emp->emp_id)
                        ->where('from_date','=',$fromdate)
                        ->where('to_date','=',$todate)
                        ->update(array(
                            'Holidays'=>$abs,
                        ));

                        $latedays = DB::table('excel_import_attedances')
                        ->select('*')
                        ->whereBetween('attedance_date',[$fromdate,$todate])
                        ->where('empid','=',$emp->emp_id)
                        // ->where('status','=','p')
                        ->whereIn('status',['A-LATE'])
                        ->groupBy('empid','attedance_date')
                        ->get()
                        ->count();

                        $latedays1= DB::table('salary_calulation')
                        ->where('emp_no','=',$emp->emp_id)
                        ->where('from_date','=',$fromdate)
                        ->where('to_date','=',$todate)
                        ->update(array(
                            'LATE_DAYS'=>$latedays,
                        ));


                        $salarydays= DB::table('salary_calulation')
                    // ->where('emp_no','=',$emp->emp_id)
                    ->where('from_date','=',$fromdate)
                        ->where('to_date','=',$todate)
                    ->update(array(
                        // 'salary_days'=>DB::raw("Present_days + Holidays + weekoff"),
                        // 'basic_salary'=>DB::raw("(Actual_basic+DA) /Total_days * salary_days"),
                        // 'GROSS_CR'=>DB::raw("(Actual_basic+DA) /Total_days * salary_days"),
                        // 'GROSS_DR'=>DB::raw("(Actual_basic+DA) /Total_days * salary_days"),
                        // 'Net_pay'=>DB::raw("(Actual_basic+DA) /Total_days * salary_days"),
                        'salary_days'=>DB::raw("Present_days"),
                        'basic_salary'=>DB::raw("daily_salary * salary_days"),

                    ));
                    // }

                    $otcheck =  DB::table('employees')
                    ->select('*')
                    ->where('ot','=','Yes')
                    ->where('emp_id','=',$emp->emp_id)
                    ->first();

                        if($otcheck)
                        {
                            // $getot = DB::table('attendance_details')
                            // ->where('empid','=',$otcheck->emp_id)
                            // ->where('from_date','=',$fromdate)
                            // ->where('to_date','=',$todate)
                            // ->whereBetween('attedance_date',[$fromdate,$todate])
                            // ->get();

                            $getot = DB::table('excel_import_attedances')
                                // ->select('attedance_date','empid','morning_in','total_late_ot','lunch_out','lunch_in','status','created_at','eveningout','total_late','totalworkhrs','ot','morning_late','lunch_in_late','total_late')
                                ->select('attedance_date','empid','morning_in','lunch_out','lunch_in','status','created_at','eveningout','total_late','totalworkhrs','ot','morning_late','lunch_in_late','total_late')
                                // ->select('*')
                                ->where('empid','=',$otcheck->emp_id)
                                ->whereBetween('attedance_date',[$fromdate,$todate])
                                ->groupBy('attedance_date')
                                ->get();

                            $time_arr = [];
                            foreach($getot as $oo)
                            {
                                $time_arr[]= $oo->ot;
                            }
                                $time = strtotime('00:00:00');
                                $total_time = 0;

                                foreach( $time_arr as $ele )
                                {
                                    $sec_time = strtotime($ele) - $time;
                                    $total_time = $total_time + $sec_time;
                                }
                                $hours = intval($total_time / 3600);
                                $total_time = $total_time - ($hours * 3600);
                                $min = intval($total_time / 60);
                                $sec = $total_time - ($min * 60);
                                // print_r("$hours:$min:$sec"."<br>");
                                $ttime2 = $hours.":".$min;
                                $ttime = $hours.".".$min;
                                // print_r($ttime);

                                $salarydays= DB::table('salary_calulation')
                                // ->where('emp_no','=',$emp->emp_id)
                                ->where('emp_no','=',$otcheck->emp_id)
                                ->update(array(
                                    'OT'=>$ttime2
                                ));

                                // Late total time calculation

                            //     $time_arr2 = [];
                            // foreach($getot as $oo)
                            // {
                            //     $time_arr2[]= $oo->total_late_ot;
                            // }
                            //     $time2 = strtotime('00:00:00');
                            //     $total_time2 = 0;

                            //     foreach( $time_arr2 as $ele2 )
                            //     {
                            //         $sec_time2 = strtotime($ele2) - $time2;
                            //         $total_time2 = $total_time2 + $sec_time2;
                            //     }
                            //     $hours2 = intval($total_time2 / 3600);
                            //     $total_time2 = $total_time2 - ($hours2 * 3600);
                            //     $min2 = intval($total_time2 / 60);
                            //     $sec2 = $total_time2 - ($min2 * 60);
                            //     // print_r("$hours:$min:$sec"."<br>");
                            //     $ttime22 = $hours2.":".$min2.":00";
                            //     // $ttime2 = $hours2.".".$min2;
                            //     // print_r($ttime);
                            //     if($ttime22 == '01:00:00')
                            //     {
                            //         $ttime22 = "00:30:00";
                            //     }
                            //     $salarydays= DB::table('salary_calulation')
                            //     // ->where('emp_no','=',$emp->emp_id)
                            //     ->where('emp_no','=',$otcheck->emp_id)
                            //     ->update(array(
                            //         'TOTAL_LATE_TIME'=>$ttime22
                            //     ));


                                    //working days
                                    //Monthly salary
                                    $onedaysalary = $emp->daily_salary;
                                    $onehrsalary = $onedaysalary/8;
                                    $halfhrsalary = $onehrsalary/2;


                                //  $gettotlateot = DB::table('excel_import_attedances')
                                // ->where('empid','=',$otcheck->emp_id)
                                // ->whereBetween('attedance_date',[$fromdate,$todate])
                                // ->where('LATE_DEDN_AMT','!=','0')
                                // ->sum('LATE_DEDN_AMT');


                                // if($gettotlateot)
                                // {
                                //     $ll = $gettotlateot-$halfhrsalary;
                                //     if($ll == '0.5')
                                //     {
                                //         $ll ="0";
                                //     }
                                //     DB::table('salary_calulation')
                                //     ->where('emp_no','=',$otcheck->emp_id)
                                //     ->where('from_date','=',$fromdate)
                                //     ->where('to_date','=',$todate)
                                //     ->update(array(
                                //         'LATE_DEDN_AMT'=>$ll,
                                //     ));
                                // }

                            // $oott = $ttime * $onehrsalary;

                            $hours=$ttime2;

    list($h, $m) = explode(':',$hours);  //Split up string into hours/minutes
    $decimal = $m/60;  //get minutes as decimal
    $hoursAsDecimal = $h+$decimal;


    $price=$onehrsalary;
    $oott=$hoursAsDecimal*$price;

                                // Less One Day OT

                            // $getdetail = DB::table('excel_import_attedances')
                            // ->select('*')
                            // ->where('empid','=',$otcheck->emp_id)
                            // ->whereBetween('attedance_date',[$fromdate,$todate])
                            // // ->where('status','=','A-LATE')
                            // ->get();


                            // if($getdetail->count() > 1)
                            // {

                            //     $one_day = strtotime($ttime22) - strtotime('00:30:00');

                            //     $h = intval($one_day / 3600);
                            //     $one_day = $one_day - ($h * 3600);
                            //     $m = intval($one_day / 60);
                            //     $s = $one_day - ($m * 60);
                            //     $hms = $h.":".$m.":00";

                            //         $s = DB::table('salary_calulation')
                            //         ->select('*')
                            //         ->where('emp_no','=',$otcheck->emp_id)
                            //         ->where('from_date','=',$fromdate)
                            //         ->where('to_date','=',$todate)
                            //         ->first();




                            //         $time1 = $s->OT;
                            //         $time2 = '00:30:00';

                            //         $time1_parts = explode(':', $time1);
                            //         $time1_hours = $time1_parts[0];
                            //         $time1_mins = $time1_parts[1];
                            //         $time1_secs = $time1_parts[2];


                            //         $time2_parts = explode(':', $time2);
                            //         $time2_hours = $time2_parts[0];
                            //         $time2_mins = $time2_parts[1];
                            //         $time2_secs = $time2_parts[2];

                            //         $total_hours = $time1_hours - $time2_hours;
                            //         $total_mins = $time1_mins - $time2_mins;
                            //         $total_secs = $time1_secs - $time2_secs;

                            //         if($total_secs < 0){
                            //             $total_secs += 60;
                            //             $total_mins--;
                            //         }

                            //         if($total_mins < 0){
                            //             $total_mins += 60;
                            //             $total_hours --;
                            //         }

                            //         $hms1 = $total_hours.':'.$total_mins.':'.$total_secs;

                            //         if($ttime > '00:30:00')
                            //         {
                            //             $salarydays= DB::table('salary_calulation')
                            //             // ->where('emp_no','=',$emp->emp_id)
                            //             ->where('emp_no','=',$otcheck->emp_id)
                            //             ->update(array(
                            //                 'TOTAL_LATE_TIME'=>$hms,
                            //                 'OT'=>$hms1,
                            //                 'OT_AMT'=>$oott-$halfhrsalary,
                            //             ));
                            //         }


                            // }
                            // else
                            // {
                            if($ttime > '00:30:00')
                            {
                                $salarydays= DB::table('salary_calulation')
                                // ->where('emp_no','=',$emp->emp_id)
                                ->where('emp_no','=',$otcheck->emp_id)
                                ->update(array(
                                    'TOTAL_LATE_TIME'=>'00:00:00',
                                    'OT_AMT'=>$oott,
                                ));
                            // }

                        }



                                        $ottimeupdate= DB::table('salary_calulation')
                                    // ->where('emp_no','=',$emp->emp_id)
                                    ->where('emp_no','=',$otcheck->emp_id)
                                    ->update(array(
                                        // 'LATE_DEDN'=>$latecalculation->count(),

                                        'basic_salary'=>DB::raw("daily_salary * salary_days"),
                                        // 'Net_pay'=>DB::raw("basic_salary + OT_AMT - LATE_DEDN_AMT"),
                                        'Net_pay'=>DB::raw("basic_salary + OT_AMT")
                                    ));


                        }

                        }
            }

            return $employee;
    }


    public function getattendancedetails(Request $request)
    {
        $id = $request->id;

        $attendance = DB::table('excel_import_attedances')
        ->select('*')
        ->where('id','=',$id)
        ->first();

        return $attendance;
    }

    public function updateattendance(Request $request)
    {
        $empid = $request->empid;
        $date = $request->date;
        $morningin = $request->morningin;
        $lunchout = $request->lunchout;
        $lunchin = $request->lunchin;
        $eveningout = $request->eveningout;
        $workinghour = $request->workinghour;
        $ot = $request->ot;
        $latetime = $request->latetime;
        $status = $request->status;
        $id = $request->id;

        $update = DB::table('excel_import_attedances')
              ->where('id', $id)
              ->update(
                [
                    'attedance_date' => $date,
                    'empid' => $empid,
                    'morning_in' => $morningin,
                    'lunch_out' => $lunchout,
                    'lunch_in' => $lunchin,
                    'eveningout' => $eveningout,
                    'totalworkhrs' => $workinghour,
                    'ot' => $ot,
                    'total_late' => $latetime,
                    'status' => $status,
                ]
            );

            if($update)
            {
                return back()->with('success','Attendance Updated Successfully...');
            }
    }

    public function getworkingdays($month)
    {
        // $month = $request->month;

        $getmonths = DB::table('calandars')
        ->select('*')
        ->where('mon_year','=',$month)
        ->where('status','=',1)
        ->get();

        return $getmonths;
    }

    public function getpresentdays($month,$empid)
    {
        $getpresentdays = DB::table('excel_import_attedances')
        ->select('*')
        ->where('attedance_date', 'LIKE', '%'.$month.'%')
        ->where('empid','=',$empid)
        ->whereIn('status',['P','P-Late','LATE'])
        ->groupBy('attedance_date')
        ->get();
        // dd($getpresentdays);
        return $getpresentdays;


    }

    public function getabsentdays($month,$empid)
    {
        $getabsentdays = DB::table('excel_import_attedances')
        ->select('*')
        ->where('attedance_date', 'LIKE', '%'.$month.'%')
        ->where('empid','=',$empid)
        ->whereIn('status',['L','A'])
        ->groupBy('attedance_date')
        ->get();

        return $getabsentdays;
    }

    public function getholidays($month)
    {
        $getholidays = DB::table('calandars')
        ->select('*')
        ->where('mon_year','=',$month)
        ->where('status','=',0)
        ->get();

        return $getholidays;
    }

    public function updatecustomdetails(Request $request)
    {

        $netpay = $request->netpay;
        $customdeduc = $request->customdeduc;
        $employeeid = $request->employeeid;
        $fdate = $request->fdate;
        $tdate = $request->tdate;

        $updatecustomdetails = DB::table('salary_calulation')
        ->where('emp_no','=',$employeeid)
        ->where('from_date','=',$fdate)
        ->where('to_date','=',$tdate)
        ->update(array(
            'Net_pay'=>$netpay,
            'OTH_MISC_DEDN'=>$customdeduc,
        ));

        return back();

    }

    public function excelimportattendance(Request $request)
    {

        Excel::import(new AttedanceImport, $request->file("importexcel"));
        // return redirect("section_title")->with("success", "Content Imported Successfully");
    }

    public function attendancecalc()
    {
        $getallattendance = DB::table('excel_import_attedances')
        ->select('*')
        ->where('time_calc','=',0)
        ->get();

        foreach($getallattendance as $empdata)
        {
            $empid = $empdata->empid;
            $attendancedate = $empdata->attedance_date;

            $calendar = DB::table('calandars')
            ->select('*')
            ->where('dates', '=', $attendancedate)
            ->first();

            $updatecalendarstatus = DB::table('excel_import_attedances')
            ->select('*')
            ->where('empid','=',$empid)
            ->where('attedance_date','=',$attendancedate)
            ->update([
                "calendar_status"=>$calendar->status,
                // "time_calc"=>"1"
            ]);

            // Total Work Hours Calculation

            $empattendancefirst = DB::table('excel_import_attedances')
            ->select('morning_in')
            ->where('empid','=',$empid)
            ->where('attedance_date','=',$attendancedate)
            ->first();

            $empattendancesecond = DB::table('excel_import_attedances')
            ->select('lunch_out')
            ->where('empid','=',$empid)
            ->where('attedance_date','=',$attendancedate)
            ->first();

            $empattendancethird = DB::table('excel_import_attedances')
            ->select('lunch_in')
            ->where('empid','=',$empid)
            ->where('attedance_date','=',$attendancedate)
            ->first();

            $empattendancefourth = DB::table('excel_import_attedances')
            ->select('eveningout')
            ->where('empid','=',$empid)
            ->where('attedance_date','=',$attendancedate)
            ->first();

            if($empattendancefirst)
            {
                $to_time = strtotime($empattendancefirst->morning_in);
                // $empattendancefirstlottime = $empattendancefirst->lotime;
            }
            else
            {
                $to_time = strtotime("00:00:00");
                // $empattendancefirstlottime = "-";
            }

            if($empattendancesecond)
            {
                $from_time = strtotime($empattendancesecond->lunch_out);
                // $empattendancesecondlottime = $empattendancesecond->lotime;
            }
            else
            {
                $from_time = strtotime("00:00:00");
                // $empattendancesecondlottime = "-";
            }

                    $diff = round(abs($to_time - $from_time) / 60,2);

                    $morninghours = intdiv($diff, 60).':'. ($diff % 60);

                    if($empattendancethird)
                    {
                        $to_time = strtotime($empattendancethird->lunch_in);
                        // $empattendancethirdlottime = $empattendancethird->lotime;
                    }
                    else
                    {
                        $to_time = strtotime("00:00:00");
                        // $empattendancethirdlottime = "-";
                    }

                    if($empattendancefourth)
                    {
                        $from_time = strtotime($empattendancefourth->eveningout);
                        // $empattendancefourthlottime = $empattendancefourth->lotime;
                    }
                    else
                    {
                        $from_time = strtotime("00:00:00");
                        // $empattendancefourthlottime = "-";
                    }

                            $diff = round(abs($to_time - $from_time) / 60,2);

                            $eveninghours = intdiv($diff, 60).':'. ($diff % 60);


                    // Work Hours Calculation & // Status Update

                    if($empattendancefourth)
                    {
                        $secs = strtotime($eveninghours)-strtotime("00:00:00");
                        $endTime = date("H:i",strtotime($morninghours)+$secs);
                    }
                    else
                    {
                        $endTime = "00:00";
                    }
                    if($endTime < '07:45:00')
                    {
                        $status = "P-LATE";
                    }
                    else
                    {
                        $status = "P";
                    }
                    
                    if($endTime == '00:00')
                    {
                        $status = "A";
                    }
                    
                    if($endTime > '03:30' && $endTime < '05:00')
                    {
                        $status = "P-Half";
                    }
                    
                    $updatetotalworkhrs = DB::table('excel_import_attedances')
                    ->select('*')
                    ->where('empid','=',$empid)
                    ->where('attedance_date','=',$attendancedate)
                    ->update([
                        "totalworkhrs"=>$endTime,
                        "status"=>$status,
                    ]);



                    // OT Hours Calculation

                    if($endTime > "08:00")
                    {
                        $to_time = strtotime($endTime);
                        $from_time = strtotime("08:00");
                        $ot = round(abs($to_time - $from_time) / 60,2);

                        if($ot)
                        {
                            $overtime = intdiv($ot, 60).':'. ($ot % 60);
                        }
                        else
                        {
                            $overtime = "00:00";
                        }
                    }
                    else
                    {
                        $overtime = "00:00";
                    }

                    $updateOT = DB::table('excel_import_attedances')
                    ->select('*')
                    ->where('empid','=',$empid)
                    ->where('attedance_date','=',$attendancedate)
                    ->update([
                        "ot"=>$overtime,
                    ]);

                    // Late Time Calculation

                if($empattendancefirst->morning_in > "09:00")
                        {
                            $to_time = strtotime($empattendancefirst->morning_in);
                            $from_time = strtotime("09:00");
                            $morning = round(abs($to_time - $from_time) / 60,2);

                            if($morning)
                            {
                                $morninglate = intdiv($morning, 60).':'. ($morning % 60);


                            }
                            else
                            {
                                $morninglate = "00:00:00";
                            }
                        }
                        else
                        {
                            $morninglate = "00:00:00";
                        }

                        if($empattendancesecond)
                        {

                            // $to_time = strtotime($empattendancesecondlottime);
                            // $from_time = strtotime("01:00:00");
                            // $selectedTime = $empattendancesecondlottime;


                            $endTime1 = strtotime("+60 minutes", strtotime($empattendancesecond->lunch_out));

                            $onehr =  date('H:i:s', $endTime1);

                            if($empattendancethird->lunch_in > $onehr)
                            {
                                $to_time = strtotime($empattendancethird->lunch_in);
                                $from_time = strtotime($onehr);
                                $afternoon = round(abs($to_time - $from_time) / 60,2);

                                if($afternoon)
                                {
                                    $afternoonlate = intdiv($afternoon, 60).':'. ($afternoon % 60);
                                }
                                else
                                {
                                    $afternoonlate = "00:00:00";
                                }
                            }
                            else
                            {
                                $afternoonlate = "00:00:00";
                            }
                        }

                        if($afternoonlate)
                        {
                            $secs = strtotime($afternoonlate)-strtotime("00:00:00");
                            $totaltime = date("H:i:s",strtotime($morninglate)+$secs);
                        }
                        else
                        {
                            $totaltime = "00:00:00";
                        }

                $latecalc = DB::table('excel_import_attedances')
                ->select('*')
                ->where('empid','=',$empid)
                ->where('attedance_date','=',$attendancedate)
                ->update([
                    'morning_late'=>$morninglate,
                    'lunch_in_late'=>$afternoonlate,
                    'total_late'=>$totaltime,
                    'time_calc'=>1
                ]);



        }

        // Absent Calculation

        $maxdate = DB::table('excel_import_attedances')
        ->select('*')
        ->orderBy('attedance_date', 'desc')
        ->where('late_calc_status','=',0)
        ->first();

        $mindate = DB::table('excel_import_attedances')
        ->select('*')
        ->orderBy('attedance_date', 'ASC')
        ->where('late_calc_status','=',0)
        ->first();


        $getcalc = DB::table('calandars')
        ->select('*')
        ->where('status','=',1)
        ->whereBetween('dates',[$mindate->attedance_date,$maxdate->attedance_date])
        ->get();

        foreach($getcalc as $c)
        {
            $getemp = DB::table('excel_import_attedances')
            ->select('*')
            ->get();


            foreach($getemp as $e)
            {
               $chkemp= DB::table('excel_import_attedances')
                ->select('*')
                ->where('attedance_date','=',$c->dates)
                ->where('empid','=',$e->empid)
                ->first();

                if($chkemp == '')
                {
                    DB::table('excel_import_attedances')
                    ->insert([
                        'morning_in'=>'00:00',
                        'lunch_out'=>'00:00',
                        'lunch_in'=>'00:00',
                        'eveningout'=>'00:00',
                        'ot'=>'0:0',
                        'total_late'=>'0:0',
                        'attedance_date'=>$c->dates,
                        'empid'=>$e->empid,
                        'status'=>'A'
                    ]);
                }

            }



        }

        DB::table('excel_import_attedances')
        ->update([
            "late_calc_status"=>1
        ]);

    }
}
