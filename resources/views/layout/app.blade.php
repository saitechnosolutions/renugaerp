<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <link href="../assets/css/loader.css" rel="stylesheet" type="text/css" />
    <script src="../assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="../plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="../assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../plugins/jquery-step/jquery.steps.css">
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="../plugins/table/datatable/datatables.css">
    <link rel="stylesheet" type="text/css" href="../plugins/table/datatable/dt-global_style.css">
    {{-- <link rel="stylesheet" type="text/css" href="/plugins/select2/select2.min.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="../assets/css/tables/table-basic.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/animate/animate.css" rel="stylesheet" type="text/css" />
    {{-- <script src="../plugins/sweetalerts/promise-polyfill.js"></script>
    <link href="../plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/sweetalerts/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/components/custom-sweetalert.css" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}


    <link rel="stylesheet" type="text/css" href="../plugins/table/datatable/custom_dt_html5.css">
    <link rel="stylesheet" type="text/css" href="../plugins/table/datatable/dt-global_style.css">
    <link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>

    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- END PAGE LEVEL STYLES -->
    <style>
        #formValidate .wizard > .content {min-height: 25em;}
        #example-vertical.wizard > .content {min-height: 24.5em;}
    </style>
</head>
<body>
    <!-- BEGIN LOADER -->
    <div id="responseloader">
        <img src="/images/preload.gif" class="preloadimg img-fluid">
    </div>
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">

            <ul class="navbar-item theme-brand flex-row  text-center">
                {{-- <li class="nav-item theme-logo">
                    <a href="/dashboard">
                        <img src="assets/img/90x90.jpg" class="navbar-logo" alt="logo">
                    </a>
                </li> --}}
                <li class="nav-item theme-text">
                    <a href="/dashboard" style="color:#fff" class="nav-link"> RAC - ERP </a>
                </li>
            </ul>
             <a href="javascript:void(0);" style="color:#fff" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>


            <ul class="navbar-item flex-row ml-md-auto">
                <li class="nav-item" style="color: #ffffff;font-weight:bold;font-size:20px">{{ Auth::user()->name }}</li>
                <li class="nav-item dropdown notification-dropdown" >
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{-- <span style="background-color:#fff;padding:5px">25</span> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                        <span class="badge badge-success" style="border:0px;background-color:#fff;width:20px;height:20px">
                            <p style="color:#000;font-weight:bold">{{$notificationcount1}}</p>
                        </span>
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="notificationDropdown">
                        <div class="notification-scroll" style="overflow-y:scroll">



                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown user-profile-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <img src="https://www.freeiconspng.com/thumbs/shutdown-icon/shutdown-icon-26.png" alt="avatar">
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="">

                            <div class="dropdown-item">
                                {{-- {{auth()->user()->name}} --}}
                                <a class="" href="/logout"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> Sign Out</a>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN NAVBAR  -->

    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">

            <nav id="sidebar">
                {{-- <div class="shadow-bottom"></div> --}}
                <ul class="list-unstyled menu-categories" id="accordionExample">


                    @include('layout.navbar');

                </ul>

            </nav>

        </div>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->

        <div id="content" class="main-content">
            @section('main-content')

            @show

            @include('layout.footer');
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="../assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/app.js"></script>
    {{-- <script src="plugins/select2/select2.min.js"></script>
    <script src="plugins/select2/custom-select2.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
    {{-- <script src="../plugins/select2/select2.min.js"></script>
    <script src="../plugins/select2/custom-select2.js"></script> --}}
    <script src="../assets/js/AjaxFunction.js"></script>
    {{-- <script src="../plugins/sweetalerts/sweetalert2.min.js"></script>
    <script src="../plugins/sweetalerts/custom-sweetalert.js"></script> --}}
     <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
     <script src="../plugins/table/datatable/datatables.js"></script>
     <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
     <script src="../plugins/table/datatable/button-ext/dataTables.buttons.min.js"></script>
     <script src="../plugins/table/datatable/button-ext/jszip.min.js"></script>
     <script src="../plugins/table/datatable/button-ext/buttons.html5.min.js"></script>
     <script src="../plugins/table/datatable/button-ext/buttons.print.min.js"></script>
     <script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}




</body>
</html>

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
        "pageLength": 10
    } );
</script>
<script>
    $(document).ready(function() {
        var html =
   '<tr><td><input class="form-control f_name1" placeholder="Name" type="text" name="f_name[]" id="f_name1"></td><td><input placeholder="Relation" class="form-control" type="text" name="f_relation[]"></td><td><input placeholder="Mobile Number" class="form-control" type="text" name="f_mobile[]"></td><td><button class="btn btn-danger remove">X</button></td></tr>';
    $(document).on('click', '#addProduct1', function() {
//    alert("Hellow");


   $('#app1').append(html);
//    alert($("#app1").val())
});

$(document).on('click', '.remove', function() {
   $(this).parents('tr').remove();
});

    });
    $(document).ready(function(){

        fetchUser();

        function fetchUser()
        {
            $.ajax({
                type:'GET',
                url:'/getuser',
                dataType:'json',
                success: function(response){
                    // console.log(response.users)
                    $('.userTable tbody').html("");
                    $.each(response.users,function(key, item){
                        $('.userTable tbody').append(
                            '<tr>\
                            <td>'+item.id+'</td>\
                             <td>'+item.name+'</td>\
                             <td>'+item.password+'</td>\
                             <td>'+item.roll+'</td>\
                             <td>\
                                 <button class="btn btn-danger btn-sm">Delete</button>\
                             </td>\
                         </tr>'
                        )

                    });
                }
            })
        }


        $(document).on('submit','#userform',function(e){

            e.preventDefault();

            var name = $("input[name=name]").val();
            var password = $("input[name=epass]").val();
            var role = $("select[name=role]").val();
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
           type:'POST',
           url:"{{ route('user.store') }}",
           data:{name:name, password:password, role:role},
           success:function(data){
            $('#myModal').modal('hide');
            document.getElementById("userform").reset();
                        swal({
                title: 'User!',
                text: "User Saved Successfully!",
                type: 'success',
                padding: '2em'
                });
                fetchUser();
           }
        });

    });

});





$(document).ready(function () {
    $('#zero-config').DataTable();
});
$(document).ready(function () {
  $('#zero-config').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
    "<'table-responsive'tr>" +
    "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
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
        "bDestroy": true,
    });
});



       var html3 =
            '<tr><td><input class="form-control" type="text" name="year[]" placeholder="Year" ></td><td><input class="form-control" type="text" name="period[]"placeholder="Period" ></td><td><input class="form-control" type="text" name="role[]" placeholder="Role"></td><td><input class="form-control" type="text" name="company[]" placeholder="Company"></td><td><input class="form-control" type="text" name="empdesignation[]" placeholder="Designation"></td><td><button type="button" class="btn btn-danger remove3">X</button></td></tr>';
        $("#addexperiencedetails").click(function() {
            $('#app3').append(html3);
        });

        $(document).on('click', '.remove3', function() {
            $(this).parents('tr').remove();
        });




</script>

<script>
    $(document).on('change', '.purreqq', function() {
        var reqid = $(this).val();
        $('#purreqq').val(reqid);
        $.ajax({
                type: 'GET',
                url: '/GetPurreqid/' + reqid,
                success: function(response) {
                    console.log(response);
                    $('.prodesc').empty();
                    $('.prodesc').append(
                        `<option value="" disable selected>Select Description</option>`
                    );
                    response.forEach(element => {
                        if (element['id'] == reqid) {
                            $('.prodesc').append(
                                `<option value="${element['description']}" selected>${element['desc_text']}</option>`
                            );
                        } else {
                            $('.prodesc').append(
                                `<option value="${element['description']}">${element['desc_text']}</option>`
                            );
                        }
                    });

                }
            })
    });

    $(document).on('change','.prodesc',function(){

        var desc = $(this).val();
        var purreq = $("#purreqq").val();
         $('.proddesc').val(desc);
                $.ajax({

                    type: 'GET',
                    url: '/Getrate/' + desc,
                    success: function(response) {
                        console.log(response);
                        $(".requestprice").val(response.price);
                        $(".suppliername").val(response.supplier_name);
                        $("#vendor").val(response.supplier_name);

                        var supplier = response.supplier_name;
                        var reqprice = $(".requestprice").val();
                        // var supplier = $('.suppliername').val();
                        // alert(supplier);
                        if (supplier != ""){

                            $.ajax({
                                type: 'GET',
                                url: '/Getsupplier/'+supplier,
                                success: function(response) {
                                    console.log(response);
                                    $('.suppliername').html('');
                                    // $(".suppliername").val(response.name);
                                    $.each(response,function(key, item){
                    //   console.log(item.Caste_name);
                       $('.suppliername').append(

                            '<option value="">-- Choose Supplier name --</option><option value="'+item.id+'">'+item.name+'</option>'
                        )

                    });

                                }
                            })


                        }

                        $.ajax({
                            type: 'GET',
                            url: '/GetSno/'+desc+'/'+purreq,
                                success: function(response) {
                                console.log(response);
                                $(".Sno").val(response.request_serial_no);
                                $(".qttyy").val(response.price);

                                var qttyy = $('.qttyy').val();

                                if(qttyy != ""){
                                    var amnt = qttyy * reqprice
                                $('.amt2').val(amnt);
                                $('.totamt').val(amnt)
                            }
                                var totamt = $('.totamt').val();
                                if(totamt != ""){
                                    var cgst = totamt/100*9
                                    var sgst = totamt/100*9
                                    $('.cgst').val(cgst);
                                    $('.sgst').val(sgst);
                                }

                                var ggst = parseFloat(cgst) + parseFloat(sgst);
                                var gtot = parseFloat(totamt) + parseFloat(ggst);
                                $('.finalamt').val(gtot);

                            }

                        });

                    }
                })
});
</script>

<script>
document.getElementById("simple").valueAsDate = new Date();
</script>

<script>
    var html2 =
            '<tr><td><input type="text" class="form-control" name="level[]" placeholder="Enter Class / Degree"></td><td><input class="form-control" type="text" name="degree[]" placeholder="Board" ></td><td><input class="form-control" type="text" name="university[]"	placeholder="Institute"></td><td><input class="form-control" type="text" name="passedout[]" placeholder="Passed out"></td><td><button type="button" class="btn btn-danger remove2">X</button></td></tr>';

        $("#eductionadd").click(function(){
            // alert("Hi");
            $('#appp2').append(html2);
        });

        $(document).on('click', '.remove2', function() {
            $(this).parents('tr').remove();
        });
</script>

<script>
     $('#email').on('blur', function() {
            check();
        });
        $('#name').on('blur', function() {
            check1();
        });
        $('#secondname').on('blur', function() {
            check2();
        });
        $('#mobile_no').on('blur', function() {
            check3();
        });
        $('#landline').on('blur', function() {
            check4();
        });
        $('#dob').on('blur', function() {
            check13();
        });
        $('#Qualification').on('blur', function() {
            check14();
        });
        $('#nationality').on('blur', function() {
            check15();
        });
        $('#gender').on('blur', function() {
            check16();
        });
        $('#designation').on('blur', function() {
            check17();
        });
        $('#designation2').on('blur', function() {
            check21();
        });
        $('#bankname').on('blur', function() {
            check5();
        });
        $('#branchname').on('blur', function() {
            check6();
        });
        $('#accholdername').on('blur', function() {
            check7();
        });
        $('#accno').on('blur', function() {
            check8();
        });
        $('#ifsc_code').on('blur', function() {
            check9();
        });
        $('#f_name').on('blur', function() {
            check10();
        });
        $('#f_name1').on('blur', function() {
            check18();
        });
        $('#f_relation').on('blur', function() {
            check11();
        });
        $('#f_mobile').on('blur', function() {
            check12();
        });
        $('#panno').on('blur', function() {
            check19();
        });
        $('#aadhaarno').on('blur', function() {
            check20();
        });

        $('#user_add').on('blur', function() {
            check23();
        });

