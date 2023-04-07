@extends('layout.app');
@section('title','ERP - Dashboard');
@section('main-content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="row">
                    <div class="col-lg-8">
                        <h4><b>Employee Full Report</b></h4>
                    </div>

                    <div class="col-lg-4 text-right">
                        {{-- <button class="btn btn-success btn-outline fancy-button btn-0" style="font-size:16px;" data-toggle="modal" data-target="#myModal">Add Users</button> --}}
                    <button onclick="window.history.back()" class="btn btn-info btn-outline fancy-button btn-0" style="font-size:16px;">Back</button>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header" >
                              Enter Details
                            </div>
                            <div class="card-body">
                              <form method="POST" action="/empfullreport">
                                @csrf
                                  <div class="row">
                                    <div class="col-lg-4">
                                        <label>From Date</label>
                                      <input type="date" class="form-control monthyear" name="fromdate">

                                    </div>
                                    <div class="col-lg-4">
                                        <label>To Date</label>
                                      <input type="date" class="form-control monthyear" name="todate">
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Employees</label>
                                        <select class="form-control basic" name="empid" >
                                            <option>-- Choose Employee --</option>
                                            @if($employee)
                                                @foreach ($employee as $emp)
                                                    <option value="{{ $emp->emp_id }}">{{ $emp->emp_id }} | {{ $emp->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="col-lg-12 mt-4">
                                        <button type="submit" class="btn btn-info btn-block">Generate</button>
                                    </div>
                                  </div>

                              </form>

                            </div>
                          </div>
                    </div>


                </div>

            </div>

        </div>

    </div>
</div>


@endsection
