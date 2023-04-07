@extends('layout.app');
@section('title','ERP - Dashboard');
@section('main-content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="row">
                    <div class="col-lg-6">
                        <h4><b>Employee Report</b></h4>
                    </div>

                </div>

            </div>
            <div class="widget-content widget-content-area br-6 mt-2">
                <table class="table table-bordered">
                    <tr>
                        <th>Employee Name</th>
                        <td>{{ $emp->name }}</td>
                        <th>Employee ID</th>
                        <td>{{ $emp->emp_id }}</td>
                        <th>Designation</th>
                        <td>{{ $emp->designation_2 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th colspan="3">Period</th>
                        <td>{{ $fromdate }} - {{ $todate }}</td>
                    </tr>
                </table>
                <h5>Attendance Details</h5>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Morning In</th>
                            <th>Lunch Out</th>
                            <th>Lunch In</th>
                            <th>Evening Out</th>
                            <th>Total Work Hrs</th>
                            <th>OT</th>
                            <th>Late Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($attendancedetails)
                            @foreach ($attendancedetails as $attendance)
                                <tr>
                                    <td>{{ $attendance->attedance_date }}</td>
                                    <td>{{ $attendance->morning_in }}</td>
                                    <td>{{ $attendance->lunch_out }}</td>
                                    <td>{{ $attendance->lunch_in }}</td>
                                    <td>{{ $attendance->eveningout }}</td>
                                    <td>{{ $attendance->totalworkhrs }}</td>
                                    <td>{{ $attendance->ot }}</td>
                                    <td>{{ $attendance->total_late }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <h5 class="mt-5 mb-4">Salary Details</h5>
                @if($salary == '')
                <div class="alert alert-danger" role="alert">
                    Salary Can't Generate in this Date
                  </div>
                  @else
                  <table class="table table-bordered">
                    <tr>
                        <th>TOTAL DAYS</th>
                        <td>{{ $salary->Total_days }}</td>
                        <th>PRESENT DAYS</th>
                        <td>{{ $salary->Present_days }}</td>
                    </tr>
                    <tr>
                        <th>SALARY/DAY</th>
                        <td>{{ $salary->daily_salary }}</td>
                        <th>SALARY/HOUR</th>
                        <td>{{ number_format($salary->daily_salary/8,0) }}</td>
                    </tr>

                    <tr>
                        <th>OT HOUR</th>
                        <td>{{ $salary->OT }}</td>
                        <th>OT AMOUNT</th>
                        <td>{{ $salary->OT_AMT }}</td>
                    </tr>
                    <tr>
                        <th>LATE TIMING</th>
                        <td>{{ $salary->TOTAL_LATE_TIME }}</td>
                        <th>LATE DEDUCTION</th>
                        <td>{{ $salary->LATE_DEDN_AMT }}</td>
                    </tr>
                    <tr>
                        <th colspan="2" class="text-center">NET PAY</th>
                        <td>{{ $salary->Net_pay }}</td>
                    </tr>
                </table>
                @endif

            </div>
        </div>

    </div>
</div>

@endsection