</script>
<script>
     function check() {
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var email = $("#email").val();
        if (filter.test(email) || email == "") {
            $("#email").css("border", "1px solid green");
            $("#user_email").hide();
            valid = false;
        } else {
            $("#user_email").html('Please enter correct Email Id')
            $("#email").css("border", "1px solid red");
            // $("#email").focus();
            $("#user_email").show();
            valid = false;
        }

    }

    function check1() {
        var name_x = /^[a-zA-Z ]*$/;
        var name = $("#name").val();
        if (!name_x.test(name) || name == "") {
            $('#user_name').html("Please enter correct Name.");
            $("#name").css("border", "1px solid red");
            // $("#name").focus();
            $("#user_name").show();
            valid = false;
        } else {
            $("#name").css("border", "1px solid green");
            $("#user_name").hide();
            return false;
        }
    }


    function check23() {
        var name_x = /^[a-zA-Z ]*$/;
        var name = $("#user_add").val();
        if (!name_x.test(name) || name == "") {
            $('#user_err').html("Please enter correct Name.");
            $("#user_add").css("border", "1px solid red");
            // $("#name").focus();
            $("#user_err").show();
            valid = false;
        } else {
            $("#user_add").css("border", "1px solid green");
            $("#user_err").hide();
            return false;
        }
    }

    function check21() {
        var designation2_x = /^[a-zA-Z ]*$/;
        var designation2 = $("#designation2").val();
        if (!designation2_x.test(designation2) || designation2 == "") {
            $('#designation_err').html("Please enter correct Value.");
            $("#designation2").css("border", "1px solid red");
            // $("#name").focus();
            $("#designation_err").show();
            valid = false;
        } else {
            $("#designation2").css("border", "1px solid green");
            $("#designation_err").hide();
            return false;
        }
    }

    function check2() {
        var name_x = /^[a-zA-Z\s]*$/;
        if (!name_x.test($('#secondname').val())) {
            $('#user_name2').html("Please enter correct Name.");
            $("#secondname").css("border", "1px solid red");
            // $("#secondname").focus();
            $("#user_name2").show();
            valid = false;
        } else {
            $("#secondname").css("border", "1px solid green");
            $("#user_name2").hide();
            return false;
        }
    }

    function check3() {
        var pattern = /^[0-9]{10}$/;
        var mobile_no = $('#mobile_no').val();
        if (!pattern.test(mobile_no) || mobile_no == "") {
            $('#mobile').html("Please enter 10 digit Mobile no.");
            $("#mobile_no").css("border", "1px solid red");
            // $("#mobile_no").focus();
            $("#mobile").show();
            valid = false;
        } else {
            $("#mobile_no").css("border", "1px solid green");
            $("#mobile").hide();
            return false;
        }
    }

    function check4() {
        var pattern = /^[0-9]$/;
        if (isNaN($('#landline').val())) {
            $('land').html("Please enter correct Landline no.");
            $("#landline").css("border", "1px solid red");
            // $("#landline").focus();
            $("#land").show();
            valid = false;
        } else {
            $("#landline").css("border", "1px solid green");
            $("#land").hide();
            return false;
        }
    }

    function check5() {
        var pattern = /^[a-zA-Z\s]*$/;
        if (!pattern.test($('#bankname').val())) {
            $('#bank').html("Please enter correct Bank Name.");
            $("#bankname").css("border", "1px solid red");
            // $("#bankname").focus();
            $("#bank").show();
            valid = false;
        } else {
            $("#bankname").css("border", "1px solid green");
            $("#bank").hide();
            return false;
        }
    }

    function check6() {
        var pattern = /^[a-zA-Z\s]*$/;
        if (!pattern.test($('#branchname').val())) {
            $('#branch').html("Please enter correct Branch Name.");
            $("#branchname").css("border", "1px solid red");
            // $("#branchname").focus();
            $("#branch").show();
            valid = false;
        } else {
            $("#branchname").css("border", "1px solid green");
            $("#branch").hide();
            return false;
        }
    }

    function check7() {
        var pattern = /^[a-zA-Z\s]*$/;
        if (!pattern.test($('#accholdername').val())) {
            $('#holder').html("Please enter correct Name.");
            $("#accholdername").css("border", "1px solid red");
            // $("#accholdername").focus();
            $("#holder").show();
            valid = false;
        } else {
            $("#accholdername").css("border", "1px solid green");
            $("#holder").hide();
            return false;
        }
    }

    function check8() {
        if (isNaN($('#accno').val())) {
            $('#acc').html("Please enter correct Account No.");
            $("#accno").css("border", "1px solid red");
            // $("#accno").focus();
            $("#acc").show();
            valid = false;
        } else {
            $("#accno").css("border", "1px solid green");
            $("#acc").hide();
            return false;
        }
    }

    function check9() {
        var pattern = /^[A-Z]{4}[A-Z0-9]{5,7}$/;
        if (!pattern.test($('#ifsc_code').val())) {
            $('#ifsc').html("Please enter valid IFSC code.");
            $("#ifsc_code").css("border", "1px solid red");
            // $("#ifsc_code").focus();
            $("#ifsc").show();
            valid = false;
        } else {
            $("#ifsc_code").css("border", "1px solid green");
            $("#ifsc").hide();
            return false;
        }
    }

    function check10() {
            var name_x = /^[a-zA-Z\s]*$/;
            var fname = $('.f_name').val();
            console.log(fname);
            if (!name_x.test(fname)) {
                $('#fname').html("Please enter correct Name.");
                $("#f_name").css("border", "1px solid red");
                // $("#f_name").focus();
                $("#fname").show();
                valid = false;
            } else {
                $("#f_name").css("border", "1px solid green");
                $("#fname").hide();
                return false;
            }
    }


    function check11() {
        var name_x = /^[a-zA-Z\s]*$/;
        if (!name_x.test($('#f_relation').val())) {
            $('#frelation').html("Please enter correct Name.");
            $("#f_relation").css("border", "1px solid red");
            // $("#f_relation").focus();
            $("#frelation").show();
            valid = false;
        } else {
            $("#f_relation").css("border", "1px solid green");
            $("#frelation").hide();
            return false;
        }
    }

    function check12() {
        var pattern = /^[0-9]{10}$/;
        if (!pattern.test($('#f_mobile').val())) {
            $('#fmobile').html("Please enter correct Mobile no.");
            $("#f_mobile").css("border", "1px solid red");
            // $("#f_mobile").focus();
            $("#fmobile").show();
            valid = false;
        } else {
            $("#f_mobile").css("border", "1px solid green");
            $("#fmobile").hide();
            return false;
        }
    }

    function check13() {
        var dob = $('#dob').val();
        if (dob == "") {
            $('#DOB').html("Please enter DOB.");
            $("#dob").css("border", "1px solid red");
            // $("#dob").focus();
            $("#DOB").show();
            valid = false;
        } else {
            $("#dob").css("border", "1px solid green");
            $("#DOB").hide();
            return false;
        }
    }

    function check14() {
        var qfy = $('#Qualification').val();
        if (qfy == "") {
            $('#qfy').html("Please enter Qualification.");
            $("#Qualification").css("border", "1px solid red");
            // $("#Qualification").focus();
            $("#qfy").show();
            valid = false;
        } else {
            $("#Qualification").css("border", "1px solid green");
            $("#qfy").hide();
            return false;
        }
    }

    function check15() {
        var nation = $('#nationality').val();
        if (nation == "") {
            $('#nation').html("Please select Nationality.");
            $("#nationality").css("border", "1px solid red");
            // $("#nationality").focus();
            $("#nation").show();
            valid = false;
        } else {
            $("#nationality").css("border", "1px solid green");
            $("#nation").hide();
            return false;
        }
    }

    function check16() {
        var gen = $('#gender').val();
        if (gen == "") {
            $('#gen').html("Please select Gender.");
            $("#gender").css("border", "1px solid red");
            // $("#gender").focus();
            $("#gen").show();
            valid = false;
        } else {
            $("#gender").css("border", "1px solid green");
            $("#gen").hide();
            return false;
        }
    }

    function check17() {
        var des = $('#designation').val();
        if (des == "") {
            $('#des').html("Please select Designation.");
            $("#designation").css("border", "1px solid red");
            // $("#designation").focus();
            $("#des").show();
            valid = false;
        } else {
            $("#designation").css("border", "1px solid green");
            $("#des").hide();
            return false;
        }
    }

    function check18() {
            var name_x = /^[a-zA-Z\s]*$/;
            var fname = $('#f_name1').val();
            console.log(fname);
            if (!name_x.test(fname)) {
                $('#fname').html("Please enter correct Name.");
                $("#f_name1").css("border", "1px solid red");
                // $("#f_name1").focus();
                $("#fname").show();
                valid = false;
            } else {
                $("#f_name1").css("border", "1px solid green");
                $("#fname").hide();
                return false;
            }
    }

    function check19() {
            var name_x = /[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
            var fname = $('#panno').val();
            console.log(fname);
            if (!name_x.test(fname)) {
                $('#pann').html("Please enter correct Format.");
                $("#panno").css("border", "1px solid red");
                // $("#f_name1").focus();
                $("#pann").show();
                valid = false;
            } else {
                $("#panno").css("border", "1px solid green");
                $("#pann").hide();
                return false;
            }
    }

    function check20() {
            var name_x = /^[2-9]{1}[0-9]{3}\s{1}[0-9]{4}\s{1}[0-9]{4}$/;
            var fname = $('#aadhaarno').val();
            console.log(fname);
            if (!name_x.test(fname)) {
                $('#aadhar').html("Please enter correct Format.");
                $("#aadhaarno").css("border", "1px solid red");
                // $("#f_name1").focus();
                $("#aadhar").show();
                valid = false;
            } else {
                $("#aadhaarno").css("border", "1px solid green");
                $("#aadhar").hide();
                return false;
            }
    }

    function fnCalculateAge(){

var userDateinput = document.getElementById("dob").value;
console.log(userDateinput);

// convert user input value into date object
var birthDate = new Date(userDateinput);
 console.log(" birthDate"+ birthDate);

// get difference from current date;
var difference=Date.now() - birthDate.getTime();

var  ageDate = new Date(difference);
var calculatedAge=   Math.abs(ageDate.getUTCFullYear() - 1970);

if(calculatedAge < 18)
{
    alert("Please Add Employee is Major...");
}
else
{
    $("#minormajor").val("Major")
    // alert("Major");
}

}
</script>


  <script>
      $(".addfollowup").click(function(){

        var leadid = $(this).data("leadid");

        $("#leadid").val(leadid);
      });
  </script>
  <script>
    $(".conertlead").click(function(){

      var leadid = $(this).data("leadid");

      $("#leadsource").val(leadid);
    });
</script>
<script>
    $(document).on('click','.assignlead',function(){
    // $(".assignlead").click(function(){

      var leadid = $(this).data("leadid");

      $("#leadsource1").val(leadid);
    });
</script>
<script>
    $(".leadsfilter").click(function(){

        var filtertype = $(this).attr("id");

        if (filtertype != '')

                {

                    $.ajax({

                        url: "/getFilteration",

                        method: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            filter: filtertype
                        },
                        success: function(response) {

                            $('#filteration').find('tr').remove().end();
                            // $('#filteration').find('tr')remove().end()
                    $('#myModal3').modal('show');
                    // $('#filteration').html(response);
                    $.each(response,function(key, item){
                    //   console.log(item.Caste_name);
                       $('#filteration').append(
                            '<tr> <td>'+item.leadid+'</td><td>'+item.leadentrydate+'</td><td>'+item.leadsource+'</td><td>'+item.customername+'</td><td>'+item.mobilenumber+'</td><td><span style="width:100px" class="badge badge-secondary">'+item.leadstatus+'</span></td><td> <a href="leadedit/'+item.id+'" class="btn btn-info btn-sm" title="Edit Leads"><i class="bi bi-pencil-square"></i></a> <a href="deletelead/'+item.id+'" onclick="return confirm("Do You want Delete this Data?")" class="btn btn-danger btn-sm" title="Delete Leads"><i class="bi bi-trash-fill"></i></a> <a href="viewlead/'+item.id+'" class="btn btn-warning btn-sm" title="View Lead"><i class="bi bi-eye-fill"></i></a> <button class="btn btn-primary btn-sm addfollowup" data-leadid="'+item.leadid+'" data-toggle="modal" data-target="#exampleModal1" title="Add Notes"><i class="bi bi-card-text"></i></button> <button class="btn btn-primary btn-sm conertlead" title="Convert Lead" data-leadid="'+item.leadid+'" data-toggle="modal" data-target="#exampleModal2"><i class="bi bi-arrow-repeat"></i></button> </td></tr>'
                        )

                    });
                        }

                    });

                }

    })
</script>
<script>
    $(".datefilter").click(function(){

        var fromdate = $("#fromdate").val();
        var todate = $("#todate").val();
        var userid = $("#userid").val();

        if(fromdate == '')
        {
            alert("From date Blank");
        }
        if(todate == '')
        {
            alert("To date Blank");
        }

        if(userid == '')
        {
            alert("Userid Blank");
        }

       if(fromdate != '' || todate != '' || userid != '')
       {
        $.ajax({
        url: "/getDateFilteration",
        method: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            fromdate: fromdate,
            todate: todate,
            userid:userid
        },
        success: function(response) {
            $('#customdateoutput').html('');
            $.each(response,function(key, item){
                    //   console.log(item.Caste_name);
                       $('#customdateoutput').append(
                            '<tr> <td>'+item.leadid+'</td><td>'+item.leadentrydate+'</td><td>'+item.leadsource+'</td><td>'+item.customername+'</td><td>'+item.mobilenumber+'</td><td><span style="width:100px" class="badge badge-secondary">'+item.leadstatus+'</span></td><td> <a href="leadedit/'+item.id+'" class="btn btn-info btn-sm" title="Edit Leads"><i class="bi bi-pencil-square"></i></a> <a href="deletelead/'+item.id+'" onclick="return confirm("Do You want Delete this Data?")" class="btn btn-danger btn-sm" title="Delete Leads"><i class="bi bi-trash-fill"></i></a> <a href="viewlead/'+item.id+'" class="btn btn-warning btn-sm" title="View Lead"><i class="bi bi-eye-fill"></i></a> <button class="btn btn-primary btn-sm addfollowup" data-leadid="'+item.leadid+'" data-toggle="modal" data-target="#exampleModal1" title="Add Notes"><i class="bi bi-card-text"></i></button> <button class="btn btn-primary btn-sm conertlead" title="Convert Lead" data-leadid="'+item.leadid+'" data-toggle="modal" data-target="#exampleModal2"><i class="bi bi-arrow-repeat"></i></button> </td></tr>'
                        )
                    });
        }
        });

       }
       else
       {
        //    alert("fill data");
       }

            });
</script>

<script>
    $(".viewnotes").click(function(){
        var notesid = $(this).data("leadid");
        // alert(notesid)

        if(notesid)
        {
            $.ajax({
        url: "/getcallupdate",
        method: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            notesid: notesid,
        },
        success: function(response) {
            // $('#customdateoutput').html(response);
            $('.callupdatecontent').find('li').remove().end();
            $.each(response,function(key, item){
                    //   console.log(item.leadid);
                      $('#myModal5').modal('show');

                      $('.callupdatecontent').append(
                        // item.description
                        // '<li class="list-group-item"> <div class="card shadow"> <div class="card-body"> <div class="row"> <div class="col-lg-1"> <i class="mt-2 text-info bi bi-book" style="font-size:50px"></i> </div><div class="col-lg-9"> <h5><b>'+item.notes+'</b></h5> <p>'+item.description+'</p><span class="badge badge-success">Added to :'+item.created_at+'</span> </div></div></div></div></li>'
                        '<li class="list-group-item"> <div class="card shadow"> <div class="card-body"> <div class="row"> <div class="col-lg-3"> <i class="mt-2 text-info bi bi-book" style="font-size:50px"></i> </div><div class="col-lg-7"> <h5><b>'+item.title+'</b></h5> <p>'+item.description+'</p><span class="badge badge-success">Added to : '+item.created_at+'</span> </div></div></div></div></li>'
                        )


                    });
        }
        });
        }
        else
        {
            alert("No Data");
        }



    });
</script>
<script>
    $(".callupdatefilter").change(function(){

        var filterdate = $(this).val();

        if(filterdate)
        {
            $.ajax({
        url: "/getfilternotes",
        method: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            filterdate: filterdate,
        },
        success: function(response) {

            $.each(response,function(key, item){

                $('#notecontent').html(
                        // item.description

                        '<tr> <td>'+item.created_at+'</td><td>'+item.leadid+'</td><td>'+item.title+'</td><td> <td><button class="btn btn-warning viewnotes" data-leadid="'+item.leadid+'" data-toggle="modal" data-target="#myModal5">View Notes</button></td> <td><a href="viewlead/'+item.id+'" class="btn btn-primary" >View Lead</a></td></td></tr>'
                        )


                    });
        }
        });
        }


    });
</script>
<script>
    // $(".getattendance").click(function(){

        $(document).on("click",".getattendance",function() {

        var empid = $(this).data('empid');
        var logindate = $(this).data('logdate');

        // alert("working");
        //get all attendance

        if(empid != '' || logindate != '')
       {
        $.ajax({
        url: "/getAttendance",
        method: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            empid: empid,
            logindate: logindate
        },
        success: function(response) {
            $('#attendanceout').find('tr').remove().end();
            $.each(response,function(key, item){
                      console.log(item.lotime);
                       $('#attendanceout').append(
                            '<tr> <td>'+item.lotime+'</td><td>'+item.Direction+'</td></tr>'
                        )

                    });
        }
        });

       }
       else
       {
           alert("fill data");
       }


       //get morning and afternoon lunch

       if(empid != '' || logindate != '')
       {
        $.ajax({
        url: "/getAttendanceFirst",
        method: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            empid: empid,
            logindate: logindate
        },
        success: function(response) {

            $("#time1").text(response+" Hr");
        }
        });

       }
       else
       {
           alert("fill data");
       }

       if(empid != '' || logindate != '')
       {
        $.ajax({
        url: "/getAttendanceSecond",
        method: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            empid: empid,
            logindate: logindate
        },
        success: function(response) {
            // $('#time2').remove().end();
            $("#time2").html(response+" Hr");
        }
        });

       }
       else
       {
           alert("fill data");
       }

       if(empid != '' || logindate != '')
       {
        $.ajax({
        url: "/getAttendanceTotal",
        method: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            empid: empid,
            logindate: logindate
        },
        success: function(response) {
            // $('#time2').remove().end();
            $("#time3").html(response+" Hr");

            if(response < "08:00:00")
            {
                // alert("Absent");
                $("#attendancestatus").html('<span class="badge badge-danger">Absent</span>');
            }
            else
            {
                // alert("Present");
                $("#attendancestatus").html('<span class="badge badge-success">Present</span>');
            }
        }
        });

       }
       else
       {
           alert("fill data");
       }

    })
