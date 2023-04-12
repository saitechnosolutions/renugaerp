@extends('layout.app');
@section('title','ERP - Dashboard');
@section('main-content')

 <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>

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
                    <div class="col-lg-12">
                        <h4><b>Create Purchase Request</b></h4>
                    </div>

                </div>

            </div>
            <div class="widget-content widget-content-area br-6 mt-2">
                <form method="POST" action="/saverequest">
                    @csrf

                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label style="margin-bottom:10px">Request ID<span style="color:red">*</span></label>
                                        <input  type="text" name="requestid" id="requestid"  class="user form-control" autocomplete="off" required value="{{ $poreq }}" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <label>Description<span style="color:red">*</span></label>
                                    <table class="table table-borderless " >
                                        <tbody id="appendstageparent">
                                        <tr class="appendstage">

                                            <td style="width:40%">
                                                <select class="form-control  basic productdesc" name="productdesc[]" required>
                                                    <option value="">-- Choose Description --</option>
                                                    @if($purchaserequest = App\Models\Purchaseitem::get())
                                                        @foreach ($purchaserequest as $purchase)
                                                            <option value="{{ $purchase->id }}">{{ $purchase->descriptions }}</option>
                                                        @endforeach
                                                    @endif


                                                </select>
                                            </td>
                                            <td style="width:40%">
                                                <input type="number" class="form-control requestprice" placeholder="Quantity" name="price[]" required>
                                            </td>

                                            <td style="width:20%">
                                                <button type="button" class="btn btn-success addstage">Add</button>
                                                <button type="button" class="btn btn-danger removestage" style="visibility: hidden">Delete</button>
                                            </td>
                                        </tr>

                                        </tbody>

                                    </table>

                                    <button type="submit" class="btn btn-primary">Create Request</button>
                                    </div>



                                </div>



                            </div>
                        </div>






                </form>
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
                                <label style="margin-bottom:10px">Select Products</label>
                                <select class="form-control" name="approvedproducts">
                                    <option>-- Choose Products --</option>
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
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Description Of Works</label>
                                {{-- <input  type="text" name="suppliername" id="suppliername"  class="user form-control" autocomplete="off" required > --}}
                                <textarea class="form-control" name="descriptionofworks"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label style="margin-bottom:10px">Price</label>
                                <input  type="text" name="price" id="price"  class="user form-control" autocomplete="off" required >
                            </div>
                        </div>


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
