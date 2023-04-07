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
                        <h4><b>Supplier Details</b></h4>
                    </div>
                    <div class="col-lg-6 text-right">
                        {{-- <a href="/create-vendor" class="btn btn-success btn-outline fancy-button btn-0" style="font-size:16px;">Add Supplier</a> --}}
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add Supplier
                          </button>
                          <a class="btn btn-primary btn-sm" onclick="history.back()" style="font-size: 17px;">Back</a>
                    </div>
                </div>

            </div>
            <div class="widget-content widget-content-area br-6 mt-2">
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Supplier ID</th>
                            <th>Company/Individual Name</th>
                            <th>Phone Number</th>
                            <th>GST No</th>
                            <th>Product</th>
                            @if(Auth::user()->name == 'Admin' || Auth::user()->name == 'admin@purchase')
                                <th>Edit</th>
                                <th>Delete</th>
                            @endif



                        </tr>
                    </thead>
                    <tbody>
                        @if($suppliers)
                            @foreach ($suppliers as $supplier)
                                <tr>
                                    <td>{{ $supplier->suppliercode }}</td>
                                    <td>{{ $supplier->name }}</td>
                                    <td>{{ $supplier->contactpersonnum }}</td>
                                    <td>{{ $supplier->gstnum }}</td>
                                    <td>
                                        {{-- {{ $supplier->approvedproducts }} --}}

                                        @if ($products = App\Models\approvedproduct::where('id',$supplier->approvedproducts)->first())
                                            {{ $products->productname }}
                                        @endif
                                    </td>
                                    @if(Auth::user()->name == 'Admin' || Auth::user()->name == 'admin@purchase')
                                    <td>
                                        <button class="btn btn-primary supplieredit" data-id={{ $supplier->id }}>Edit</button>
                                    </td>
                                    <td>
                                        <a href="deletesupplier/{{$supplier->id}}" class="btn btn-danger" onclick="return confirm('Do You want Delete this Data?')">Delete</a>
                                    </td>
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
                <h5 class="modal-title" id="exampleModalLabel">Add Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Supplier Code<span style="color:red">*</span></label>
                                <input  type="text" name="suppliercode" id="suppliercode" max="15" class="user form-control" autocomplete="off" required >
                                <span id="supplier-code-errortxt" style="color:red"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Supplier Name<span style="color:red">*</span></label>
                                <input  type="text" name="suppliername" id="user_add"  class="user form-control" autocomplete="off" required >
                                <span id="name-error" style="color:red"></span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label style="margin-bottom:10px">GST Number<span style="color:red">*</span></label>
                                <input  type="text" name="gstnumber" id="gst"  class="user form-control" autocomplete="off" required >
                                <span id="gst-error" style="color:red"></span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Address<span style="color:red">*</span></label>
                                <textarea class="form-control" name="address" max="100" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Contact Person Name<span style="color:red">*</span></label>
                                <input  type="text" name="cpersonname" id="cpersonname"  class="user form-control" autocomplete="off" required >
                                <span id="gst-cpersonname-errortxt" style="color:red"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Contact Person Number<span style="color:red">*</span></label>
                                <input  type="text" name="cpersonnum" id="mobilenum"  class="user form-control" autocomplete="off" required >
                                <span id="mobile-error" style="color:red"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Approved Products<span style="color:red">*</span></label>
                                <select class="form-control" name="approvedproducts" required>
                                    <option value="">-- Choose Products --</option>
                                    @if ($products = App\Models\approvedproduct::get())
                                        @foreach ($products as $p)
                                            <option value="{{ $p->id }}">{{ $p->productname }}</option>
                                        @endforeach
                                    @endif


                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Payment Terms<span style="color:red">*</span></label>
                                <input type="text" class="form-control" name="paymentterms" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Basis Approval<span style="color:red">*</span></label>
                                <select class="form-control" name="basicapproval" required>
                                    <option value=""> -- Choose Option --</option>
                                    <option value="A - ISO 9001 Certified">A - ISO 9001 Certified</option>
                                    <option value="B - Customer Approved">B - Customer Approved</option>
                                    <option value="C - OEM">C - OEM</option>
                                    <option value="D - Authorised Dealer / Agent">D - Authorised Dealer / Agent</option>
                                    <option value="E - Trial basis">E - Trial basis</option>
                                    <option value="F - Past experience">F - Past experience</option>
                                    <option value="G - Monopoly">G - Monopoly</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Associated From<span style="color:red">*</span></label>
                                <input type="text" class="form-control" name="associatedfrom" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Validity of Approval<span style="color:red">*</span></label>
                                <input type="text" class="form-control" name="validityapproval" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Remarks<span style="color:red">*</span></label>
                                <textarea class="form-control" name="remarks" required></textarea>
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

  <div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="POST" action="/updatesupplier">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Supplier Code</label>
                                <input  type="text" name="suppliercode" id="suppliercode1"  class="user form-control" autocomplete="off"  >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Supplier Name</label>
                                <input  type="text" name="suppliername" id="suppliername1"  class="user form-control" autocomplete="off"  >
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label style="margin-bottom:10px">GST Number</label>
                                <input  type="text" name="gstnumber" id="gstnumber1"  class="user form-control" autocomplete="off"  >
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Address</label>
                                <textarea class="form-control" name="address" id="address1"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Contact Person Name</label>
                                <input  type="text" name="cpersonname" id="cpersonname1"  class="user form-control" autocomplete="off"  >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Contact Person Number</label>
                                <input  type="text" name="cpersonnum" id="cpersonnum1"  class="user form-control" autocomplete="off"  >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Approved Products</label>
                                <select class="form-control" name="approvedproducts" id="approvedproducts1">
                                    <option value="">-- Choose Products --</option>
                                    <option value="AL PIPE">AL PIPE</option>
                                    <option value="ALFA SWITCH">ALFA SWITCH</option>
                                    <option value="AUTO DRAIN VALVE">AUTO DRAIN VALVE</option>
                                    <option value="BATA">BATA</option>
                                    <option value="BEARING">BEARING</option>
                                    <option value="BLACK POWDER">BLACK POWDER</option>
                                    <option value="BOLT, NUT">Bolt, Nut</option>
                                    <option value="CASTING">CASTING</option>
                                    <option value="CENTER PLATE">CENTER PLATE</option>
                                    <option value="CHECIMAL">CHECIMAL</option>
                                    <option value="COLI">COLI</option>
                                    <option value="COUPPLING">COUPPLING</option>
                                    <option value="DELIVERY UNLOAD VALVE">DELIVERY UNLOAD VALVE</option>
                                    <option value="DISK VALVE">DISK VALVE</option>
                                    <option value="FILTER 7.5 HP">FILTER 7.5 HP</option>
                                    <option value="GUARD">GUARD</option>
                                    <option value="MANUAL DOOR">MANUAL DOOR</option>
                                    <option value="MOTOR">MOTOR</option>
                                    <option value="MS SHEET">MS SHEET</option>
                                    <option value="OIL">OIL</option>
                                    <option value="PAINT">PAINT</option>
                                    <option value="PASTE">PASTE</option>
                                    <option value="PISTION">PISTION</option>
                                    <option value="POWDER">POWDER</option>
                                    <option value="PULLY">PULLY</option>
                                    <option value="RINGS">RINGS</option>
                                    <option value="SPARES">SPARES</option>
                                    <option value="STATIONARY">STATIONARY</option>
                                    <option value="TOUCH FLIM">TOUCH FLIM</option>
                                    <option value="VALVE BELT">VALVE BELT</option>
                                    <option value="WASTE">WASTE</option>
                                    <option value="WELDING ROD">WELDING ROD</option>
                                    <option value="WOODEN BOX">WOODEN BOX</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Payment Terms</label>
                                <input type="text" class="form-control" name="paymentterms" id="paymentterms1">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Basis Approval</label>
                                <select class="form-control" name="basicapproval" id="basicapproval1">
                                    <option> -- Choose Option --</option>
                                    <option value="A-ISO 9001 CERTIFIED">A-ISO 9001 CERTIFIED</option>
                                    <option value="B-CUSTOMER APPROVED">B-CUSTOMER APPROVED</option>
                                    <option value="C-OEM">C-OEM</option>
                                    <option value="D-Authorised Dealer / AGENT">D-AUTHORISED DEALER / AGENT</option>
                                    <option value="E-TRIAL BASIS">E-TRIAL BASIS</option>
                                    <option value="F-PAST EXPERIENCE">F-PAST EXPERIENCE</option>
                                    <option value="G-MONOPOLY">G-MONOPOLY</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Associated From</label>
                                <input type="text" class="form-control" name="associatedfrom" id="associatedfrom1">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Validity of Approval</label>
                                <input type="text" class="form-control" name="validityapproval" id="validityapproval1">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Remarks</label>
                                <textarea class="form-control" name="remarks" id="remarks1"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <input type="hidden" name="id" id="id">
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Supplier</button>
                </div>
            </div>
        </form>
    </div>
  </div>
@endsection
