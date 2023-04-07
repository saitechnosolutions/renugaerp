@extends('layout.app');
@section('title','ERP - Pending Stock');
@section('main-content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">
        <form method="POST" action="savepurchaseorder">
            @csrf

        <div class="col-lg-12 layout-spacing">

                <div class="widget-content widget-content-area br-6">
            <div class="form-row mb-4">

                <div class="col-lg-4">
                    <label style="margin-bottom:10px;margin-top:15px;">Order Date <span style="color:red">*</span></label>
                    <input  type="date" name="order_date" id="order_date" required  class="form-control" value="{{ $purchaseorderdetail->order_date }}">
                </div>
                <div class="col-lg-4">
                    <label style="margin-bottom:10px;margin-top:15px;">Due Date <span style="color:red">*</span></label>
                    <input type="date" name="delivery_date" id="delivery_date" required class="form-control" value="{{ $purchaseorderdetail->due_date }}">
                </div>
                <div class="col-lg-4">
                    <label style="margin-bottom:10px;margin-top:15px;">Request No <span style="color:red">*</span></label>
                    <input type="text" name="requestno" id="delivery_date" class="form-control" required value="{{ $purchaseorderdetail->requestid }}" readonly>
                </div>
                <div class="col-lg-6">
									<label style="margin-bottom:10px;margin-top:15px;">Supplier Name <span style="color:red">*</span></label>
										<select class="form-control select2 statte basic suppliername"  type='text' id='vendor' name='vendor' disabled>
											<option value="">--Choose Vendor--</option>
                                                @if($vendorname = App\Models\Supplier::groupby('name')->get())
                                                    @foreach ($vendorname as $vendor)
                                                        <option value="{{ $vendor->id }}" @if($purchaseorderdetail->vendor_name == $vendor->id) selected @endif>{{ $vendor->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>

								</div>
                                <div class="col-lg-6">
									<label style="margin-bottom:10px;margin-top:15px;">PO No</label>

								<input type='text' id='order_no' name='order_no' class="form-control" value="{{ $purchaseorderdetail->orderid }}" readonly>
								</div>

            </div>

                            <div class="col-lg-12">

                                <table class="table table-bordered " >
                                    <thead>

                                       {{-- <th>S.No</th> --}}
                                       <th>Products Description </th>
                                       <th>Request S.No </th>
                                       <th>Quantity</th>
                                       {{-- <th>Tax</th> --}}
                                       <th>Rate</th>
                                       <th>Amount</th>
                                       <th>Received Quantity</th>
                                       <th>Pending Quantity</th>

                                   </thead>
                                    <tbody id="appendstageparent">


                                    <tr class="appendstage">
                                        @if ($purchaseorderproducts)
                                            @foreach ($purchaseorderproducts as $products)
                                                <tr>
                                                    <td>

                                                        @if($purchasedesc = App\Models\Purchaseitem::where('id',$products->itemdescription)->first())
                                                            {{ $purchasedesc->descriptions }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $products->requestsno }}</td>
                                                    <td>{{ $products->qty }}</td>
                                                    <td>{{ $products->price }}</td>
                                                    <td>{{ $products->totamt }}</td>
                                                    <td>{{ $products->received_count }}</td>
                                                    <td>{{ $products->pending_count }}</td>
                                                </tr>
                                            @endforeach
                                        @endif

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
                                    {{-- <input type="submit" name="save-purchaseentery" value="Save" class="btn btn-success" style="font-size: 17px;"> --}}
                                <a class="btn btn-primary" onclick="history.back()" style="font-size: 17px !important;">Back</a>
                                </div>
            </div>

            </div>
        </form>
                </div>
    </div>
    </div>
</div>
@endsection