</script>

<script>
    // $(".attendancefilter").change(function(){

        $(document).on('change','.attendancefilter',function(){

        var getdate = $(this).val();

        if(getdate)
        {
            $.ajax({
        url: "/getfilterattendance",
        method: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            getdate: getdate,
        },
        success: function(response) {
            $('#attendanceappend').find('tr').remove().end();
            $.each(response,function(key, item){
                    $("#attendanceappend").append(
                        '<tr> <td>'+item.empid+'</td><td>'+item.attedance_date+'</td><td>'+item.morning_in+'</td><td>'+item.lunch_out+'</td><td>'+item.lunch_in+'</td><td>'+item.eveningout+'</td><td>'+item.totalworkhrs+'</td><td>'+item.status+'</td></tr>'
                    )

                    });
        }
        });
        }

    })
</script>

<script>
    // $(".attendancefilter").change(function(){

        $(document).on('click','.viewmonthwisereport',function(){

        var getmonthyear = $(".monthyear").val();

        if(getmonthyear)
        {
            $.ajax({
        url: "/monthwisereport",
        method: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            getmonthyear: getmonthyear,
        },
        success: function(response) {

            $('#monthwisereport').find('tr').remove().end();
            $.each(response,function(key, item){
                alert(response.report[key])

                    $("#monthwisereport").append(
                        '<tr><td class="monthyr"></td><td>'+item.emp_id+'</td><td>'+item.name+'</td><td>25</td><td>@if($getcount = App\Models\attendance_detail::where("status", "p")->where("attedance_date","Like", '+2022-06+')->where("empid", '+item.empid+')->get())  @endif</td><td>1</td></tr>'
                    )

                    });
        }
        });
        }

    })
</script>
<script>
    $(".actualbasic").hide();
    $(".grossallowance").hide();
    $(".dailysalary").hide();
    $(".pfno").hide();
    $(".nomineedetails").hide();

    $(".allowancetype").change(function(){

        var allowancetype = $(this).val();
        // alert(allowancetype);
        if(allowancetype == 'WithPF')
        {
            $(".actualbasic").show();
            $(".grossallowance").show();
            $(".dailysalary").hide();
            $(".pfno").show();
            $(".nomineedetails").show();
        }
        else
        {
            $(".dailysalary").show();
            $(".actualbasic").hide();
            $(".grossallowance").hide();
            $(".pfno").hide();
            $(".nomineedetails").hide();
        }



    })
</script>
<script>
    $(".esino").hide();
    $(".esitype").change(function(){
        var esitype = $(this).val();

        if(esitype == '1')
        {
            $(".esino").show();
            $(".nomineedetails").show();
        }
        else
        {
            $(".esino").hide();
            $(".nomineedetails").hide();
        }
    });
</script>
<script>
 $(".monthsalaryname").hide();
    $(".datesalaryname").hide();
    $("#customsalaryperson").hide();
    $("#monthlysalaryworker").hide();
</script>
<script>
    // $(".attendancefilter").change(function(){
        $("#responseloader").hide();
        $(document).on('click','.salarygenerate',function(){

        var getmonthyear = $(".monthyear").val();

        if(getmonthyear)
        {
            $.ajax({
        url: "/salarygenerate",
        method: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            getmonthyear: getmonthyear,
        },
        beforeSend: function() {
              $("#responseloader").show();
           },
        success: function(response) {
           alert("salary Generated");
           $(".monthsalaryname").show();
        //    $('#generatedemployee').find('option').remove().end();
           $.each(response,function(key, item){
                    $("#generatedemployee").append(
                        '<option value="'+item.emp_id+'">'+item.empprefix+item.emp_id+' | '+item.name+'</option>'
                    )
                    });
                    $("#responseloader").hide();
        }
        });
        }

    })
</script>

<script>

    $(".getsalaryemployee").click(function(){

        $("#customsalaryperson").hide();
        $("#monthlysalaryworker").show();
        var employeeid = $("#generatedemployee").val();
        var monthyear = $(".monthyear").val();

        if(employeeid != "")
        {
            $.ajax({
            url: "/salarygenerateemployee",
            method: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                employeeid: employeeid,
                monthyear: monthyear,
            },
            success: function(response) {

                // alert(response.monthyear);
                var image = "images/"+response.image;
                $(".month").val(response.monthyear);
                $("#empimg").attr('src',image);
                    $("#employeename").text(response.name);
                    $(".employeeid").val(response.emp_id);
                    $("#designation").text(response.designation_2);
                    $("#dateofjoining").text(response.doj);
                    $("#allowancetype").text(response.allowance_type);
                    $("#totaldays").val(response.Total_days);
                    $("#Present_days").val(response.Present_days);
                    $("#holidays").val(response.Holidays);
                    $("#weekoff").val(response.weekoff);
                    $("#salarydays").val(response.salary_days);
                    $("#actualbasic").val(response.Actual_basic);
                    $("#da").val(response.DA);
                    $("#basic").val(Math.round(response.basic_salary));
                    $("#netpay").val(Math.round(response.Net_pay));
                    $("#hra").val(Math.round(response.HRA));
                    $("#conveyanceallowance").val(Math.round(response.Conveyance_allowance));
                    $("#medicalallowance").val(Math.round(response.medica_allowance));
                    $("#specialallowance").val(Math.round(response.special_allowance));
                    // $("#wa").val(response.WA);
                    // $(".bonus").val(response.bonus);
                    // $("#othmisc").val(response.Misc_allow);
                    $("#otamt").val(Math.round(response.OT_AMT));
                    $("#othrs").val(response.totalworkhrs);
                    $("#grosscr").val(Math.round(response.GROSS_CR));
                    $("#epf").val(Math.round(response.EPF));
                    $("#esi").val(Math.round(response.ESI));
                    $("#loandedn").val(response.LOANDEDN);
                    $("#advancededn").val(response.ADVANCE_DEDN);
                    $("#othmiscdedn").val(response.OTH_MISC_DEDN);
                    $("#latededn").val(response.LATE_DEDN);
                    $("#grosscrdedn").val(Math.round(response.GROSS_DR));
            }
            });
        }
        else
        {
            alert("Select Employee")
        }

    });
</script>


<script>
     $(".hra, .wa, .misc, .amt, .hrs").keyup(function(){
    var hra=$(this).closest("tr").find(".hra").val();
    var wa=$(this).closest("tr").find(".wa").val();
    var misc=$(this).closest("tr").find(".misc").val();
    var amt=$(this).closest("tr").find(".amt").val();
    var hrs=$(this).closest("tr").find(".hrs").val();
    var bonus=$(this).closest("tr").find(".bonus").val();
    var total=parseFloat(hra)+parseFloat(wa)+parseFloat(misc)+parseFloat(amt)+parseFloat(hrs)+parseFloat(bonus);
    var grosscr=$(".basicsalary").val();
    grosscr=parseFloat(grosscr)+parseFloat(total);
    grosscr=grosscr.toFixed(2);
    $(this).closest("tr").find(".grosscr").val(grosscr);


    // GROSS DR
    var epf=0;
    epf=$(".epf1").val();
    var esi=$(".esi").val();
    var loan=$(".loan").val();
    var advance=$(".advance").val();
    var misc1=$(".misc1").val();
    var late=$(".late").val();
    // var unifromm=$(".uniform").val();
    // var otherdedn=$(".otherdedn").val();
    var total=parseFloat(esi)+parseFloat(loan)+parseFloat(advance)+parseFloat(epf)+parseFloat(misc1)+parseFloat(late);

    // alert(total);
    var grossdr=$(".grosscr").val();

    grossdr=parseFloat(grossdr)-parseFloat(total);
    grossdr=grossdr.toFixed(2);
    $(".grossdr").val(grossdr);
    var nettotal=$(".grossdr").val();
    $(".netsalary").val(nettotal);
});
</script>

<script type="text/javascript">
    $(".epf1, .esi, .loan, .advance, .misc1, .late").keyup(function(){

      // alert(uniform)
      var epf=0;
    epf=$(".epf1").val();
    //   var epf=$(this).closest("tr").find(".epf1").val();
      var esi=$(this).closest("tr").find(".esi").val();
      var loan=$(this).closest("tr").find(".loan").val();
      var advance=$(this).closest("tr").find(".advance").val();
      var misc1=$(this).closest("tr").find(".misc1").val();
      var late=$(this).closest("tr").find(".late").val();
    //   var otherdedn=$(this).closest("tr").find(".otherdedn").val();
    // alert(otherdedn)



     var total=parseFloat(esi)+parseFloat(loan)+parseFloat(advance)+parseFloat(epf)+parseFloat(misc1)+parseFloat(late);

        // alert(total)
      var grossdr=$(".grosscr").val();
      grossdr=parseFloat(grossdr)-parseFloat(total);
      grossdr=grossdr.toFixed(2);
      $(this).closest("tr").find(".grossdr").val(grossdr);

      var nettotal=$(".grossdr").val();
      $(".netsalary").val(nettotal);

  });


  </script>

<script>

    // $("#designationtype").change(function(){
        $(document).on('change', '#designationtype', function() {

        var designationtype = $(this).val();

        if(designationtype != "")
        {
            $.ajax({
            url: "/getpfdata",
            method: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                designationtype: designationtype,
            },
            success: function(response) {
                // alert(response.ot)
                $("#pfdata").val(response.pf);
                $("#otdata").val(response.ot);
                $("#salarytype").val(response.salarytype);

                var pfdata = $("#pfdata").val();
                var allowancetype = $("#allowancetype").val();
                // alert(allowancetype);
                if(pfdata == 'Yes')
                {
                    $("#allowancetype").val('WithPF')
                    $('#allowancetype').trigger('change');
                }
                else
                {
                    $("#allowancetype").val('WithoutPF')
                    $('#allowancetype').trigger('change');

                }

            }
        });
    }
    });
</script>
<script>

    // $(".getcalanderdate").click(function()
    $(document).on('click','.getcalanderdate',function(){

        var date = $(this).data('date');
        // alert(date);
        var workdays = $(this).data('workdays');

        $(".getdate").val(date);
        $(".getworkdays").val(workdays);
    })
</script>


<script>
    // $(".attendancefilter").change(function(){
        $("#responseloader").hide();
        $(document).on('click','.customsalarygenerate',function(){
            // alert("working");

        var fromdate = $(".fromdate").val();
        var todate = $(".todate").val();
            // alert(fromdate);
            // alert(todate);
        if(fromdate)
        {
            $.ajax({
        url: "/customsalarygenerate",
        method: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            fromdate: fromdate,
            todate: todate,
        },
        beforeSend: function() {
              $("#responseloader").show();
           },
        success: function(response) {
           alert("salary Generated");
           $(".datesalaryname").show();
        //    alert(response);
        //    $('#generatedemployee').find('option').remove().end();
           $.each(response,function(key, item){

                    $("#generatedemployeecustom").append(
                        '<option value="'+item.emp_id+'">'+item.emp_id+' | '+item.name+'</option>'
                    )
                    });
            $("#responseloader").hide();
        }
        });
        }

    })
</script>
<script>
    $(document).ready(function(){
        var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = yyyy + '-' + mm + '-' + dd;


        if(today)
        {
            $.ajax({
        url: "/getnotification",
        method: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            today: today,

        },
        success: function(response) {

            // if(response == '')
            // {
            //     $(".notification-scroll").append(
            //         '<div class="dropdown-item"> <div class="media server-log"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg> <div class="media-body"> <div class="data-info"> <p class="mt-2">No Notification Received</p></div></div></div></div>');
            // }
            // else
            // {
                $.each(response,function(key, item){

$(".notification-scroll").append(
    '<div class="dropdown-item"> <div class="media server-log"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg> <div class="media-body"> <div class="data-info"> <p class="">'+item.notification_description+'</p></div></div></div></div>'
)
});
            // }

        }
        });
        }
    });
</script>

<script>
    $(document).ready(function(){
        var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();

today = yyyy + '-' + mm + '-' + dd;
// alert(today);

        if(today)
        {
            $.ajax({
        url: "/getnotification2",
        method: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            today: today,

        },
        success: function(response) {

            if(response == '')
            {
                $(".notification-scroll").append(
                    '<div class="dropdown-item"> <div class="media server-log"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg> <div class="media-body"> <div class="data-info"> <p class="mt-2">No Notification Received</p></div></div></div></div>');
            }
            else
            {
                $.each(response,function(key, item){

$(".notification-scroll").append(
    '<div class="dropdown-item"> <div class="media server-log"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6" y2="6"></line><line x1="6" y1="18" x2="6" y2="18"></line></svg> <div class="media-body"> <div class="data-info"><h6 class="">'+item.orderid+'</h6> <p class="">Today Purchase Order Due Date</p></div></div></div></div>'
)
});
            }

        }
        });
        }
    });
</script>


<script>
    $(".customgetsalaryemployee").click(function(){

        $("#monthlysalaryworker").hide();
        $("#customsalaryperson").show();
        var employeeid = $("#generatedemployeecustom").val();
        var fromdate = $(".fromdate").val();
        var todate = $(".todate").val();

        if(fromdate)
        {
            $.ajax({
            url: "/customsalarygenerateemployee",
            method: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                employeeid: employeeid,
                fromdate: fromdate,
                todate: todate
            },
            success: function(response) {
                // alert(response.from_date);
                // var image = "images/"+response.image;
                var fdate = response.from_date;
                var tdate = response.to_date;

                    var period = fdate+" - "+tdate;
                // $("#empimg").attr('src',image);
                $("#fdate").val(fdate);
                $("#tdate").val(tdate);
                $(".salaryperiod").val(period);
                    $(".employeename").val(response.name);
                    $(".employeeid").val(response.emp_id);
                    $(".designation").text(response.designation);
                    $(".daily_salary").val(response.daily_salary);
                    $(".salary_days").val(response.salary_days);
                    $(".Total_days").val(response.Total_days);
                    $(".netpay").val(response.Net_pay);
                    $(".decuction").val(response.LATE_DEDN);
                    $(".dailyot").val(response.OT_AMT);
                    $(".othrs").val(response.OT)
                    $(".netpay2").val(response.Net_pay);
            }
            });
        }
        else
        {
            alert("Select Employee")
        }

    });
</script>
<script>
    $(".presentday").change(function(){
        var presentday = $(this).val();
        var basicsalary = $(".basicsalary").val();
        var hra = $(".hra").val();
        var conveyanceallowance = $(".conveyanceallowance").val();
        var medicalallowance = $(".medicalallowance").val();
        var specialallowance = $(".specialallowance").val();
        var grosscr = $(".grosscr").val();

        var data = basicsalary*presentday;
        $(".basicsalary").val(data);


    });
