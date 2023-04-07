@extends('layout.app');
@section('title','ERP - Dashboard');
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
                        <h4><b>Purchase Entry Details</b></h4>
                    </div>
                    <div class="col-lg-6 text-right">
                        <a href="/purchase-entry" class="btn btn-success btn-outline fancy-button btn-0" style="font-size:16px;">Create Purchase Entry</a>
                        <a class="btn btn-info btn-outline fancy-button btn-0" onclick="history.back()" style="font-size: 17px;">Back</a>
                    </div>
                </div>

            </div>
            <div class="widget-content widget-content-area br-6 mt-2">
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            {{-- <th>S.No</th> --}}
                            <th>Date</th>
                            <th>PO ID</th>
                            <th>Vendor Name</th>
                            <th>Invoice No</th>
                            @if(Auth::user()->name == 'Admin' || Auth::user()->name == 'admin@purchase')
                            <th>Action</th>
                            @endif


                        </tr>
                    </thead>
                    <tbody>
                        @if($purchaseentry)
                            @foreach ($purchaseentry as $purchase)
                            <tr>
                                <td>@php echo date("d-m-Y", strtotime($purchase->entry_date)) @endphp </td>
                                <td><a href="" class="badge badge-info">{{ $purchase->po_id }}</a></td>

                                <td>
                                    @if ($vendor = App\Models\Supplier::where('id',$purchase->supplier_name)->first())
                                    {{ $vendor->name }}
                                 @endif

                                </td>
                                <td>{{ $purchase->invoice_number }}</td>
                                {{-- <td>949.00</td> --}}
                                <td>
                                    @if(Auth::user()->name == 'Admin' || Auth::user()->name == 'admin@purchase')
                                        <a href="editpurchaseentry/{{ $purchase->id }}" class="btn btn-info">Edit</a>
                                        <a  onclick="return confirm('Do yo delete this record?')" href="deletepurchaseentry/{{ $purchase->po_id }}" class="btn btn-danger">Delete</a>
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
