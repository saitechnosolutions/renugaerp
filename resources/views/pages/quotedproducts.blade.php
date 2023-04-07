@extends('layout.app');
@section('title', 'ERP - Dashboard');
@section('main-content')

    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">
            @if(session()->get('success'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{session()->get('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                    @endif
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4><b>Quote Product Details</b></h4>
                        </div>
                        <div class="col-lg-6 text-right">
                            <button class="btn btn-success btn-outline fancy-button btn-0" style="font-size:16px;"
                                data-toggle="modal" data-target="#myModal2">Add Product</button>
                            <button class="btn btn-info btn-outline fancy-button btn-0"
                                style="font-size:16px;">Back</button>
                        </div>
                    </div>

                </div>
                <div class="widget-content widget-content-area br-6 mt-3">
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Description</th>

                                {{-- <th>Edit</th> --}}
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if ($products)
                                @foreach ($products as $pro)
                                    <tr>
                                        <td>{{ $pro->catname }}</td>
                                        <td>
                                            @if($pro->ltrs != '')
                                                {{ $pro->ltrs }}
                                            @endif
                                            @if($pro->size != '')
                                                 {{ $pro->size }}
                                            @endif
                                            <!--@if($pro->rate != '')-->
                                            <!--     {{ $pro->rate }}-->
                                            <!--@endif-->
                                            @if($pro->hp != '')
                                                 {{ $pro->hp }}
                                            @endif
                                            <!--@if($pro->guard_rate != '')-->
                                            <!--     {{ $pro->guard_rate }}-->
                                            <!--@endif-->
                                            @if($pro->thickness != '')
                                                 {{ $pro->thickness }}
                                            @endif
                                            @if($pro->pump != '')
                                             {{ $pro->pump }}
                                             @endif
                                             @if($pro->model_type != '')
                                             {{ $pro->model_type }}
                                             @endif
                                             <!--@if($pro->withele != '')-->
                                             <!-- {{ $pro->withele }}-->
                                             <!-- @endif-->
                                             <!-- @if($pro->withoutele != '')-->
                                             <!--  {{ $pro->withoutele }}-->
                                             <!--  @endif-->
                                               @if($pro->air_cooled != '')
                                                {{ $pro->air_cooled }}
                                                @endif
                                        </td>
                                        {{-- <td><button class="btn btn-info btn-sm">Edit</button></td> --}}
                                        <td><a onclick="return confirm('Do You want Delete this Data?')" href="/deleteproduct/{{ $pro->id }}" class="btn btn-danger btn-sm">Delete</a></td>

                                    </tr>
                                @endforeach
                            @endif


                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <form name="addquotedproduct" id="addquotedproduct1" action="javascript:;" enctype="multipart/form-data"
                    method="post" accept-charset="utf-8">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        @csrf
                        <div class="form-row mb-4">

                            <div class="col-lg-12">
                                <label style="margin-bottom:10px;margin-top:15px;">Category Name<span
                                        style="color:red">*</span></label>
                                <select name="" class="form-control" id="catnamee">
                                    <option value="" disable>Select Category</option>
                                    <option value="1">Tank</option>
                                    <option value="2">Top Block </option>
                                    <option value="3">Tank Compressor</option>
                                    <option value="4">Borewell Compressor</option>
                                    <option value="5">Mono Compressor</option>
                                    <option value="6">Dryer Working Pressure Upto 16 BAR g</option>
                                    <option value="7">Base Mounted Compressor</option>
                                    <option value="8">Car Washer</option>
                                    <option value="9">Grease Pump</option>
                                </select>
                            </div>

                            <div class="tank" style="display: none">
                                <div class="col-lg-12">
                                    <label style="margin-bottom:10px;margin-top:15px;">Sub Category<span
                                            style="color:red">*</span></label>
                                    <select name="" class="form-control" id="subcatt">
                                        <option value="" disable> Select Sub Category</option>
                                        <option value="1">TANK GUARD RAILS WITH POWDER COATING
                                        </option>
                                        <option value="2">TANK GUARD WITH POWDER COATING
                                        </option>
                                    </select>
                                </div>
                                <div class="col-lg-12 tank1" style="display: none">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label style="margin-bottom:10px;margin-top:15px;">Litres<span
                                                    style="color:red">*</span></label>
                                            <select name="" class="form-control" id="tanklitre">
                                                <option value="" disable>Select Litre</option>
                                                <option value="35">35 LTRS</option>
                                                <option value="45">45 LTRS</option>
                                                <option value="70">70 LTRS</option>
                                                <option value="110">110 LTRS</option>
                                                <option value="135">135 LTRS</option>
                                                <option value="160">160 LTRS</option>
                                                <option value="200">200 LTRS</option>
                                                <option value="220">220 LTRS</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label style="margin-bottom:10px;margin-top:15px;">Size<span
                                                    style="color:red">*</span></label>
                                            <input type="text" name="" class="form-control tank1size" readonly>
                                        </div>
                                        <div class="col-lg-4">
                                            <label style="margin-bottom:10px;margin-top:15px;">Rate<span
                                                    style="color:red">*</span></label>
                                            <input type="text" name="" class="form-control tank1rate" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 tank2" style="display: none">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label style="margin-bottom:10px;margin-top:15px;">Litres<span
                                                    style="color:red">*</span></label>
                                            <select name="" class="form-control" id="tank2litre">
                                                <option value="" disable>Select Litre</option>
                                                <option value="160">160 LTRS</option>
                                                <option value="220">220 LTRS</option>
                                                <option value="250">250 LTRS</option>
                                                <option value="300">300 LTRS</option>
                                                <option value="420">420 LTRS</option>
                                                <option value="500">500 LTRS</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 tankhp">
                                            <label style="margin-bottom:10px;margin-top:15px;">HP<span
                                                    style="color:red">*</span></label>
                                            <select class="form-control" name="tank2hp" id="tank2hp">
                                                <option value="" disable>Select HP</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 tanksize">
                                            <label style="margin-bottom:10px;margin-top:15px;">Size<span
                                                    style="color:red">*</span></label>
                                            <select class="form-control" name="" id="tank2size">
                                                <option value="" disable>Select Size</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6 tankrate">
                                            <label style="margin-bottom:10px;margin-top:15px;">Rate<span
                                                    style="color:red">*</span></label>
                                            <input class="form-control" type="text" name="" id="tank2rate"
                                                readonly>
                                        </div>
                                        <div class="col-lg-6 tankguard">
                                            <label style="margin-bottom:10px;margin-top:15px;">Guard<span
                                                    style="color:red">*</span></label>
                                            <input class="form-control" type="text" name="" id="tank2guard"
                                                readonly>
                                        </div>
                                        <div class="col-lg-6 tanktotal">
                                            <label style="margin-bottom:10px;margin-top:15px;">Total<span
                                                    style="color:red">*</span></label>
                                            <input class="form-control" type="text" name="" id="tank2tot"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="topblock" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label style="margin-bottom:10px;margin-top:15px;">Litres<span
                                                style="color:red">*</span></label>
                                        <select name="" class="form-control" id="blocklitrs">
                                            <option value="" disable>Select Litres</option>
                                            <option value="110">110 LTRS </option>
                                            <option value="135">135 LTRS</option>
                                            <option value="160">160 LTRS</option>
                                            <option value="220">220 LTRS </option>
                                            <option value="250">250 LTRS</option>
                                            <option value="300">300 LTRS </option>
                                            <option value="420">420 LTRS</option>
                                            <option value="500">500 LTRS</option>
                                            <option value="1000">1000 LTRS</option>
                                            <option value="1500">1500 LTRS</option>
                                            <option value="2000">2000 LTRS</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label style="margin-bottom:10px;margin-top:15px;">Thickness<span
                                                style="color:red">*</span></label>
                                        <select name="" class="form-control" id="blockthick">
                                            <option value="" disable>Select Thickness</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label style="margin-bottom:10px;margin-top:15px;">Price<span
                                                style="color:red">*</span></label>
                                        <input type="text" class="form-control" id="blockprice" name=""
                                            readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="compressor" style="display: none;">
                                <div class="col-lg-12">
                                    <label style="margin-bottom:10px;margin-top:15px;">Sub Category<span
                                            style="color:red">*</span></label>
                                    <select name="" class="form-control" id="compthick">
                                        <option value="" disable>Select Thickness</option>
                                        <option value="1">SINGLE PHASE MOTOR , WITHOUT STARTER</option>
                                        <option value="2">THREE PHASE CROMPTON GREAVES,(OR)ELGI , MOTOR , WITH STARTER
                                        </option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label style="margin-bottom:10px;margin-top:15px;">HP<span
                                            style="color:red">*</span></label>
                                    <select name="" class="form-control" id="">
                                        <option value="" disable>Select HP</option>
                                        <option value="1">0.5 HP</option>
                                        <option value="2">1.0 HP</option>
                                        <option value="3">1.5 HP</option>
                                        <option value="4">2.0 HP</option>
                                        <option value="5">3.0 HP</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label style="margin-bottom:10px;margin-top:15px;">Litres<span
                                        style="color:red">*</span></label>
                                        <select name="" class="form-control" id="complit">
                                            <option value="" disable>Select Litre</option>

                                        </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <form name="addquotedproduct" id="addquotedproduct" action="javascript:;" enctype="multipart/form-data">
            @csrf
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Product Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <label style="margin-bottom:10px;margin-top:15px;">Product Name</label>
                        <input type="text" class="form-control" name="productname">
                        </div>
                        <div class="col-lg-6">
                            <label style="margin-bottom:10px;margin-top:15px;">Ltrs</label>
                        <input type="text" class="form-control" name="ltrs">
                        </div>
                        <div class="col-lg-6">
                            <label style="margin-bottom:10px;margin-top:15px;">Size</label>
                        <input type="text" class="form-control" name="size">
                        </div>
                        <div class="col-lg-6">
                            <label style="margin-bottom:10px;margin-top:15px;">Rate</label>
                        <input type="number" class="form-control" name="rate">
                        </div>
                        <div class="col-lg-6">
                            <label style="margin-bottom:10px;margin-top:15px;">HP</label>
                        <input type="text" class="form-control" name="hp">
                        </div>
                        <div class="col-lg-6">
                            <label style="margin-bottom:10px;margin-top:15px;">Guard Rate</label>
                        <input type="number" class="form-control" name="guardrate">
                        </div>
                        <div class="col-lg-6">
                            <label style="margin-bottom:10px;margin-top:15px;">Thickness</label>
                        <input type="text" class="form-control" name="thickness">
                        </div>
                        <div class="col-lg-6">
                            <label style="margin-bottom:10px;margin-top:15px;">Pump</label>
                        <input type="text" class="form-control" name="pump">
                        </div>
                        <div class="col-lg-6">
                            <label style="margin-bottom:10px;margin-top:15px;">Modal / Type</label>
                        <input type="text" class="form-control" name="modaltype">
                        </div>
                        <div class="col-lg-6">
                            <label style="margin-bottom:10px;margin-top:15px;">With Electric</label>
                        <input type="number" class="form-control" name="withelectric">
                        </div>
                        <div class="col-lg-6">
                            <label style="margin-bottom:10px;margin-top:15px;">W/O Electric</label>
                        <input type="number" class="form-control" name="withoutelectric">
                        </div>
                        <div class="col-lg-6">
                            <label style="margin-bottom:10px;margin-top:15px;">Air Cooled</label>
                        <input type="text" class="form-control" name="aircooled">
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </form>
        </div>
      </div>
@endsection