</script>
<script type="text/javascript">



    function AddItem()

    {

        // alert()
        // Create an Option object

        var e = document.getElementById("Salutation");
      var strUser = e.options[e.selectedIndex].text;

        // var opt = document.createElement("option");

      // Add an Option object to Drop Down/List Box

        // document.getElementById("cname").options.add(opt);

        // Assign text and value to Option object

        // opt.text  = strUser + " " +document.getElementById('fname').value + " " + document.getElementById('lname').value;

        // opt.value = strUser + " " +document.getElementById('fname').value + " " + document.getElementById('lname').value;

        document.getElementById("cname").value = strUser + " " +document.getElementById('fname').value + " " + document.getElementById('lname').value


    }

    function AddItem1()

    {

        // alert()
        // Create an Option object

    //     var e = document.getElementById("Salutation");
    //   var strUser = e.options[e.selectedIndex].text;
// var companyname=document.getElementById('com_name').value;

// if (companyname!==""){
//         var opt = document.createElement("option");

//       // Add an Option object to Drop Down/List Box

//         document.getElementById("cname").options.add(opt);

//         // Assign text and value to Option object

//         opt.text  =document.getElementById('com_name').value;

//         opt.value =document.getElementById('com_name').value;
// }

 var displayname=document.getElementById("cname").value;
        if(displayname==""){

             document.getElementById("cname").value=document.getElementById("com_name").value

        }

    }
   $(".secondlist1").hide();


   function copy()

    {

        var countryID =$('#region1').children(':selected').attr('data-cname');

        if(countryID){

            $.ajax({
                type:'POST',
                url:'/copystate',
                data: {
                            "_token": "{{ csrf_token() }}",
                            countryID: countryID
                        },
                success:function(response){
                    // $("#state2 option").remove().end();
                    $.each(response,function(key, item){

$('#state2').append(
    '<option value="'+item.state_id+'" data-sid="'+item.state_id+'">'+item.state_name+'</option>'
)

});

                   document.getElementById("state2").value =document.getElementById("state1").value;
                }
            });
        }else{

             $('#state2').html('<option value="">Select country first</option>');

        }

        var stateID =$('#state1').children(':selected').attr('data-sid');
        // alert(stateID);
        if(stateID){
            $.ajax({
                type:'POST',
                url:'/copycity',
                data: {
                            "_token": "{{ csrf_token() }}",
                            stateID: stateID
                        },
                success:function(response){
                    $.each(response,function(key, item){
$('#city2').append(
    '<option value="'+item.city_id+'">'+item.city_name+'</option>'
)

});

                    // $('#city2').html(html);
                    document.getElementById("city2").value =document.getElementById("city1").value;

                }
            });
        }else{
            $('#city2').html('<option value="">Select state first</option>');
        }

  document.getElementById("att2").value =document.getElementById("att1").value;
  document.getElementById("region2").value =document.getElementById("region1").value;
  document.getElementById("address2").value =document.getElementById("address1").value;
  document.getElementById("state2").value =document.getElementById("state1").value;
  document.getElementById("city2").value =document.getElementById("city1").value;
  document.getElementById("pincode2").value =document.getElementById("pincode1").value;
  document.getElementById("phone2").value =document.getElementById("phone1").value;
    }

</script>
<script>
  $("#customRadioInline2").click(function(){
      //alert("hai");
      $("#company_nameid").hide();
      $("#customer_officeid").hide();
      $("#departmentid").hide();
      $("#websiteid").hide();
      $("#comm").hide();
      $("#com_name").removeAttr('required');
      $(".col-3-added").removeClass("col-lg-3");
      $(".col-3-added").addClass("col-lg-12");

  });
   $("#customRadioInline1").click(function(){
      //alert("hai");
      $("#company_nameid").show();
      $("#customer_officeid").show();
      $("#departmentid").show();
      $("#websiteid").show();
    $("#comm").show();
      $(".col-3-added").removeClass("col-lg-12");
      $(".col-3-added").addClass("col-lg-3");

  });


  </script>
  <script>
           $("#gstin").hide();
           $("#gstlabel").hide();
           $("#pan").hide();
           $("#panlabel").hide();
    $("#gst_treatment").change(function(){
       var gastrval =  this.value;

       if(gastrval == 'Registered Business'){
           //alert("gst");
           $("#gstin").show();
           $("#gstlabel").show();
            $("#pan").hide();
           $("#panlabel").hide();
       }
       else{

            $("#pan").show();
           $("#panlabel").show();
           $("#gstin").hide();
           $("#gstlabel").hide();
       }



    });
</script>


<script>
$("#exemption_reason").hide();
$("#exemption_reasonlabel").hide();
$("#taxable2").click(function(){
    $("#exemption_reasonlabel").show();
    $("#exemption_reason").show();
    });
    $("#taxable1").click(function(){
    $("#exemption_reasonlabel").hide();
    $("#exemption_reason").hide();
    });
</script>


 <script>
  $('select[name=exemption_reason]').change(function() {
    if ($(this).val() == '')
    {
        var newThing = prompt('Add New Reason:');
         $('#hidunits').val(newThing);
         $('#exemption_reason').append($('<option>').val(1).text(newThing));
      $('#exemption_reason option:last-child').attr('selected', 'selected');
        var newValue = $('option', this).length;

        $('<option>')
            .text(newThing)
            .attr('value', newValue)
            .insertBefore($('option[value=]', this));
        $(this).val(newValue);
    }
});
  </script>
  <script>
   $("#phoneerror").hide();
$("#phone").change(function() {
        var a = $("#phone").val();
          lenthval = a.length;
        if(lenthval < 10) {
               $("#phoneerror").show();
          }
          else{
              $("#phoneerror").hide();
          }
        $("#phone").click(function() {

            $("#phoneerror").hide();
        });


    });

 $("#phoneerroroffice").hide();
$("#mobile").change(function() {
        var a = $("#mobile").val();
        lenthval = a.length;
        if(lenthval < 10) {


              $("#phoneerroroffice").show();


        }
        else{
            $("#phoneerroroffice").hide();
        }

        $("#mobile").click(function() {
            $("#phoneerroroffice").hide();
        });




    });

 $("#phoneerror1").hide();
$("#phone1").change(function() {
        var a = $("#phone1").val();
       lenthval = a.length;
        if(lenthval < 10) {


              $("#phoneerror1").show();


        }
        else{
             $("#phoneerror1").hide();
        }
        $("#phone1").click(function() {
            $("#phoneerror1").hide();
        });




    });

 $("#phoneerror2").hide();
$("#phone2").change(function() {
        var a = $("#phone2").val();


        lenthval = a.length;
        if(lenthval < 10) {


              $("#phoneerror2").show();



        }
        else{
             $("#phoneerror2").hide();
        }
        $("#phone2").click(function() {
            $("#phoneerror2").hide();
        });




    });
     $("#contacterror").hide();
$("#contactphone").change(function() {
        var a = $("#contactphone").val();
        lenthval = a.length;
        if(lenthval < 10) {


              $("#contacterror").show();



        }
        else{
            $("#contacterror").hide();
        }
        $("#contactphone").click(function() {
            $("#contacterror").hide();
        });




    });
</script>
 <script type="text/javascript">

            function check()
            {
                if (document.getElementById('gst_treatment').value==""
                 || document.getElementById('gst_treatment').value==undefined)
                {
                    alert ("Please Enter a Gst Treatment");
                    return false;
                }
                return true;
            }

        </script>
<script>
    $("#region1").change(function(){

        var country = $("#region1").val();

        $.ajax({
                type:'POST',
                url:'/getcountry',
                data: {
                            "_token": "{{ csrf_token() }}",
                            country: country
                        },
                success: function(response){
                    $("#state1 option").remove().end();
                    $.each(response,function(key, item){

                        $('#state1').append(
                            '<option value="'+item.state_id+'" data-sid="'+item.state_id+'">'+item.state_name+'</option>'
                        )

                    });
                }
            })
    });
</script>

<script>
    $("#state1").change(function(){

        var state = $("#state1").val();

        $.ajax({
                type:'POST',
                url:'/getcity',
                data: {
                            "_token": "{{ csrf_token() }}",
                            state: state
                        },
                success: function(response){
                    $("#city1 option").remove().end();
                    $.each(response,function(key, item){

                        $('#city1').append(
                            '<option value="'+item.city_id+'">'+item.city_name+'</option>'
                        )

                    });
                }
            })
    });
</script>

<script>
    $("#region2").change(function(){

        var country = $("#region2").val();

        $.ajax({
                type:'POST',
                url:'/getcountry2',
                data: {
                            "_token": "{{ csrf_token() }}",
                            country: country
                        },
                success: function(response){
                    $("#state2 option").remove().end();
                    $.each(response,function(key, item){

                        $('#state2').append(
                            '<option value="'+item.state_id+'" data-sid="'+item.state_id+'">'+item.state_name+'</option>'

                        )

                    });
                }
            })
    });
</script>

<script>
    $("#state2").change(function(){

        var state = $("#state2").val();

        $.ajax({
                type:'POST',
                url:'/getcity2',
                data: {
                            "_token": "{{ csrf_token() }}",
                            state: state
                        },
                success: function(response){
                    $("#city2 option").remove().end();
                    $.each(response,function(key, item){

                        $('#city2').append(
                            '<option value="'+item.city_id+'">'+item.city_name+'</option>'
                        )

                    });
                }
            })
    });
</script>

<script>
    $(".folderid").click(function(){

        var folderid = $(this).data("id");

        $.ajax({
                type:'POST',
                url:'/filterdrive',
                data: {
                            "_token": "{{ csrf_token() }}",
                            folderid: folderid
                        },
                success: function(response){
                    $("#city2 option").remove().end();
                    $.each(response,function(key, item){

                        $('.appendfolder').html(
                            '<div class="col-lg-3"> <div class="viewdrive" > <div class="icon"> <i class="bi bi-folder-fill"></i> </div><div class="iconcontent"> <p style="font-size:12px;margin-bottom:5px">'+item.upload_files+'</p><p style="font-size:12px;margin-bottom:5px">'+item.created_at+'</p><a style="font-size:12px;margin-bottom:5px" download href="/images/'+item.upload_files+'">Download</a> </div></div></div>'
                            // '<option value="'+item.city_id+'">'+item.city_name+'</option>'
                        )

                    });
                }
            })

    });
    </script>
