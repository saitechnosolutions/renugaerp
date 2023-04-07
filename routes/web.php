<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CalandarController;
use App\Http\Controllers\CallupdateController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\createpurchaseOrder;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DriveController;
use App\Http\Controllers\DuplicateController;
use App\Http\Controllers\EmpFullreportController;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Monthwisefullreport;
use App\Http\Controllers\MonthwisereportController;
use App\Http\Controllers\PayslipController;
use App\Http\Controllers\PFController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\PurchaseItemController;
use App\Http\Controllers\QuotedproductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WorkingDaysController;
use App\Http\Controllers\PurchaseRequestController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\PurchaseEntryController;
use App\Http\Controllers\ApprovedproductController;

use Illuminate\Support\Facades\Http;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.login');
});



Route::view('add_product','pages.add_products');
Route::view('calendar','pages.calendar');
Route::view('emp_id','pages.idcard');
Route::view('notification','pages.notification');
// Route::view('user','pages.users');
Route::view('emp_report','pages.emp_report');
// Route::view('attendance','pages.attendance');
Route::view('month-wise-report','pages.month_wise_report');
Route::view('month-wise-full-report','pages.month_wise_full_report');
Route::view('salary-generation','pages.salary_generation');
Route::view('salary-report','pages.salary-report');
// Route::view('pay-slip','pages.pay-slip');
Route::view('estimate','pages.estimate');
Route::view('create-estimate','pages.create_estimate');
Route::view('invoice','pages.invoice');
Route::view('create-invoice','pages.create_invoice');
Route::view('customer-credit','pages.customer-credit');
Route::view('invoice-details','pages.invoice-details');
// Route::view('vendor','pages.vendor');
Route::view('create-vendor','pages.create-vendor');
Route::view('purchase','pages.purchase');
Route::view('create-purchase','pages.create-purchase');
Route::view('expense','pages.expense');
Route::view('create-expense','pages.create-expense');
Route::view('addCustomer','pages.add_customer');
Route::view('purchase-order','pages.purchase_order');
Route::view('purchase-entry','pages.purchase_entry');
// Route::view('create-purchase-order','pages.create_purchase_order');
Route::view('leads','pages.leads');
Route::view('leadview','pages.leadview');
Route::view('customsalaryreport2','pages.custom_salary_report2');
Route::view('salaryreport2','pages.salary_report2');

Route::resource('create-purchase-order',createpurchaseOrder::class);
Route::get('/GetPurreqid/{reqid}',[createpurchaseOrder::class,'getpurreq']);
Route::get('/Getrate/{desc}',[createpurchaseOrder::class,'getrate']);
Route::get('/Getsupplier/{supp}',[createpurchaseOrder::class,'getsupplier']);
Route::get('/GetSno/{desc}/{purreq}',[createpurchaseOrder::class,'getsno']);

Route::view('createpurchaserequest','pages.createpurchaserequest');

Route::resource('emp-full-report',EmpFullreportController::class);
Route::resource('user',UserController::class);
Route::get('getuser',[UserController::class,'getuser']);
Route::post('authenticate',[LoginController::class,'authenticate']);

Route::post('authenticate',[LoginController::class,'authenticate']);
Route::get('logout',[LoginController::class,'logout']);

Route::resource('employees',employeeController::class);

Route::get('emp_report',[employeeController::class,'emp_report']);
Route::get('restore_employees',[employeeController::class,'restore_employees']);
Route::get('restore/{empid}',[employeeController::class,'restore']);

Route::get('id_card',[employeeController::class,'id_card']);

Route::GET('getemp/{empid}',[employeeController::class,'getemp']);

Route::GET('getidcard/{empid}',[employeeController::class,'getidcard']);

Route::GET('deleteemp/{empid}',[employeeController::class,'deleteemp']);

Route::resource('company',CompanyController::class);

Route::POST('savecompany',[CompanyController::class,'savecompany']);

Route::resource('bankdetails',BankController::class);

Route::POST('savebank',[BankController::class,'savebank']);

Route::GET('empedit/{empid}',[employeeController::class,'empedit']);

Route::POST('updateemployee',[employeeController::class,'updateemployee']);

Route::resource('leads',LeadController::class);

Route::POST('savelead',[LeadController::class,'savelead']);
Route::POST('saveFollowup',[LeadController::class,'saveFollowup']);
Route::POST('leadstatus',[LeadController::class,'leadstatus']);
Route::POST('updatelead',[LeadController::class,'updatelead']);

Route::GET('deletelead/{leadid}',[LeadController::class,'deletelead']);
Route::GET('viewlead/{leadid}',[LeadController::class,'viewlead']);
Route::GET('leadedit/{leadid}',[LeadController::class,'leadedit']);

Route::POST('/getFilteration',[LeadController::class,'getFilteration']);

Route::POST('/getDateFilteration',[LeadController::class,'getDateFilteration']);

Route::POST('/sendMail',[MailController::class,'sendMail']);

