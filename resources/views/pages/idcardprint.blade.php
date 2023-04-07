
<html>
    <head>
    <title>ID Card</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    </head>

    <style>
        body
        {
            font-family: 'Roboto', sans-serif;
        }
        .bg-img
{
    background-image:url('dist/img/idbg.png');background-repeat:no-repeat;border-radius:16px;border:1px solid #192a9f;height:530px;width:330px;background-size:cover;
}
    </style>
    <body>

        <div class="idcontainer" style="display:flex">
            <div id="">
                <div class="bg-img" style="width:330px">
                    <img src="/assets/img/logo.jpg" style="width:200px;display:block;margin:60px auto 30px">
                    <div style="width:130px;height:130px;border:3px solid #192a9f;border-radius:3px;margin:0 auto;display:block">
                    @if($emp->image != '')
                        <img src="/images/{{$emp->image}}" style="width:130px;height:130px">
                        @else
                        <img src="/images/user-512.webp" style="width:130px;height:130px">
                    @endif

                    </div>
                    <table style="width:100%;margin-top:30px">
                        <thead>
                            <tr >
                                <th style="width:40%;text-align:left;margin-top:20px;font-size:13px"><span style="margin-left:40px;">Name</span></th>
                                <th style="text-align:left;margin-top:10px;font-size:13px">: &nbsp;{{$emp->name}}</th>
                            </tr>
                            <tr>
                                <th style="text-align:left;padding-top:10px;font-size:13px"><span style="margin-left:40px">ID Number</span></th>
                                <th style="text-align:left;margin-top:20px;font-size:13px">: &nbsp;{{$emp->emp_id}}</th>
                            </tr>
                            <tr>
                            <th style="text-align:left;padding-top:10px;font-size:13px"><span style="margin-left:40px">Designation</span></th>
                                <th style="text-align:left;margin-top:20px;font-size:13px">: &nbsp;{{$emp->designation_2}}</th>
                            </tr>

                        </thead>
                    </table>
                </div>
            </div>
            <div id="">
                <div class="bg-img" style="width:330px;margin-left:20px">
                    {{-- @dd($emp); --}}
                    <p style="font-size:13px;font-weight:bold;margin-top:50px;margin-left:30px;color:#ed3833"> Address : </p>
                    <p style="font-size:13px;font-weight:bold;margin-left:30px;line-height:1.5">{{$emp->perm_addr}}</p>
                    <!--<p style="font-size:16px;font-weight:bold;margin-left:30px;line-height:0.5"> ............................................................ </p>                -->
                    <!--<p style="font-size:16px;font-weight:bold;margin-left:30px;line-height:0.5"> ............................................................ </p>-->
                    <p style="font-size:13px;font-weight:bold;margin-left:30px;color:#ed3833"> Blood Group &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <span style="color:#000">{{$emp->blood_group}} </span> </p>
                    {{-- @dd($empfamily); --}}
                    <p style="font-size:13px;font-weight:bold;margin-left:30px;color:#ed3833"> D.O.B  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <span style="color:#000">{{$emp->dob}} </span> </p>
                    <p style="font-size:13px;font-weight:bold;margin-left:30px;color:#ed3833"> Family No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  <span style="color:#000">{{$emp->nominee_num}}<span> </p>
                    <p style="font-size:13px;font-weight:bold;margin-left:30px;color:#ed3833"> Employee No &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  <span style="color:#000"> {{$emp->mobile_num}} <span> </p>
                    <p style="font-size:13px;font-weight:bold;margin-left:30px;color:#ed3833"> Validity &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:  <span style="color:#000">1 Year</span> </p>
                    <p style="font-size:14px;font-weight:bold;color:#000;text-align:right;margin-top:30px;margin-right:35px"> Authorised Signature</p>
                    <!-- <p style="font-size:14px;font-weight:bold;color:#ed3833;text-align:center;margin-top:20px;"> Registered Office</p>                 -->
                    <p style="font-size:18px;font-weight:bold;color:#192a9f;font-weight:bold;text-align:center;margin-top:40px;line-height:0"> {{$company->companyname}} </p>
                    <p style="font-size:14px;font-weight:bold;color:#ed3833;text-align:center;margin-top:0px;line-height:1.4"> NO. 1/71-2, Podhiyampalayam Pirivu, <br>Vagarayampalayam Road, <br> Arasur, Coimbatore - 641407<br>+91-9842295577<br>+91-9787775576</p>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </body>
</html>

<script>
    window.print();
</script>
