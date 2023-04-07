<html>

<head>
    <title>Salary Slip</title>
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
                    <td><h3 style="text-align:center;font-size:18px;font-weight:bold">PAY SLIP FOR THE MONTH OF <span style="text-transform:uppercase;">{{$period}}</span></h3></td>
                </tr>
            </table>

            <table style="border-collapse: collapse;border-bottom:1px solid black;border-top:1px solid black;border-right:1px solid black;border-left:1px solid black;width:100%">
                <tr>
                    <th style="border-bottom:1px solid black;border-right:1px solid black;text-align:left;width:16.6%;padding:10px 10px">Staff No</th>
                    <td style="border-bottom:1px solid black;width:16.6%;padding:10px 10px;border-right:1px solid black;text-align:right">{{$salarygenerationemp->emp_id}}</td>
                    <th style="border-bottom:1px solid black;text-align:left;width:16.6%;padding:10px 10px;border-right:1px solid black;">Staff Name</th>
                    <td style="border-bottom:1px solid black;width:16.6%;padding:10px 10px;text-align:right">{{$salarygenerationemp->name}}</td>
                </tr>
                <tr>
                    <th style="border-bottom:1px solid black;border-right:1px solid black;text-align:left;width:16.6%;padding:10px 10px">Designation </th>
                    <td style="border-bottom:1px solid black;border-right:1px solid black;width:16.6%;padding:10px 10px;text-align:right">{{$salarygenerationemp->designation}}</td>

                    <th style="border-bottom:1px solid black;border-right:1px solid black;text-align:left;width:16.6%;padding:10px 10px">Salary Period</th>
                    <td style="border-bottom:1px solid black;width:16.6%;padding:10px 10px;text-align:right">{{$period}}</td>
                </tr>
                <tr>
                    <th style="border-bottom:1px solid black;border-right:1px solid black;text-align:left;width:16.6%;padding:10px 10px">Deduction </th>
                    <td style="border-bottom:1px solid black;border-right:1px solid black;width:16.6%;padding:10px 10px;text-align:right">{{$salarygenerationemp->OTH_MISC_DEDN}}</td>

                    <th style="border-bottom:1px solid black;border-right:1px solid black;text-align:left;width:16.6%;padding:10px 10px">Total Work Days</th>
                    <td style="border-bottom:1px solid black;width:16.6%;padding:10px 10px;text-align:right">{{$salarygenerationemp->Total_days}}</td>
                </tr>
                <tr>
                    <th style="border-bottom:1px solid black;border-right:1px solid black;text-align:left;width:16.6%;padding:10px 10px">OT </th>
                    <td style="border-bottom:1px solid black;border-right:1px solid black;width:16.6%;padding:10px 10px;text-align:right">{{$salarygenerationemp->OT_AMT}}</td>

                    <th style="border-bottom:1px solid black;border-right:1px solid black;text-align:left;width:16.6%;padding:10px 10px">One Day Salary</th>
                    <td style="border-bottom:1px solid black;width:16.6%;padding:10px 10px;text-align:right">{{$salarygenerationemp->daily_salary}}</td>
                </tr>
                <tr>
                    <th style="border-bottom:1px solid black;border-right:1px solid black;text-align:left;width:16.6%;padding:10px 10px">PF </th>
                    <td style="border-bottom:1px solid black;border-right:1px solid black;width:16.6%;padding:10px 10px;text-align:right">0</td>

                    <th style="border-right:1px solid black;border-bottom:1px solid black;text-align:left;width:16.6%;padding:10px 10px">Salary Days</th>
                    <td style="border-bottom:1px solid black;width:16.6%;padding:10px 10px;border-bottom;text-align:right">{{$salarygenerationemp->salary_days}}</td>
                </tr>
                <tr>
                    <th style="border-right:1px solid black;text-align:left;width:16.6%;padding:10px 10px">ESI</th>
                    <td style="border-right:1px solid black;width:16.6%;padding:10px 10px;text-align:right">0</td>

                    <th style="border-right:1px solid black;text-align:left;width:16.6%;padding:10px 10px">Net Pay</th>
                    <td style="width:16.6%;padding:10px 10px;text-align:right">{{$salarygenerationemp->Net_pay}}</td>
                </tr>
            </table>
</body>
