<html>
    <head>
       <title> Purchase Order</title>
    </head>
    <style>
        table
        {
            width:100%;
        }
        table, th, td {
  border: 1px solid;
  border-collapse: collapse;
  padding:10px ;
}
    </style>
    <body>
        <table>
            <tbody>
                <tr>
                    <th style="width:25%">RAC</th>
                    <th colspan="3" style="width:50%">SREE RENUGA AIR COMPRESSOR</th>
                    <th colspan="2" style="width:25%;text-align:left;font-size:10px">
                        <span>DOC NO : PUR/R/05</span><br>
                        <span>REV NO : 00</span><br>
                        <span>REV DATE : 01-09-2022</span><br>
                    </th>

                </tr>
                <tr>
                    <td colspan="6" style="text-align: center;">PURCHASE ORDER</td>
                </tr>
                <tr>
                    <td style="width:25%">Purchase Order No</td>
                    <td style="width:25%">{{ $purchaseorderdetail->orderid }}</td>
                    <td style="width:25%">Date</td>
                    <td colspan="3" style="width:25%">@php echo date('d-m-Y', strtotime($purchaseorderdetail->order_date)); @endphp</td>
                </tr>
                <tr>
                    <td style="width:25%">Order Status</td>
                    <td style="width:25%">Single / Open / Job Work</td>
                    <td style="width:25%">Supplier Code</td>
                    <td colspan="3" style="width:25%">
                        @if($vendor = App\Models\Supplier::where('id',$purchaseorderdetail->vendor_name)->first())
                                {{ $vendor->suppliercode }}
                        @endif

                    </td>
                </tr>
                <tr>
                    <td rowspan="2" colspan="2" style="width:25%;padding-bottom:30px">
                        To
                        <br>
                        <br>
                        @if($vendor = App\Models\Supplier::where('id',$purchaseorderdetail->vendor_name)->first())
                                {!! $vendor->address !!}
                        @endif
                    </td>
                    <td  style="width:25%">Supplier Ref</td>
                    <td colspan="3" style="width:25%">
                        @if($vendor = App\Models\Supplier::where('id',$purchaseorderdetail->vendor_name)->first())
                                {{ $vendor->name }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td style="width:25%">Our Ref</td>
                    <td colspan="3" style="width:25%"></td>
                </tr>
                <tr>
                    <th>S.no</th>
                    <th>Description</th>
                    <th>Unit</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Amount</th>
                </tr>
                <tbody >
                @if($purchaseorderproducts)
                    @foreach ($purchaseorderproducts as $products)
                    <tr >
                        <td>{{ $products->requestsno }}</td>
                        <td>
                            @if($itemdesc = App\Models\Purchaseitem::where('id',$products->itemdescription)->first())
                                {{ $itemdesc->descriptions }}
                            @endif
                            {{-- {{ $products->itemdescription }} --}}
                        </td>
                        <td>{{ $products->uom }}</td>
                        <td style="text-align: right">{{ $products->qty }}</td>
                        <td style="text-align: right">{{ number_format($products->price,2) }}</td>
                        <td style="text-align: right">{{ number_format($products->totamt,2) }}</td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
                <tr>
                    <td colspan="2" style="border-bottom:1px solid transparent"></td>
                    <td >CGST (9%)</td>
                    <td style="text-align: right" colspan="3">{{ $purchaseorderdetail->cgst }}</td>
                </tr>
                <tr>
                    <td colspan="2" style="border-bottom:1px solid transparent"></td>
                    <td >SGST (9%)</td>
                    <td colspan="3" style="text-align: right">{{ $purchaseorderdetail->sgst }}</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td >Total </td>
                    <td colspan="3" style="text-align: right">{{ $purchaseorderdetail->totalamt }}</td>
                </tr>

                <tr>
                    <td colspan="2">Approved By :</td>
                    <td colspan="4">Authorised Signature : </td>
                </tr>
            </tbody>

        </table>
    </body>
</html>
