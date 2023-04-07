@extends('layout.app');
@section('title','ERP - Dashboard');
@section('main-content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>Add Employee</h4>
                </div>
            </div>
        </div>
        {{-- <form method="POST" action="{{route('employees.store')}}" enctype= multipart/form-data> --}}
            <form name="saveemployee" id="saveemployee" action="javascript:;" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            @csrf
            <div id="accordion">
                <div class="card">
                  <div class="card-header p-0" id="headingOne">
                    <h5 class="mb-0">
                      <button type="button" class="btn btn-link w-100 text-left" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        General Details
                      </button>
                    </h5>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <section>

                            @csrf
                            <div class="form-row mb-4">
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Emp ID Prefix <span style="color:red">*</span></label>
                                    <select class="form-control" id="empprefix" name="empprefix" >
                                        <option value="">-- Choose --</option>
                                        <option value="T">T</option>
                                        <option value="P">P</option>
                                    </select>

                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputEmail4">Employee ID <span style="color:red">*</span></label>
                                    @if($empcount)

                                    @endif
                                    <input type="text" name="empid" class="form-control" id="empid" placeholder="ID" value=""  autocomplete="off">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Photo</label>
                                    <input type="file" class="form-control" name="empimg" id="inputPassword4" placeholder="Password">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Name<span style="color:red"><span id="user_name" class="error-info" style="margin-left: 10px; color:red;"></span>*</span></label>
                                    <input type="text" class="form-control " name="empname" id="name" placeholder="Name" autocomplete="off" >
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="form-group col-md-4">
                                    <label for="inputAddress">Date Of birth<span style="color:red">*</span><span id="DOB" class="error-info" style="margin-left: 10px; color:red;"></span></label>
                                    <input type="date" onblur="fnCalculateAge();" class="form-control" name="empdob" id="dob" placeholder="" >
                                </div>
                                <div class="form-group col-md-4 mb-4">
                                    <label for="inputAddress2">Education Qualification <span style="color:red">*</span><span id="qfy" class="error-info" style="margin-left: 10px; color:red;"></span></label>
                                    <input type="text" class="form-control" name="empeducation" id="Qualification" placeholder="Education" autocomplete="off" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Mobile Number <span style="color:red">*</span><span id="mobile" class="error-info" style="margin-left: 10px; color:red;"></span></label>
                                    <input type="text" class="form-control f_mobile" name="empmbl" id="mobile_no" placeholder="Mobile Number" autocomplete="off" >
                                </div>
                            </div>

                            <div class="form-row mb-4">
                                <div class="form-group col-md-4">
                                    <label for="inputCity">E-mail ID</label>
                                    <input type="email" class="form-control" name="empmail" id="email" placeholder="E-mail" autocomplete="off" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Gender <span style="color:red">*</span></label>
                                    <select id="inputState" class="form-control" name="empgen" id="gender">
                                        <option value="">Choose...</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputZip">Date Of Joining <span style="color:red">*</span></label>
                                    <input type="date" class="form-control" name="empdoj" id="doj" >
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Category <span style="color:red">*</span></label>
                                    <select id="designationtype" class="form-control" name="empcat" >
                                        <option value="">Choose...</option>
                                        @if ($designation)
                                            @foreach ($designation as $desig)
                                                <option value="{{$desig->designation}}">{{$desig->designation}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    {{-- <input type="hidden" name="" id="pfdata">
                                    <input type="hidden" name="" id="otdata"> --}}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Blood Group <span style="color:red">*</span></label>
                                    <select id="inputState" class="form-control" name="empblood" id="empblood">
                                        <option value="">Choose...</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                </div>
                                {{-- <div class="form-group col-md-4">
                                    <label for="inputZip">Minor / Major</label>
                                    <input type="text" class="form-control" name="empminor" id="minormajor" placeholder="Minor / Major">
                                </div> --}}

                                    <div class="form-group col-md-6">
                                        <label for="inputZip">Temporary Address<span style="color:red">*</span></label>
                                        <textarea class="form-control" name="emptempaddr" id="emptempaddr" placeholder="Temporary Address" ></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputZip">Permanant Address</label>
                                        <textarea class="form-control" name="empperaddr" placeholder="Permanant Address"></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputState">Allowance Type</label>
                                        <select id="allowancetype" class="form-control allowancetype"  name="empallowance">
                                            <option value="">Choose...</option>
                                            <option value="WithPF">With PF</option>
                                            <option value="WithoutPF">Without PF</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputZip">Designation<span style="color:red"><span id="designation_err" class="error-info" style="margin-left: 10px; color:red;"></span>*</span></label>
                                        <input type="text" class="form-control" name="designation2" id="designation2" placeholder="Designation" autocomplete="off" >
                                    </div>
                                    <div class="form-group col-md-6 actualbasic">
                                        <label for="inputZip">Actual Basic</label>
                                        <input type="text" class="form-control" name="actualbasic" placeholder="Actual Basic" value="0" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-6 dailysalary">
                                        <label for="inputZip">Daily Salary</label>
                                        <input type="text" class="form-control" name="dailysalary" placeholder="Daily Basic" value="0" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-6 grossallowance">
                                        <label for="inputZip">Gross Allowance</label>
                                        <input type="text" class="form-control" name="grossallowance" placeholder="Gross Allowance" value="0" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-6 pf">
                                        <label for="inputZip">PF</label>
                                        <input type="text" class="form-control" name="pfdata" id="pfdata" placeholder="PF" readonly>
                                    </div>
                                    <div class="form-group col-md-6 ot">
                                        <label for="inputZip">OT</label>
                                        <input type="text" class="form-control" name="otdata" id="otdata" placeholder="OT" readonly>
                                    </div>
                                    <div class="form-group col-md-6 salarytype">
                                        <label for="inputZip">Salary Type</label>
                                        <input type="text" class="form-control" name="salarytype" id="salarytype" placeholder="Salary Type" readonly autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputZip">ESI Type</label>
                                        <select class="form-control esitype" name="esitype">
                                            <option value="">-- Choose Option --</option>
                                            <option value="1">With ESI</option>
                                            <option value="2">W/O ESI</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 esino">
                                        <label for="inputZip">ESI No</label>
                                        <input type="text" class="form-control" name="esino" id="" placeholder="ESI No" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-6 pfno">
                                        <label for="inputZip">PF No</label>
                                        <input type="text" class="form-control" name="pfno" id="" placeholder="PF No" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-6 nomineedetails">
                                        <label for="inputZip">Nominee Name</label>
                                        <input type="text" class="form-control" name="nomineename" id="" placeholder="Ex : Name" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-6 nomineedetails">
                                        <label for="inputZip">Nominee Mobile Number</label>
                                        <input type="text" class="form-control" name="nomineembl" id="" placeholder="Ex : XXXXXXXXXX" autocomplete="off">
                                    </div>
                                    <div class="form-group col-md-6 nomineedetails">
                                        <label for="inputZip">Nominee Relation</label>
                                        <select class="form-control" name="nomineerelation">
                                            <option value="">-- Choose Nominee Relation --</option>
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Daughter">Daughter</option>
                                            <option value="Son">Son</option>
                                            <option value="Wife">Wife</option>
                                            <option value="Husband">Husband</option>
                                        </select>
                                        {{-- <input type="text" class="form-control" name="nomineerelation" id="" placeholder="Relation" autocomplete="off"> --}}
                                    </div>
                                    <div class="form-group col-md-6 nomineedetails">
                                        <label for="inputZip">Nominee Proof Upload</label>
                                        <input type="file" class="form-control" name="nomineefileupload" id="">
                                    </div>


                            </div>
                    </section>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header p-0" id="headingTwo">
                    <h5 class="mb-0">
                      <button type="button" class="btn btn-link collapsed w-100 text-left" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Bank Details
                      </button>
                    </h5>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        <section>

                            <div class="form-row mb-4">
                                <div class="form-group col-md-12 ">
                                    <label for="inputZip">Payment Type</label>
                                    <select class="form-control paymenttype" name="paymenttype">
                                        <option>-- Choose Payment Type --</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Bank">Bank</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 bankname">
                                    <label for="inputEmail4">Bank Name<span id="bank" class="error-info" style="margin-left: 10px; color:red;"></span></label>
                                    {{-- <input type="text" class="form-control" name="bankname" id="bankname" placeholder="Bank Name"> --}}
                                    <select class="form-control" name="bankname" >
                                        <option>-- Choose bank name --</option>
                                        <option value="Indian Overseas Bank">Indian Overseas Bank</option>
                                        <option value="Bank of India">Bank of India</option>
                                        <option value="Canara Bank">Canara Bank</option>
                                        <option value="Indian Bank">Indian Bank</option>
                                        <option value="Union Bank of India">Union Bank of India</option>
                                        <option value="State Bank of India">State Bank of India</option>
                                        <option value="Axis Bank">Axis Bank</option>
                                        <option value="HDFC Bank">HDFC Bank</option>
                                        <option value="ICICI Bank">ICICI Bank</option>
                                        <option value="IDBI Bank">IDBI Bank</option>
                                        <option value="Indusind Bank">Indusind Bank</option>
                                        <option value="Karnataka Bank">Karnataka Bank</option>
                                        <option value="CSB Bank Limited">CSB Bank Limited</option>
                                        <option value="City Union Bank">City Union Bank </option>
                                        <option value="Dhanlaxmi Bank">Dhanlaxmi Bank</option>
                                        <option value="Karur Vysya Bank">Karur Vysya Bank</option>
                                        <option value="Kotak Mahindra Bank">Kotak Mahindra Bank</option>
                                        <option value="Laxshmi Vilas Bank">Laxshmi Vilas Bank</option>
                                        <option value="Tamilnad Mercantile Bank">Tamilnad Mercantile Bank</option>
                                        <option value="YES Bank">YES Bank</option>
                                        <option value="Tamilnadu State Apex Co-op Bank">Tamilnadu State Apex Co-op Bank</option>
                                        <option value="Tamilnadu Grama Bank">Tamilnadu Grama Bank</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4 branch">
                                    <label for="inputPassword4">Name Of Branch<span id="branch" class="error-info" style="margin-left: 10px; color:red;"></span></label>
                                    <input type="text" class="form-control" name="branch" id="branchname" placeholder="Branch" autocomplete="off">
                                </div>
                                <div class="form-group col-md-4 accountholdername">
                                    <label for="inputPassword4">Account Holder Name<span id="holder" class="error-info" style="margin-left: 10px; color:red;"></span></label>
                                    <input type="text" class="form-control" name="holdername" id="accholdername" placeholder="Name" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-row mb-4">
                                <div class="form-group col-md-4 accountnumber">
                                    <label for="inputAddress">Account Number<span id="acc" class="error-info" style="margin-left: 10px; color:red;"></span></label>
                                    <input type="text" class="form-control" name="accountnum" id="accno" placeholder="Account Number" autocomplete="off">
                                </div>
                                <div class="form-group col-md-4 mb-4 ifsccode">
                                    <label for="inputAddress2">IFSC Code<span id="ifsc" class="error-info" style="margin-left: 10px; color:red;"></span></label>
                                    <input type="text" class="form-control" name="ifsccode" id="ifsc_code" placeholder="IFSC Code" autocomplete="off">
                                </div>
                                <div class="form-group col-md-4 mb-4">
                                    <label for="inputAddress2">Other Details 1 <span style="color:green;font-size:13px">(Optional)</span></label>
                                    <input type="text" class="form-control" name="otherdetails1" placeholder="Other Details 1" autocomplete="off">
                                </div>
                                <div class="form-group col-md-4 mb-4">
                                    <label for="inputAddress2">Other Details 2 <span style="color:green;font-size:13px">(Optional)</span></label>
                                    <input type="text" class="form-control" name="otherdetails2" placeholder="Other Details 2" autocomplete="off">
                                </div>
                                <div class="form-group col-md-4 mb-4">
                                    <label for="inputAddress2">Other Details 3 <span style="color:green;font-size:13px">(Optional)</span></label>
                                    <input type="text" class="form-control" name="otherdetails3" placeholder="Other Details 3" autocomplete="off">
                                </div>
                                <div class="form-group col-md-4 mb-4">
                                    <label for="inputAddress2">Other Details 4 <span style="color:green;font-size:13px">(Optional)</span></label>
                                    <input type="text" class="form-control" name="otherdetails4" placeholder="Other Details 4" autocomplete="off">
                                </div>

                            </div>

                        </section>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header p-0" id="headingThree">
                    <h5 class="mb-0">
                      <button type="button" class="btn btn-link collapsed w-100 text-left" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Family Details
                      </button>
                    </h5>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                        <section>
                            <table class="table table-bordered table-scroll mt-3" id="productTable">
                            <thead>
                            <tr>
                                <th scope="col">Name<span id="fname" class="error-info fname" style="margin-left: 10px; color:red;"></span></th>
                                <th scope="col">Relation<span id="frelation" class="error-info frelation" style="margin-left: 10px; color:red;"></span></th>
                                <th scope="col">Mobile Number<span id="fmobile" class="error-info fmobile" style="margin-left: 10px; color:red;"></span></th>
                                <th scope="col"><button type="button" class="btn btn-primary" id="addProduct1">+</button></th>
                            </tr>
                            </thead>
                            <tbody id="app1">
                                <tr>

                                    <td><input class="form-control f_name" type="text" name="f_name[]" id="f_name" placeholder="Name"></td>
                                    <td>
                                        {{-- <input class="form-control f_relation" type="text" name="f_relation[]" id="f_relation" placeholder="Relation"> --}}
                                        <select class="form-control f_relation" name="f_relation[]">
                                            <option>-- Choose Relation --</option>
                                            <option value="Father">Father</option>
                                            <option value="Mother">Mother</option>
                                            <option value="Daughter">Daughter</option>
                                            <option value="Son">Son</option>
                                            <option value="Wife">Wife</option>
                                            <option value="Husband">Husband</option>
                                        </select>
                                    </td>

                                    <td><input class="form-control f_mobile" type="text" name="f_mobile[]" id="f_mobile" placeholder="Mobile Number"></td>
                                    <td><button type="button" class="btn btn-danger">X</button></td>
                                </tr>
                                    </tbody>
                                </table>

                        </section>
                    </div>
                  </div>
                </div>

                <div class="card">
                    <div class="card-header p-0" id="headingFour">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link collapsed w-100 text-left" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                          Education Details
                        </button>
                      </h5>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                      <div class="card-body">
                        <section>
                            <table class="table table-bordered table-scroll mt-3" id="productTable1">
                            <thead>

                            <tr>
                                <th scope="col">Class / Degree</th>
                                <th scope="col">Board</th>
                                <th scope="col">Institute/University</th>
                                <th scope="col">Year Of Passed out</th>
                                {{-- <th scope="col">Certificate Attachment</th> --}}
                                <th scope="col"><button type="button" class="btn btn-primary" id="eductionadd">+</button></th>
                            </tr>
                            </thead>
                            <tbody id="appp2">
                                <tr>
                                    <td>
                                        {{-- <select class="form-control" name="level[]">
                                            <option value="">Choose Level</option>
                                            <option>Tenth</option>
                                            <option>Twelth</option>
                                            <option>UG</option>
                                            <option>PG</option>
                                            <option>Others</option>
                                        </select> --}}
                                        <input type="text" class="form-control" name="level[]" placeholder="Enter Class / Degree">
                                    </td>
                                    <td><input class="form-control" type="text" name="degree[]" placeholder="Board"></td>

                                    <td><input class="form-control" type="text" name="university[]" placeholder="Institute"></td>
                                    <td><input class="form-control" type="text" name="passedout[]" placeholder="Passed out"></td>
                                    {{-- <td><input class="form-control" type="file" name="document[]" placeholder="Pass out"></td> --}}
                                    <td><button type="button" class="btn btn-danger">X</button></td>

                                </tr>
                            </tbody>
                                    </table>
                        </section>
                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header p-0" id="headingFive">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link collapsed w-100 text-left" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                          Work Experience
                        </button>
                      </h5>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
                      <div class="card-body">
                        <section>
                            <table class="table table-bordered table-scroll mt-3" id="productTable1">
                            <thead>

                                <tr>
                                    <th scope="col">No of years</th>
                                    <th scope="col">From Period</th>
                                    <th scope="col">To Period</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Company</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col"><button type="button" class="btn btn-primary" id="addexperiencedetails">+</button></th>
                                </tr>
                            </thead>
                            <tbody id="app3">
                                <tr>
                                    <td>
                                        <input class="form-control" type="text" name="year[]" placeholder="No Of Years">
                                    </td>
                                    <td><input class="form-control" type="text" name="fromperiod[]" placeholder="Period"></td>
                                    <td><input class="form-control" type="text" name="toperiod[]" placeholder="Period"></td>
                                    <td><input class="form-control" type="text" name="role[]" placeholder="Role"></td>
                                    <td><input class="form-control" type="text" name="company[]" placeholder="Company"></td>
                                    <td><input class="form-control" type="text" name="empdesignation[]" placeholder="Designation"></td>
                                    <td><button type="button" class="btn btn-danger">X</button></td>

                                </tr>
                            </tbody>
                        </table>
                    </section>
                      </div>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header p-0" id="headingSix">
                      <h5 class="mb-0">
                        <button type="button" class="btn btn-link collapsed w-100 text-left" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseThree">
                          Documents
                        </button>
                      </h5>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
                      <div class="card-body">
                        <section>
                            <table class="table table-bordered table-scroll mt-3" id="productTable">
                        <thead>
                            <tr>
                                <th scope="col">Document</th>
                                <th scope="col">Number</th>
                                <th scope="col">Image</th>
                                {{-- <th scope="col">Existing Image</th> --}}


                            </tr>
                        </thead>
                        <tbody>


                            <tr>
                                <td><label>Aadhar Card<span style="color:red;font-size:18px;"> *</span><span id="aadhar" class="error-info" style="margin-left: 10px; color:red;"></span></label></td>
                                <td><input class="form-control" type="text" name="Adharnoo" id="aadhaarno" placeholder="Ex : XXXX XXXX XXXX" autocomplete="off"></td>
                                <td><input class="form-control img" type="file" name="image1" id="fileUpload1" ></td>
                                {{-- <td><img src="dist/img/document-icon.png" alt="" width="50" height="50" class="output"></td> --}}

                            </tr>
                            <tr>
                                <td><label>PAN Card <span id="pann" class="error-info" style="margin-left: 10px; color:red;"></span></label></td>
                                <td><input class="form-control" type="text" id="panno" name="pannoo" placeholder="Ex : ABCDE1234F" autocomplete="off"></td>
                                <td><input class="form-control img" type="file" name="image2" id="fileUpload2"></td>
                                {{-- <td><img src="dist/img/document-icon.png" alt="" width="50" height="50" class="output"></td> --}}

                            </tr>
                            <tr>
                                <td><label>Voter ID</label></td>
                                <td><input class="form-control" type="text" name="voternoo"></td>
                                <td><input class="form-control img" type="file" name="image3" id="fileUpload3"></td>
                                {{-- <td><img src="dist/img/document-icon.png" alt="IMG" width="50" height="50" class="output"></td> --}}
                            </tr>
                            <tr>
                                <td><label>Driving License</label></td>
                                <td><input class="form-control" type="text" name="licenseno"></td>
                                <td><input class="form-control img" type="file" name="image4" id="fileUpload3"></td>
                                {{-- <td><img src="dist/img/document-icon.png" alt="IMG" width="50" height="50" class="output"></td> --}}
                            </tr>
                            <tr>
                                <td><label>Other Documents</label></td>
                                <td><input class="form-control" type="text" name="otherdocument"></td>
                                <td><input class="form-control img" type="file" name="image5" id="fileUpload3"></td>
                                {{-- <td><img src="dist/img/document-icon.png" alt="IMG" width="50" height="50" class="output"></td> --}}
                            </tr>

                        </tbody>
                    </table>
                    <span class="validation-error" style="color:red"></span>
                    <button type="submit" class="btn btn-success btn-lg float-right" style="width:250px">Save</button>

                </section>
                      </div>
                    </div>
                  </div>

              </div>


        </form>



        </div>
    </div>
</div>

    </div>
</div>

</form>
@endsection
