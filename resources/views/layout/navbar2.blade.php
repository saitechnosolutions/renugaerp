{{-- <li class="menu">
    <a href="/dashboard" aria-expanded="true" >
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
            <span>Dashboard</span>
        </div>
        <div>

        </div>
    </a>

</li> --}}

<li class="menu">
    <a href="/dashboard" aria-expanded="false" class="dropdown-toggle" @if(Request::segment(1) == 'dashboard')  data-active="true" @else  @endif>
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
            <span>Dashboard</span>
        </div>
    </a>
</li>
{{-- <img src="https://static.wixstatic.com/media/83c6c9_3137595c76c84dc5bb7a65884cb67432~mv2.gif" id="loadinimg"> --}}
{{-- @if(Auth::user()->Products == '' && Auth::user()->Services == '' && Auth::user()->Services == '')

    @else

    <li class="menu">
        <a href="#app" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                <span>Master</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </div>
        </a>
        <ul class="collapse submenu list-unstyled" id="app" data-parent="#accordionExample">
            @if(Auth::user()->Products == '')
                @else
                <li >
                    <a href="/add_product" > Products  </a>
                </li>
            @endif

            @if(Auth::user()->Customers == '')
                @else
                <li>
                    <a href="/customer"> Customer  </a>
                </li>
            @endif

            @if(Auth::user()->Services == '')
                @else
                <li>
                    <a href=""> Services  </a>
                </li>
            @endif



        </ul>
    </li>
@endif --}}


@if (Auth::user()->addemployee == '' && Auth::user()->idcard == '' && Auth::user()->empreport == '' && Auth::user()->empcategory == '' && Auth::user()->pfdata == '')

    @else
    <li class="menu">
        <a href="#appp1" data-toggle="collapse"  aria-expanded="false" class="dropdown-toggle" @if(Request::segment(1) == 'employees' || Request::segment(1) == 'empedit' || Request::segment(1) == 'id_card' || Request::segment(1) == 'emp_report' || Request::segment(1) == 'designation' || Request::segment(1) == 'pfdata')   data-active="true" @else  @endif>
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                <span>Payroll Master</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </div>
        </a>
        <ul class="collapse submenu list-unstyled" id="appp1" data-parent="#accordionExample">
            @if(Auth::user()->addemployee == '')
                @else
                <li>
                    <a href="/employees"> Add Employee </a>
                </li>
            @endif

            @if(Auth::user()->idcard == '')
                @else
                <li>
                    <a href="/id_card"> ID card </a>
                </li>
            @endif

            @if(Auth::user()->empreport == '')
                @else
                <li>
                    <a href="/emp_report"> Employee Report  </a>
                </li>
            @endif

            @if(Auth::user()->empcategory == '')
                @else
                <li>
                    <a href="/designation"> Employee Category  </a>
                </li>
            @endif

            @if(Auth::user()->pfdata == '')
                @else
                <li>
                    <a href="/pfdata"> PF Data  </a>
                </li>
            @endif


            {{-- <li>
                <a href="/calendar"> Other Advance Entry </a>
            </li>
            <li>
                <a href="/calendar"> Employee Asset Details </a>
            </li>
            <li>
                <a href="/calendar"> Employee Asset Return </a>
            </li> --}}

        </ul>
    </li>
@endif

@if(Auth::user()->adduser == '')
    @else
    <li class="menu">
        <a href="#app12" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" @if(Request::segment(1) == 'user')   data-active="true" @else  @endif>
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                <span>User</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </div>
        </a>
        <ul class="collapse submenu list-unstyled" id="app12" data-parent="#accordionExample">
            <li @if(Request::segment(1) == 'user')  data-active="true" @else  @endif>
                <a href="/user"> Add User </a>
            </li>
        </ul>
    </li>
@endif


@if (Auth::user()->calendar == '' && Auth::user()->attendanceentry == '' && Auth::user()->monthwisereport == '' && Auth::user()->monthwisereportfull == '')

@else
<li class="menu">
    <a href="#app4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" @if(Request::segment(1) == 'calendar' || Request::segment(1) == 'attendance' || Request::segment(1) == 'month-wise-report' || Request::segment(1) == 'month-wise-full-report' || Request::segment(1) == 'emp-full-report')   data-active="true" @else  @endif>
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
            <span>Attendance</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>
    <ul class="collapse submenu list-unstyled" id="app4" data-parent="#accordionExample">
        {{-- <li>
            <a href="/workingdays"> Working Days </a>
        </li> --}}

        @if(Auth::user()->calendar == '')
            @else
            <li>
                <a href="/calendar"> Calendar </a>
            </li>
        @endif

        @if(Auth::user()->attendanceentry == '')

        @else
        <li>
            <a href="/attendance"> Attendance Entry </a>
        </li>
        @endif

        @if(Auth::user()->monthwisereport == '')
            @else
            <li>
                <a href="/month-wise-report"> Monthwise Report </a>
            </li>
        @endif

        @if(Auth::user()->monthwisereportfull == '')

            @else
            <li>
                <a href="/month-wise-full-report"> Monthwise Full Report </a>
            </li>
            <li>
                <a href="/emp-full-report"> Employee Full Report </a>
            </li>
        @endif


    </ul>
