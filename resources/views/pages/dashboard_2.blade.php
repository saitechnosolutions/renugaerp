@extends('layout.app');
@section('title','ERP - Dashboard');
@section('main-content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">


        @if(Auth::user()->roll == 'admin')


            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                    <div class="widget-heading justify-content-center">
                        <h5 class="text-center">Total Leads</h5>

                    </div>
                    <div class="widget-content">
                        {{-- <div id="chart-2" class=""></div> --}}
                        <h4 class="text-info text-center" style="margin-top:35px"><b>{{ $totalleads }}</b></h4>
                    </div>

                </div>
            </div>

            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                    <div class="widget-heading justify-content-center">
                        <h5 class="text-center">Converted Leads</h5>

                    </div>
                    <div class="widget-content">
                        {{-- <div id="chart-2" class=""></div> --}}
                        <h4 class="text-info text-center" style="margin-top:35px"><b>{{ $convertedleads }}</b></h4>
                    </div>

                </div>
            </div>

            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                    <div class="widget-heading justify-content-center">
                        <h5 class="text-center">Converted Pending</h5>

                    </div>
                    <div class="widget-content">
                        {{-- <div id="chart-2" class=""></div> --}}
                        <h4 class="text-info text-center" style="margin-top:35px"><b>{{ $pendingleads }}</b></h4>
                    </div>

                </div>
            </div>

            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                    <div class="widget-heading justify-content-center">
                        <h5 class="text-center">Number Of Proposals</h5>
                    </div>
                    <div class="widget-content">
                        {{-- <div id="chart-2" class=""></div> --}}
                        <h4 class="text-info text-center" style="margin-top:35px"><b>{{ $proposals }}</b></h4>
                    </div>

                </div>
            </div>

            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                    <div class="widget-heading justify-content-center">
                        <h5 class="text-center">Number Of Sales Executive</h5>
                    </div>
                    <div class="widget-content">
                        {{-- <div id="chart-2" class=""></div> --}}
                        <h4 class="text-info text-center" style="margin-top:35px"><b>{{ $salesexecutive }}</b></h4>
                    </div>

                </div>
            </div>

            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                    <div class="widget-heading justify-content-center">
                        <h5 class="text-center">Suppliers Count</h5>
                    </div>
                    <div class="widget-content">
                        {{-- <div id="chart-2" class=""></div> --}}
                        <h4 class="text-info text-center" style="margin-top:35px"><b>{{ $supplierscount }}</b></h4>
                    </div>

                </div>
            </div>

            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                    <div class="widget-heading justify-content-center">
                        <h5 class="text-center">Purchase Request Count</h5>
                    </div>
                    <div class="widget-content">
                        {{-- <div id="chart-2" class=""></div> --}}
                        <h4 class="text-info text-center" style="margin-top:35px"><b>{{ $purchaserequests }}</b></h4>
                    </div>

                </div>
            </div>

            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                    <div class="widget-heading justify-content-center">
                        <h5 class="text-center">Purchase Order Count</h5>
                    </div>
                    <div class="widget-content">
                        {{-- <div id="chart-2" class=""></div> --}}
                        <h4 class="text-info text-center" style="margin-top:35px"><b>{{ $purchaseorders }}</b></h4>
                    </div>

                </div>
            </div>

            <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                    <div class="widget-heading justify-content-center">
                        <h5 class="text-center">Purchase Entry Count</h5>
                    </div>
                    <div class="widget-content">
                        {{-- <div id="chart-2" class=""></div> --}}
                        <h4 class="text-info text-center" style="margin-top:35px"><b>{{ $purchaseentry }}</b></h4>
                    </div>

                </div>
            </div>
        @endif

        @if(Auth::user()->roll == 'Sales')
        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                <div class="widget-heading justify-content-center">
                    <h5 class="text-center">Total Leads</h5>

                </div>
                <div class="widget-content">
                    {{-- <div id="chart-2" class=""></div> --}}
                    <h4 class="text-info text-center" style="margin-top:35px"><b>{{ $totalleads }}</b></h4>
                </div>

            </div>
        </div>

        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                <div class="widget-heading justify-content-center">
                    <h5 class="text-center">Converted Leads</h5>

                </div>
                <div class="widget-content">
                    {{-- <div id="chart-2" class=""></div> --}}
                    <h4 class="text-info text-center" style="margin-top:35px"><b>{{ $convertedleads }}</b></h4>
                </div>

            </div>
        </div>

        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                <div class="widget-heading justify-content-center">
                    <h5 class="text-center">Converted Pending</h5>

                </div>
                <div class="widget-content">
                    {{-- <div id="chart-2" class=""></div> --}}
                    <h4 class="text-info text-center" style="margin-top:35px"><b>{{ $pendingleads }}</b></h4>
                </div>

            </div>
        </div>

        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                <div class="widget-heading justify-content-center">
                    <h5 class="text-center">Number Of Proposals</h5>
                </div>
                <div class="widget-content">
                    {{-- <div id="chart-2" class=""></div> --}}
                    <h4 class="text-info text-center" style="margin-top:35px"><b>{{ $proposals }}</b></h4>
                </div>

            </div>
        </div>


        @endif

        @if(Auth::user()->roll == 'Accounts')
        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                <div class="widget-heading justify-content-center">
                    <h5 class="text-center">Suppliers Count</h5>
                </div>
                <div class="widget-content">
                    {{-- <div id="chart-2" class=""></div> --}}
                    <h4 class="text-info text-center" style="margin-top:35px"><b>{{ $supplierscount }}</b></h4>
                </div>

            </div>
        </div>

        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                <div class="widget-heading justify-content-center">
                    <h5 class="text-center">Purchase Request Count</h5>
                </div>
                <div class="widget-content">
                    {{-- <div id="chart-2" class=""></div> --}}
                    <h4 class="text-info text-center" style="margin-top:35px"><b>{{ $purchaserequests }}</b></h4>
                </div>

            </div>
        </div>

        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                <div class="widget-heading justify-content-center">
                    <h5 class="text-center">Purchase Order Count</h5>
                </div>
                <div class="widget-content">
                    {{-- <div id="chart-2" class=""></div> --}}
                    <h4 class="text-info text-center" style="margin-top:35px"><b>{{ $purchaseorders }}</b></h4>
                </div>

            </div>
        </div>

        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                <div class="widget-heading justify-content-center">
                    <h5 class="text-center">Purchase Entry Count</h5>
                </div>
                <div class="widget-content">
                    {{-- <div id="chart-2" class=""></div> --}}
                    <h4 class="text-info text-center" style="margin-top:35px"><b>{{ $purchaseentry }}</b></h4>
                </div>

            </div>
        </div>
        @endif

        @if(Auth::user()->roll == 'HR')
        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                <div class="widget-heading justify-content-center">
                    <h5 class="text-center">No Of Employees</h5>

                </div>
                <div class="widget-content">
                    {{-- <div id="chart-2" class=""></div> --}}
                    <h4 class="text-info text-center" style="margin-top:35px"><b>{{$noofemployee->count()}}</b></h4>
                </div>

            </div>
        </div>

        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                <div class="widget-heading justify-content-center">
                    <h5 class="text-center">Calendar Months</h5>

                </div>
                <div class="widget-content">
                    {{-- <div id="chart-2" class=""></div> --}}
                    <h4 class="text-info text-center" style="margin-top:35px"><b>{{$noofmonths->count()}}</b></h4>
                </div>

            </div>
        </div>
        @endif
        <div class="col-lg-12 mb-5">
            <div class="card">
                <h5 class="card-header"><b>Today Task Details</b></h5>
                <table class="table table-bordered">
                    <thead>
                        <th>Lead ID</th>
                        <th>Task Details</th>
                        <th>View Lead</th>
                    </thead>
                    <tbody>
                        @if($todayactivities)
                            @foreach ($todayactivities as $activities)
                            <tr>
                                <td>{{ $activities->leadid }}</td>
                                <td>{{ $activities->description }}</td>
                                <td><a href="viewlead/{!! str_replace('LEAD', '', $activities->leadid) !!}" class="btn btn-info">View Lead</a></td>
                            </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>

        </div>

            @if(Auth::user()->name == 'admin@sales' || Auth::user()->name == 'Admin')
            <div class="col-xl-12 col-lg-21 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="card">
                    <h5 class="card-header"><b>User Log</b></h5>
                    <table class="table table-bordered" id="zero-config">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Username</th>
                                <th>Login Time</th>
                                <th>Logout Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($userlog)
                                @foreach ($userlog as $user)
                                    <tr>
                                        <td>{{ $user->log_date }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->login_time }}</td>
                                        <td>{{ $user->logout_time }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>
            @endif




    </div>

</div>
@endsection
