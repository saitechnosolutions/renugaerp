@extends('layout.app');
@section('title','ERP - Dashboard');
@section('main-content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        {{-- <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                <div class="widget-heading justify-content-center">
                    <h5 class="text-center">No Of Leads</h5>

                </div>
                <div class="widget-content">
                    <div id="chart-2" class=""></div>
                    <h4 class="text-info text-center" style="margin-top:35px"><b>3500</b></h4>
                </div>

            </div>
        </div>

        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                <div class="widget-heading justify-content-center">
                    <h5 class="text-center">Converted Leads</h5>

                </div>
                <div class="widget-content">
                    <div id="chart-2" class=""></div>
                    <h4 class="text-info text-center" style="margin-top:35px"><b>3500</b></h4>
                </div>

            </div>
        </div>
        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                <div class="widget-heading justify-content-center">
                    <h5 class="text-center">Converted Leads Value</h5>

                </div>
                <div class="widget-content">
                    <div id="chart-2" class=""></div>
                    <h4 class="text-info text-center" style="margin-top:35px"><b>₹3500.00</b></h4>
                </div>

            </div>
        </div> --}}




        @if(Auth::user()->roll == 'sales')
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
        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                <div class="widget-heading justify-content-center">
                    <h5 class="text-center">Today Present Count</h5>

                </div>
                <div class="widget-content">
                    {{-- <div id="chart-2" class=""></div> --}}
                    <h4 class="text-info text-center" style="margin-top:35px"><b>{{$todaypresent->count()}}</b></h4>
                </div>

            </div>
        </div>
        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                <div class="widget-heading justify-content-center">
                    <h5 class="text-center">Total Absent Count</h5>

                </div>
                <div class="widget-content">
                    {{-- <div id="chart-2" class=""></div> --}}
                    <h4 class="text-info text-center" style="margin-top:35px"><b>{{$totalabsentcount}}</b></h4>
                </div>

            </div>
        </div>
        <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                <div class="widget-heading justify-content-center">
                    <h5 class="text-center">Purchase Value</h5>

                </div>
                <div class="widget-content">
                    {{-- <div id="chart-2" class=""></div> --}}
                    <h4 class="text-info text-center" style="margin-top:35px"><b>₹3500.00</b></h4>
                </div>

            </div>
        </div>
        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-chart-one" style="height:150px;border-top:3px solid blue;border-bottom:3px solid red">
                <div class="widget-heading justify-content-center">
                    <h5 class="text-center">Total Income</h5>

                </div>
                <div class="widget-content">
                    {{-- <div id="chart-2" class=""></div> --}}
                    <h4 class="text-info text-center" style="margin-top:35px"><b>₹3500.00</b></h4>
                </div>

            </div>
        </div>
            @else
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
            @if(Auth::user()->name == 'admin@sales')
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
            @endif

            @if(Auth::user()->name == 'admin@sales')
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="card">
                    <h5 class="card-header"><b>User Log</b></h5>
                    <table class="table table-bordered">
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

        @endif


    </div>

</div>
@endsection