</li>

@endif

@if(Auth::user()->salarygen == '' && Auth::user()->salaryreport == '' && Auth::user()->payslip == '')

    @else
    <li class="menu">
        <a href="#app5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" @if(Request::segment(1) == 'salary-generation' || Request::segment(1) == 'salary-report' || Request::segment(1) == 'payslip')   data-active="true" @else  @endif>
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg>
                <span>Salary</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </div>
        </a>
        <ul class="collapse submenu list-unstyled" id="app5" data-parent="#accordionExample">
            @if(Auth::user()->salarygen == '')
            @else
            <li>
                <a href="/salary-generation"> Salary Generation </a>
            </li>
            @endif

            @if(Auth::user()->salaryreport == '')
                @else
                <li>
                    <a href="/salary-report"> Salary Report </a>
                </li>
            @endif

            @if(Auth::user()->payslip == '')
                @else
                <li>
                    <a href="/payslip"> PaySlip </a>
                </li>
            @endif

        </ul>
    </li>
@endif

@if(Auth::user()->companydetails == '' && Auth::user()->bankdetails == '')
    @else
    <li class="menu">
        <a href="#app6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" @if(Request::segment(1) == 'company' || Request::segment(1) == 'bankdetails')   data-active="true" @else  @endif>
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                <span>Settings</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </div>
        </a>
        <ul class="collapse submenu list-unstyled" id="app6" data-parent="#accordionExample">
            @if(Auth::user()->companydetails == '' && Auth::user()->bankdetails == '')
                @else
                @if(Auth::user()->companydetails == '')
                    @else
                    <li>
                        <a href="/company"> Company Details </a>
                    </li>
                @endif

                @if(Auth::user()->bankdetails == '')
                    @else
                    <li>
                        <a href="/bankdetails"> Bank Details </a>
                    </li>
                @endif


            @endif


        </ul>
    </li>
@endif

@if(Auth::user()->estimate == '' && Auth::user()->invoice == '' && Auth::user()->customercredit == '')
@else
{{-- <li class="menu">
    <a href="#app7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
            <span>Sales</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>

    <ul class="collapse submenu list-unstyled" id="app7" data-parent="#accordionExample">
        @if(Auth::user()->estimate == '')
            @else
            <li>
                <a href="/estimate"> Estimate </a>
            </li>
        @endif

        @if(Auth::user()->invoice == '')
            @else
            <li>
                <a href="/invoice"> Invoice </a>
            </li>
        @endif

        @if(Auth::user()->customercredit == '')
            @else
            <li>
                <a href="/customer-credit"> Customer Credit </a>
            </li>
        @endif



    </ul>
</li> --}}
@endif


@if(Auth::user()->Vendor == '' && Auth::user()->purchaseentry == '' && Auth::user()->expense == '' && Auth::user()->purchaseorder == '')
    @else
    <li class="menu">
        <a href="#app8" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" @if(Request::segment(1) == 'vendor' || Request::segment(1)=='create-purchase-order' || Request::segment(1) == 'purchaseitem' || Request::segment(1) == 'purchaserequest' || Request::segment(1) == 'purchaseorder' || Request::segment(1) == 'purchaseentry' || Request::segment(1) == 'purchaseentry')  data-active="true" @else  @endif>
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
                <span>Purchase</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </div>
        </a>
        <ul class="collapse submenu list-unstyled" id="app8" data-parent="#accordionExample">
            @if(Auth::user()->Vendor == '')
                @else
                <li>
                    <a href="/vendor"> Suppliers </a>
                </li>
            @endif
            @if(Auth::user()->purchaseentry == '')
                @else
                <li>
                    <a href="/purchaseitem"> Product Desc </a>
                </li>
            @endif


            @if(Auth::user()->expense == '')
                @else
                <li>
                    <a href="/purchaserequest"> Purchase Request </a>
                </li>
            @endif

            @if(Auth::user()->purchaseorder == '')
                @else
                <li>
                    <a href="/purchaseorder"> Purchase Order </a>
                </li>
            @endif
            @if(Auth::user()->purchaseorder == '')
                @else
                <li>
                    <a href="/purchaseentry"> Purchase Entry </a>
                </li>
            @endif




        </ul>
    </li>
@endif

{{-- @if(Auth::user()->invoicereport == '' && Auth::user()->incomereport == '' && Auth::user()->purchasereport == '' && Auth::user()->estimatereport == '' && Auth::user()->expensereport == '')
    @else
    <li class="menu">
        <a href="#app9" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                <span>Reports</span>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </div>
        </a>
        <ul class="collapse submenu list-unstyled" id="app9" data-parent="#accordionExample">
            @if(Auth::user()->invoicereport == '')
                @else
                <li>
                    <a href="/invoice"> Invoice Report </a>
                </li>
            @endif

            @if(Auth::user()->incomereport == '')
                @else
                <li>
                    <a href="#"> Income Report </a>
                </li>
            @endif

            @if(Auth::user()->purchasereport == '')
                @else
                <li>
                    <a href="#"> Purchase Report </a>
                </li>
            @endif

            @if(Auth::user()->estimatereport == '')
                @else
                <li>
                    <a href="#"> Estimate Report </a>
                </li>
            @endif

            @if(Auth::user()->expensereport == '')
                @else
                <li>
                    <a href="#"> Expense Report </a>
                </li>
            @endif



        </ul>
    </li>
@endif --}}

