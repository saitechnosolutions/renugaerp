@extends('layout.app');
@section('title', 'ERP - Estimate');
@section('main-content')

    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">
            <form method="POST" action="savepurchaseorder">
                @csrf

                <div class="col-lg-12 layout-spacing">

                    <div class="widget-content widget-content-area br-6">
                        <div class="form-row mb-4">

                            <div class="col-lg-4">
                                <label style="margin-bottom:10px;margin-top:15px;">Order Date <span
                                        style="color:red">*</span></label>
                                <input type="date" name="order_date" id="simple" required class="form-control">
                            </div>
                            <div class="col-lg-4">
                                <label style="margin-bottom:10px;margin-top:15px;">Due Date <span
                                        style="color:red">*</span></label>
                                <input type="date" name="delivery_date" id="delivery_date" required class="form-control">
                            </div>
                            <div class="col-lg-4">
                                <label style="margin-bottom:10px;margin-top:15px;">Request No <span
                                        style="color:red">*</span></label>
                                {{-- <input type="text" name="requestno" id="delivery_date" class="form-control" required> --}}
                                <input type="hidden" name="requestno" id="purreqq">
                                <select name="" id="" class="form-control purreqq" required>
                                    <option value="" disable>Select Request No</option>

                                        @foreach ($purchasereq as $purchreqq)
                                            <option value="{{ $purchreqq->requestid }}">{{ $purchreqq->requestid }}</option>
                                        @endforeach

                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label style="margin-bottom:10px;margin-top:15px;">Supplier Name <span
                                        style="color:red">*</span></label>
                                        {{-- <input type="hidden" id="vendor" name="vendor"> --}}
                                        {{-- <input type="text" class="form-control suppliername" readonly> --}}
                                <select class="form-control select2 statte basic suppliername" type='text' id='vendor'
                                    name='vendor'>
                                    <option value="">-- Choose Supplier --</option>
                                </select>

                            </div>
                            <div class="col-lg-6">
                                <label style="margin-bottom:10px;margin-top:15px;">PO No</label>

                                <input type='text' id='order_no' name='order_no' class="form-control"
                                    value="{{ $poid }}" readonly>
                            </div>

                        </div>

                        <div class="col-lg-12">

                            <table class="table table-bordered ">
                                <thead>

                                    {{-- <th>S.No</th> --}}
                                    <th>Products Description &nbsp;<span style="color:red">*</span> </th>
                                    <th>Request S.No &nbsp;<span style="color:red">*</span></th>
                                    <th>Quantity &nbsp;<span style="color:red">*</span></th>
                                    <th>Unit &nbsp;<span style="color:red">*</span></th>
                                    <th>Rate &nbsp;<span style="color:red">*</span></th>
                                    <th>Amount &nbsp;<span style="color:red">*</span></th>
                                    {{-- <th>Add</th> --}}

                                </thead>
                                <tbody id="appendstageparent">


                                    <tr class="appendstage">

                                        <td style="width:250px">
                                            {{-- <select class="form-control  basic productdesc" name="productdesc[]">
                                                <option>-- Choose Description --</option>
                                            </select> --}}
                                            <input type="hidden" class="proddesc" name="productdesc">
                                            <select name="" class="form-control prodesc" name="" id="" required>
                                                <option value="">-- Choose Description --</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control Sno sno" name="requestsn"
                                                placeholder="S.No" readonly required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control qttyy purchaseqty" name="qty"
                                                placeholder="Qty" required>
                                        </td>
                                        <td style="width:100px">
                                            <select class="form-control" name="unit" required>
                                                <option value="">Choose</option>
                                                <option value="Kg">Kg</option>
                                                <option value="Nos">Nos</option>

                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control requestprice" name="price" readonly required>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control amt2" name="amt" readonly required>
                                        </td>

                                        {{-- <td>
                                            <button type="button" class="btn btn-success addstage">+</button>
                                            <button type="button" class="btn btn-danger removestage"
                                                style="visibility: hidden">X</button>
                                        </td> --}}
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
                                    <div class="col-lg-6">
                                        <label>SubTotal</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control text-right totamt" name="subtotal"
                                            id="subtotal" value="0.00" readonly>
                                    </div>
                                    {{-- <div class="col-lg-6 Igst">
												<label>IGST</label>
											</div>
											<div class="col-lg-6 Igst">
												<input type="text" name="txtIgst" id="txtIgst" class="form-control text-right" value="0.00">
											</div> --}}
                                    <div class="col-lg-6 cgst">
                                        <label>CGST (9%)</label>
                                    </div>
                                    <div class="col-lg-6 cgst">
                                        <input type="text" name="txtcgst" id="txtcgst" class="form-control cgst text-right"
                                            value="0.00" readonly>
                                    </div>
                                    <div class="col-lg-6 sgst">
                                        <label>SGST (9%)</label>
                                    </div>
                                    <div class="col-lg-6 sgst">
                                        <input type="text" name="txtsgst" id="txtsgst" class="form-control sgst text-right"
                                            value="0.00" readonly>
                                    </div>
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
                                    <div class="col-lg-6">
                                        <label style="margin-top:10px">Total</label>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" name="finalamt" id="Total"
                                            class="form-control text-right finalamt" value="0.00" readonly>
                                    </div>
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
                            <input type="submit" name="save-purchaseentery" value="Save" class="btn btn-success"
                                style="font-size: 17px;">
                            <a class="btn btn-primary" onclick="history.back()" style="font-size: 17px !important;"><i
                                    class="fa fa-hand-o-left mr-2" aria-hidden="true"
                                    style="color:#ffff;"></i>&nbsp;&nbsp;Back</a>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
@endsection
