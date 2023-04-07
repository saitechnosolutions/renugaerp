@extends('layout.app');
@section('title','ERP - Estimate');
@section('main-content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-lg-12 layout-spacing">

                <div class="widget-content widget-content-area br-6">
                    <h4><b>Lead View</b></h4>
                    @if(session()->get('success'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{session()->get('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                    @endif
                    <div class="row mt-3">


                        {{-- <div class="col-lg-2">
                            <button class="btn btn-success w-100" data-toggle="modal" data-target="#mail"><i class="bi bi-send-check-fill"></i>&nbsp;&nbsp;&nbsp;Send Mail</button>
                        </div> --}}
                        <div class="col-lg-2">
                            <button class="btn btn-info w-100 conertlead" data-leadid="{{$lead->leadid}}" data-toggle="modal" data-target="#exampleModal2"><i class="bi bi-arrow-repeat"></i>&nbsp;&nbsp;Convert</button>
                        </div>
                        <div class="col-lg-2">
                            <button class="btn btn-primary w-100 addfollowup" data-leadid="{{$lead->leadid}}" data-toggle="modal" data-target="#exampleModal1"><i class="bi bi-book-fill"></i>&nbsp;&nbsp;Add Follow up</button>
                        </div>
                        <div class="col-lg-2">
                            <button class="btn btn-warning  w-100" data-toggle="modal" data-target="#createproposal"><i class="bi bi-card-text"></i>&nbsp;&nbsp;Create Proposal</button>
                        </div>
                        <div class="col-lg-2">
                            <a href="/leadedit/{{$lead->id}}" class="btn btn-success w-100"><i class="bi bi-pencil-square"></i>&nbsp;&nbsp;Edit</a>
                        </div>
                        <div class="col-lg-2 ">
                            <a href="deletelead/{{$lead->id}}"  onclick="return confirm('Do You want Delete this Data?')" class="btn btn-danger w-100" title="Delete Leads">&nbsp;&nbsp;Delete</a>
                            {{-- <button class="btn btn-danger w-100"><i class="bi bi-trash-fill"></i>&nbsp;&nbsp;Delete</button> --}}
                        </div>
                        <div class="col-lg-2">
                            <button onclick="window.history.back()" class="btn btn-info w-100 conertlead" ><i class="bi bi-arrow-repeat"></i>&nbsp;&nbsp;Back</button>
                        </div>
                    </div>
                    <div class="row mt-3">

                        <div class="col-lg-4 mt-2">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row">
                                       <div class="col-lg-3">
                                        <i class="mt-2 text-primary bi bi-calendar-fill" style="font-size:50px"></i>
                                       </div>
                                       <div class="col-lg-9">
                                            <h5><b>Lead Entry Date</b></h5>
                                            <p>{{$lead->leadentrydate}}</p>
                                       </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-2">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row">
                                       <div class="col-lg-3">
                                        <i class="mt-2 text-warning bi bi-person-circle" style="font-size:50px"></i>
                                       </div>
                                       <div class="col-lg-9">
                                            <h5><b>Customer Name</b></h5>
                                            <p>{{$lead->customername}}</p>
                                       </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-2">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row">
                                       <div class="col-lg-3">
                                        <i class="mt-2 text-info bi bi-phone-vibrate-fill" style="font-size:50px"></i>
                                       </div>
                                       <div class="col-lg-9">
                                            <h5><b>Mobile Number</b></h5>
                                            <p>{{$lead->mobilenumber}}</p>
                                       </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-2">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row">
                                       <div class="col-lg-3">
                                        <i class="mt-2 text-danger bi bi-envelope-fill" style="font-size:50px"></i>
                                       </div>
                                       <div class="col-lg-9">
                                            <h5><b>E-mail ID</b></h5>
                                            <p>{{$lead->email}}</p>
                                       </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-2">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row">
                                       <div class="col-lg-3">
                                        <i class="mt-2 text-secondary bi bi-map-fill" style="font-size:50px"></i>
                                       </div>
                                       <div class="col-lg-9">
                                            <h5><b>Address</b></h5>
                                            <p>{{$lead->address}}</p>
                                       </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-2">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row">
                                       <div class="col-lg-3">
                                        <i class="mt-2 text-warning bi bi-map-fill" style="font-size:50px"></i>
                                       </div>
                                       <div class="col-lg-9">
                                            <h5><b>Deal Name</b></h5>
                                            @if($dealname = App\Models\quotedproduct::where('id',$lead->dealname)->first())
                                                <p>{{$dealname->productname}}</p>
                                            @endif

                                       </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-2">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row">
                                       <div class="col-lg-3">
                                        <i class="mt-2 text-primary bi bi-map-fill" style="font-size:50px"></i>
                                       </div>
                                       <div class="col-lg-9">
                                            <h5><b>Deal Value</b></h5>
                                            <p>{{$lead->dealvalue}}</p>
                                       </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-2">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row">
                                       <div class="col-lg-3">
                                        <i class="mt-2 text-success bi bi-map-fill" style="font-size:50px"></i>
                                       </div>
                                       <div class="col-lg-9">
                                            <h5><b>Type</b></h5>
                                            <p>{{$lead->type}}</p>
                                       </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-2">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row">
                                       <div class="col-lg-3">
                                        <i class="mt-2 text-danger bi bi-map-fill" style="font-size:50px"></i>
                                       </div>
                                       <div class="col-lg-9">
                                            <h5><b>Call Stage</b></h5>
                                            <p>{{$lead->callstage}}</p>
                                       </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-2">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row">
                                       <div class="col-lg-3">
                                        <i class="mt-2 text-warning bi bi-map-fill" style="font-size:50px"></i>
                                       </div>
                                       <div class="col-lg-9">
                                            <h5><b>Lead Source</b></h5>
                                            <p>{{$lead->leadsource}}</p>
                                       </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-2">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row">
                                       <div class="col-lg-3">
                                        <i class="mt-2 text-info bi bi-map-fill" style="font-size:50px"></i>
                                       </div>
                                       <div class="col-lg-9">
                                            <h5><b>Lead Status</b></h5>
                                            <p><span class="badge badge-secondary">{{$lead->leadstatus}}</span></p>
                                       </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-2">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row">
                                       <div class="col-lg-3">
                                        <i class="mt-2 text-info bi bi-map-fill" style="font-size:50px"></i>
                                       </div>
                                       <div class="col-lg-9">
                                            <h5><b>Assign to</b></h5>
                                            @if($username = App\Models\User::where('id', array($lead->assign_userid))->first())
                                                <p>{{$username->name}}</p>
                                            @endif

                                       </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="mt-5"><b>Notes</b></h4>

                    <div class="col-lg-12">
                        <ul class="list-group">
                            @if($notes = App\Models\follow_up::where('leadid', array($lead->leadid))->orderby('id','desc')->get())
                                @foreach ($notes as $note)
                                <li class="list-group-item">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <div class="row">
                                               <div class="col-lg-1">
                                                <i class="mt-2 text-info bi bi-book" style="font-size:50px"></i>
                                               </div>
                                               <div class="col-lg-9">
                                                    <h5><b>{{$note->title}}</b></h5>
                                                    <p>{{$note->description}}</p>
                                                    <span class="badge badge-success">Created at : {{$note->created_at}}</span>
                                                    @if($user = App\Models\User::where('id',$note->userid)->first())
                                                        <span class="badge badge-primary">Added to : {{$user->name}}</span>
                                                    @endif

                                               </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            @endif


                          </ul>
                    </div>

                    <h4 class="mt-5"><b>Proposal Details</b></h4>

                    <div class="col-lg-12">
                        <table class="table table-bordered mt-4">
                                <thead>
                                    <tr>
                                        <th>Proposal ID</th>
                                        <th>Quote No</th>
                                        <th>Date</th>
                                        <th>Subject</th>
                                        <th>To Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($proposal = App\Models\proposal::where('leadid',$lead->leadid)->get())
                                        @foreach ($proposal as $pro)
                                            <tr>
                                                <td>{{ $pro->proposalid }}</td>
                                                <td>{{ $pro->quoteno }}</td>
                                                <td>{{ $pro->quotedate }}</td>
                                                <td>{{ $pro->subject }}</td>
                                                <td>{{ $pro->toaddress }}</td>
                                                <td>
                                                    <a target="_blank" href="/proposal/{{ $pro->filename }}"  class="btn btn-info"><i class="bi bi-eye-fill" aria-hidden="true"></i></a>
                                                    <a target="_blank" class="btn btn-primary" href="/proposal/{{ $pro->filename }}"><i class="bi bi-download" aria-hidden="true"></i></a>
                                                    <button class="btn btn-danger sendmail" data-toggle="modal" data-target="#mail" data-email="{{ $lead->email }}" data-filename="{{ $pro->filename }}"><i class="bi bi-send-fill" aria-hidden="true"></i></button>
                                                    <a target="_blank" href="https://api.whatsapp.com/send?phone=@php echo str_replace("+91-", "", $lead->mobilenumber); @endphp " class="btn btn-success"><i class="bi bi-whatsapp" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                        </table>
                    </div>

                    <h4 class="mt-5"><b>Mail Details</b></h4>

                    <div class="col-lg-12">
                        <table class="table table-bordered mt-4">
                                <thead>
                                    <tr>
                                        <th>To Mail</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Attachment</th>
                                        <th>Send Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @if($maildetails)
                                        @foreach ($maildetails as $mail)
                                            <tr>
                                                <td>{{ $mail->tomail }}</td>
                                                <td>{{ $mail->subject }}</td>
                                                <td>{{ $mail->message }}</td>
                                                <td>{{ $mail->attachment }}</td>
                                                <td>{{ $mail->created_at }}</td>

                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                        </table>
                    </div>
            </div>

                </div>
    </div>
    </div>

    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Follow up</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="/saveFollowup">
            <div class="modal-body">

                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea class="form-control" name="description" placeholder="Description" required></textarea>
                        </div>
                        <input type="hidden" name="leadid" id="leadid">
                        <button class="btn btn-success btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Create Notification
                          </button>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <div class="form-group mt-2 notificationhide">
                                    <label for="exampleInputEmail1">Notification Date</label>
                                    <input type="date" class="form-control" name="notificationdate" min="@php echo date("Y-m-d"); @endphp">
                              </div>
                              <div class="form-group notificationhide">
                                <label for="exampleInputEmail1">Summary</label>
                                <textarea class="form-control" name="summary" placeholder="Enter Your Notification summary"></textarea>
                          </div>
                            </div>
                          </div>
                          <input type="hidden" name="leadid" id="leadid" value="{{ $lead->leadid }}">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
          </div>
        </div>
      </div>

    {{-- <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Follow up</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="/saveFollowup">
            <div class="modal-body">

                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea class="form-control" name="description" placeholder="Description"></textarea>
                        </div>
                        <input type="hidden" name="leadid" id="leadid">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
          </div>
        </div>
      </div> --}}

      <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Convert Lead</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="/leadstatus">
            <div class="modal-body">

                    @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Lead ID</label>
                            <input type="text" name="leadid" class="form-control" id="leadsource" aria-describedby="emailHelp" placeholder="LeadID" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Lead Status</label>
                            <select class="form-control" name="leadstatus" required>
                                <option value="">-- Choose Lead Status --</option>
                                <option value="Pending">Pending</option>
                                <option value="Converted">Converted</option>
                            </select>
                        </div>
                        {{-- <input type="hidden" name="leadid" id="leadid"> --}}

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="mail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Send Mail</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <form name="sendmail" id="sendmail" action="javascript:;" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputEmail1">To</label>
                        <input type="email" name="tomail"  class="form-control" id="tosendmail" aria-describedby="emailHelp" placeholder="Enter Title" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Subject</label>
                        <input type="text" name="subject"  class="form-control" id="fromdate" aria-describedby="emailHelp" placeholder="Enter Subject" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Attachment</label>
                        {{-- <input type="file" name="attachment"  class="form-control" id="fromdate" aria-describedby="emailHelp" placeholder="Enter Title"> --}}
                        <input type="text" name="attachmentfile" id="filename" class="form-control" readonly >

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Message</label>
                        <textarea class="form-control" name="message" placeholder="Enter Your Message" autocomplete="off"></textarea>
                    </div>
                    <input type="hidden" name="leadid" value="{{ $lead->leadid }}">

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Send Mail</button>
            </div>
        </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="createproposal" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg " style="max-width:100%;padding:0px" role="document">
          <div class="modal-content">
            <form name="createnewproposal" id="createnewproposal" action="javascript:;" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create Proposal</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">


                    <div class="row">
                        <input type="hidden" name="leadid" value="{{$lead->leadid}} ">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Quotation No</label>
                                <input type="text" name="quoteno" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $Qoutid }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Date</label>
                                <input type="date" name="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title" value="@php echo date("Y-m-d") @endphp">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Subject</label>
                                <input type="text" name="subject" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Subject" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kind Attn</label>
                                <input type="text" name="kindattn" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">To address</label>
                                <textarea class="form-control" name="toaddress" required></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="table-responsive">
                            <table class="table table-bordered table-scroll mt-3" id="productTable">
                                <thead>
                                    <tr>
                                        <th scope="col" style="max-width:300px">Product Description<span id="fname" class="error-info fname"
                                                style="margin-left: 10px; color:red;"></span></th>
                                        {{-- <th style="max-width:300px" scope="col">Ltrs<span  class="error-info"
                                                    style="margin-left: 10px; color:red;"></span></th>
                                        <th style="max-width:300px" scope="col">Size<span  class="error-info"
                                                        style="margin-left: 10px; color:red;"></span></th>

                                        <th style="max-width:300px" scope="col">HP<span  class="error-info"
                                                                style="margin-left: 10px; color:red;"></span></th>

                                        <th scope="col">Thickness<span  class="error-info"
                                                                        style="margin-left: 10px; color:red;"></span></th>
                                        <th scope="col">Pump<span  class="error-info"
                                                                            style="margin-left: 10px; color:red;"></span></th>
                                        <th scope="col">Model / Type<span  class="error-info"
                                                                                style="margin-left: 10px; color:red;"></span></th>

                                        <th scope="col">Air Cooled<span  class="error-info"
                                                                                            style="margin-left: 10px; color:red;"></span></th> --}}
                                        <th scope="col">Qty<span id="frelation" class="error-info frelation"
                                                style="margin-left: 10px; color:red;"></span></th>

                                        <th scope="col">Rate<span  class="error-info"
                                                    style="margin-left: 10px; color:red;"></span></th>
                                        {{-- <th scope="col">Guard Rate<span  class="error-info"
                                                    style="margin-left: 10px; color:red;"></span></th>
                                        <th scope="col">With Electric<span  class="error-info"
                                                    style="margin-left: 10px; color:red;"></span></th>
                                        <th scope="col">W/O Electric<span  class="error-info"
                                                        style="margin-left: 10px; color:red;"></span></th> --}}
                                        <th scope="col">Total<span  class="error-info"
                                                            style="margin-left: 10px; color:red;"></span></th>
                                        <th scope="col"><button type="button" class="btn btn-primary"
                                                id="addquoteProducts">+</button></th>
                                    </tr>
                                </thead>
                                <tbody id="appendstageparent" class="appendstageparent">

                                    <tr>
                                        <td>
                                            <textarea class="form-control" name="quotedproducts[]" required></textarea>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control qty" name="qty[]" required>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control rate" name="rate[]" value="0" required>
                                        </td>
                                        {{-- <td>
                                            <select class="form-control producttype" name="quotedproducts[]" style="width:250px">
                                            <option value="">-- Choose Product --</option>

                                                @if($qutedproducts)
                                                    @foreach ($qutedproducts as $products)
                                                        <option value="{{ $products->id }}">{{ $products->productid }} | {{ $products->catname }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control ltrs" name="ltrs[]" style="width:150px">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control size" name="size[]" style="width:200px">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control hp" name="hp[]" style="width:100px">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control thickness" name="thickness[]" style="width:200px">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control pump" name="pump[]" style="width:200px">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control modaltype" name="modaltype[]" style="width:200px">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control aircooled" name="aircooled[]" style="width:200px">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control qty" name="qty[]" style="width:100px">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control rate" name="rate[]" value="0" style="width:200px">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control guardrate" name="guardrate[]" value="0" style="width:200px">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control withelectric" name="withelectric[]" value="0" style="width:200px">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control withoutlectric" name="withoutlectric[]" value="0" style="width:200px">
                                        </td> --}}
                                        <td>
                                            <input type="text" class="form-control totamt" name="totamt[]" style="width:200px" readonly>
                                        </td>

                                        <td>
                                            <button type="button" class="btn btn-success addstage">+</button>
                                            <button type="button" class="btn btn-danger removestage" style="visibility: hidden">X</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Taxes</label>
                                <input type="text" name="taxes" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="GST 18% Extra">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Freight</label>
                                <input type="text" name="freight" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="Extra">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Payment</label>
                                <input type="text" name="payment" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="100% Advance">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Delivery</label>
                                <input type="text" name="delivery" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="Within 2 Days from the Date of Advance">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Validity</label>
                                <input type="text" name="validity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="7 Days From day of offer">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Bank Details</label>
                                <select class="form-control" name="bankdetails">
                                    <option value="">-- Select Bank --</option>
                                    @if($bankdetails)
                                        @foreach ($bankdetails as $bank)
                                            <option value="{{ $bank->id }}">{{ $bank->bankname }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Regards</label>
                                <textarea class="form-control" name="yourstruely">{{Auth::user()->name}}</textarea>
                            </div>
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Create Proposal</button>
            </div>
        </form>
          </div>
        </div>
      </div>
@endsection