@if(Auth::user()->leadgen == '')
    @else
    <li class="menu">
        <a href="/leads" aria-expanded="false" class="dropdown-toggle" @if(Request::segment(1) == 'leads')  data-active="true" @else  @endif>
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                <span>Leads</span>
            </div>
        </a>
    </li>
@endif

@if(Auth::user()->leadgen == '')
    @else

    <li class="menu">
        <a href="/quotedproducts" aria-expanded="false"  class="dropdown-toggle" @if(Request::segment(1) == 'quotedproducts')  data-active="true" @else  @endif>
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                <span>Quoted Products</span>
            </div>
        </a>
    </li>
    {{-- <li class="menu">
        <a href="/duplicateleads" aria-expanded="false" class="dropdown-toggle">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                <span>Duplicate Leads</span>
            </div>
        </a>
    </li> --}}



@endif

@if(Auth::user()->callupdate == '')
    @else
    <li class="menu">
        <a href="/callupdate" aria-expanded="false" class="dropdown-toggle" @if(Request::segment(1) == 'callupdate')  data-active="true" @else  @endif>
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                <span>Call Update</span>
            </div>
        </a>
    </li>
@endif

@if(Auth::user()->proposal == '')
    @else
    <li class="menu">
        <a href="/proposals" aria-expanded="false" class="dropdown-toggle" @if(Request::segment(1) == 'proposals')  data-active="true" @else  @endif>
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                <span>Proposal</span>
            </div>
        </a>
    </li>
@endif

@if(Auth::user()->drive == '')
    @else
    {{-- <li class="menu">
        <a href="/drive" aria-expanded="false" class="dropdown-toggle" @if(Request::segment(1) == 'drive')  data-active="true" @else  @endif>
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-move"><polyline points="5 9 2 12 5 15"></polyline><polyline points="9 5 12 2 15 5"></polyline><polyline points="15 19 12 22 9 19"></polyline><polyline points="19 9 22 12 19 15"></polyline><line x1="2" y1="12" x2="22" y2="12"></line><line x1="12" y1="2" x2="12" y2="22"></line></svg>
                <span>Drive</span>
            </div>
        </a>
    </li> --}}
@endif



<li class="menu">
    <a href="#app8" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" @if(Request::segment(1) == 'vendor' || Request::segment(1)=='create-purchase-order' || Request::segment(1) == 'purchaseitem' || Request::segment(1) == 'purchaserequest' || Request::segment(1) == 'purchaseorder' || Request::segment(1) == 'purchaseentry' || Request::segment(1) == 'purchaseentry')  data-active="true" @else  @endif>
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
            <span>Purchase</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>
    <ul class="collapse submenu list-unstyled" id="app8" data-parent="#accordionExample">
        @if(Auth::user()->Vendor == '')
            @else
            <li>
                <a href="/vendor"> Suppliers </a>
            </li>
        @endif
        @if(Auth::user()->purchaseentry == '')
            @else
            <li>
                <a href="/purchaseitem"> Product Desc </a>
            </li>
        @endif


        @if(Auth::user()->expense == '')
            @else
            <li>
                <a href="/purchaserequest"> Purchase Request </a>
            </li>
        @endif

        @if(Auth::user()->purchaseorder == '')
            @else
            <li>
                <a href="/purchaseorder"> Purchase Order </a>
            </li>
        @endif
        @if(Auth::user()->purchaseorder == '')
            @else
            <li>
                <a href="/purchaseentry"> Purchase Entry </a>
            </li>
        @endif

    </ul>
</li>
{{-- <li class="menu">
    <a href="#app12" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle" @if(Request::segment(1) == 'user')   data-active="true" @else  @endif>
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
            <span>User</span>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>
    </a>
    <ul class="collapse submenu list-unstyled" id="app12" data-parent="#accordionExample">
        <li @if(Request::segment(1) == 'user')  data-active="true" @else  @endif>
            <a href="/user"> Add User </a>
        </li>
    </ul>
</li> --}}
<li class="menu">
    <a href="/drive" aria-expanded="false" class="dropdown-toggle" @if(Request::segment(1) == 'drive')  data-active="true" @else  @endif>
        <div class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-move"><polyline points="5 9 2 12 5 15"></polyline><polyline points="9 5 12 2 15 5"></polyline><polyline points="15 19 12 22 9 19"></polyline><polyline points="19 9 22 12 19 15"></polyline><line x1="2" y1="12" x2="22" y2="12"></line><line x1="12" y1="2" x2="12" y2="22"></line></svg>
            <span>Drive</span>
        </div>
    </a>
</li>

