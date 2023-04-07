@extends('layout.app');
@section('title','ERP - Dashboard');
@section('main-content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            @if(session()->get('success'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{session()->get('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                    @endif
            <div class="widget-content widget-content-area br-6">
                <div class="row">
                    <div class="col-lg-6">
                        <h4><b>Purchase Request</b></h4>
                    </div>

                    <div class="col-lg-6 text-right">
                        {{-- <a href="/create-vendor" class="btn btn-success btn-outline fancy-button btn-0" style="font-size:16px;">Add Supplier</a> --}}
                        <a href="/createpurchaserequest" type="button" class="btn btn-primary" >
                            Create Request
                        </a>

                <a class="btn btn-info btn-outline fancy-button btn-0" onclick="history.back()" style="font-size: 17px;">Back</a>
                    </div>
                </div>

            </div>
            <div class="widget-content widget-content-area br-6 mt-2">
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            {{-- <th>S.No</th> --}}
                            <th>Request ID</th>
                            <th>Product Description</th>
                            <th>View</th>
                            @if(Auth::user()->name == 'Admin' || Auth::user()->name == 'admin@purchase')
                            <th>Edit</th>
                            <th>Delete</th>
                            @endif

                        </tr>
                    </thead>
                    <tbody>

                        @if($purchaserequest)
                            @foreach ($purchaserequest as $purchase)
                                <tr>
                                    {{-- <td>{{ $purchase->id }}</td> --}}
                                    <td>{{ $purchase->requestid }}</td>
                                    <td>
                                        {{-- {{ $purchase->description }} --}}
                                        @if($purchaseitems = App\Models\Purchaseitem::where('id',$purchase->description)->first())
                                            {{ $purchaseitems->descriptions }}
                                        @endif
                                    </td>
                                    <td><button class="btn btn-primary viewpurchasereq" data-reqid={{ $purchase->requestid }}>View</button></td>
                                    @if(Auth::user()->name == 'Admin' || Auth::user()->name == 'admin@purchase')
                                    <td><a href="editpurchaserequest/{{ $purchase->requestid }}" class="btn btn-info">Edit</a></td>
                                    <td><a onclick="return confirm('Do You want Delete this Data?')" href="deletepurchasereq/{{ $purchase->requestid }}" class="btn btn-danger" >Delete</a></td>
                                    @endif

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
        <form method="POST" action="/savesupplier">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Request ID</label>
                                <input  type="text" name="suppliercode" id="suppliercode"  class="user form-control" autocomplete="off" required >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Price</label>
                                <input  type="text" name="gstnumber" id="gstnumber"  class="user form-control" autocomplete="off" required >
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label style="margin-bottom:10px">Description</label>
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <button type="button" class="btn btn-success">Add</button>
                                    </div>

                                </div>
                            </div>

                        </div>



                    </div>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Supplier</button>
                </div>
            </div>
        </form>
    </div>
  </div>

  <div class="modal fade" id="viewrequest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="POST" action="/savesupplier">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <div class="container">
                    <table class="table table-bordered requestdetails">
                        <thead>
                            <tr>
                                <th>Request S.No</th>
                                <th>Request ID</th>
                                <th>Description</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                </div>
                {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Supplier</button>
                </div> --}}
            </div>
        </form>
    </div>
  </div>
@endsection