Route::resource('callupdate',CallupdateController::class);

Route::POST('/getcallupdate',[CallupdateController::class,'getcallupdate']);
Route::POST('/getfilternotes',[CallupdateController::class,'getfilternotes']);

Route::resource('attendance',AttendanceController::class);

Route::POST('/getAttendance',[AttendanceController::class,'getAttendance']);

Route::POST('/getAttendanceFirst',[AttendanceController::class,'getAttendanceFirst']);

Route::POST('/getAttendanceSecond',[AttendanceController::class,'getAttendanceSecond']);
Route::POST('/getAttendanceTotal',[AttendanceController::class,'getAttendanceTotal']);
Route::POST('/getfilterattendance',[AttendanceController::class,'getfilterattendance']);

Route::POST('/importattendance',[AttendanceController::class,'importattendance']);
Route::POST('/importattendance2',[AttendanceController::class,'excelimportattendance']);
Route::POST('/attendancecalc',[AttendanceController::class,'attendancecalc']);

Route::resource('workingdays',WorkingDaysController::class);

Route::POST('/saveworkingdays',[WorkingDaysController::class,'saveworkingdays']);

Route::resource('month-wise-report',MonthwisereportController::class);
Route::resource('month-wise-full-report',Monthwisefullreport::class);
Route::POST('/monthwisereport',[MonthwisereportController::class,'monthwisereport']);
Route::POST('/monthwisefullreportfilter',[Monthwisefullreport::class,'monthwisefullreportfilter']);

Route::POST('/salarygenerate',[AttendanceController::class,'salarygenerate']);

Route::POST('/salarygenerateemployee',[AttendanceController::class,'salarygenerateemployee']);

Route::POST('/customsalarygenerateemployee',[AttendanceController::class,'customsalarygenerateemployee']);

Route::POST('/salaryReportgeneration',[AttendanceController::class,'salaryReportgeneration']);
Route::POST('/customsalaryReportgeneration',[AttendanceController::class,'customsalaryReportgeneration']);

Route::resource('payslip',PayslipController::class);

Route::POST('/generatepayslip',[PayslipController::class,'generatepayslip']);
Route::POST('/customgeneratepayslip',[PayslipController::class,'customgeneratepayslip']);

Route::POST('/updatesalarydetails',[AttendanceController::class,'updatesalarydetails']);

Route::resource('designation',DesignationController::class);
Route::POST('/savedesignation',[DesignationController::class,'savedesignation']);
Route::GET('/deletedesignation/{desig}',[DesignationController::class,'deletedesignation']);
Route::POST('/getpfdata',[DesignationController::class,'getpfdata']);
Route::POST('/attendanceentry',[AttendanceController::class,'attendanceentry']);

Route::resource('calendar',CalandarController::class);
Route::POST('/createCalandar',[CalandarController::class,'createCalandar']);
Route::POST('/leavechange',[CalandarController::class,'leavechange']);
Route::POST('/leavechangeholiday',[CalandarController::class,'leavechangeholiday']);

Route::POST('/leadassign',[LeadController::class,'leadassign']);

Route::POST('/customsalarygenerate',[AttendanceController::class,'customsalarygenerate']);

Route::POST('/getnotification',[Controller::class,'getnotification']);
Route::POST('/getnotification2',[Controller::class,'getnotification2']);

Route::resource('customer',CustomerController::class);

Route::POST('/getcountry',[CustomerController::class,'getcountry']);
Route::POST('/getcountry2',[CustomerController::class,'getcountry2']);
Route::POST('/getcity',[CustomerController::class,'getcity']);
Route::POST('/getcity2',[CustomerController::class,'getcity2']);
Route::POST('/copystate',[CustomerController::class,'copystate']);
Route::POST('/copycity',[CustomerController::class,'copycity']);
Route::POST('/saveCustomer',[CustomerController::class,'saveCustomer']);

Route::resource('drive',DriveController::class);
Route::POST('/createfolder',[DriveController::class,'createfolder']);
Route::POST('/fileupload',[DriveController::class,'fileupload']);
Route::POST('/filterdrive',[DriveController::class,'filterdrive']);
Route::resource('pfdata',PFController::class);
Route::POST('/updatepf',[PFController::class,'updatepf']);

Route::POST('/getuserdetails',[UserController::class,'getuserdetails']);
Route::POST('/updateuser',[UserController::class,'updateuser']);
Route::GET('/deleteuser/{id}',[UserController::class,'deleteuser']);
Route::POST('/getattendancedetails',[AttendanceController::class,'getattendancedetails']);
Route::POST('updateattendance',[AttendanceController::class,'updateattendance']);
Route::GET('/getworkingdays/{month}',[AttendanceController::class,'getworkingdays']);
Route::GET('/getpresentdays/{month}/{empid}',[AttendanceController::class,'getpresentdays']);

Route::GET('/getabsentdays/{month}/{empid}',[AttendanceController::class,'getabsentdays']);