<script>
    $(".role").change(function(){
        var role = $(this).val();
        // alert(role);
        if(role == 'admin')
        {
            // alert("checked");
            $(".Products1").prop("checked", true);
            $(".Customers").prop("checked", true);
            $(".Services").prop("checked", true);
            $(".AddEmployees").prop("checked", true);
            $(".idcard").prop("checked", true);
            $(".empreport").prop("checked", true);
            $(".empcategory").prop("checked", true);
            $(".pfdata").prop("checked", true);
            $(".adduser").prop("checked", true);
            $(".calendar").prop("checked", true);
            $(".attendanceentry").prop("checked", true);
            $(".monthwisereport").prop("checked", true);
            $(".monthwisefullreport").prop("checked", true);
            $(".salarygeneration").prop("checked", true);
            $(".salaryreport").prop("checked", true);
            $(".payslip").prop("checked", true);
            $(".companydetails").prop("checked", true);
            $(".bankdetails").prop("checked", true);
            $(".estimate").prop("checked", true);
            $(".invoice").prop("checked", true);
            $(".customercredit").prop("checked", true);
            $(".vendor").prop("checked", true);
            $(".purchaseentry").prop("checked", true);
            $(".expense").prop("checked", true);
            $(".purchaseorder").prop("checked", true);
            $(".invoicereport").prop("checked", true);
            $(".incomereport").prop("checked", true);
            $(".purchasereport").prop("checked", true);
            $(".estimatereport").prop("checked", true);
            $(".expensereport").prop("checked", true);
            $(".leadgeneration").prop("checked", true);
            $(".callupdate").prop("checked", true);
            $(".proposal").prop("checked", true);
            $(".drive").prop("checked", true);

        }

        if(role == 'Sales')
        {
            $(".Products1").prop("checked", false);
            $(".Customers").prop("checked", false);
            $(".Services").prop("checked", false);
            $(".AddEmployees").prop("checked", false);
            $(".idcard").prop("checked", false);
            $(".empreport").prop("checked", false);
            $(".empcategory").prop("checked", false);
            $(".pfdata").prop("checked", false);
            $(".adduser").prop("checked", false);
            $(".calendar").prop("checked", false);
            $(".attendanceentry").prop("checked", false);
            $(".monthwisereport").prop("checked", false);
            $(".monthwisefullreport").prop("checked", false);
            $(".salarygeneration").prop("checked", false);
            $(".salaryreport").prop("checked", false);
            $(".payslip").prop("checked", false);
            $(".companydetails").prop("checked", false);
            $(".bankdetails").prop("checked", false);
            $(".estimate").prop("checked", false);
            $(".invoice").prop("checked", false);
            $(".customercredit").prop("checked", false);
            $(".vendor").prop("checked", false);
            $(".purchaseentry").prop("checked", false);
            $(".expense").prop("checked", false);
            $(".purchaseorder").prop("checked", false);
            $(".invoicereport").prop("checked", false);
            $(".incomereport").prop("checked", false);
            $(".purchasereport").prop("checked", false);
            $(".estimatereport").prop("checked", false);
            $(".expensereport").prop("checked", false);
            $(".leadgeneration").prop("checked", true);
            $(".callupdate").prop("checked", true);
            $(".proposal").prop("checked", true);
            $(".drive").prop("checked", true);
        }

        if(role == 'HR')
        {
            $(".Products1").prop("checked", false);
            $(".Customers").prop("checked", false);
            $(".Services").prop("checked", false);
            $(".AddEmployees").prop("checked", true);
            $(".idcard").prop("checked", true);
            $(".empreport").prop("checked", true);
            $(".empcategory").prop("checked", true);
            $(".pfdata").prop("checked", true);
            $(".adduser").prop("checked", true);
            $(".calendar").prop("checked", true);
            $(".attendanceentry").prop("checked", true);
            $(".monthwisereport").prop("checked", true);
            $(".monthwisefullreport").prop("checked", true);
            $(".salarygeneration").prop("checked", true);
            $(".salaryreport").prop("checked", true);
            $(".payslip").prop("checked", true);
            $(".companydetails").prop("checked", true);
            $(".bankdetails").prop("checked", true);
            $(".estimate").prop("checked", false);
            $(".invoice").prop("checked", false);
            $(".customercredit").prop("checked", false);
            $(".vendor").prop("checked", false);
            $(".purchaseentry").prop("checked", false);
            $(".expense").prop("checked", false);
            $(".purchaseorder").prop("checked", false);
            $(".invoicereport").prop("checked", false);
            $(".incomereport").prop("checked", false);
            $(".purchasereport").prop("checked", false);
            $(".estimatereport").prop("checked", false);
            $(".expensereport").prop("checked", false);
            $(".leadgeneration").prop("checked", false);
            $(".callupdate").prop("checked", false);
            $(".proposal").prop("checked", false);
            $(".drive").prop("checked", true);
        }

        if(role == 'Accounts')
        {
            $(".Products1").prop("checked", true);
            $(".Customers").prop("checked", true);
            $(".Services").prop("checked", true);
            $(".AddEmployees").prop("checked", false);
            $(".idcard").prop("checked", false);
            $(".empreport").prop("checked", false);
            $(".empcategory").prop("checked", false);
            $(".pfdata").prop("checked", false);
            $(".adduser").prop("checked", false);
            $(".calendar").prop("checked", false);
            $(".attendanceentry").prop("checked", false);
            $(".monthwisereport").prop("checked", false);
            $(".monthwisefullreport").prop("checked", false);
            $(".salarygeneration").prop("checked", false);
            $(".salaryreport").prop("checked", false);
            $(".payslip").prop("checked", false);
            $(".companydetails").prop("checked", true);
            $(".bankdetails").prop("checked", true);
            $(".estimate").prop("checked", true);
            $(".invoice").prop("checked", true);
            $(".customercredit").prop("checked", true);
            $(".vendor").prop("checked", true);
            $(".purchaseentry").prop("checked", true);
            $(".expense").prop("checked", true);
            $(".purchaseorder").prop("checked", true);
            $(".invoicereport").prop("checked", true);
            $(".incomereport").prop("checked", true);
            $(".purchasereport").prop("checked", true);
            $(".estimatereport").prop("checked", true);
            $(".expensereport").prop("checked", true);
            $(".leadgeneration").prop("checked", false);
            $(".callupdate").prop("checked", false);
            $(".proposal").prop("checked", false);
            $(".drive").prop("checked", true);
        }
    });

    $(".useredit").click(function(){
        var id = $(this).data('id');

        $.ajax({
                type:'POST',
                url:'/getuserdetails',
                data: {
                            "_token": "{{ csrf_token() }}",
                            id: id
                        },
                success: function(response){
                    $('#myModal2').modal('show');
                    $(".user").val(response.name);
                    $(".Password").val(response.password);
                    $(".role").val(response.roll);
                    $(".userid").val(response.id);
                    if(response.Products == '1')
                    {
                        $( ".Products1" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".Products1" ).prop( "checked", false );
                    }
                    if(response.Customers == '1')
                    {
                        $( ".Customers" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".Customers" ).prop( "checked", false );
                    }
                    if(response.Services == '1')
                    {
                        $( ".Services" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".Services" ).prop( "checked", false );
                    }
                    if(response.addemployee == '1')
                    {
                        $( ".AddEmployees" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".AddEmployees" ).prop( "checked", false );
                    }
                    if(response.idcard == '1')
                    {
                        $( ".idcard" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".idcard" ).prop( "checked", false );
                    }
                    if(response.empreport == '1')
                    {
                        $( ".empreport" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".empreport" ).prop( "checked", false );
                    }
                    if(response.empreport == '1')
                    {
                        $( ".empreport" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".empreport" ).prop( "checked", false );
                    }
                    if(response.pfdata == '1')
                    {
                        $( ".pfdata" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".pfdata" ).prop( "checked", false );
                    }
                    if(response.adduser == '1')
                    {
                        $( ".adduser" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".adduser" ).prop( "checked", false );
                    }
                    if(response.calendar == '1')
                    {
                        $( ".calendar" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".calendar" ).prop( "checked", false );
                    }
                    if(response.attendanceentry == '1')
                    {
                        $( ".attendanceentry" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".attendanceentry" ).prop( "checked", false );
                    }
                    if(response.monthwisereport == '1')
                    {
                        $( ".monthwisereport" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".monthwisereport" ).prop( "checked", false );
                    }
                    if(response.monthwisereportfull == '1')
                    {
                        $( ".monthwisefullreport" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".monthwisefullreport" ).prop( "checked", false );
                    }
                    if(response.salarygen == '1')
                    {
                        $( ".salarygeneration" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".salarygeneration" ).prop( "checked", false );
                    }
                    if(response.salaryreport == '1')
                    {
                        $( ".salaryreport" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".salaryreport" ).prop( "checked", false );
                    }
                    if(response.payslip == '1')
                    {
                        $( ".payslip" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".payslip" ).prop( "checked", false );
                    }
                    if(response.companydetails == '1')
                    {
                        $( ".companydetails" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".companydetails" ).prop( "checked", false );
                    }
                    if(response.bankdetails == '1')
                    {
                        $( ".bankdetails" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".bankdetails" ).prop( "checked", false );
                    }
                    if(response.estimate == '1')
                    {
                        $( ".estimate" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".estimate" ).prop( "checked", false );
                    }
                    if(response.invoice == '1')
                    {
                        $( ".invoice" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".invoice" ).prop( "checked", false );
                    }
                    if(response.customercredit == '1')
                    {
                        $( ".customercredit" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".customercredit" ).prop( "checked", false );
                    }
                    if(response.vendor == '1')
                    {
                        $( ".vendor" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".vendor" ).prop( "checked", false );
                    }
                    if(response.purchaseentry == '1')
                    {
                        $( ".purchaseentry" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".purchaseentry" ).prop( "checked", false );
                    }
                    if(response.expense == '1')
                    {
                        $( ".expense" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".expense" ).prop( "checked", false );
                    }
                    if(response.purchaseorder == '1')
                    {
                        $( ".purchaseorder" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".purchaseorder" ).prop( "checked", false );
                    }
                    if(response.invoicereport == '1')
                    {
                        $( ".invoicereport" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".invoicereport" ).prop( "checked", false );
                    }
                    if(response.incomereport == '1')
                    {
                        $( ".incomereport" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".incomereport" ).prop( "checked", false );
                    }
                    if(response.purchasereport == '1')
                    {
                        $( ".purchasereport" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".purchasereport" ).prop( "checked", false );
                    }
                    if(response.estimatereport == '1')
                    {
                        $( ".estimatereport" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".estimatereport" ).prop( "checked", false );
                    }
                    if(response.expensereport == '1')
                    {
                        $( ".expensereport" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".expensereport" ).prop( "checked", false );
                    }
                    if(response.leadgen == '1')
                    {
                        $( ".leadgeneration" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".leadgeneration" ).prop( "checked", false );
                    }
                    if(response.callupdate == '1')
                    {
                        $( ".callupdate" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".callupdate" ).prop( "checked", false );
                    }
                    if(response.proposal == '1')
                    {
                        $( ".proposal" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".proposal" ).prop( "checked", false );
                    }
                    if(response.drive == '1')
                    {
                        $( ".drive" ).prop( "checked", true );
                    }
                    else
                    {
                        $( ".drive" ).prop( "checked", false );
                    }


                }
            })

    });
</script>

<script>
    // $(".attendanceedit").click(function(){
        // $(".attendanceedit").on('click',function(){
            $(document).on("click",".attendanceedit",function() {

        var id = $(this).data("id");

        // alert(id);

         $.ajax({
                type:'POST',
                url:'/getattendancedetails',
                data: {
                            "_token": "{{ csrf_token() }}",
                            id: id
                        },
                success: function(response){

                    $("#exampleModal3").modal('show');
                    $(".attendanceid").val(response.id);
                    $(".empid").val(response.empid);
                    $(".date").val(response.attedance_date);
                    $(".morningin").val(response.morning_in);
                    $(".lunchout").val(response.lunch_out);
                    $(".lunchin").val(response.lunch_in);
                    $(".workinghour").val(response.totalworkhrs);
                    $(".eveningout").val(response.eveningout);
                    $(".status").val(response.status);
                    $(".ot").val(response.ot);
                    $(".latetime").val(response.total_late);

                }
            });
    })
</script>

<script>
    // $(".workingdays").click(function(){
        $(document).on("click",".workingdays",function() {
        var month = $(this).data("month");

        $.ajax({
                type:'GET',
                url:'/getworkingdays/'+month,
                dataType:'json',
                success: function(response){

                    $("#exampleModal4").modal('show');
                    // $('.calendartable tbody').html("");
                    $.each(response,function(key, item){
                        // alert(item.dates);
                        $('.calendartabletbody').append(
                            '<tr>\
                            <td>'+item.dates+'</td>\
                             <td>'+item.days+'</td>\
                             <td>'+item.mon_year+'</td>\
                             <td>'+item.status+'</td>\
                         </tr>'
                        )

                    });

                }
            });
    });
</script>

<script>
    // $(".workingdays").click(function(){
        $(document).on("click",".getpresentdays",function() {
        var empid = $(this).data("empid");
        var month = $(this).data("month");

        $.ajax({
                type:'GET',
                url:'/getpresentdays/'+month+'/'+empid,
                dataType:'json',
                success: function(response){

                    $("#exampleModal5").modal('show');
                    $('.presentdaysbody').html("");
                    $.each(response,function(key, item){
                        // alert(item.dates);
                        $('.presentdaysbody').append(
                            '<tr>\
                            <td>'+item.attedance_date+'</td>\
                             <td>'+item.morning_in+'</td>\
                             <td>'+item.lunch_out+'</td>\
                             <td>'+item.lunch_in+'</td>\
                             <td>'+item.eveningout+'</td>\
                             <td>'+item.totalworkhrs+'</td>\
                             <td>'+item.ot+'</td>\
                             <td>'+item.total_late+'</td>\
                             <td>'+item.status+'</td>\
                         </tr>'
                        )

                    });

                }
            });
    });
</script>

<script>
    // $(".workingdays").click(function(){
        $(document).on("click",".getabsentdays",function() {
        var empid = $(this).data("empid");
        var month = $(this).data("month");

        $.ajax({
                type:'GET',
                url:'/getabsentdays/'+month+'/'+empid,
                dataType:'json',
                success: function(response){

                    $("#exampleModal6").modal('show');
                    $('.absentdaysbody').html("");
                    $.each(response,function(key, item){
                        // alert(item.dates);
                        $('.absentdaysbody').append(
                            '<tr>\
                            <td>'+item.attedance_date+'</td>\
                             <td>'+item.status+'</td>\
                         </tr>'
                        )

                    });

                }
            });
    });
</script>

<script>
    // $(".workingdays").click(function(){
        $(document).on("click",".getholidays",function() {
        var month = $(this).data("month");

        $.ajax({
                type:'GET',
                url:'/getholidays/'+month,
                dataType:'json',
                success: function(response){

                    $("#exampleModal7").modal('show');
                    $('.holidaytabletbody').html("");
                    $.each(response,function(key, item){
                        // alert(item.dates);
                        $('.holidaytabletbody').append(
                            '<tr>\
                            <td>'+item.dates+'</td>\
                             <td>'+item.days+'</td>\
                             <td>'+item.mon_year+'</td>\
                         </tr>'
                        )

                    });

                }
            });
    });
</script>
<script>

    $(".bankname").hide()
    $(".ifsccode").hide();
    $(".branch").hide();
    $(".accountholdername").hide();
    $(".accountnumber").hide();
    $(".ifsccode").hide();

    $(".paymenttype").change(function(){

            var paymenttype = $(this).val();

            if(paymenttype == 'Cash')
            {
                $(".branch").hide();
                $(".bankname").hide()
                $(".ifsccode").hide();
                $(".accountholdername").hide();
                $(".accountnumber").hide();
                $(".ifsccode").hide();
            }
            else
            {
                $(".branch").show();
                $(".bankname").show()
                $(".ifsccode").show();
                $(".accountholdername").show();
                $(".accountnumber").show();
                $(".ifsccode").show();
            }
    })
</script>

<script>
    $(".othdeduc").keyup(function(){
        var otherdeduc = $(this).val();
        var epf = $("#epf").val();
        var esi = $("#esi").val();
        var professionaldeduction = $("#professionaldeduction").val();
        var grosscrdedn = $("#grosscrdedn").val();
        var netpay = $("#netpay").val();
        var grosscr = $("#grosscr").val();
        var advancededn = $("#advancededn").val();
        var canteendeduc = $("#canteendeduc").val();
        var loandedu = $("#loandedu").val();


        var cal = parseInt(epf)+parseInt(esi)+parseInt(professionaldeduction)+parseInt(otherdeduc)+parseInt(advancededn)+parseInt(canteendeduc)+parseInt(loandedu);
        $("#grosscrdedn").val(cal);

        var n = parseInt(grosscr)-parseInt(cal);
        $("#netpay").val(n);

    });
</script>
<script>
    $(".canteendeduc").keyup(function(){
        var canteendeduc = $(this).val();
        var epf = $("#epf").val();
        var esi = $("#esi").val();
        var professionaldeduction = $("#professionaldeduction").val();
        var grosscrdedn = $("#grosscrdedn").val();
        var netpay = $("#netpay").val();
        var grosscr = $("#grosscr").val();
        var advancededn = $("#advancededn").val();
        var otherdeduc = $("#othdeduc").val();
        var loandedu = $("#loandedu").val();


        var cal = parseInt(epf)+parseInt(esi)+parseInt(professionaldeduction)+parseInt(otherdeduc)+parseInt(advancededn)+parseInt(canteendeduc)+parseInt(loandedu);
        $("#grosscrdedn").val(cal);

        var n = parseInt(grosscr)-parseInt(cal);
        $("#netpay").val(n);

    });
</script>
<script>
    $(".loandedu").keyup(function(){
        var loandedu = $(this).val();
        var epf = $("#epf").val();
        var esi = $("#esi").val();
        var professionaldeduction = $("#professionaldeduction").val();
        var grosscrdedn = $("#grosscrdedn").val();
        var netpay = $("#netpay").val();
        var grosscr = $("#grosscr").val();
        var advancededn = $("#advancededn").val();
        var canteendeduc = $("#canteendeduc").val();
        // var loandedu = $("#loandedu").val();
        var otherdeduc = $("#othdeduc").val();


        var cal = parseInt(epf)+parseInt(esi)+parseInt(professionaldeduction)+parseInt(otherdeduc)+parseInt(advancededn)+parseInt(canteendeduc)+parseInt(loandedu);
        $("#grosscrdedn").val(cal);

        var n = parseInt(grosscr)-parseInt(cal);
        $("#netpay").val(n);

    });
</script>
<script>
    $(".advancededn").keyup(function(){
        var advancededn = $(this).val();
        var epf = $("#epf").val();
        var esi = $("#esi").val();
        var professionaldeduction = $("#professionaldeduction").val();
        var grosscrdedn = $("#grosscrdedn").val();
        var netpay = $("#netpay").val();
        var grosscr = $("#grosscr").val();
        // var advancededn = $("#advancededn").val();
        var canteendeduc = $("#canteendeduc").val();
        var loandedu = $("#loandedu").val();
        var otherdeduc = $("#othdeduc").val();


        var cal = parseInt(epf)+parseInt(esi)+parseInt(professionaldeduction)+parseInt(otherdeduc)+parseInt(advancededn)+parseInt(canteendeduc)+parseInt(loandedu);
        $("#grosscrdedn").val(cal);

        var n = parseInt(grosscr)-parseInt(cal);
        $("#netpay").val(n);

    });
</script>
<script>
    $("#customdeduc").keyup(function(){
        var deduc = $(this).val();
        var netpay = $(".netpay").val();
        var netpay2 = $(".netpay2").val();

        $(".netpay").val(parseInt(netpay2)-parseInt(deduc));

    });
