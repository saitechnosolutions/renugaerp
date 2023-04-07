<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Salary Report</title>
    <link href="../assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="../assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="../plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="../assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../plugins/jquery-step/jquery.steps.css">
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="../plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="../plugins/table/datatable/dt-global_style.css">
    <link rel="stylesheet" type="text/css" href="../plugins/select2/select2.min.css">
    <link href="../assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    <script src="../plugins/sweetalerts/promise-polyfill.js"></script>
    <link href="../plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="../plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="../plugins/table/datatable/dt-global_style.css">
</head>
<body>
<style>
	td
	{
		border-style:solid;
		border-color:#ccc;
		font-size:13px;
		padding:3px;
		border-width:0.5px;

	}
</style>
<table style="width:100%" class="text-center">
    <tr style="text-align:center;">
        <td style="padding:10px 0px;font-weight:bold">SALARY PERIOD {{$monthyear}} </td>
    </tr>
</table>
<table id="html5-extension" class="table table-hover non-hover" style="width:100%">
	<thead style="font-weight:bold;">
        {{-- <tr>
            <td style="text-align:center" colspan="10">General Details</td>
            <td style="text-align:center" colspan="5">Earning</td>
            <td style="text-align:center" colspan="3">Deduction</td>
            <td style="text-align:center">Net Pay</td>
        </tr> --}}
		<tr>
			<td >Emp ID</td>
			<td >NAME</td>
            <td >Designation</td>
            <td >Fixed Salary</td>
			{{-- <td style="font-size:11px">TOTAL DAYS</td>
            <td style="font-size:11px">WORKING DAYS</td>
            <td style="font-size:11px">WEEK OF</td>
            <td style="font-size:11px">HOLIDAYS</td>
			<td style="font-size:11px">PRESENT DAY</td>
            <td style="font-size:11px">LEAVE DAYS</td>
			<td >OT HOUR</td>
			<td >OT SALARY</td> --}}
            <td >BASIC SALARY + DA</td>
            <td >HRA</td>
			<td >CA</td>
            <td >MA</td>
            <td >SA</td>
            <td style="font-size:11px">WORKING DAYS</td>
            <td>Festival / National Holidays</td>
            <td>CL</td>
            <td>LOP</td>
            <td>Paid Days</td>
            <td>Gross Salary</td>
            <td >EPF</td>
            <td >ESI</td>
            <td >CANTEEN</td>
            <td >LOAN</td>
            <td >ADVANCE</td>
            <td >OTHER DEDUCTION</td>
            <td >TOTAL DEDUCTION</td>
            <td >NET PAY</td>
			{{-- <td >TOTAL</td>
            <td >SIGN</td> --}}
		</tr>
	</thead>
    <tbody>
        @foreach ($salarygenerationemp as $salary)
        <tr>
            <td>{{$salary->emp_id}}</td>
            <td>{{$salary->name}}</td>
            <td>{{$salary->designation_2}}</td>
            <td>{{$salary->actualbasic}}</td>
            <td>{{$salary->basic_salary}}</td>
            <td>{{$salary->HRA}}</td>
            <td>{{$salary->Conveyance_allowance}}</td>
            <td>{{$salary->medica_allowance}}</td>
            <td>{{$salary->special_allowance}}</td>
            <td>{{$salary->salary_days}}</td>
            <td>{{$salary->govt_holidays}}</td>
            <td>{{$salary->CL}}</td>
            <td>{{$salary->Holidays}}</td>
            <td>{{$salary->Present_days}}</td>
            <td>{{$salary->GROSS_CR}}</td>
            <td>{{$salary->EPF}}</td>
            <td>{{$salary->ESI}}</td>
            <td>{{$salary->CANTEEN_DEDU}}</td>
            <td>{{$salary->LOANDEDN}}</td>
            <td>{{$salary->ADVANCE_DEDN}}</td>
            <td>{{$salary->OTH_MISC_DEDN}}</td>
            <td>{{$salary->GROSS_DR}}</td>
            <td>{{$salary->Net_pay}}</td>
        </tr>
        @endforeach

    </tbody>


</table>


</body>

<script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="../assets/js/custom.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="../plugins/apex/apexcharts.min.js"></script>
    <script src="../assets/js/dashboard/dash_1.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="../assets/js/scrollspyNav.js"></script>
    <script src="../plugins/jquery-step/jquery.steps.min.js"></script>
    <script src="../plugins/jquery-step/custom-jquery.steps.js"></script>
    <script src="../plugins/table/datatable/datatables.js"></script>
    <script src="../plugins/select2/select2.min.js"></script>
    <script src="../plugins/select2/custom-select2.js"></script>
    <script src="../assets/js/AjaxFunction.js"></script>
    <script src="../plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="../plugins/sweetalerts/custom-sweetalert.js"></script>
     <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
     <script src="../plugins/table/datatable/datatables.js"></script>
     <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
     <script src="../plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
     <script src="../plugins/table/datatable/button-ext/jszip.min.js"></script>
     <script src="../plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
     <script src="../plugins/table/datatable/button-ext/buttons.print.min.js"></script>
     <script>
        $('#html5-extension').DataTable( {
            "dom": "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
            buttons: {
                buttons: [
                    { extend: 'copy', className: 'btn btn-sm' },
                    { extend: 'csv', className: 'btn btn-sm' },
                    { extend: 'excel', className: 'btn btn-sm' },
                    { extend: 'print', className: 'btn btn-sm' }
                ]
            },
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        } );
    </script>
</html>
