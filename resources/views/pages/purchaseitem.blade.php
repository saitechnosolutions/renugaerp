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
                        <h4><b>Purchase Item Details</b></h4>
                    </div>
                    <div class="col-lg-6 text-right">
                        {{-- <a href="/create-vendor" class="btn btn-success btn-outline fancy-button btn-0" style="font-size:16px;">Add Supplier</a> --}}
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add Purchase Item
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
                            <th>Description</th>
                            <th>Price</th>
                            @if(Auth::user()->name == 'Admin' || Auth::user()->name == 'admin@purchase')
                                <th>Edit</th>
                                <th>Delete</th>
                            @endif

                        </tr>
                    </thead>
                    <tbody>
                        @if($purchaseitem)
                            @foreach ($purchaseitem as $purchase)
                                <tr>
                                    <td>{{ $purchase->id }}</td>
                                    <td>
                                        {{-- {{ $purchase->productname }} --}}
                                        @if ($products = App\Models\approvedproduct::where('id',$purchase->productname)->first())
                                            {{ $products->productname }}
                                        @endif
                                    </td>
                                    <td>{{ $purchase->descriptions }}</td>
                                    <td>{{ number_format($purchase->price,2) }}</td>
                                    @if(Auth::user()->name == 'Admin' || Auth::user()->name == 'admin@purchase')
                                    <td><button class="btn btn-info purchaseitemedit" data-id="{{ $purchase->id }}">Edit</button></td>
                                    <td><a onclick="return confirm('Do You want Delete this Data?')" href="/deletepurchaseitem/{{ $purchase->id }}" class="btn btn-danger">Delete</a></td>
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
        <form method="POST" action="/savepurchaseitem">
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
                                <label style="margin-bottom:10px">Select Products<span style="color:red">*</span></label><br>
                                <select class="form-control basic" name="approvedproducts" style="width:100%" required>
                                    <option>-- Choose Products --</option>
                                    @if($purchaseitem = App\Models\approvedproduct::get())
                                        @foreach ($purchaseitem as $p)
                                            <option value="{{ $p->id }}">{{ $p->productname }}</option>
                                        @endforeach
                                    @endif

                                    {{-- <option value="ALFA SWITCH">ALFA SWITCH</option>
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
                                    <option value="WOODEN BOX">WOODEN BOX</option> --}}
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label style="margin-bottom:10px">Supplier Name<span style="color:red">*</span></label><br>
                            <select class="form-control basic" name="suppliername" style="width:100%" required>
                                <option value="">-- Choose Supplier Name --</option>
                                @if($suppliername = App\Models\Supplier::groupBy('name')->get())
                                    @foreach ($suppliername as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label style="margin-bottom:10px;margin-top:20px">Description Of Works<span style="color:red">*</span></label>
                                {{-- <input  type="text" name="suppliername" id="suppliername"  class="user form-control" autocomplete="off" required > --}}
                                <textarea class="form-control" name="descriptionofworks" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Price<span style="color:red">*</span></label>
                                <input  type="text" name="price" id="price" class="user form-control" max="5" autocomplete="off" required >
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


  <div class="modal fade" id="purchaseitemedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="POST" action="/updatepurchaseitem">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Purchase Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Select Products</label><br>
                                <select class="form-control " name="approvedproducts" id="approvedproducts" style="width:100%">
                                    <option>-- Choose Products --</option>
                                    @if($purchaseitem = App\Models\approvedproduct::get())
                                    @foreach ($purchaseitem as $p)
                                        <option value="{{ $p->id }}">{{ $p->productname }}</option>
                                    @endforeach
                                @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <label style="margin-bottom:10px">Supplier Name</label><br>
                            <select class="form-control " name="suppliername" id="suppliername" style="width:100%">
                                <option value="">-- Choose Supplier Name --</option>
                                @if($suppliername = App\Models\Supplier::groupBy('name')->get())
                                    @foreach ($suppliername as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label style="margin-bottom:10px;margin-top:20px">Description Of Works</label>
                                {{-- <input  type="text" name="suppliername" id="suppliername"  class="user form-control" autocomplete="off" required > --}}
                                <textarea class="form-control" name="descriptionofworks" id="descriptionofworks"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Price</label>
                                <input  type="text" name="price" id="price1"  class="user form-control" autocomplete="off" required >
                            </div>
                        </div>

                        {{-- <div class="col-lg-12">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Open Stock</label>
                                <input  type="number" name="openstock"  class="user form-control" autocomplete="off" required >
                            </div>
                        </div> --}}

                        <input type="hidden" name="id" id="id">

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