</script>

<script>
    $("#responseloader").hide();
    $(".importattedance").click(function(){
        var frmdate = $("#frmdate").val();
        var todat = $("#todat").val();


        // alert(frmdate);
        // alert(todat);

        $.ajax({
                type:'POST',
                url:'/importattendance',
                data: {
                            "_token": "{{ csrf_token() }}",
                            fromdate: frmdate,
                            todate: todat,
                        },
                        beforeSend: function() {
              $("#responseloader").show();
           },
                success: function(response){
                    alert("attedance imported");
                    $("#importattendance").modal('hide');
                    $("#responseloader").hide();
                }
            })
    })
</script>

<script>
    function convertTo24Hour(time) {
    var hours = parseInt(time.substr(0, 2));
    if(time.indexOf('am') != -1 && hours == 12) {
        time = time.replace('12', '0');
    }
    if(time.indexOf('pm')  != -1 && hours < 12) {
        time = time.replace(hours, (hours + 12));
    }
    return time.replace(/(am|pm)/, '');
}

    $("#morningintime").change(function(){

        var morningtime = convertTo24Hour($(this).val());
        var eveningout = convertTo24Hour($("#eveningout").val());
        var date = $("#attedancedata").val();
        // alert(morningtime);
        var start = morningtime;
    var end = eveningout;
    s = start.split(':');
    e = end.split(':');
    min = e[1]-s[1];
    hour_carry = 0;
    if(min < 0){
        min += 60;
        hour_carry += 1;
    }
    hour = e[0]-s[0]-hour_carry;
    diff = hour + ":" + min;

    var start = "01:00";
    var end = diff;
    s = start.split(':');
    e = end.split(':');
    min = e[1]-s[1];
    hour_carry = 0;
    if(min < 0){
        min += 60;
        hour_carry += 1;
    }
    hour = e[0]-s[0]-hour_carry;
    workhr = hour + ":" + min;

    $("#workinghour").val(workhr);

    var start = "08:00:00";
    var end = workhr;
    s = start.split(':');
    e = end.split(':');
    min = e[1]-s[1];
    hour_carry = 0;
    if(min < 0){
        min += 60;
        hour_carry += 1;
    }
    hour = e[0]-s[0]-hour_carry;
    ot = hour + ":" + min;

    if(ot < "0:0")
    {
        $("#attot").val("00:00")
    }
    else
    {
        $("#attot").val(ot);
    }

    if(diff > "08:00")
    {
        $("#attedancestatus").val("P");
    }

    });

    $("#eveningout").change(function(){
        var morningtime = convertTo24Hour($("#morningintime").val());
        var eveningout = convertTo24Hour($(this).val());
        var date = $("#attedancedata").val();
        // alert(morningtime);
        var start = morningtime;
    var end = eveningout;
    s = start.split(':');
    e = end.split(':');
    min = e[1]-s[1];
    hour_carry = 0;
    if(min < 0){
        min += 60;
        hour_carry += 1;
    }
    hour = e[0]-s[0]-hour_carry;
    diff = hour + ":" + min;

    var start = "01:00";
    var end = diff;
    s = start.split(':');
    e = end.split(':');
    min = e[1]-s[1];
    hour_carry = 0;
    if(min < 0){
        min += 60;
        hour_carry += 1;
    }
    hour = e[0]-s[0]-hour_carry;
    workhr = hour + ":" + min;

    $("#workinghour").val(workhr);

    var start = "08:00:00";
    var end = workhr;
    s = start.split(':');
    e = end.split(':');
    min = e[1]-s[1];
    hour_carry = 0;
    if(min < 0){
        min += 60;
        hour_carry += 1;
    }
    hour = e[0]-s[0]-hour_carry;
    ot = hour + ":" + min;

    if(ot < "0:0")
    {
        $("#attot").val("00:00")
    }
    else
    {
        $("#attot").val(ot);
    }

    if(diff > "08:00")
    {
        $("#attedancestatus").val("P");
    }
    });

</script>


<script>
    $("#responseloader").hide();
    // $("#importattedance2").submit(function(){
    $(document).on('submit','#importattedance2',function(){
        // alert("submited");
        // e.preventDefault();
        // $("#responseloader").fadeIn();
        $.ajax({
                type:'POST',
                url:'/importattendance2',
                data:new FormData(this),
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
              $("#responseloader").fadeIn();
           },
                success: function(response){
                    // console.log(response);

                    $("#importattendance").modal('hide');
                    alert("attedance imported");
                    $("#responseloader").fadeOut();
                    // swal("Good job!", "You clicked the button!", "success");
                }
            })
    })
</script>

<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$("#responseloader").hide();
    $(".attendancecalc").click(function(){
        // alert("work");
        $.ajax({
                type:'POST',
                url:'/attendancecalc',
                data: {
                            "_token": "{{ csrf_token() }}",
                        },

                beforeSend: function() {
              $("#responseloader").show();
           },
                success: function(response){
                    console.log(response);
                    alert("Attedance Generated");
                    $("#responseloader").hide();
                    location.reload();
                },
                error: function () {
                        alert("Error");
                        $("#responseloader").hide();
            }
            })
    });
</script>

{{-- // Leads Add in Indiamart --}}


<script>
    // $(document).ready(function(){

    //     // alert($url);
    //    $.ajax({
    //             type:'GET',
    //             url:'/getindiamartlead',
    //             dataType:'json',
    //             success: function(response){
    //                 // alert("text");
    //             }
    //         })

    // })

    // Indiamart Lead Import

    $(document).ready(function() {
 // executes when HTML-Document is loaded and DOM is ready
    $.ajax({
                type:'GET',
                url:'/getindiamartlead',
                dataType:'json',
                success: function(response){
                    // alert("success");
                }
            })
});

// Tradeindia Lead import

$(document).ready(function() {
 // executes when HTML-Document is loaded and DOM is ready
    $.ajax({
                type:'GET',
                url:'/gettradeindialeads',
                dataType:'json',
                success: function(response){
                    // alert(response);
                }
            })
});

</script>

<script>
    $("#addquotedproduct").submit(function(event){

var formData = $(this).serialize();

    $.ajax({
        type:"POST",
        url: "/addquotedproduct",
        data:new FormData(this),
        // async: false,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function() {
            $("#responseloader").fadeIn();
        },
        success: function(data) {

            if($.isEmptyObject(data.error)){
                // alert(data.success);


                $("#responseloader").fadeOut();
                Swal.fire(
                    'Success!',
                    'Product Created Successfully..!',
                    'success'
                  )

                $("#myModal").modal('hide');
                location.reload();
            }
            else
            {
                printErrorMsg(data.error);
            }
        },

    });

});
</script>

<script>
    // $(".js-example-basic-single").select2();
    $(".removestage:first").css("visibility", "hidden");

    $(document).on("click", "#addquoteProducts", function () {

//         $(".js-example-basic-single").select2('destroy');

// setTimeout(function () {
//     $(".js-example-basic-single").select2();

// }, 100);

        $(".removestage:first").css("visibility", "visible");
        $(".addstage").css("display", "none");
    var main = $("#appendstageparent");

        var append = $("#appendstageparent tr").html();




        if ($(".removestage:first").css("visibility", "visible")) {
            if (main.append("<tr>" + append + "</tr>")) {

                $(".removestage:first").css("visibility", "hidden");
            }
        }

        $(document).on("click", ".removestage", function () {
        if ($(this).closest("tr").remove()) {
            if ($(".addstage").length == 1) {
                // $(".addstage:first").prop("visibility", "hidden");
                $(".removestage:first").css("visibility", "hidden");
            }
        }

    })

        // main.append("<tr>" + append + "</tr>");


});
</script>

<script>
    $("#createnewproposal").submit(function(event){

var formData = $(this).serialize();

    $.ajax({
        type:"POST",
        url: "/saveproposal",
        data:new FormData(this),
        // async: false,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function() {
            $("#responseloader").fadeIn();
        },
        success: function(data) {

            if($.isEmptyObject(data.error)){
                // alert(data.success);


                $("#responseloader").fadeOut();
                Swal.fire(
                    'Success!',
                    'Proposal Created Successfully..!',
                    'success'
                  )

                $("#myModal").modal('hide');
                location.reload();
            }
            else
            {
                printErrorMsg(data.error);
            }
        },

    });

});
</script>

<script>
    $(".importindiamartleads").click(function(){

// const user = $(this).data("user");

Swal.fire({
title: "Are you sure?",
text: "Import indiamart Leads",
icon: "warning",
showCancelButton: true,
confirmButtonColor: "#3085d6",
cancelButtonColor: "#d33",
confirmButtonText: "Yes, Import!",
}).then((result) => {
if (result.isConfirmed) {
    $.ajax({
        method: "GET",
        url:'/importindiamartleads',
        beforeSend: function() {
              $("#responseloader").show();
           },
        success: function (data) {

            $("#responseloader").hide();


                Swal.fire(
                "Imported!",
                "Indiamart Leads imported successfully...!!!",
                "success"
            );
            location.reload();

        },
        error: function (data) {
            Swal.fire(
                "Imported!",
                "Import failure",
                "failure"
            );
        },
    });
}

});
});
</script>

<script>
    $(".sendmail").click(function(){
        var email = $(this).data("email");
        var filename = $(this).data("filename");
        $("#tosendmail").val(email);
        $("#filename").val(filename);
    })
</script>
<script>
    $("#sendmail").submit(function(event){

var formData = $(this).serialize();

    $.ajax({
        type:"POST",
        url: "/sendMail",
        data:new FormData(this),
        // async: false,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function() {
            $("#responseloader").fadeIn();
        },
        success: function(data) {

            if($.isEmptyObject(data.error)){
                // alert(data.success);


                $("#responseloader").fadeOut();
                Swal.fire(
                    'Success!',
                    'Mail Send Successfully..!',
                    'success'
                  )

                location.reload();
            }
            else
            {
                printErrorMsg(data.error);
            }
        },

    });

});
</script>

