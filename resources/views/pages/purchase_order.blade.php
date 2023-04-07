@extends('layout.app');
@section('title','ERP - Dashboard');
@section('main-content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="row">
                    <div class="col-lg-6">
                        <h4><b>Purchase Order Details</b></h4>
                    </div>
                    <div class="col-lg-6 text-right">
                        <a href="/create-purchase-order" class="btn btn-success btn-outline fancy-button btn-0" style="font-size:16px;">Create Purchase Order</a>
                        <a class="btn btn-info btn-outline fancy-button btn-0" onclick="history.back()" style="font-size: 17px;">Back</a>
                    </div>
                </div>

            </div>
            <div class="widget-content widget-content-area br-6 mt-2">
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            {{-- <th>S.No</th> --}}
                            <th>Order No</th>
                            <th>Date</th>
                            
                            <th>Vendor Name</th>
                            <th>Amount</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if($purchaseorder)
                            @foreach ($purchaseorder as $purchase)
                            <tr>
                                <td><a  class="badge badge-info text-white">{{ $purchase->orderid }}</a></td>
                                <td>@php echo date("d-m-Y", strtotime($purchase->order_date)) @endphp </td>
                                

                                <td>

                                    @if ($vendor = App\Models\Supplier::where('id',$purchase->vendor_name)->first())
                                        {{ $vendor->name }}
                                    @endif
                                </td>
                                <td>{{ $purchase->total_amt }}</td>
                                <td>@php echo date("d-m-Y", strtotime($purchase->due_date)) @endphp</td>
                                <td class="text-center">
                                    @if($statuspending = App\Models\purchaseentry::where('po_id',$purchase->orderid)->get())
                                        @if($statuspending)
                                            @if ($statuspending->count() == 0)
                                            <span class="badge bg-danger">Pending</span><br>
                                            @endif

                                        @endif
                                    @endif

                                    @if($statuspending = App\Models\purchaseentry::where('po_id',$purchase->orderid)->first())
                                        @if($statuspending)
                                            @if ($statuspending->status == 2)
                                            <span class="badge bg-warning">Partially Received</span><br>
                                            @endif

                                        @endif
                                    @endif

                                    @if($statuspending = App\Models\purchaseentry::where('po_id',$purchase->orderid)->first())
                                    @if($statuspending)
                                        @if ($statuspending->status == 1)
                                        <span class="badge bg-success">Received</span><br>
                                        @endif

                                    @endif
                                @endif
                                    {{-- <span class="badge bg-success">Received</span><br>
                                    <span class="badge bg-warning">Partially Received</span> --}}
                                </td>
                                <td>
                                    <a href="/printpo/{{ $purchase->orderid }}" class="btn btn-warning"><i class="bi bi-printer-fill"></i></a>
                                    <a href="/pending-stock/{{ $purchase->orderid }}" class="btn btn-primary btn-sm"><i class="bi bi-card-text"></i></a>
                                    @if(Auth::user()->name == 'Admin' || Auth::user()->name == 'admin@purchase')
                                        <a href="/editpurchaseorder/{{ $purchase->orderid }}" class="btn-sm btn btn-info"><i class="bi bi-pencil"></i></a>
                                        <a onclick="return confirm('Do you want delete this record?')" href="/deletepurchaseorder/{{ $purchase->orderid }}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                    @endif


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



@endsection
