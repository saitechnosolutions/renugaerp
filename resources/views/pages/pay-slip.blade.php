@extends('layout.app');
@section('title','ERP - Pay Slip');
@section('main-content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="row">
                    <div class="col-lg-8">
                        <h4><b>Monthly Pay Slip</b></h4>
                    </div>

                    <div class="col-lg-4 text-right">
                        {{-- <button class="btn btn-success btn-outline fancy-button btn-0" style="font-size:16px;" data-toggle="modal" data-target="#myModal">Add Users</button> --}}
                    <button onclick="window.history.back()" class="btn btn-info btn-outline fancy-button btn-0" style="font-size:16px;">Back</button>
                    </div>
                </div>
                <form method="POST" action="/generatepayslip">
                    @csrf

                <div class="row mt-4">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header" >
                              Month-Year
                            </div>
                            <div class="card-body">

                                  <div class="row">
                                      <div class="col-lg-12">
                                        <input type="month" name="month" class="form-control" required>
                                      </div>
                                  </div>


                            </div>
                          </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header" >
                                  Employee Name
                            </div>
                            <div class="card-body">

                                  <div class="row">
                                      <div class="col-lg-12">
                                        {{-- @dd($employee) --}}
                                        <select class="form-control basic" name="empid" required>
                                            <option>-- Choose Employee --</option>

                                        @if($employee)
                                            @foreach ($employee as $emp)
                                                <option value="{{$emp->emp_id}}">{{$emp->empprefix}}{{$emp->emp_id}} | {{$emp->name}}</option>
                                            @endforeach
                                        @endif
                                        </select>
                                      </div>
                                  </div>


                            </div>
                          </div>
                    </div>

                    <button type="submit" class="btn btn-success" style="width:300px;margin:25px auto;display:block">Generate Pay Slip</button>

                </div>
            </form>
            </div>

        </div>

    </div>
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="row">
                    <div class="col-lg-8">
                        <h4><b>Weekly Receipt</b></h4>
                    </div>

                    <div class="col-lg-4 text-right">
                        {{-- <button class="btn btn-success btn-outline fancy-button btn-0" style="font-size:16px;" data-toggle="modal" data-target="#myModal">Add Users</button> --}}
                    <button onclick="window.history.back()" class="btn btn-info btn-outline fancy-button btn-0" style="font-size:16px;">Back</button>
                    </div>
                </div>
                <form method="POST" action="/customgeneratepayslip">
                    @csrf

                <div class="row mt-4">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header" >
                              Month-Year
                            </div>
                            <div class="card-body">

                                  <div class="row">
                                      <div class="col-lg-6">
                                        <select class="form-control basic" name="period" >
                                            <option> -- Choose Period -- </option>
                                            @if($salarydate)
                                                @foreach ($salarydate as $salarydate)
                                                    <option value="{{$salarydate->from_date}}/{{$salarydate->to_date}}">{{$salarydate->from_date}} / {{$salarydate->to_date}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                      </div>
                                  </div>


                            </div>
                          </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header" >
                                  Employee Name
                            </div>
                            <div class="card-body">

                                  <div class="row">
                                      <div class="col-lg-12">
                                        {{-- @dd($employee) --}}
                                        <select class="form-control basic" name="empid" required>
                                            <option>-- Choose Employee --</option>

                                        @if($employee2)
                                            @foreach ($employee2 as $emp)
                                                <option value="{{$emp->emp_id}}">{{$emp->empprefix}}{{$emp->emp_id}} | {{$emp->name}}</option>
                                            @endforeach
                                        @endif
                                        </select>
                                      </div>
                                  </div>


                            </div>
                          </div>
                    </div>

                    <button type="submit" class="btn btn-success" style="width:300px;margin:25px auto;display:block">Generate Pay Slip</button>

                </div>
            </form>
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

@endsection