{{-- Pavithran's --}}

<script>
    $(document).on('change','#catnamee', function(){
        var category = $(this).val();

        if(category == 1){
            $('.tank').show();
            $(document).on('change','#subcatt', function(){
                if($('#subcatt').val() == 1 && $('#catnamee').val() == 1){
                    $('.tank2').hide();
                    $('.tank1').show();
                    $(document).on('change','#tanklitre', function(){
                        $('.tank1size').val('2.5mm x 2.5 mm');
                        if($(this).val() == 35){
                            $('.tank1rate').val('2600');
                        }else if($(this).val() == 45){
                            $('.tank1rate').val('3000');
                        }else if($(this).val() == 70){
                            $('.tank1rate').val('3950');
                        }else if($(this).val() == 110){
                            $('.tank1rate').val('4500');
                        }else if($(this).val() == 135){
                            $('.tank1rate').val('4800');
                        }else if($(this).val() == 160){
                            $('.tank1rate').val('5950');
                        }else if($(this).val() == 200){
                            $('.tank1rate').val('6300');
                        }else if($(this).val() == 220){
                            $('.tank1rate').val('6900');
                        }
                    });

                }else if($('#subcatt').val() == 2 && $('#catnamee').val() == 1){
                    $('.tank2').show();
                    $('.tank1').hide();

                    $(document).on('change','#tank2litre', function(){
                        if($(this).val() == 160){
                            $('#tank2hp').html('<option value="" disable>Select HP</option><option value="5.0">5.0 HP MODEL</option>');
                            $('#tank2size').html('<option value="" disable>Select Size</option><option value="1">3mm x 4mm</option><option value="2">4mm x 4mm</option>');

                            $(document).on('change','#tank2size', function(){
                                if($(this).val() == 1){
                                    $('#tank2rate').val('8100');
                                    $('#tank2guard').val('1600');
                                    $('#tank2tot').val('9700');
                                }else if($(this).val() == 2){
                                    $('#tank2rate').val('8900');
                                    $('#tank2guard').val('1600');
                                    $('#tank2tot').val('10500');
                                }
                            });
                        }else if($(this).val() == 220){
                            $('#tank2hp').html('<option value=""></option><option value="5.0">5.0 HP MODEL</option><option value="7.5">7.5 HP MODEL</option>');
                            $(document).on('change','#tank2hp', function(){
                                if($(this).val() == 5.0){
                                    $('#tank2size').html('<option value=""></option><option value="1">3mm x 4mm</option><option value="2">4mm x 4mm</option>');
                                }else if($(this).val() == 7.5){
                                    $('#tank2size').html('<option value=""></option><option value="1">4mm x 4mm</option>');
                                }

                                $(document).on('change','#tank2size', function(){
                                    if($(this).val() == 1 && $('#tank2hp').val() == 5.0){
                                        $('#tank2rate').val('8600');
                                        $('#tank2guard').val('1600');
                                        $('#tank2tot').val('10200');
                                    }else if($(this).val() == 2 && $('#tank2hp').val() == 5.0){
                                        $('#tank2rate').val('9400');
                                        $('#tank2guard').val('1600');
                                        $('#tank2tot').val('11000');
                                    }else if($(this).val() == 1 && $('#tank2hp').val() == 7.5){
                                        $('#tank2rate').val('10500');
                                        $('#tank2guard').val('2100');
                                        $('#tank2tot').val('12600');
                                    }
                                });

                            });
                        }
                    });
                }
            });
        }
        if(category == 2){
            $('.topblock').show();
            $(document).on('change','#blocklitrs',function(){
                if($(this).val() == 110){
                    $('#blockthick').html('<option value="2.5">2.5 mm</option>');
                    $('#blockprice').val('4000.00');
                }else if($(this).val() == 135){
                    $('#blockthick').html('<option value="2.5">2.5 mm</option>');
                    $('#blockprice').val('4300.00');
                }else if($(this).val() == 160){
                    $('#blockprice').val('');
                    $('#blockthick').html('<option value=""  disable>Select Thickness</option><option value="1">2.5 mm</option><option value="2">3 mm x 4 mm</option><option value="3">4 mm x 4 mm</option>');
                    $(document).on('change','#blockthick', function(){
                        $('#blockprice').val('');
                        if($(this).val() == 1){
                            $('#blockprice').val('5450.00');
                        }else if($(this).val() == 2){
                            $('#blockprice').val('7300.00');
                        }else if($(this).val() == 3){
                            $('#blockprice').val('8600.00');
                        }
                    });
                }else if($(this).val() == 220){
                    $('#blockthick').html('<option value=""  disable>Select Thickness</option><option value="3.4">3 mm x 4 mm</option><option value="4.4">4 mm x 4 mm</option>');
                    $('#blockprice').val('');
                    $(document).on('change','#blockthick', function(){
                        if($(this).val() == 3.4){
                            $('#blockprice').val('7900.00');
                        }else if($(this).val() == 4.4){
                            $('#blockprice').val('9300.00');
                        }
                    });
                }else if($(this).val() == 250){
                    $('#blockthick').html('<option value="4.4">4.4 mm x 4.4 mm</option>');
                    $('#blockprice').val('10600.00');
                }else if($(this).val() == 300){
                    $('#blockthick').html('<option value="4.4">4.4 mm x 4.4 mm</option>');
                    $('#blockprice').val('12300.00');
                }else if($(this).val()  == 420){
                    $('#blockthick').html('<option value=""  disable>Select Thickness</option><option value="4.5">4 mm x 5 mm</option><option value="5.5">5 mm x 5 mm</option>');
                    $('#blockprice').val('');
                    $(document).on('change','#blockthick', function(){
                        if($(this).val() == 4.5){
                            $('#blockprice').val('15450.00');
                        }else if($(this).val() == 5.5){
                            $('#blockprice').val('17000.00');
                        }
                    });
                }else if($(this).val() == 500){
                    $('#blockthick').html('<option value=""  disable>Select Thickness</option><option value="4.5">4 mm x 5 mm</option><option value="5.5">5 mm x 5 mm</option>');
                    $('#blockprice').val('');
                    $(document).on('change','#blockthick', function(){
                        if($(this).val() == 4.5){
                            $('#blockprice').val('17000.00');
                        }else if($(this).val() == 5.5){
                            $('#blockprice').val('18750.00');
                        }
                    });
                }else if($(this).val() == 1000){
                    $('#blockthick').html('<option value=""  disable>Select Thickness</option><option value="5.5">5 mm x 5 mm</option><option value="6.6">6 mm x 6 mm</option>');
                    $('#blockprice').val('');
                    $(document).on('change','#blockthick', function(){
                        if($(this).val() == 5.5){
                            $('#blockprice').val('36000.00');
                        }else if($(this).val() == 6.6){
                            $('#blockprice').val('40750.00');
                        }
                    });
                }else if($(this).val() == 1500){
                    $('#blockthick').html('<option value=""  disable>Select Thickness</option><option value="5.5">5 mm x 5 mm</option><option value="6.6">6 mm x 6 mm</option>');
                    $('#blockprice').val('');
                    $(document).on('change','#blockthick', function(){
                        if($(this).val() == 5.5){
                            $('#blockprice').val('49600.00');
                        }else if($(this).val() == 6.6){
                            $('#blockprice').val('55350.00');
                        }
                    });
                }else if($(this).val() == 2000){
                    $('#blockthick').html('<option value=""  disable>Select Thickness</option><option value="5.5">5 mm x 5 mm</option><option value="6.6">6 mm x 6 mm</option>');
                    $('#blockprice').val('');
                    $(document).on('change','#blockthick', function(){
                        if($(this).val() == 5.5){
                            $('#blockprice').val('62200.00');
                        }else if($(this).val() == 6.6){
                            $('#blockprice').val('69300.00');
                        }
                    });
                }
            });
        }
        if (category == 3){
            $('.compressor').show();
        }
    });
</script>
<script>

$(document).on('change','.producttype',function(){

    // $(".producttype").change(function(){
        var protype = $(this).val();
        // alert(protype);
        var ltrs = $(this).closest("tr").find(".ltrs");
        var size = $(this).closest("tr").find(".size");
        var hp = $(this).closest("tr").find(".hp");
        var thickness = $(this).closest("tr").find(".thickness");
        var pump = $(this).closest("tr").find(".pump");
        var modaltype = $(this).closest("tr").find(".modaltype");
        var aircooled = $(this).closest("tr").find(".aircooled");
        var qty = $(this).closest("tr").find(".qty");
        var rate = $(this).closest("tr").find(".rate");
        var guardrate = $(this).closest("tr").find(".guardrate");
        var withelectric = $(this).closest("tr").find(".withelectric");
        var withoutlectric = $(this).closest("tr").find(".withoutlectric");


        $.ajax({
        type:"GET",
        url: "/getproductspec/"+protype,
        // async: false,
        // cache: false,
        // contentType: false,
        // processData: false,

        success: function(data) {

            // closest("tr").find(".hra").val();
            ltrs.val(data.ltrs);
            size.val(data.size);
            hp.val(data.hp);
            thickness.val(data.thickness);
            pump.val(data.pump);
            modaltype.val(data.model_type);
            aircooled.val(data.air_cooled);
            rate.val(data.rate);
            guardrate.val(data.guard_rate);
            withelectric.val(data.withele);
            withoutlectric.val(data.withoutele);


        },
    });

    });


</script>

<script>
     $(document).on('change','.qty',function(){

        var qty = $(this).val();

        var rate = $(this).closest("tr").find(".rate").val();
        // var guardrate = $(this).closest("tr").find(".guardrate").val();

        // var withelectric = $(this).closest("tr").find(".withelectric").val();
        // var withoutlectric = $(this).closest("tr").find(".withoutlectric").val();
        var totamt = $(this).closest("tr").find(".totamt");

        if(rate == '')
        {
            rate = 0;
        }
        else
        {
            rate = parseInt(rate);
        }

        var totamt1 = parseInt(rate);
        // alert(totamt);
        totamt.val(totamt1*qty);
    });

    $(document).on('change','.rate',function(){
        // alert("test");
        var rate = $(this).val();

        var qty = $(this).closest("tr").find(".qty").val();
        // var guardrate = $(this).closest("tr").find(".guardrate").val();

        // var withelectric = $(this).closest("tr").find(".withelectric").val();
        // var withoutlectric = $(this).closest("tr").find(".withoutlectric").val();
        var totamt = $(this).closest("tr").find(".totamt");

        if(rate == '')
        {
            rate = 0;
        }
        else
        {
            rate = parseInt(rate);
        }

        var totamt1 = parseInt(rate);
        // alert(totamt);
        totamt.val(totamt1*qty);
    });

    $(document).on('keyup','.guardrate',function(){
        var guardrate = $(this).val();

        var rate = $(this).closest("tr").find(".rate").val();
        var qty = $(this).closest("tr").find(".qty").val();

        var withelectric = $(this).closest("tr").find(".withelectric").val();
        var withoutlectric = $(this).closest("tr").find(".withoutlectric").val();
        var totamt = $(this).closest("tr").find(".totamt");

        if(rate == '')
        {
            rate = 0;
        }
        else
        {
            rate = parseInt(rate);
        }

        if(guardrate == '')
        {
            guardrate = 0;
        }
        else
        {
            guardrate = parseInt(guardrate);
        }

        if(withelectric == '')
        {
            withelectric = 0;
        }
        else
        {
            withelectric = parseInt(withelectric);
        }

        if(withoutlectric == '')
        {
            withoutlectric = 0;
        }
        else
        {
            withoutlectric = parseInt(withoutlectric);
        }


        var totamt1 = parseInt(rate)+parseInt(guardrate)+parseInt(withelectric)+parseInt(withoutlectric);
        // alert(totamt);
        totamt.val(totamt1);
    });

    $(document).on('keyup','.withelectric',function(){
        var withelectric = $(this).val();

        var rate = $(this).closest("tr").find(".rate").val();
        var qty = $(this).closest("tr").find(".qty").val();

        var guardrate = $(this).closest("tr").find(".guardrate").val();
        var withoutlectric = $(this).closest("tr").find(".withoutlectric").val();
        var totamt = $(this).closest("tr").find(".totamt");

        if(rate == '')
        {
            rate = 0;
        }
        else
        {
            rate = parseInt(rate);
        }

        if(guardrate == '')
        {
            guardrate = 0;
        }
        else
        {
            guardrate = parseInt(guardrate);
        }

        if(withelectric == '')
        {
            withelectric = 0;
        }
        else
        {
            withelectric = parseInt(withelectric);
        }

        if(withoutlectric == '')
        {
            withoutlectric = 0;
        }
        else
        {
            withoutlectric = parseInt(withoutlectric);
        }


        var totamt1 = parseInt(rate)+parseInt(guardrate)+parseInt(withelectric)+parseInt(withoutlectric);
        // alert(totamt);
        totamt.val(totamt1);
    });

    $(document).on('keyup','.withoutlectric',function(){
        var withoutlectric = $(this).val();

        var rate = $(this).closest("tr").find(".rate").val();
        var qty = $(this).closest("tr").find(".qty").val();

        var guardrate = $(this).closest("tr").find(".guardrate").val();
        var withelectric = $(this).closest("tr").find(".withelectric").val();
        var totamt = $(this).closest("tr").find(".totamt");

        if(rate == '')
        {
            rate = 0;
        }
        else
        {
            rate = parseInt(rate);
        }

        if(guardrate == '')
        {
            guardrate = 0;
        }
        else
        {
            guardrate = parseInt(guardrate);
        }

        if(withelectric == '')
        {
            withelectric = 0;
        }
        else
        {
            withelectric = parseInt(withelectric);
        }

        if(withoutlectric == '')
        {
            withoutlectric = 0;
        }
        else
        {
            withoutlectric = parseInt(withoutlectric);
        }


        var totamt1 = parseInt(rate)+parseInt(guardrate)+parseInt(withelectric)+parseInt(withoutlectric);
        // alert(totamt);
        totamt.val(totamt1);
    });
</script>

<script>
    $(document).ready(function () {

$(".removestage:first").css("visibility", "hidden");

$(".basic").select2();

$(document).on("click", ".addstage", function () {

    $(".basic").select2('destroy');

    setTimeout(function () {
        $(".basic").select2();

    }, 100);

    $(".removestage:first").css("visibility", "visible");

    var main = $("#appendstageparent");

    // var appendstage = main.children('.appendstage')[0].outerHTML;

    var appendstage = $(this).closest("tr").html();

    if ($(".removestage:first").css("visibility", "visible")) {
        if (main.append("<tr class='appendstage'>" + appendstage + "</tr>")) {
            $(".addstage:first").prop("disabled", true);
            $(".removestage:first").css("visibility", "hidden");
        }
    }

});

$(document).on("click", ".removestage", function () {
    if ($(this).closest("tr").remove()) {
        if ($(".addstage").length == 1) {
            $(".addstage:first").prop("disabled", false);
            $(".removestage:first").css("visibility", "hidden");
        }
    }

})
});

// $(document).on("change",".productdesc",function(){
// var descid = $(this).val();
// // var re = $(this).closest('tr').find('.requestprice');
// var reqprice = $(this).closest("tr").find(".requestprice");
// $.ajax({
//         type:"GET",
//         url: "/getproductdesc/"+descid,

//         success: function(data) {

//             reqprice.val(data.price);

//         },
//     });
// });

</script>


<script>
    $(document).ready(function () {

$(".removestage1:first").css("visibility", "hidden");

$(".basic").select2();

$(document).on("click", ".addstage1", function () {

    $(".basic").select2('destroy');

    setTimeout(function () {
        $(".basic").select2();

    }, 100);

    $(".removestage1:first").css("visibility", "visible");

    var main = $("#appendstageparent1");

    // var appendstage = main.children('.appendstage')[0].outerHTML;

    var appendstage = $(this).closest("tr").html();

    if ($(".removestage1:first").css("visibility", "visible")) {
        if (main.append("<tr class='appendstage1'>" + appendstage + "</tr>")) {
            $(".addstage1:first").prop("disabled", true);
            $(".removestage1:first").css("visibility", "hidden");
        }
    }

});

$(document).on("click", ".removestage", function () {
    if ($(this).closest("tr").remove()) {
        if ($(".addstage").length == 1) {
            $(".addstage:first").prop("disabled", false);
            $(".removestage:first").css("visibility", "hidden");
        }
    }

})
});
</script>

<script>
    $(document).on("change",".suppliername",function(){
        var suppliername = $(this).val();
        $.ajax({
        type:"GET",
        url: "/getsupplierdesc/"+suppliername,
        // async: false,
        // cache: false,
        // contentType: false,
        // processData: false,

        success: function(data) {

            $(".productdesc option").remove().end();
                    $.each(data,function(key, item){
                        // console.log(item.descriptions);
                        $('.productdesc').append(
                            '<option value="'+item.id+'">'+item.descriptions+'</option>'
                        )

                    });

        },
    });
    });
</script>

<script>
    $(document).on("keyup",".purchaseqty",function(){
        var qty = $(this).val();
        var price = $(this).closest("tr").find(".requestprice").val();
        $(this).closest("tr").find(".amt2").val(price*qty);

        // alert(price*qty);
        var total_price=0;
        $(".amt2").each(function(){
            total_price += parseInt($(this).val());
        });
        var gstcalc = total_price/100*9;
        // alert(gstcalc.toFixed(2))
        var sgst = $("#txtcgst").val(gstcalc.toFixed(2));
        var cgst = $("#txtsgst").val(gstcalc.toFixed(2));
        var gst = parseFloat(cgst)+parseFloat(sgst);
        var tprice = total_price.toFixed(2);

        $(".totamt").val(tprice);
        var txtcgst = $("#txtcgst").val();
        var txtsgst = $("#txtsgst").val();
        var totamt = $("#subtotal").val();
        $(".finalamt").val(parseFloat(txtcgst)+parseFloat(txtsgst)+parseFloat(totamt));
    })

</script>



<script>
    $(document).on("change",".poid",function(){
        var poid = $(this).val();
        // alert("alert");

        $.ajax({
        type:"GET",
        url: "/getpodetails/"+poid,

        success: function(data) {
            $("#suppliername").val(data.name);
            $("#oldsuppliername").val(data.id);

        },
    });

    });
</script>

<script>
    $(document).on("change",".poid",function(){
        var poid = $(this).val();

        $.ajax({
        type:"GET",
        url: "/getpoproductdetails/"+poid,

        success: function(data) {

            $('.purchaseentrytable tbody').html("");
                    $.each(data,function(key, item){
                        $('.purchaseentrytable tbody').append(
                            '<tr>\
                            <td><input type="text" readonly class="form-control" name="itemdescription[]" value="'+item.descriptions+'"><input type="hidden" class="descriptionid" name="descriptionid[]" value="'+item.itemdescription+'"></td>\
                            <td><input type="number" readonly class="form-control" name="reqsno[]" value="'+item.requestsno+'"></td>\
                            <td><input type="number" class="form-control requestprice " name="price[]" value=""><input type="hidden" name="porate" class="porate" value="'+item.price+'"><span class="text-danger" id="rateerrortxt"></span></td>\
                            <td><input type="number" class="form-control purchaseqty" name="qty[]" value="" max="'+item.pending_count+'"></td>\
                            <td><input type="number" class="form-control amt2" name="amt[]" value=""></td>\
                         </tr>'
                        )

                    });

        },
    });

    });
</script>
<script>


    $(document).on("blur",".requestprice",function(){
        var requestprice = $(this).val();
        var porate = $(this).closest("tr").find(".porate").val();

        // alert(requestprice);
        // alert(porate);

        if(requestprice == porate)
        {
            $("#rateerrortxt").text("");
        }
        else
        {
            $("#rateerrortxt").text("Please check PO rate");
        }
    })

</script>

<script>
    $(document).on("click",".supplieredit",function(){

        var editid = $(this).data("id");

        $.ajax({
        url: "/supplieredit/"+editid,
        method: "GET",

        success: function(response) {

            // alert(response.basisofapproval);
                $("#modaledit").modal('show');
                $("#suppliercode1").val(response.suppliercode);
                $("#suppliername1").val(response.name);
                $("#gstnumber1").val(response.gstnum);
                $("#address1").val(response.address);
                $("#cpersonname1").val(response.contactpersonname);
                $("#cpersonnum1").val(response.contactpersonnum);
                $("#approvedproducts1").val(response.approvedproducts);
                $("#paymentterms1").val(response.paymentterms);
                $("#basicapproval1").val(response.basisofapproval);
                $("#associatedfrom1").val(response.associatedfrom);
                $("#validityapproval1").val(response.validityofapproval);
                $("#remarks1").val(response.remarks);
                $("#id").val(response.id);
        }
        });


    });

</script>

<script>
    $(document).on("click",".purchaseitemedit",function(){
        var editid = $(this).data("id");

        $.ajax({
        url: "/purchaseitemedit/"+editid,
        method: "GET",

        success: function(response) {

            // alert(response.basisofapproval);
                $("#purchaseitemedit").modal('show');
                $("#approvedproducts").val(response.productname);
                $("#suppliername").val(response.supplier_name);
                $("#descriptionofworks").val(response.descriptions);
                $("#price1").val(response.price);

                $("#id").val(response.id);
        }
        });
    });
</script>
<script>
    $(document).on("click",".viewpurchasereq",function(){
        var purchasereqid = $(this).data("reqid");

        $.ajax({
        type:"GET",
        // url: "/getpoproductdetails/"+poid,
        url: "/viewrequestdetail/"+purchasereqid,
        success: function(data) {
            $("#viewrequest").modal('show');

            $('.requestdetails tbody').html("");
                    $.each(data,function(key, item){
                        $('.requestdetails tbody').append(
                            '<tr>\
                            <td>'+item.request_serial_no+'</td>\
                            <td>'+item.requestid+'</td>\
                            <td>'+item.desc_text+'</td>\
                            <td>'+item.price+'</td>\
                         </tr>'
                        )

                    });

        },
    });

    });
</script>
{{-- <script>
    $(document).on("click",".viewpurchasereq",function(){
        var purchasereqid = $(this).data("reqid");

        $.ajax({
            type: "GET",
            url: "/viewrequestdetail/"+purchasereqid,

        success: function(data) {

            // alert(response.basisofapproval);
            $("#viewrequest").modal('show');

            $('.requestdetails tbody').html("");
                    $.each(data,function(key, item){

                        $('.requestdetails tbody').append(
                            '<tr>\
                            <td>'+item.requestid+'</td>\
                            <td>'+item.description+'</td>\
                            <td>'+item.price+'</td>\
                         </tr>'
                        )

                    });


        }
        });


    });
</script> --}}

{{-- Validation  --}}

<script>
    $(document).on("blur","#suppliercode",function(){
        var suppliercode = $(this).val();

        if(suppliercode.length > 15)
        {
            $("#supplier-code-errortxt").text("Please enter length less than 15");
        }
     });

     $(document).on("blur","#suppliername",function(){
        var suppliername = $(this).val();
        if(suppliername.length > 30)
        {
            $("#supplier-name-errortxt").text("Please enter length less than 30");
        }
     });

     $(document).on("blur","#gstnumber",function(){
        var gstnumber = $(this).val();

        if(gstnumber.length > 15)
        {
            $("#gst-number-errortxt").text("Please enter length less than 15");
        }
     });

     $(document).on("blur","#cpersonname",function(){
        var cpersonname = $(this).val();

        if(cpersonname.length > 35)
        {
            $("#gst-cpersonname-errortxt").text("Please enter length less than 15");
        }
        else
        {
            $("#gst-cpersonname-errortxt").text("");
        }

     });

     $('#cpersonname').keyup(function(e) {

    if(e.keyCode >= 96 && e.keyCode <= 105) { //0-9 only
        // alert("dont enter");
        $("#gst-cpersonname-errortxt").text("Please enter Text only");
    }
    else
    {
        $("#gst-cpersonname-errortxt").text("");
    }

    if(e.keyCode >= 48 && e.keyCode <= 57) { //0-9 only
        // alert("dont enter");
        $("#gst-cpersonname-errortxt").text("Please enter Text only");
    }
    else
    {
        $("#gst-cpersonname-errortxt").text("");
    }
});

$('#cpersonnum').keyup(function(e) {

if(e.keyCode >= 65 && e.keyCode <= 90) { //0-9 only
    // alert("dont enter");
    $("#gst-cpersonnumber-errortxt").text("Please enter Number only");
}
else
{
    $("#gst-cpersonnumber-errortxt").text("");
}

});

$('#price').keyup(function(e) {

if(e.keyCode >= 65 && e.keyCode <= 90) { //0-9 only
    // alert("dont enter");
    $("#price-error-text").text("Please enter Number only");
}
else
{
    $("#price-error-text").text("");
}
});



</script>

<script>
    $(document).on("keyup","#categorydesignation",function(){

        var categorydesignation = $(this).val();
        $.ajax({
        url: "/designationvalidation/"+categorydesignation,
        method: "GET",

        success: function(response) {

            if(response !=0)
            {
                $("#category_err").text("Already saved");
            }
            else
            {
                $("#category_err").text("");
            }
        }
        });

    });
</script>

<script>

$(document).on("click",".deleempreport",function(){




const empid = $(this).data("id");

Swal.fire({
title: "Are you sure?",
text: "Delete the Employee",
icon: "warning",
showCancelButton: true,
confirmButtonColor: "#3085d6",
cancelButtonColor: "#d33",
confirmButtonText: "Yes, Delete!",
}).then((result) => {
if (result.isConfirmed) {
    $.ajax({
        method: "GET",
        url:'/deleteemp/'+empid,
        success: function (data) {
            Swal.fire(
                "Delete!",
                "Your File Deleted.",
                "success"
            ).then((result) => {
                location.reload();
                // $("#example").DataTable().destroy();
                // dataTableReRender();
            });
        },
        error: function (data) {
            Swal.fire(
                "Deleted!",
                "Your file has been deleted.",
                "success"
            );
        },
    });
}
});
});
</script>

<script>

    $(document).on("click",".deletedesig",function(){
    const desigid = $(this).data("id");

    Swal.fire({
    title: "Are you sure?",
    text: "Delete the Designation",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete!",
    }).then((result) => {
    if (result.isConfirmed) {
        $.ajax({
            method: "GET",
            url:'/deletedesignation/'+desigid,
            beforeSend: function() {
              $("#responseloader").show();
           },
            success: function (data) {
                Swal.fire(
                    "Delete!",
                    "Deleted Successfully.",
                    "success"
                ).then((result) => {
                    $("#responseloader").hide();
                    location.reload();
                    // $("#example").DataTable().destroy();
                    // dataTableReRender();
                });
            },
            error: function (data) {
                Swal.fire(
                    "Deleted!",
                    "Your file has been deleted.",
                    "success"
                );
            },
        });
    }
    });
    });
    </script>


<script>

    $(document).on("click",".deleteuser",function(){
    const desigid = $(this).data("id");

    Swal.fire({
    title: "Are you sure?",
    text: "Delete the User",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Delete!",

    }).then((result) => {
    if (result.isConfirmed) {
        $.ajax({
            method: "GET",
            url:'/deleteuser/'+desigid,
        //     beforeSend: function() {
        //       $("#responseloader").show();
        //    },
            success: function (data) {
                Swal.fire(
                    "Delete!",
                    "Deleted Successfully.",
                    "success"
                ).then((result) => {
                    // $("#responseloader").hide();
                    location.reload();
                    // $("#example").DataTable().destroy();
                    // dataTableReRender();
                });
            },
            error: function (data) {
                Swal.fire(
                    "Deleted!",
                    "Your file has been deleted.",
                    "success"
                );
            },
        });
    }
    });
    });
    </script>
<script>

$("#saveemployee").submit(function(){

var chk1 = $("#empprefix").val();
var chk2 = $("#empid").val();
var chk3 = $("#name").val();
var chk4 = $("#dob").val();
var chk5 = $("#Qualification").val();
var chk6 = $("#mobile_no").val();
var chk7 = $("#gender").val();
var chk8 = $("#doj").val();
var chk9 = $("#empcat").val();
var chk10 = $("#empblood").val();
var chk11 = $("#emptempaddr").val();
var chk12 = $("#allowancetype").val();
var chk13 = $("#designation2").val();
var chk14 = $("#aadhaarno").val();


if(chk1 == '')
{
    $(".validation-error").text("Employee Prefix required");
}
if(chk2 == '')
{
    $(".validation-error").text("Employee ID required");
}
if(chk3 == '')
{
    $(".validation-error").text("Employee Name required");
}
if(chk4 == '')
{
    $(".validation-error").text("Date Of Birth required");
}
if(chk5 == '')
{
    $(".validation-error").text("Qualification required");
}
if(chk6 == '')
{
    $(".validation-error").text("Mobile Number required");
}
if(chk7 == '')
{
    $(".validation-error").text("Gender required");
}
if(chk8 == '')
{
    $(".validation-error").text("Date Of Joining required");
}
if(chk9 == '')
{
    $(".validation-error").text("Employee Category required");
}
if(chk10 == '')
{
    $(".validation-error").text("Employee Blood required");
}
if(chk11 == '')
{
    $(".validation-error").text("Employee Address required");
}
if(chk12 == '')
{
    $(".validation-error").text("Allowance Type required");
}
if(chk13 == '')
{
    $(".validation-error").text("Designation required");
}
if(chk14 == '')
{
    $(".validation-error").text("Aadhar required");
}

if(chk1 != '' && chk2 != '' && chk3 != '' && chk4 != '' && chk5 != '' && chk6 != '' && chk7 != '' && chk8 != '' && chk9 != '' && chk10 != '' && chk11 != '' && chk12 != '' && chk13 != '' && chk14 != '')
{
    $.ajax({
    type:"POST",
    url: "/saveemployee",
    data:new FormData(this),
//    async: false,
   cache: false,
   contentType: false,
   processData: false,
   beforeSend: function() {
       $(".preloader").fadeIn();
   },
    success: function(data) {

        if($.isEmptyObject(data.error)){
            // alert(data.success);


            $(".preloader").fadeOut();
            Swal.fire(
                'Success!',
                'Employee Saved Successfully..',
                'success'
              )
              location.reload();

            }
            else
            {
                printErrorMsg(data.error);
            }
        },


    });
}
// if(Formvalidation(input)){

// }

});

</script>

<script>
    $(document).on("click",".deletebank",function(){

const bankid = $(this).data("id");

Swal.fire({
title: "Are you sure?",
text: "Delete the Bank Details",
icon: "warning",
showCancelButton: true,
confirmButtonColor: "#3085d6",
cancelButtonColor: "#d33",
confirmButtonText: "Yes, Delete!",
}).then((result) => {
if (result.isConfirmed) {
    $.ajax({
        method: "GET",
        url:'/deletebank/'+bankid,
        success: function (data) {
            Swal.fire(
                "Delete!",
                "Your File Deleted.",
                "success"
            ).then((result) => {
                location.reload();
                // $("#example").DataTable().destroy();
                // dataTableReRender();
            });
        },
        error: function (data) {
            Swal.fire(
                "Deleted!",
                "Your file has been deleted.",
                "success"
            );
        },
    });
}
});
});
</script>

<script>
    $(document).on("click",".bankedit",function(){
        var bankid = $(this).data("id");
        // alert(bankid);
        $.ajax({
            method: "GET",
               url:'/editbank/'+bankid,
        success: function (data) {
            $("#editBank").modal('show');

            $("#accountname").val(data.accountname);
            $("#accountcode").val(data.accountcode);
            $("#currency").val(data.currency);
            $("#accountnum").val(data.accountnum);
            $("#bankname").val(data.bankname);
            $("#ifsc").val(data.ifsc);
            $("#swiftcode").val(data.swiftcode);
            $("#micrcode").val(data.micrcode);
            $("#branch").val(data.branch);
            $("#description").val(data.description);
            $("#id").val(data.id);
        },
            })
    });
</script>

<script>
    $(document).on("click",".deleteproduct",function(){




const proid = $(this).data("id");

Swal.fire({
title: "Are you sure?",
text: "Delete the Product",
icon: "warning",
showCancelButton: true,
confirmButtonColor: "#3085d6",
cancelButtonColor: "#d33",
confirmButtonText: "Yes, Delete!",
}).then((result) => {
if (result.isConfirmed) {
    $.ajax({
        method: "GET",
        url:'/deleteapproveproduct/'+proid,
        success: function (data) {
            Swal.fire(
                "Delete!",
                "Product Deleted.",
                "success"
            ).then((result) => {
                location.reload();
                // $("#example").DataTable().destroy();
                // dataTableReRender();
            });
        },
        error: function (data) {
            Swal.fire(
                "Deleted!",
                "Your file has been deleted.",
                "success"
            );
        },
    });
}
});
});
</script>

<script>
    $("#user_add").blur(function(){
    var lettersRegex = /^[a-zA-Z]+$/;

    var name = $(this).val();
    var out = lettersRegex.test(name);

    if(name.length != 0)
    {
        if(out == false)
        {
            $("#name-error").text("Letters only allowed don't use numbers & special char");
            $(this).focus();
        }
        else
        {
            $("#name-error").text("");
        }
    }
    else
    {
        $("#name-error").text("");
    }

});
$("#email1").blur(function(){
    var lettersRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

var email = $(this).val();
var out = lettersRegex.test(email);

if(email.length != 0)
{
    if(out == false)
    {
        $("#email-error").text("Email format error");
        $(this).focus();
    }
    else
    {
        $("#email-error").text("");
    }
}
else
{
    $("#email-error").text("");
}
});
$("#email").blur(function(){
    // alert("test");
    var lettersRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    var email = $(this).val();
    var out = lettersRegex.test(email);

    if(email.length != 0)
    {
        if(out == false)
        {
            $("#email-error").text("Email format error");
            $(this).focus();
        }
        else
        {
            $("#email-error").text("");
        }
    }
    else
    {
        $("#email-error").text("");
    }

});

$("#mobilenum").blur(function(){
    // var lettersRegex = /^[0-9]{12}$/;
    var lettersRegex = /^\+91-\d{10}$/;

    var mobilenum = $(this).val();
    var out = lettersRegex.test(mobilenum);

    if(mobilenum.length != 0)
    {
        if(out == false)
        {
            $("#mobile-error").text("Enter 10 digit numbers only");
            $(this).focus();
        }
        else
        {
            $("#mobile-error").text("");
        }
    }
    else
    {
        $("#mobile-error").text("");
    }

});


$("#gst").blur(function(){
    var lettersRegex = /^([0-9]{2}[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}[0-9]{1}[zZ]{1}[0-9]{1})$/;

    var gst = $(this).val();
    var out = lettersRegex.test(gst);

    if(gst.length != 0)
    {
        if(out == false)
        {
            $("#gst-error").text("GST Format Error");
            $(this).focus();
        }
        else
        {
            $("#gst-error").text("");
        }
    }
    else
    {
        $("#gst-error").text("");
    }

});


$("#password").blur(function(){
    var lettersRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    var password = $(this).val();
    var out = lettersRegex.test(password);

    if(password.length != 0)
    {
        if(out == false)
        {
            $("#password-error").text("8 Digit mandatory 1 Letter Capital 1 Small 1 Special Characted");
            $(this).focus();
        }
        else
        {
            $("#password-error").text("");
        }
    }
    else
    {
        $("#password-error").text("");
    }

});

</script>
