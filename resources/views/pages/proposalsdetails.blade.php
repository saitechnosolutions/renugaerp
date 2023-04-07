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
                        <h4><b>Proposals</b></h4>
                    </div>
                    {{-- <div class="col-lg-6 text-right">
                        <button class="btn btn-success btn-outline fancy-button btn-0" style="font-size:16px;" data-toggle="modal" data-target="#myModal">Add Users</button>
                <button class="btn btn-info btn-outline fancy-button btn-0" style="font-size:16px;">Back</button>
                    </div> --}}
                </div>

            </div>
            <div class="widget-content widget-content-area br-6 mt-2">
                <table id="zero-config" class="table dt-table-hover userTable" style="width:100%">
                    <thead>
                        <tr>
                            {{-- <th>S.No</th> --}}
                            <th>ID</th>
                            <th>Proposal ID</th>
                            <th>Lead ID</th>
                            <th>Quote No</th>
                            <th>Quote Date</th>
                            <th>Subject</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                       @if($proposals)
                       @php $i=1; @endphp
                        @foreach ($proposals as $proposal)
                            <tr>
                                <td>@php echo $i++ @endphp</td>
                                <td>{{ $proposal->proposalid }}</td>
                                <td>{{ $proposal->leadid }}</td>
                                <td>{{ $proposal->quoteno }}</td>
                                <td>{{ $proposal->quotedate }}</td>
                                <td>{{ $proposal->subject }}</td>
                                <td>
                                    <a target="_blank" href="proposal/{{ $proposal->filename }}" class="btn btn-success">View</a>
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

@endsection
