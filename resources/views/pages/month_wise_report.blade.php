@extends('layout.app');
@section('title','ERP - Dashboard');
@section('main-content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="row">
                    <div class="col-lg-8">
                        <h4><b>Month Wise Report</b></h4>
                    </div>

                    <div class="col-lg-4 text-right">
                        {{-- <button class="btn btn-success btn-outline fancy-button btn-0" style="font-size:16px;" data-toggle="modal" data-target="#myModal">Add Users</button> --}}
                    <button onclick="window.history.back()" class="btn btn-info btn-outline fancy-button btn-0" style="font-size:16px;">Back</button>
                    </div>
                </div>

                <form method="POST" action="/monthwisereport">
                    @csrf

                <div class="row mt-4">
                    <div class="col-lg-8">
                        <input type="month" name="month"  class="form-control monthyear">
                    </div>

                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-success m-auto d-block ">View Report</button>
                    </div>
                </div>
            </form>
            </div>
            <div class="widget-content widget-content-area br-6 mt-2">
                {{-- <table id="zero-config" class="table dt-table-hover" style="width:100%"> --}}
                    <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Mon-year</th>
                            <th>Employee ID</th>
                            <th>Name</th>
                            <th>Total Days</th>

                            <th>Working Days</th>
                            <th>Present Days</th>

                            <th>Absent Days</th>
                            <th>Holidays</th>
                            <th>Remaining Days</th>


                        </tr>
                    </thead>
                    <tbody id="monthwisereport">
                        @if($query)
                            @foreach ($query as $qr)
                            <tr>
                                <td>{{$monthyear1}}</td>
                                <td>{{$qr->empprefix}}{{$qr->emp_id}}</td>
                                <td>{{$qr->name}}</td>
                                <td>
                                    @if($getmonth = App\Models\calandar::where("mon_year", $monthyear1))
                                    {{$getmonth->count()}}
                                 @endif
                                </td>

                                <td><span class="workingdays" style="cursor: pointer" data-month = {{$monthyear1}}>
                                    @if($getmonth = App\Models\calandar::where("mon_year", $monthyear1)->first())
                                    {{$getmonth->working_days}}
                                 @endif
                                </span>
                                </td>
                                <td>

                                    <span class="getpresentdays" style="cursor: pointer" data-empid = {{$qr->emp_id}} data-month = {{$monthyear1}}>

                                    @if($getcount = App\Models\excel_import_attedance::whereIn("status", ['P','LATE','P-LATE'])->where("attedance_date","Like", '%'.$monthyear1.'%')->where("empid", $qr->emp_id)->groupBy('attedance_date')->get())
                                        {{$getcount->count()}}

                                     @endif
                                    </span>
                                </td>

                                <td>
                                    {{-- {{$getmonth->working_days - $getcount->count()}} --}}
                                    <span class="getabsentdays" style="cursor: pointer" data-empid = {{$qr->emp_id}} data-month = {{$monthyear1}}>
                                    @if($getcount = App\Models\excel_import_attedance::whereIn("status", ['A','L'])->where("attedance_date","Like", '%'.$monthyear1.'%')->where("empid", $qr->emp_id)->groupBy('attedance_date')->get())

                                    {{$absentdays = $getcount->count()}}
                                    </span>
                                 @endif
                                </td>
                                <td>
                                    <span class="getholidays" style="cursor: pointer" data-month = {{$monthyear1}}>
                                    @if($getmonth = App\Models\calandar::where("mon_year", $monthyear1)->where('status',0))
                                    {{$getmonth->count()}}
                                 @endif
                                    </span>

                                </td>
                                <td>
                                    @if($getmonth = App\Models\calandar::where("mon_year", $monthyear1)->first())
                                    {{-- {{$workingdays = $getmonth->working_days}} --}}
                                    @endif
                                    @if($getcount1 = App\Models\excel_import_attedance::whereIn("status", ['P','LATE','P-LATE'])->where("attedance_date","Like", '%'.$monthyear1.'%')->where("empid", $qr->emp_id)->groupBy('attedance_date')->get())
                                    {{-- {{$getcount1->count()}} --}}
                                    @endif
                                    @if($getcount2 = App\Models\excel_import_attedance::where("status", "A")->where("attedance_date","Like", '%'.$monthyear1.'%')->where("empid", $qr->emp_id)->groupBy('attedance_date')->get())
                                    {{-- {{$getcount2->count()}} --}}
                                    {{-- {{ $getmonth }} --}}
                                    {{$getmonth->working_days - $getcount1->count() - $getcount2->count()}}
                                 @endif
                                </td>
                            </tr>
                            @endforeach
                        @endif


                    </tbody>

                </table>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Users</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label style="margin-bottom:10px">User Name</label>
                <input  type="text" name="userid" id="user"  class="form-control" onchange="kontakte(this)" autocomplete="off" required >

              </div>
              <div class="form-group">
                <label style="margin-bottom:10px">Password</label>

                    <input type="Password" name="epass" id="Password"  class="form-control" autocomplete="off" required >

              </div>
              <div class="form-group">
                <label style="margin-bottom:10px" id="employee_namelabel">Role</label>

                <!--<span><a class="label label-info" href="designation.php">Add Designation</a></span>-->


                     <select name="role" id='role' class='form-control' required>
                                       <option value="">-- Choose Role --</option>
                                     <option value="admin">Admin</option>
                                     <option value="Site Incharge">Site Incharge</option>
                                     <option value="Sales">Sales</option>
                                     <option value="HR">HR</option>
                      </select>



                </div>
                <div class="form-group check">

                    <input type="checkbox" class="check-inp" name="Billing" id="m1">
                    <label for="m1">Billing</label>

                    <input type="checkbox" class="check-inp" name="HR" id="m2">
                    <label for="m2">HR</label>

                    <input type="checkbox" class="check-inp" name="Leads" id="m3">
                    <label for="m3">Sales</label>
                </div>
                <div class="form-group emp">
                    <label style="margin-bottom:10px" id="employee_namelabel">Employee Name <span><a class="label label-info" href="/add_employee">Add Employee</a></span></label>

                        <select name='ename' id='employee_name' class='form-control select2' style="width:100%">
<option value="">--Choose Employee--</option>


</select>

                  </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Working Days</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered calendartable">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Day</th>
                        <th>Month-Year</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="calendartabletbody">

                </tbody>
            </table>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width:1200px">
      <div class="modal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Total Present Days</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered calendartable">
                <thead>
                    <tr>
                        <th>Attendance Date</th>
                        <th>Morning IN</th>
                        <th>Lunch Out</th>
                        <th>Lunch In</th>
                        <th>Evening Out</th>
                        <th>Total Work Hours</th>
                        <th>OT</th>
                        <th>Total Late</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="presentdaysbody">

                </tbody>
            </table>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
      <div class="modal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Total Absent Days</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered calendartable">
                <thead>
                    <tr>
                        <th>Attendance Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="absentdaysbody">

                </tbody>
            </table>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal7" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Holidays</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered holidays">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Day</th>
                        <th>Month-Year</th>
                        {{-- <th>Status</th> --}}
                    </tr>
                </thead>
                <tbody class="holidaytabletbody">

                </tbody>
            </table>
        </div>

      </div>
    </div>
  </div>
@endsection
