<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAC - Proposal</title>
    <style>
        @font-face {
  font-family: verdana;
  src: url('/fonts/verdana.ttf');
}
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            position: relative;
            /* background-image:url('/letterpadbg.svg');
            background-size:cover;
            background-position: center */
            font-family: verdana;
        }

        .back_bg {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 1;
            width: 100%;
            height: 100%;
        }

        .back_bg img {
            width: 100%;
        }

        .container {
            padding: 4%;
        }

        h1 {
            font-size: 20px;
        }

        p {
            font-size: 14px;
            /* font-weight: 200; */
        }

        .top_banner {
            display: flex;
            justify-content: center;
        }

        .top_banner>div {
            margin: 0 20px;
        }

        .top_banner .content {
            text-align: center;
        }

        .top_banner .content h1 {
            color: #d2532c;
        }

        .top_banner .content p {
            margin: 5px 0;
            color: #127237;
            font-weight: 700;
        }

        .border_content {
            margin: 15px 0;
            text-align: center;
            padding: 5px 0;
            border-top: 1.2px solid #d2532c;
            border-bottom: 1.2px solid #d2532c;
            font-weight: 700;
        }

        .quotation {
            font-size: 18px;
            font-weight: 600;
            font-weight: 700;
        }

        .date {
            /* font-weight: bold; */
            text-align: right;
        }

        .to {
            margin-top: 0px;
        }

        .to p {
            margin-top: 10px;
            margin-left: 20px;
            /* font-weight: bold; */
        }

        .sub {
            margin-top: 30px;
        }

        .sub p {
            margin: 8px 0;
            /* font-weight: bold; */
        }

        .table {
            margin-top: 10px;
        }

        .table table {
            border-collapse: collapse;
            border: 1px solid #000;
        }

        .table table tr th,
        .table table tr td {
            padding: 5px;
            text-align: center;
            border: 1px solid #000;
        }

        .conditions {
            margin-top: 20px;
        }

        .conditions h3 {
            font-size:15px;
            margin-bottom: 20px;
            text-decoration: underline;
        }
        .conditions ul li
        {
            font-size:12px;
        }

        .conditions table tr th,
        .conditions table tr td {
            padding: 7px 0;
            text-align: left;
        }

        .conditions p {
            text-align: center;
            margin-top: 20px;
        }

        .yours {
            margin-top: 20px;
        }

        .yours p {
            margin: 8px 0;
        }

        .yours p:nth-child(1),
        .yours p:nth-child(2) {
            font-weight: 700;
        }

        .bottomsection
        {
            position: absolute;
            bottom:30px;
            width:100%;
        }

        .bankdetailstbl
        {
            position: absolute;
            width:300px;
            bottom:180px;
            font-size:12px;
            right:10px;
            /* border:1px solid black; */
        }
    </style>
</head>

