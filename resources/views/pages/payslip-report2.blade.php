<html>

<head>
    <title>Payslip-report</title>
</head>

<body>

            <table style="border-top:1px solid black;border-right:1px solid black;border-left:1px solid black;width:100%">
                <tr>
                    <td style="padding:30px">
                        <img src="images/{{$company->company_logo}}" style="float:left;width:250px" >
                        <h3 style="text-align:center;font-size:25px;font-weight:bold;margin-top:25px;margin-bottom:10px">{{$company->companyname}}</h3>
                        <h3 style="text-align:center;font-size:15px;font-weight:300;margin-top:15px;margin-bottom:10px">{{$company->address}}
                        </h3>

                    </td>
                </tr>
                <tr>
                    <td><h3 style="text-align:center;font-size:18px;font-weight:bold">PAY SLIP FOR THE MONTH OF <span style="text-transform:uppercase;">{{$month}}</span></h3></td>
                </tr>
            </table>


            <table style="border-collapse:collapse;border-top:1px solid black;border-right:1px solid black;border-left:1px solid black;width:100%">
                <tr>
                    <th style="border-right:1px solid black;text-align:left;width:16.6%;padding:10px 10px;border-bottom:1px solid black">Employee Name</th>
                    <td style="width:16.6%;padding:10px 10px;border-right:1px solid black;border-bottom:1px solid black">{{$salarygenerationemp->name}}</td>
                    <th style="text-align:left;width:16.6%;padding:10px 10px;border-right:1px solid black;border-bottom:1px solid black">Total Work Days</th>
                    <td style="width:16.6%;padding:10px 10px;border-bottom:1px solid black">{{$salarygenerationemp->Total_days}}</td>
                </tr>
                <tr>
                    <th style="text-align:left;width:16.6%;padding:10px 10px;border-bottom:1px solid black;border-right:1px solid black;">Employee ID</th>
                    <td style="width:16.6%;padding:10px 10px;border-bottom:1px solid black;border-right:1px solid black;">{{$salarygenerationemp->emp_id}}</td>
                    <th style="text-align:left;width:16.6%;padding:10px 10px;border-bottom:1px solid black;border-right:1px solid black;">LOP Days</th>
                    <td style="width:16.6%;padding:10px 10px;border-bottom:1px solid black">{{$salarygenerationemp->Holidays}}</td>
                </tr>
                <tr>
                    <th style="text-align:left;width:16.6%;padding:10px 10px;border-bottom:1px solid black;border-right:1px solid black;">Designation </th>
                    <td style="width:16.6%;padding:10px 10px;border-bottom:1px solid black;border-right:1px solid black;">{{$salarygenerationemp->designation_2}}</td>
                    <th style="text-align:left;width:16.6%;padding:10px 10px;border-bottom:1px solid black;border-right:1px solid black;">Paid Days</th>
                    <td style="width:16.6%;padding:10px 10px;border-bottom:1px solid black">{{$salarygenerationemp->salary_days}}</td>
                </tr>
                <tr>
                    <th style="text-align:left;width:16.6%;padding:10px 10px;border-bottom:1px solid black;border-right:1px solid black;">Department</th>
                    <td style="width:16.6%;padding:10px 10px;border-bottom:1px solid black;border-right:1px solid black;">{{$salarygenerationemp->designation}}</td>
                    <th style="text-align:left;width:16.6%;padding:10px 10px;border-bottom:1px solid black;border-right:1px solid black;">Bank Name</th>
                    <td style="width:16.6%;padding:10px 10px;border-bottom:1px solid black">
                        @if ($salarygenerationemp->bank_name != '')
                            {{$salarygenerationemp->bank_name}}
                            @else
                            -
                        @endif
                    </td>

                </tr>
                <tr>
                    <th style="text-align:left;width:16.6%;padding:10px 10px;border-right:1px solid black;">Gross Salary</th>
                    <td style="width:16.6%;padding:10px 10px;border-right:1px solid black;">{{$salarygenerationemp->actualbasic}}</td>
                    <th style="text-align:left;width:16.6%;padding:10px 10px;border-right:1px solid black;">Bank A/C No</th>
                    <td style="width:16.6%;padding:10px 10px;border-right:1px solid black;">
                        @if ($salarygenerationemp->account_num != '')
                            {{$salarygenerationemp->account_num}}
                            @else
                            -
                        @endif
                    </td>

                </tr>
            </table>
            <table cellspacing="0" style="border-top:1px solid black;border-right:1px solid black;border-left:1px solid black;width:100%">
                <thead>
                    <tr>
                        <th colspan="2" style="padding:10px 10px;font-weight:bold">Earnings</th>
                        <th colspan="2">Deduction</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <th style="text-align:left;width:25%;border-top:1px solid black;padding:3px;border-right:1px solid black;border-bottom:1px solid black">Basic Salary</th>
                        <th style="text-align:left;width:25%;border-top:1px solid black;border-right:1px solid black;border-bottom:1px solid black">{{round($salarygenerationemp->basic_salary,0)}}</th>
                        <th style="text-align:left;width:25%;border-top:1px solid black;border-right:1px solid black;border-bottom:1px solid black">EPF</th>
                        <th style="text-align:left;width:25%;border-top:1px solid black;border-bottom:1px solid black">{{round($salarygenerationemp->EPF)}}</th>
                    </tr>
                    <tr>
                        <th style="text-align:left;border-right:1px solid black;padding:3px;border-bottom:1px solid black">House Rent Allowances</th>
                        <td style="text-align:left;border-right:1px solid black;padding:3px;border-bottom:1px solid black">{{round($salarygenerationemp->HRA,0)}}</td>
                        <th style="text-align:left;border-right:1px solid black;padding:3px;border-bottom:1px solid black">Health Insurance/ESI</th>
                        <th style="text-align:left;padding:3px;border-bottom:1px solid black">{{round($salarygenerationemp->ESI,0)}}</th>
                    </tr>
                    <tr>
                        <th style="text-align:left;border-right:1px solid black;padding:3px;border-bottom:1px solid black">Conveyance Allowances</th>
                        <td style="text-align:left;border-right:1px solid black;padding:3px;border-bottom:1px solid black">{{round($salarygenerationemp->Conveyance_allowance,0)}}</td>
                        <th style="text-align:left;border-right:1px solid black;padding:3px;border-bottom:1px solid black">Professional Tax</th>
                        <th style="text-align:left;padding:3px;border-bottom:1px solid black">0</th>
                    </tr>
                    <tr>
                        <th style="text-align:left;border-right:1px solid black;padding:3px;border-bottom:1px solid black">Medical Allowances</th>
                        <td style="text-align:left;border-right:1px solid black;padding:3px;border-bottom:1px solid black">{{round($salarygenerationemp->medica_allowance,0)}}</td>
                        <th style="text-align:left;border-right:1px solid black;padding:3px;border-bottom:1px solid black">Canteen</th>
                        <th style="text-align:left;padding:3px;border-bottom:1px solid black">{{$salarygenerationemp->OTH_MISC_DEDN}}</th>
                    </tr>

                    <tr>
                        <th style="text-align:left;border-right:1px solid black;padding:3px;border-bottom:1px solid black">Special Allowances</th>
                        <td style="text-align:left;border-right:1px solid black;padding:3px;border-bottom:1px solid black">{{round($salarygenerationemp->special_allowance,0)}}</td>
                        <td style="text-align:left;border-right:1px solid black;padding:3px;border-bottom:1px solid black"></td>
                        <th style="text-align:left;padding:3px;border-bottom:1px solid black"></th>
                    </tr>
                    {{-- <tr>
                        <th style="text-align:left;border-right:1px solid black;padding:3px;border-bottom:1px solid black">OT Amt</th>
                        <td style="text-align:left;border-right:1px solid black;padding:3px;border-bottom:1px solid black">{{$salarygenerationemp->OT_AMT}}</td>
                        <td style="text-align:left;border-right:1px solid black;padding:3px;border-bottom:1px solid black"></td>
                        <th style="text-align:left;padding:3px;border-bottom:1px solid black"></th>
                    </tr> --}}

                    <tr>
                        <th style="text-align:left;padding:3px;border-right:1px solid black;border-bottom:1px solid black">Gross Salary</th>
                        <td style="text-align:left;padding:3px;border-bottom:1px solid black;border-right:1px solid black;">{{round($salarygenerationemp->GROSS_CR,0)}}</td>
                        <th style="text-align:left;padding:3px;border-bottom:1px solid black;border-right:1px solid black;">Total Deductions</th>
                        <th style="text-align:left;padding:3px;border-bottom:1px solid black">{{round($desuc,0)}}</th>
                    </tr>

                    <tr>
                        <th colspan="3" style="text-align:left;border-right:1px solid black;padding:3px;border-bottom:1px solid black">Net Pay</th>


                        <th style="text-align:left;padding:3px;border-bottom:1px solid black">{{round($salarygenerationemp->Net_pay,0)}}</th>
                    </tr>

                    {{-- <tr>
                        <th style="text-align:left;border-right:1px solid black;padding:3px;border-bottom:1px solid black">Amount in words</th>
                        <td colspan="3" style="text-align:right;border-right:1px solid black;padding:3px;border-bottom:1px solid black"></td>
                    </tr> --}}
                </tbody>

            </table>


</body>

</html>

{{-- <script>
    window.print();
</script> --}}
