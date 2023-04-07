@extends('layout.app');
@section('title','ERP - Dashboard');
@section('main-content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="row">
                    <div class="col-lg-8">
                        <h4><b>Bank Details</b></h4>
                    </div>
                    <div class="col-lg-4">
                        <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add Bank</button>
                    </div>
                </div>
                <table class="table table-bordered mt-5">
                    <thead>
                        <tr>
                            <th>Account Name</th>
                            <th>Account Code</th>
                            <th>Currancy</th>
                            <th>Account Number</th>
                            <th>Bank Name</th>
                            <th>IFSC Code</th>
                            <th>Swift Code</th>
                            <th>Branch</th>
                            <th>Micr Code</th>
                            <th>Comments</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($bank)
                            @foreach ($bank as $b)
                            <tr>
                                <td>{{ $b->accountname }}</td>
                                <td>{{ $b->accountcode }}</td>
                                <td>{{ $b->currency }}</td>
                                <td>{{ $b->accountnum }}</td>
                                <td>{{ $b->bankname }}</td>
                                <td>{{ $b->ifsc }}</td>
                                <td>{{ $b->swiftcode }}</td>
                                <td>{{ $b->branch }}</td>
                                <td>{{ $b->micrcode }}</td>
                                <td>{{ $b->description }}</td>
                                <td>
                                    <button class="btn btn-info bankedit" data-id="{{ $b->id }}" style="width:100px">Edit</button>
                                    <button class="btn btn-danger deletebank mt-2" data-id="{{ $b->id }}" style="width:100px">Delete</button>
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




  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Bank Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="/savebank" enctype="multipart/form-data">
                @csrf

            <div class="row">
                <div class="col-lg-6">

                    <label>Account Name</label>
                    <input type="text" name="accountname" class="form-control" >
                </div>
                <div class="col-lg-6">

                    <label>Account Code</label>
                    <input type="text" name="accountcode"  class="form-control" >

                </div>
                <div class="col-lg-6 mt-4">

                    <label>Currency</label>
                    <input type="text" name="currency" class="form-control" >
                </div>

                <div class="col-lg-6 mt-4">

                    <label>Account Number</label>
                    <input type="text" name="accountnum" class="form-control" >
                </div>
                <div class="col-lg-6 mt-4">

                    <label>Bank Name</label>
                    <input type="text" name="bankname" class="form-control" >
                </div>
                <div class="col-lg-6 mt-4">

                    <label>IFSC</label>
                    <input type="text" name="ifsc" class="form-control" >
                </div>
                <div class="col-lg-6 mt-4">
                    <label>Swift Code</label>
                    <input type="text" name="swiftcode" class="form-control" >
                </div>
                <div class="col-lg-6 mt-4">
                    <label>MICR Code</label>
                    <input type="text" name="micrcode" class="form-control" >
                </div>
                <div class="col-lg-6 mt-4">
                    <label>Branch</label>
                    <input type="text" name="branch" class="form-control" >
                </div>
                <div class="col-lg-6 mt-4">
                    <label>Description</label>
                    <input type="text" name="description" class="form-control" >
                </div>
            </div>
            <div class="mt-3">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save Data</button>
            </div>

        </form>
        </div>

      </div>
    </div>
  </div>


  <div class="modal fade" id="editBank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Bank Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="/updatebank" enctype="multipart/form-data">
                @csrf

            <div class="row">
                <div class="col-lg-6">

                    <label>Account Name</label>
                    <input type="text" name="accountname" class="form-control" id="accountname">
                </div>
                <div class="col-lg-6">

                    <label>Account Type</label>
                    <input type="text" name="accountcode"  class="form-control" id="accountcode">

                </div>
                <div class="col-lg-6 mt-4">

                    <label>Currency</label>
                    <input type="text" name="currency" class="form-control" id="currency">
                </div>

                <div class="col-lg-6 mt-4">

                    <label>Account Number</label>
                    <input type="text" name="accountnum" class="form-control" id="accountnum">
                </div>
                <div class="col-lg-6 mt-4">

                    <label>Bank Name</label>
                    <input type="text" name="bankname" class="form-control" id="bankname">
                </div>
                <div class="col-lg-6 mt-4">

                    <label>IFSC</label>
                    <input type="text" name="ifsc" class="form-control" id="ifsc">
                </div>
                <div class="col-lg-6 mt-4">
                    <label>Swift Code</label>
                    <input type="text" name="swiftcode" class="form-control" id="swiftcode">
                </div>
                <div class="col-lg-6 mt-4">
                    <label>MICR Code</label>
                    <input type="text" name="micrcode" class="form-control" id="micrcode">
                </div>
                <div class="col-lg-6 mt-4">
                    <label>Branch</label>
                    <input type="text" name="branch" class="form-control" id="branch">
                </div>
                <div class="col-lg-6 mt-4">
                    <label>Description</label>
                    <input type="text" name="description" class="form-control" id="description">
                    <input type="hidden" name="id" id="id">
                </div>
            </div>
            <div class="mt-3">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Update Data</button>
            </div>

        </form>
        </div>

      </div>
    </div>
  </div>


@endsection
