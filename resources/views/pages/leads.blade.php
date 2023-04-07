@extends('layout.app');
@section('title','ERP - Dashboard');
@section('main-content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="row">
                    <div class="col-lg-2">
                        <h4><b>Leads</b></h4>
                    </div>
                    <div class="col-lg-10 text-right">
                      <a  class="btn btn-primary btn-outline fancy-button btn-0 importindiamartleads" style="font-size:16px;"><i class="bi bi-calendar-check-fill"></i>&nbsp;&nbsp;Import Indiamart & tradeindia</a>
                      @if(Auth::user()->name=='admin@sales' || Auth::user()->name=='Admin')
                      <button data-toggle="modal" data-target="#importlead" class="btn btn-primary btn-outline fancy-button btn-0">Import Leads</button>
                      <a  data-toggle="modal" data-target="#MyModal4" class="btn btn-primary btn-outline fancy-button btn-0" style="font-size:16px;"><i class="bi bi-calendar-check-fill"></i>&nbsp;&nbsp;Date & User wise Filteration</a>
                      @endif

                        {{-- <a  class="btn btn-info btn-outline fancy-button btn-0" style="font-size:16px;"><i class="bi bi-cloud-upload-fill"></i>&nbsp;&nbsp;Import</a> --}}
                        {{-- <a  class="btn btn-warning btn-outline fancy-button btn-0" style="font-size:16px;"><i class="bi bi-cloud-download-fill"></i>&nbsp;&nbsp;Export</a> --}}
                    <button  data-toggle="modal" data-target="#exampleModal" class="btn btn-success btn-outline fancy-button btn-0" style="font-size:16px;"><i class="bi bi-person-plus-fill"></i>&nbsp;&nbsp;Add Lead</button>
                <button onclick="window.history.back()" class="btn btn-info btn-outline fancy-button btn-0" style="font-size:16px;">Back</button>

                    </div>


                    <div class="table-responsive">
                        @if(session()->get('success'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{session()->get('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                    @endif
                        <table class="table table-bordered">
                            <tr>

                                <th>Type</th>
                                <th>Total Count</th>
                                <th>Converted</th>
                                <th>Not Converted</th>
                                <th>Today</th>
                                <th>Yesterday</th>
                                <th>Last 30 Days</th>
                                <th>Last 60 Days</th>
                            </tr>
                            <tr>
                                <th>Overall Leads</th>
                                <th><button id="allleads" class="leadsfilter btn btn-primary m-auto d-block">{{$leads->count()}}</button></th>
                                <th><button id="convertedleads" class="leadsfilter btn btn-primary m-auto d-block">{{$convertedleads->count()}}</button></th>
                                <th><button id="notconvertedleads" class="leadsfilter btn btn-primary m-auto d-block">{{$notconvertedleads->count()}}</button></th>
                                <th><button id="todayoverallleads" class="leadsfilter btn btn-primary m-auto d-block">{{$todayoverallleads->count()}}</button></th>
                                <th><button id="yesterdayoverallleads" class="leadsfilter btn btn-primary m-auto d-block">{{$yesterdayoverallleads->count()}}</button></th>
                                <th><button id="last30overallleads" class="leadsfilter btn btn-primary m-auto d-block">{{$last30overallleads->count()}}</button></th>
                                <th><button id="last60overallleads" class="leadsfilter btn btn-primary m-auto d-block">{{$last60overallleads->count()}}</button></th>
                            </tr>
                            <tr>
                                <th>Indiamart Leads</th>
                                <th><button id="indiamartleads" class="leadsfilter btn btn-success m-auto d-block">{{$indiamartleads->count()}}</button></th>
                                <th><button id="indiamartconvertedleads" class="leadsfilter btn btn-success m-auto d-block">{{$indiamartconvertedleads->count()}}</button></th>
                                <th><button id="indiamartnotconvertedleads" class="leadsfilter btn btn-success m-auto d-block">{{$indiamartnotconvertedleads->count()}}</button></th>
                                <th><button id="indiamarttodayleads" class="leadsfilter btn btn-success m-auto d-block">{{$indiamarttodayleads->count()}}</button></th>
                                <th><button id="indiamartyesterdayleads" class="leadsfilter btn btn-success m-auto d-block">{{$indiamartyesterdayleads->count()}}</button></th>
                                <th><button id="last30indiamartleads" class="leadsfilter btn btn-success m-auto d-block">{{$last30indiamartleads->count()}}</button></th>
                                <th><button id="last60indiamartleads" class="leadsfilter btn btn-success m-auto d-block">{{$last60indiamartleads->count()}}</button></th>
                            </tr>

                            <tr>
                                <th>Tradeindia Leads</th>
                                <th><button id="tradeindialeads" class="leadsfilter btn btn-info m-auto d-block">{{$tradeindialeads->count()}}</button></th>
                                <th><button id="tradeindiaconvertedleads" class="leadsfilter btn btn-info m-auto d-block">{{$tradeindiaconvertedleads->count()}}</button></th>
                                <th><button id="tradeindianotconvertedleads" class="leadsfilter btn btn-info m-auto d-block">{{$tradeindianotconvertedleads->count()}}</button></th>
                                <th><button id="tradeindiatodayleads" class="leadsfilter btn btn-info m-auto d-block">{{$tradeindiatodayleads->count()}}</button></th>
                                <th><button id="tradeindiayesterdayleads" class="leadsfilter btn btn-info m-auto d-block">{{$tradeindiayesterdayleads->count()}}</button></th>
                                <th><button id="last30tradeindialeads" class="leadsfilter btn btn-info m-auto d-block">{{$last30tradeindialeads->count()}}</button></th>
                                <th><button id="last60tradeindialeads" class="leadsfilter btn btn-info m-auto d-block">{{$last60tradeindialeads->count()}}</button></th>
                            </tr>

                            <tr>
                                <th>Direct Leads</th>
                                <th><button id="directleads" class="leadsfilter btn btn-danger m-auto d-block">{{$directleads->count()}}</button></th>
                                <th><button id="directconvertedleads" class="leadsfilter btn btn-danger m-auto d-block">{{$directconvertedleads->count()}}</button></th>
                                <th><button id="directnotconvertedleads" class="leadsfilter btn btn-danger m-auto d-block">{{$directnotconvertedleads->count()}}</button></th>
                                <th><button id="directtodayleads" class="leadsfilter btn btn-danger m-auto d-block">{{$directtodayleads->count()}}</button></th>
                                <th><button id="directyesterdayleads" class="leadsfilter btn btn-danger m-auto d-block">{{$directyesterdayleads->count()}}</button></th>
                                <th><button id="last30directleads" class="leadsfilter btn btn-danger m-auto d-block">{{$last30directleads->count()}}</button></th>
                                <th><button id="last60directleads" class="leadsfilter btn btn-danger m-auto d-block">{{$last60directleads->count()}}</button></th>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
            <div class="widget-content widget-content-area br-6 mt-2">
                <div class="table table-responsive">
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Lead ID</th>
                            <th>Lead Entry Date</th>
                            <th>Lead Source</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Lead Status</th>
                            <th>Call Stage</th>
                            <th style="overflow-wrap: break-word; min-width: 330px; max-width: 330px; width: 330px;">Action</th>


                        </tr>
                    </thead>
                    <tbody>
                        @if($leads)
                            @foreach ($leads as $lead)
                            <tr>
                                <td>{{$lead->id}}</td>
                                <td>{{$lead->leadid}}</td>
                                <td>{{$lead->leadentrydate}}</td>
                                <td>{{$lead->leadsource}}</td>
                                <td>{{$lead->customername}}</td>
                                <td>{{$lead->mobilenumber}}</td>
                                <td>
                                    @if($lead->leadstatus == 'Converted')
                                        <span style="width:100px" class="badge badge-success">{{$lead->leadstatus}}</span>
                                    @endif
                                    @if($lead->leadstatus == 'Pending')
                                        <span style="width:100px" class="badge badge-secondary">{{$lead->leadstatus}}</span>
                                    @endif

                                </td>
                                <td>{{ $lead->callstage }}</td>
                                <td style="overflow-wrap: break-word; min-width: 330px; max-width: 330px; width: 330px;">
                                    <a href="leadedit/{{$lead->id}}" style="margin-right:0px" class="btn btn-info btn-sm" title="Edit Leads"><i class="bi bi-pencil-square"></i></a>
                                    <a href="deletelead/{{$lead->id}}" style="margin-right:0px" onclick="return confirm('Do You want Delete this Data?')" class="btn btn-danger btn-sm" title="Delete Leads"><i class="bi bi-trash-fill"></i></a>
                                    <a href="viewlead/{{$lead->id}}" style="margin-right:0px" class="btn btn-warning btn-sm" title="View Lead"><i class="bi bi-eye-fill"></i></a>
                                    <button style="margin-right:0px" class="btn btn-primary btn-sm addfollowup" data-leadid="{{$lead->leadid}}" data-toggle="modal" data-target="#exampleModal1" title="Add Notes"><i class="bi bi-card-text"></i></button>
                                    <button style="margin-right:0px" class="btn btn-primary btn-sm conertlead" title="Convert Lead" data-leadid="{{$lead->leadid}}" data-toggle="modal" data-target="#exampleModal2"><i class="bi bi-arrow-repeat"></i></button>
                                    @if(Auth::user()->name=='admin@sales' || Auth::user()->name=='Admin')
                                    <button style="margin-right:0px" class="btn btn-info btn-sm assignlead" title="Assign Lead" data-leadid="{{$lead->leadid}}" data-toggle="modal" data-target="#exampleModal3"><i class="bi bi-people"></i></button>
                                    @endif


                                    <span class="badge bg-success mt-2">Assigned for @if($assignname = App\Models\User::where('id',$lead->assign_userid)->first() )  {{$assignname->name}} @endif</span>
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
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Lead</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <form method="POST" action="/savelead">
                @csrf
              <div class="row">



                  <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Lead Entry Date</label>
                        <input type="text" class="form-control" name="leadentrydate" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo date('d-m-Y')?>" readonly>
                      </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Customer Name <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="customername" id="user_add" aria-describedby="emailHelp" placeholder="Enter Name" required>
                        <span id="name-error" style="color:red"></span>
                      </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mobile Number <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="mobilenumber" id="mobilenum" aria-describedby="emailHelp" placeholder="Enter Mobile Number" required>
                        <span id="mobile-error" style="color:red"></span>
                      </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">E-mail <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                        <span id="email-error" style="color:red"></span>
                      </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address <span style="color:red">*</span></label>
                        <textarea class="form-control" name="address" placeholder="Address" required></textarea>
                      </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Deal Name <span style="color:red">*</span></label>
                        <select class="form-control" name="dealname">
                          <option>-- Choose Products --</option>
                          @if($quotedproducts)
                            @foreach ($quotedproducts as $products)
                                <option value="{{ $products->id }}">{{ $products->productname }}</option>
                            @endforeach
                          @endif
                        </select>
                        {{-- <input type="text" class="form-control" name="dealname" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Deal Name"> --}}
                      </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Deal Value <span style="color:red">*</span></label>
                        <input type="number" class="form-control" name="dealvalue" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Deal Value" required>
                      </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Type <span style="color:red">*</span></label>
                        <select class="form-control" name="type" required>
                            <option value="">-- Choose Type --</option>
                            <option value="Customer">Customer</option>
                            <option value="Dealer">Dealer</option>
                        </select>
                      </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Call Stage <span style="color:red">*</span></label>
                        <select class="form-control" name="callstage" required>
                            <option value="">-- Choose Call Stage --</option>
                            <option value="Interested">Interested</option>
                            <option value="Not Interested">Not Interested</option>
                            <option value="Dicy">Dicy</option>
                            <option value="Invalid">Invalid</option>
                            <option value="No Requirement">No Requirement</option>
                            <option value="Untouched">Untouched</option>
                        </select>
                      </div>
                  </div>
                  @if(Auth::user()->name=='admin@sales' || Auth::user()->name=='Admin')
                  <div class="col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Assign to <span style="color:red">*</span></label>
                        <select class="form-control" name="assignto" required>
                            <option value="">-- Choose Sales Person --</option>
                            @if ($salespersons)
                            @foreach ($salespersons as $persons)
                                <option value="{{$persons->id}}">{{$persons->name}}</option>
                            @endforeach
                        @endif
                        </select>
                      </div>
                  </div>
                  @else
                    <input type="hidden" name="assignto" value="{{Auth::user()->id}}">
                  @endif

                  <input type="hidden" name="leadsource" value="Direct">

              </div>
              <button type="submit" class="btn btn-primary float-right">Save Lead</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Follow up</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="/saveFollowup">
        <div class="modal-body">

                @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea class="form-control" name="description" placeholder="Description" required></textarea>
                    </div>
                    <input type="hidden" name="leadid" id="leadid">
                    <button class="btn btn-success btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Create Notification
                      </button>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <div class="form-group mt-2 notificationhide">
                                <label for="exampleInputEmail1">Notification Date</label>
                                <input type="date" class="form-control" name="notificationdate">
                          </div>
                          <div class="form-group notificationhide">
                            <label for="exampleInputEmail1">Summary</label>
                            <textarea class="form-control" name="summary" placeholder="Enter Your Notification summary"></textarea>
                      </div>
                        </div>
                      </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Convert Lead</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="/leadstatus">
        <div class="modal-body">

                @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Lead ID</label>
                        <input type="text" name="leadid" class="form-control" id="leadsource" aria-describedby="emailHelp" placeholder="LeadID" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Lead Status</label>
                        <select class="form-control" name="leadstatus" required>
                            <option value="">-- Choose Lead Status --</option>
                            <option value="Pending">Pending</option>
                            <option value="Converted">Converted</option>
                        </select>
                    </div>
                    {{-- <input type="hidden" name="leadid" id="leadid"> --}}

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Assign Lead</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="/leadassign">
        <div class="modal-body">

                @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Lead ID</label>
                        <input type="text" name="leadid" class="form-control" id="leadsource1" aria-describedby="emailHelp" placeholder="LeadID" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Users Name</label>
                        <select class="form-control" name="username" required>
                            <option value="">-- Choose User --</option>
                            @if ($users)
                                @foreach ($users as $u)
                                    <option value="{{$u->id}}">{{$u->name}}</option>
                                @endforeach

                            @endif


                        </select>
                    </div>
                    {{-- <input type="hidden" name="leadid" id="leadid"> --}}

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Assign Lead</button>
        </div>
    </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" style="width:1226px;left:-210px" id="filtercontent">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" >
            <table id="zero-config" class="table dt-table-hover" style="width:100%">
                <thead>
                    <tr>
                        {{-- <th>S.No</th> --}}
                        <th>Lead ID</th>
                        <th>Lead Entry Date</th>
                        <th>Lead Source</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Lead Status</th>
                        <th>Action</th>


                    </tr>
                </thead>
                <tbody id="filteration">

                </tbody>
            </table>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" style="width:1226px;left:-210px" id="filtercontent">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Date & User Wise Filteration</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" >
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">From Date</label>
                            <input type="date" name="title"  class="form-control" id="fromdate" aria-describedby="emailHelp" placeholder="Enter Title" >
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">To Date</label>
                            <input type="date" name="title" class="form-control" id="todate" aria-describedby="emailHelp" placeholder="Enter Title">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <select class="form-control" name="username" id="userid">
                                <option value="">-- Choose Name --</option>

                                @if($users)
                                    @foreach ($users as $u)
                                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                                    @endforeach
                                @endif

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <input type="button" class="datefilter btn btn-success btn-block mt-4 btn-lg" value="Filter">
                    </div>
                </div>

            <table id="zero-config" class="table dt-table-hover" style="width:100%">
                <thead>
                    <tr>

                        <th>Lead ID</th>
                        <th>Lead Entry Date</th>
                        <th>Lead Source</th>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Lead Status</th>
                        <th>Action</th>


                    </tr>
                </thead>
                <tbody id="customdateoutput">

                </tbody>
            </table>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="importlead" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="/importleads" enctype="multipart/form-data">
            @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Leads Import</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="form-group">
              <label>Import File</label>
              <input type="file" class="form-control" name="importfile" required accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
            </div>
            <div class="alert alert-success" role="alert">
                Note : Follow the Leadid Format Ex : LEAD0001
            </div>
        </div>
        <div class="modal-footer">
            <a href="/leadimport.csv" download class="btn btn-success">Download Sample</a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Upload</button>
        </div>
      </form>
      </div>
    </div>
  </div>
@endsection