Route::GET('/getholidays/{month}',[AttendanceController::class,'getholidays']);
Route::POST('updatecustomdetails',[AttendanceController::class,'updatecustomdetails']);

Route::POST('/empfullreport',[EmpFullreportController::class,'getreport']);
Route::GET('getindiamartlead',[LeadController::class,'getindiamartlead']);
Route::resource('/quotedproducts',QuotedproductController::class);
Route::POST('addquotedproduct',[QuotedproductController::class,'addquotedproduct']);
Route::POST('saveproposal',[ProposalController::class,'saveproposal']);
Route::resource('proposals',ProposalController::class);
Route::resource('duplicateleads',DuplicateController::class);
Route::resource('dashboard',DashboardController::class);
Route::GET('importindiamartleads',[LeadController::class,'importindiamartleads']);
Route::GET('getproductspec/{proid}',[LeadController::class,'getproductspec']);
Route::GET('getproductsize/{ltrs}/{protype}',[LeadController::class,'getproductsize']);
Route::GET('gettradeindialeads',[LeadController::class,'gettradeindialeads']);
Route::GET('deleteproduct/{delid}',[QuotedproductController::class,'deleteproduct']);
Route::resource('vendor',SupplierController::class);
Route::POST('savesupplier',[SupplierController::class,'savesupplier']);
Route::resource('purchaseitem',PurchaseItemController::class);
Route::POST('savepurchaseitem',[PurchaseItemController::class,'savepurchaseitem']);
Route::resource('purchaserequest',PurchaseRequestController::class);
Route::GET('getproductdesc/{id}',[PurchaseItemController::class,'getproductdesc']);
Route::POST('saverequest',[PurchaseItemController::class,'saverequest']);
Route::resource('purchaseorder',PurchaseOrderController::class);
Route::GET('getsupplierdesc/{suplierid}',[PurchaseItemController::class,'getsupplierdesc']);
Route::POST('savepurchaseorder',[PurchaseOrderController::class,'savepurchaseorder']);
Route::GET('getpodetails/{poid}',[PurchaseOrderController::class,'getpodetails']);
Route::GET('getpoproductdetails/{poid}',[PurchaseOrderController::class,'getpoproductdetails']);
Route::POST('savepurchaseentry',[PurchaseEntryController::class,'savepurchaseentry']);
Route::resource('purchaseentry',PurchaseEntryController::class);
Route::GET('supplieredit/{editid}',[SupplierController::class,'supplieredit']);
Route::POST('updatesupplier',[SupplierController::class,'updatesupplier']);
Route::GET('deletesupplier/{id}',[SupplierController::class,'deletesupplier']);
Route::GET('purchaseitemedit/{id}',[PurchaseItemController::class,'purchaseitemedit']);
Route::GET('deletepurchaseitem/{id}',[PurchaseItemController::class,'deletepurchaseitem']);
Route::POST('updatepurchaseitem',[PurchaseItemController::class,'updatepurchaseitem']);
Route::GET('deletepurchasereq/{id}',[PurchaseRequestController::class,'deletepurchasereq']);
Route::GET('viewrequestdetail/{id}',[PurchaseRequestController::class,'viewrequestdetail']);
Route::GET('editpurchaserequest/{id}',[PurchaseRequestController::class,'editpurchaserequest']);
Route::POST('updaterequest',[PurchaseRequestController::class,'updaterequest']);
Route::GET('editpurchaseorder/{id}',[PurchaseOrderController::class,'editpurchaseorder']);
Route::POST('updatepurchaseorder',[PurchaseOrderController::class,'updatepurchaseorder']);
ROute::GET('deletepurchaseorder/{id}',[PurchaseOrderController::class,'deletepurchaseorder']);
Route::GET('deletepurchaseentry/{id}',[PurchaseEntryController::class,'deletepurchaseentry']);
Route::GET('editpurchaseentry/{id}',[PurchaseEntryController::class,'editpurchaseentry']);
Route::POST('updatepurchaseentry',[PurchaseEntryController::class,'updatepurchaseentry']);
Route::GET('pending-stock/{id}',[PurchaseOrderController::class,'pendingstock']);
Route::GET('printpo/{id}',[PurchaseOrderController::class,'printpo']);
Route::GET('designationvalidation/{categorydesignation}',[DesignationController::class,'categorydesignation']);
Route::POST('saveemployee',[EmployeeController::class,'saveemployee']);
Route::GET('deletebank/{bankid}',[BankController::class,'deletebank']);
Route::GET('editbank/{bankid}',[BankController::class,'editbank']);
Route::POST('updatebank',[BankController::class,'updatebank']);
Route::POST('importleads',[LeadController::class,'importleads']);
Route::resource('approvedproduct',ApprovedproductController::class);
Route::POST('saveapproveproduct',[ApprovedproductController::class,'saveapproveproduct']);
Route::GET('deleteapproveproduct/{proid}',[ApprovedproductController::class,'deleteproduct']);
