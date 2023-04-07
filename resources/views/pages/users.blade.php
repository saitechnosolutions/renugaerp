@extends('layout.app');
@section('title','ERP - Dashboard');
@section('main-content')

<div class="layout-px-spacing">
    @if(session()->get('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{session()->get('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="row">
                    <div class="col-lg-6">
                        <h4><b>Users</b></h4>
                    </div>
                    <div class="col-lg-6 text-right">
                        <button class="btn btn-success btn-outline fancy-button btn-0" style="font-size:16px;" data-toggle="modal" data-target="#myModal">Add Users</button>
                <button onclick="window.history.back()" class="btn btn-info btn-outline fancy-button btn-0" style="font-size:16px;">Back</button>
                    </div>
                </div>

            </div>
            <div class="widget-content widget-content-area br-6 mt-2">
                <table id="zero-config1" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>

                            <th>ID</th>
                            <th>Name</th>
                            <th>Password</th>
                            <th>Roll</th>

                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody >
                        @if($users)
                            @foreach ($users as $u)
                                <tr>
                                    <td>{{ $u->id }}</td>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->password }}</td>
                                    <td>{{ $u->roll }}</td>
                                    <td>
                                        <button class="btn btn-primary useredit" data-id={{$u->id}} >Edit</button>
                                        <a  class="btn btn-danger deleteuser" data-id="{{ $u->id }}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        <tr></tr>
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
            <form method="POST" action="{{route('user.store')}}">
                @csrf
             <div class="form-group">
                <label style="margin-bottom:10px">User Name<!--<span id="user_err" class="error-info" style="margin-left: 10px; color:red;">*</span></span>--></label>
                <input  type="text" name="name" id="user_add"  class="user form-control" autocomplete="off" required >
                <span id="name-error" style="color:red"></span>
              </div>
              <div class="form-group">
                <label style="margin-bottom:10px">Password<span style="color:red">*</span></label>
                    <input type="text" name="epass" id="password"  class="Password form-control" autocomplete="off" required >
                    <span id="password-error" style="color:red"></span>
              </div>
              <div class="form-group">
                <label style="margin-bottom:10px" id="employee_namelabel">Role<span style="color:red">*</span></label>
                     <select name="role" id='role' class='role form-control' required>
                                    <option value="">-- Choose Role --</option>

                                     <option value="admin">Admin</option>
                                     <option value="Sales">Sales</option>
                                     <option value="HR">HR</option>
                                     <option value="Accounts">Purchase</option>
                      </select>
                </div>
                <label style="margin-bottom:10px">Select Menu Details</label>
                <div class="row">
                    <div class="col-lg-6">
                        {{-- <div class="form-group" style="margin-bottom:0px">
                            <input id="Products1" class="Products1" type="checkbox"  value="1" name="products" />
                            <label for="Products1">&nbsp;&nbsp;Products</label>
                        </div> --}}
                        {{-- <div class="form-group" style="margin-bottom:0px">
                            <input id="Customers" class="Customers" type="checkbox"  value="1" name="customers" />
                            <label for="Customers">&nbsp;&nbsp;Customers</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="Services" class="Services" type="checkbox"  value="1" name="services" />
                            <label for="Services">&nbsp;&nbsp;Services</label>
                        </div> --}}
                        {{-- <div class="form-group" style="margin-bottom:0px">
                            <input id="AddEmployees" class="AddEmployees" type="checkbox"  value="1" name="addemp" />
                            <label for="AddEmployees">&nbsp;&nbsp;Add Employees</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="idcard" class="idcard" type="checkbox"  value="1" name="idcard" />
                            <label for="idcard">&nbsp;&nbsp;ID Card</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="empreport" class="empreport" type="checkbox"  value="1" name="empreport" />
                            <label for="empreport">&nbsp;&nbsp;Employee Report</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="empcategory" class="empcategory" type="checkbox"  value="1" name="empcategory" />
                            <label for="empcategory">&nbsp;&nbsp;Employee Category</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="pfdata" class="pfdata" type="checkbox"  value="1" name="pfdata" />
                            <label for="pfdata">&nbsp;&nbsp;PF Data</label>
                        </div> --}}
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="adduser" class="adduser" type="checkbox"  value="1" name="adduser" />
                            <label for="adduser">&nbsp;&nbsp;Add User</label>
                        </div>
                        {{-- <div class="form-group" style="margin-bottom:0px">
                            <input id="calendar" class="calendar" type="checkbox"  value="1" name="calendar" />
                            <label for="calendar">&nbsp;&nbsp;Calendar</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="attendanceentry" class="attendanceentry" type="checkbox"  value="1" name="attendanceentry" />
                            <label for="attendanceentry">&nbsp;&nbsp;Attendance Entry</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="monthwisereport" class="monthwisereport" type="checkbox"  value="1" name="monthwisereport" />
                            <label for="monthwisereport">&nbsp;&nbsp;Monthwise Report</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="monthwisefullreport" class="monthwisefullreport" type="checkbox"  value="1" name="monthwisefullreport" />
                            <label for="monthwisefullreport">&nbsp;&nbsp;Monthwise Full Report</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="salarygeneration" class="salarygeneration" type="checkbox"  value="1" name="salarygeneration" />
                            <label for="salarygeneration">&nbsp;&nbsp;Salary Generation</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="salaryreport" class="salaryreport" type="checkbox"  value="1" name="salaryreport" />
                            <label for="salaryreport">&nbsp;&nbsp;Salary Report</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="payslip" class="payslip" type="checkbox"  value="1" name="payslip" />
                            <label for="payslip">&nbsp;&nbsp;Pay Slip</label>
                        </div> --}}
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="companydetails" class="companydetails" type="checkbox"  value="1" name="companydetails" />
                            <label for="companydetails">&nbsp;&nbsp;Company Details</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="leadgeneration" class="leadgeneration" type="checkbox"  value="1" name="leadgeneration" />
                            <label for="leadgeneration">&nbsp;&nbsp;Lead Generation</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="callupdate" class="callupdate" type="checkbox"  value="1" name="callupdate" />
                            <label for="callupdate">&nbsp;&nbsp;Call Update</label>
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="form-group" style="margin-bottom:0px">
                            <input id="bankdetails" class="bankdetails" type="checkbox"  value="1" name="bankdetails" />
                            <label for="bankdetails">&nbsp;&nbsp;Bank Details</label>
                        </div>
                        {{-- <div class="form-group" style="margin-bottom:0px">
                            <input id="estimate" class="estimate" type="checkbox"  value="1" name="estimate" />
                            <label for="estimate">&nbsp;&nbsp;Estimate</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="invoice" class="invoice" type="checkbox"  value="1" name="invoice" />
                            <label for="invoice">&nbsp;&nbsp;Invoice</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="customercredit" class="customercredit" type="checkbox"  value="1" name="customercredit" />
                            <label for="customercredit">&nbsp;&nbsp;Customer Credit</label>
                        </div> --}}
                        {{-- <div class="form-group" style="margin-bottom:0px">
                            <input id="vendor" class="vendor" type="checkbox"  value="1" name="vendor" />
                            <label for="vendor">&nbsp;&nbsp;Vendor</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="purchaseentry" class="purchaseentry" type="checkbox"  value="1" name="purchaseentry" />
                            <label for="purchaseentry">&nbsp;&nbsp;Purchase Entry</label>
                        </div> --}}
                        {{-- <div class="form-group" style="margin-bottom:0px">
                            <input id="expense" class="expense" type="checkbox"  value="1" name="expense" />
                            <label for="expense">&nbsp;&nbsp;Expense</label>
                        </div> --}}
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="purchaseorder" class="purchaseorder" type="checkbox"  value="1" name="purchaseorder" />
                            <label for="purchaseorder">&nbsp;&nbsp;Purchase Order</label>
                        </div>
                        {{-- <div class="form-group" style="margin-bottom:0px">
                            <input id="invoicereport" class="invoicereport" type="checkbox"  value="1" name="invoicereport" />
                            <label for="invoicereport">&nbsp;&nbsp;Invoice Report</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="incomereport" class="incomereport" type="checkbox"  value="1" name="incomereport" />
                            <label for="incomereport">&nbsp;&nbsp;Income Report</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="purchasereport" class="purchasereport" type="checkbox"  value="1" name="purchasereport" />
                            <label for="purchasereport">&nbsp;&nbsp;Purchase Report</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="estimatereport" class="estimatereport" type="checkbox"  value="1" name="estimatereport" />
                            <label for="estimatereport">&nbsp;&nbsp;Estimate Report</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="expensereport" class="expensereport" type="checkbox"  value="1" name="expensereport" />
                            <label for="expensereport">&nbsp;&nbsp;Expense Report</label>
                        </div> --}}

                        <div class="form-group" style="margin-bottom:0px">
                            <input id="proposal" class="proposal" type="checkbox"  value="1" name="proposal" />
                            <label for="proposal">&nbsp;&nbsp;Proposal</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="drive" class="drive" type="checkbox"  value="1" name="drive" />
                            <label for="drive">&nbsp;&nbsp;Drive</label>
                        </div>
                    </div>
                </div>


        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>


  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Users</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="/updateuser">
                @csrf
                <input type="hidden" name="id" class="userid">
             <div class="form-group">
                <label style="margin-bottom:10px">User Name</label>
                <input  type="text" name="name" id="user"  class="user form-control" autocomplete="off" required >
              </div>
              <div class="form-group">
                <label style="margin-bottom:10px">Password</label>
                    <input type="text" name="epass" id="Password"  class="Password form-control" autocomplete="off" required >
              </div>
              <div class="form-group">
                <label style="margin-bottom:10px" id="employee_namelabel">Role</label>
                     <select name="role" id='role' class='role form-control' required>
                                    <option value="">-- Choose Role --</option>

                                     <option value="admin">Admin</option>
                                     <option value="Sales">Sales</option>
                                     <option value="HR">HR</option>
                                     <option value="Accounts">Accounts</option>
                      </select>
                </div>
                <label style="margin-bottom:10px">Select Menu Details</label>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="Products1" class="Products1" type="checkbox"  value="1" name="products" />
                            <label for="Products1">&nbsp;&nbsp;Products</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="Customers" class="Customers" type="checkbox"  value="1" name="customers" />
                            <label for="Customers">&nbsp;&nbsp;Customers</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="Services" class="Services" type="checkbox"  value="1" name="services" />
                            <label for="Services">&nbsp;&nbsp;Services</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="AddEmployees" class="AddEmployees" type="checkbox"  value="1" name="addemp" />
                            <label for="AddEmployees">&nbsp;&nbsp;Add Employees</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="idcard" class="idcard" type="checkbox"  value="1" name="idcard" />
                            <label for="idcard">&nbsp;&nbsp;ID Card</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="empreport" class="empreport" type="checkbox"  value="1" name="empreport" />
                            <label for="empreport">&nbsp;&nbsp;Employee Report</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="empcategory" class="empcategory" type="checkbox"  value="1" name="empcategory" />
                            <label for="empcategory">&nbsp;&nbsp;Employee Category</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="pfdata" class="pfdata" type="checkbox"  value="1" name="pfdata" />
                            <label for="pfdata">&nbsp;&nbsp;PF Data</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="adduser" class="adduser" type="checkbox"  value="1" name="adduser" />
                            <label for="adduser">&nbsp;&nbsp;Add User</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="calendar" class="calendar" type="checkbox"  value="1" name="calendar" />
                            <label for="calendar">&nbsp;&nbsp;Calendar</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="attendanceentry" class="attendanceentry" type="checkbox"  value="1" name="attendanceentry" />
                            <label for="attendanceentry">&nbsp;&nbsp;Attendance Entry</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="monthwisereport" class="monthwisereport" type="checkbox"  value="1" name="monthwisereport" />
                            <label for="monthwisereport">&nbsp;&nbsp;Monthwise Report</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="monthwisefullreport" class="monthwisefullreport" type="checkbox"  value="1" name="monthwisefullreport" />
                            <label for="monthwisefullreport">&nbsp;&nbsp;Monthwise Full Report</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="salarygeneration" class="salarygeneration" type="checkbox"  value="1" name="salarygeneration" />
                            <label for="salarygeneration">&nbsp;&nbsp;Salary Generation</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="salaryreport" class="salaryreport" type="checkbox"  value="1" name="salaryreport" />
                            <label for="salaryreport">&nbsp;&nbsp;Salary Report</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="payslip" class="payslip" type="checkbox"  value="1" name="payslip" />
                            <label for="payslip">&nbsp;&nbsp;Pay Slip</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="companydetails" class="companydetails" type="checkbox"  value="1" name="companydetails" />
                            <label for="companydetails">&nbsp;&nbsp;Company Details</label>
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="form-group" style="margin-bottom:0px">
                            <input id="bankdetails" class="bankdetails" type="checkbox"  value="1" name="bankdetails" />
                            <label for="bankdetails">&nbsp;&nbsp;Bank Details</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="estimate" class="estimate" type="checkbox"  value="1" name="estimate" />
                            <label for="estimate">&nbsp;&nbsp;Estimate</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="invoice" class="invoice" type="checkbox"  value="1" name="invoice" />
                            <label for="invoice">&nbsp;&nbsp;Invoice</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="customercredit" class="customercredit" type="checkbox"  value="1" name="customercredit" />
                            <label for="customercredit">&nbsp;&nbsp;Customer Credit</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="vendor" class="vendor" type="checkbox"  value="1" name="vendor" />
                            <label for="vendor">&nbsp;&nbsp;Vendor</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="purchaseentry" class="purchaseentry" type="checkbox"  value="1" name="purchaseentry" />
                            <label for="purchaseentry">&nbsp;&nbsp;Purchase Entry</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="expense" class="expense" type="checkbox"  value="1" name="expense" />
                            <label for="expense">&nbsp;&nbsp;Expense</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="purchaseorder" class="purchaseorder" type="checkbox"  value="1" name="purchaseorder" />
                            <label for="purchaseorder">&nbsp;&nbsp;Purchase Order</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="invoicereport" class="invoicereport" type="checkbox"  value="1" name="invoicereport" />
                            <label for="invoicereport">&nbsp;&nbsp;Invoice Report</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="incomereport" class="incomereport" type="checkbox"  value="1" name="incomereport" />
                            <label for="incomereport">&nbsp;&nbsp;Income Report</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="purchasereport" class="purchasereport" type="checkbox"  value="1" name="purchasereport" />
                            <label for="purchasereport">&nbsp;&nbsp;Purchase Report</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="estimatereport" class="estimatereport" type="checkbox"  value="1" name="estimatereport" />
                            <label for="estimatereport">&nbsp;&nbsp;Estimate Report</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="expensereport" class="expensereport" type="checkbox"  value="1" name="expensereport" />
                            <label for="expensereport">&nbsp;&nbsp;Expense Report</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="leadgeneration" class="leadgeneration" type="checkbox"  value="1" name="leadgeneration" />
                            <label for="leadgeneration">&nbsp;&nbsp;Lead Generation</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="callupdate" class="callupdate" type="checkbox"  value="1" name="callupdate" />
                            <label for="callupdate">&nbsp;&nbsp;Call Update</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="proposal" class="proposal" type="checkbox"  value="1" name="proposal" />
                            <label for="proposal">&nbsp;&nbsp;Proposal</label>
                        </div>
                        <div class="form-group" style="margin-bottom:0px">
                            <input id="drive" class="drive" type="checkbox"  value="1" name="drive" />
                            <label for="drive">&nbsp;&nbsp;Drive</label>
                        </div>
                    </div>
                </div>


        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>


@endsection
