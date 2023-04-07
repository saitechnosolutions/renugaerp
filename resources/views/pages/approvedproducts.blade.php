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
                        <h4><b>Approved Products</b></h4>
                    </div>
                    <div class="col-lg-6 text-right">
                        {{-- <a href="/create-vendor" class="btn btn-success btn-outline fancy-button btn-0" style="font-size:16px;">Add Supplier</a> --}}
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add Product
                          </button>
                          <a class="btn btn-primary btn-sm" onclick="history.back()" style="font-size: 17px;">Back</a>
                    </div>
                </div>

            </div>
            <div class="widget-content widget-content-area br-6 mt-2">
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>S. No</th>
                            <th>Product</th>

                            @if(Auth::user()->name == 'Admin' || Auth::user()->name == 'admin@purchase')

                                <th>Delete</th>
                            @endif

                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @if($products)
                            @foreach ($products as $p)
                            <tr>
                                <td>@php echo $i++; @endphp</td>
                                <td>{{ $p->productname }}</td>
                                <td><button class="btn btn-danger deleteproduct" data-id="{{ $p->id }}">Delete</button></td>
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
        <form method="POST" action="/saveapproveproduct">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Purchase Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <div class="container">
                    <div class="row">



                        <div class="col-lg-12">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Enter Product Name<span style="color:red">*</span></label>
                                <input  type="text" name="productname"  class="user form-control"  autocomplete="off" required >
                                <span id="price-error-text" style="color:red"></span>
                            </div>
                        </div>

                        {{-- <div class="col-lg-12">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Open Stock</label>
                                <input  type="number" name="openstock"  class="user form-control" autocomplete="off" required >
                            </div>
                        </div> --}}


                    </div>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Product</button>
                </div>
            </div>
        </form>
    </div>
  </div>



@endsection
