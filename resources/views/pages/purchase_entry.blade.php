@extends('layout.app');
@section('title','ERP - Estimate');
@section('main-content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <form method="POST" action="/savepurchaseentry">
            @csrf

        <div class="col-lg-12 layout-spacing">

                <div class="widget-content widget-content-area br-6">
            <div class="form-row mb-4">


                <div class="col-lg-4">
                    <label style="margin-bottom:10px;margin-top:15px;">Date <span style="color:red">*</span></label>
                    <input type="date" name="entrydate" id="simple" class="form-control" required>
                </div>
                <div class="col-lg-4">
                    <label style="margin-bottom:10px;margin-top:15px;">Invoice Date</label>
                    <input type="date" name="invoice_date" id="delivery_date" class="form-control">
                </div>
                <div class="col-lg-4">
                    <label style="margin-bottom:10px;margin-top:15px;">Invoice No <span style="color:red">*</span></label>
                    <input type="text" name="invoiceno" id="delivery_date" class="form-control" required>
                </div>
                <div class="col-lg-6">
                    <label style="margin-bottom:10px;margin-top:15px;">PO ID <span style="color:red">*</span></label>
                    <select class="form-control basic poid" name="poid">
                        <option value="">-- Select POID --</option>
                        @if ($purchaseorder = App\Models\purchaseorder::orderBy('id','DESC')->get())
                            @foreach ($purchaseorder as $porder)
                                <option value="{{ $porder->orderid }}">{{ $porder->orderid }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-lg-6">
									<label style="margin-bottom:10px;margin-top:15px;">Supplier Name <span style="color:red">*</span></label>
										{{-- <select class="form-control select2 statte basic suppliername" id=""  name='vendor'>
											<option value="#">--Choose Vendor--</option>
                                                @if($vendorname = App\Models\Supplier::groupby('name')->get())
                                                    @foreach ($vendorname as $vendor)
                                                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select> --}}
                                            <input type="text" id="suppliername" class="form-control" name="vendor">
                                            <input type="hidden" name="oldsuppliername" id="oldsuppliername">
								</div>


            </div>

                            <div class="col-lg-12">

                                <table class="table table-bordered purchaseentrytable" >
                                    <thead>

                                       {{-- <th>S.No</th> --}}
                                       <th>Products Description </th>
                                       <th>Request S.No </th>
                                       <th>Rate</th>
                                       <th>Quantity</th>
                                       {{-- <th>Tax</th> --}}

                                       <th>Amount</th>
                                       {{-- <th>Add</th> --}}

                                   </thead>
                                    <tbody id="appendstageparent">


                                    <tr class="appendstage">

                                        <td style="width:250px">
                                            <select class="form-control  basic productdesc" name="productdesc[]" >
                                                <option>-- Choose Description --</option>
                                                {{-- @if($purchaserequest = App\Models\Purchaseitem::get())
                                                    @foreach ($purchaserequest as $purchase)
                                                        <option value="{{ $purchase->id }}">{{ $purchase->descriptions }}</option>
                                                    @endforeach
                                                @endif --}}


                                            </select>

                                        </td>
                                        <td >
                                            <input type="number" class="form-control " name="requestsn[]" placeholder="S.No">
                                        </td>
                                        <td >
                                            <input type="number" class="form-control purchaseqty" name="qty[]" placeholder="Qty">
                                        </td>
                                        {{-- <td style="width:100px">
                                            <select class="form-control basic">
                                                <option>Choose</option>
                                                <option value="5">5%</option>
                                                <option value="12">12%</option>
                                                <option value="18">18%</option>
                                                <option value="28">28%</option>
                                                <option value="33">33%</option>
                                            </select>
                                        </td> --}}
                                        <td >
                                            <input type="text" class="form-control requestprice" name="price[]">
                                        </td>
                                        <td >
                                            <input type="text" class="form-control amt2" name="amt[]">
                                        </td>

                                        <td >
                                            <button type="button" class="btn btn-success addstage">+</button>
                                            <button type="button" class="btn btn-danger removestage" style="visibility: hidden">X</button>
                                        </td>
                                    </tr>

                                    </tbody>

                                </table>

                            </div>

                            <div class="row">
									<div class="col-lg-5">
										{{-- <label style="margin-bottom:10px;margin-top:60px; margin-left:10px">Customer Notes</label>
											<textarea type="text" name="customer_notes" class="form-control" autocomplete="off" placeholder="Customer Notes" style="margin-left:10px"></textarea> --}}
									</div>
									<div class="col-lg-6">
										<div class="row">
											{{-- <div class="col-lg-6">
												<label>SubTotal</label>
											</div>
											<div class="col-lg-6">
												<input type="text" class="form-control text-right"  name="subtotal" id="subtotal" value="0.00">
											</div> --}}
											{{-- <div class="col-lg-6 Igst">
												<label>IGST</label>
											</div>
											<div class="col-lg-6 Igst">
												<input type="text" name="txtIgst" id="txtIgst" class="form-control text-right" value="0.00">
											</div> --}}
											{{-- <div class="col-lg-6 cgst">
												<label>CGST</label>
											</div>
											<div class="col-lg-6 cgst">
												<input type="text" name="txtcgst" id="txtcgst" class="form-control text-right" value="0.00">
											</div>
											<div class="col-lg-6 sgst">
												<label>SGST</label>
											</div>
											<div class="col-lg-6 sgst">
												<input type="text" name="txtsgst" id="txtsgst" class="form-control text-right" value="0.00">
											</div> --}}
											{{-- <div class="col-lg-2">
												<label style="margin-top:10px">Discount</label>
											</div>
											<div class="col-lg-2">
												<input type="text" name="discount" id="discount"  class="form-control text-right" value="0.00" onchange="txtchange(this)">
											</div>
											<div class="col-lg-2">
												<select class="form-control" name="selectdiscount"id="selectdiscount" onchange="selechange(this)">
													<option value="Cash">₹</option>
													<option  value="percent">%</option>
												</select>
											</div>
											<div class="col-lg-6">
												<input type="text" name="txtdiscount" id="txtdiscount" class="form-control text-right" value="0.00">
											</div>
											<div class="col-lg-2">
												<label style="margin-top:10px">Adjustment</label>
											</div>
											<div class="col-lg-2">
												<input type="text"  name="adjusment" id="adjusment" class="form-control text-right" value="0.00" onchange="txtchangeadj(this)">
											</div>
											<div class="col-lg-2">

											</div>
											<div class="col-lg-6">
												<input type="text" name="Adj" id="Adj" class="form-control text-right" value="0.00">
											</div> --}}
											{{-- <div class="col-lg-6">
												<label style="margin-top:10px">Total</label>
											</div>
											<div class="col-lg-6">
												<input type="text" name="total1" id="Total" class="form-control text-right totamt" value="0.00">
											</div> --}}
										</div>
									</div>
									<div class="col-lg-6"></div>


								</div>
                                {{-- <div class="row">
								    <div class="col-lg-6">
								        <label style="margin-bottom:10px;margin-top:60px;margin-left:10px">Terms & Conditions</label>
									 <input type="checkbox" name="term_condtions" id="term_condtions" onclick="add_term()">
									 <textarea rows="5" cols="1" class="form-control termhide" name="term_condtions_data" id="term_condtions_data" style="margin-left:10px"></textarea>
								    </div>
								</div> --}}
                                <div class="col-lg-12" style="margin-top:30px;padding-bottom:30px;margin-left:20px;">
                                    <input type="submit" name="save-purchaseentery" value="Save" class="btn btn-success" style="font-size: 17px;">
                                <a class="btn btn-primary" onclick="history.back()" style="font-size: 17px !important;"><i class="fa fa-hand-o-left mr-2" aria-hidden="true" style="color:#ffff;"></i>&nbsp;&nbsp;Back</a>
                                </div>
            </div>

            </div>
        </form>
                </div>
    </div>
    </div>
</div>
@endsection