<body >
    {{-- <div class="back_bg">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('letterpadbg.png'))) }}" alt="">
    </div> --}}
    <div class="container">
        <div class="top_banner">
            <table style="width:100%">
                <tr>
                    <td>
                        <div class="logo">
                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('letterpadhead.jpg'))) }}" alt="" style="width:100%">
                        </div>
                    </td>
                    {{-- <td>
                        <div class="content">
                            <h1 style="font-family: baloon">SREE RENUGA AIR COMPRESSOR</h1>
                            <p class="address" style="font-size:12px">
                                S.F No: 6/3, Ellappan Street, Thanneerpandhal Road, Peelamedu (Post), Coimbatore - 641004
                            </p>
                            <p style="font-size:12px">
                                Phone: off: 98422 95577 / 98430 63434. Mobile: 98422 95576 / 98422 95577 / 98429 19997
                            </p>
                            <p style="font-size:12px"> E-Mail: saicompressor4@gmail.com</p>
                            <p style="font-size:12px">TIN NO: 33382124231 CST NO: 1026733 Dt: 12-12-2022</p>
                        </div>
                    </td> --}}
                    {{-- <td>
                        <div class="logo">
                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('sai_baba.jpg'))) }}" alt="">
                        </div>
                    </td> --}}
                </tr>
            </table>



        </div>
        {{-- <div class="border_content">
            <p style="font-size:12px">MFRS: AIR RECEIVER BOREWELL, PNEUMATIC COMPRESSOR, DRIYER & ALL SERVICE STATION EQUIPMENTS</p>
        </div> --}}
        <table style="width:100%;border-collapse: collapse;">
            <td style="width:50%;text-align:right;width:50%;vertical-align:middle;padding:10px;">
                <div class="quotation" style="text-align: left;">
                    <p> Quotation: {{ $getproposal->quoteno }}</p>
                </div>
            </td>
            <td style="width:50%;text-align:right;width:50%;vertical-align:middle;padding:10px;">
                <div class="date" style="text-align:right;">
                    <p>Date: {{ date('d-m-Y', strtotime($getproposal->quotedate)); }}</p>
                </div>

            </td>
        </table>
        <table style="width:100%;border-collapse: collapse;">
            <tr>
                <td style="width:100%;text-align: left;vertical-align:middle;padding:10px;">
                    <div class="to">
                        To,
                        <p>{!! $getproposal->toaddress !!}
                        </p>
                    </div>

                </td>

            </tr>
        </table>



        <div class="sub">
            <p>Kind Attn : {{ $getproposal->kindattn }}</p>
            <br>
            <p style="text-align: center">SUB: {{ $getproposal->subject }}</p>
            {{-- <p>THANKYOU FOR YOUR INTEREST IN OUR PROJECT.</p> --}}
            {{-- <p>WE HEREBY MAKE YOU FOLLOWING OFFER</p> --}}
            <p style="text-align: center">We thank you very much for your valuable enquiry and the opportunity given to us be
                associated with you, Kindly find the below the best offer for your kind consideration</p>
        </div>
        <div class="table">
            <table style="width:100%">
                <tr>
                    <th>S No</th>
                    {{-- <th>PRODUCT</th> --}}
                    <th>Particulars</th>
                    <th>Qty</th>
                    <th>Rate</th>

                </tr>
                @if ($getproposalproducts)
                @php $i=1 @endphp
                    @foreach ($getproposalproducts as $products)
                    <tr>
                        <td>@php echo $i++; @endphp</td>
                        <td>
                            {{-- {{ $products->productname }} --}}
                            {{ $products->productdescription }}
                        </td>

                        <td> {{ $products->rate }}</td>
                        <td>{{ $products->qty }}</td>
                        {{-- <td>{{ number_format($products->price,2) }}</td> --}}
                    </tr>
                    @endforeach
                @endif

            </table>
        </div>
        <div class="conditions">
            <h3>Terms & Conditions :</h3>
            <ul style="margin-left:70px">
                <li><b>Payment</b> : {{ $getproposal->payment }}</li>
                <li><b>Delivery</b> : {{ $getproposal->delivery }}</li>
                <li><b>GST</b> : {{ $getproposal->taxes }}</li>
                <li>{{ $getproposal->validity }}</li>
            </ul>
            {{-- <table>
                <tr>
                    <th>TAXES</th>
                    <td>: {{ $getproposal->taxes }}</td>
                </tr>
                <tr>
                    <th>FREIGHT</th>
                    <td>: {{ $getproposal->freight }}</td>
                </tr>
                <tr>
                    <th>PAYMENT</th>
                    <td>: </td>
                </tr>
                <tr>
                    <th>DELIVERY</th>
                    <td>: {{ $getproposal->delivery }}</td>
                </tr>
                <tr>
                    <th>VALIDITY</th>
                    <td>: {{ $getproposal->validity }}</td>
                </tr>
            </table> --}}
            <!--<p>THANKING AND HOPING GOOD ORDER FROM YOU.</p>-->
            {{-- <p>THANKING AND HOPING GOOD ORDER FROM YOU.</p> --}}
            <p>We trust that the above offer in line to your requirements and looking forward to receive your valuable
                order.</p>
                <p>Thanking you and assuring the best service at all times
                </p>
        </div>

        <div class="yours">
            <p>Regards,</p>
            <p>G Ragupathy</p>
            <p>Sree Renuga Air Compressor,</p>
           <p>+91-9842295576</p>
        </div>
        <div class="bankdetails">
        <table  class="bankdetailstbl" >
            @if($bankdetails = App\Models\Bank_detail::where('id',$getproposal->bankid)->first())
            <tr>
                <td style="text-align:left">Account Name<td>
                <td style="text-align:left">: {{ $bankdetails->accountname }}<td>
            </tr>
            <tr>
                <td style="text-align:left">Account No<td>
                <td style="text-align:left">: {{ $bankdetails->accountnum }}<td>
            </tr>
            <tr>
                <td style="text-align:left">Bank Name<td>
                <td style="text-align:left">: {{ $bankdetails->bankname }}<td>
            </tr>
            <tr>
                <td style="text-align:left">Branch Name<td>
                <td style="text-align:left">: {{ $bankdetails->branch }}<td>
            </tr>
            <tr>
                <td style="text-align:left">IFSC Code<td>
                <td style="text-align:left">: {{ $bankdetails->ifsc }}<td>
            </tr>
            <tr>
                <td style="text-align:left">Account Type<td>
                <td style="text-align:left">: {{ $bankdetails->accountcode }}<td>
            </tr>
            @endif

        </table>
    </div>
    </div>
    <div class="bottomsection">
        <p style="text-align:center;color:#127237;font-size:12px;padding:5px 0px;border-top:2px solid #d2532c;border-bottom:2px solid #d2532c">MFRS : AIR RECEIVERS, AIR, BORE WELL, PNEUMATIC COMPRESSORS / AIR DRYER / ALL SERVICE STATION EQUIPMENTS</p>
    </div>
</body>

</html>
