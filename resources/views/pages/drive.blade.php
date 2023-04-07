@extends('layout.app');
@section('title','ERP - Drive');
@section('main-content')

<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            @if(session()->get('success'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{session()->get('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
        @endif
            <div class="widget-content widget-content-area br-6">
                <div class="row">
                    <div class="col-lg-6">
                        <h4><b>Drive</b></h4>
                    </div>
                    {{-- <div class="col-lg-6 text-right">
                        <button data-toggle="modal" data-target="#myModal" class="btn btn-success btn-outline fancy-button btn-0" style="font-size:16px;" ><i class="bi bi-person-plus-fill"></i>&nbsp;&nbsp;Add Designation</button>

                <button class="btn btn-info btn-outline fancy-button btn-0" style="font-size:16px;">Back</button>
                    </div> --}}
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <button class="btn btn-success" style="width:250px;margin-top:20px" data-toggle="modal" data-target="#exampleModal">Upload Files</button>
                            <button class="btn btn-success" style="width:250px;margin-top:20px" data-toggle="modal" data-target="#exampleModal1">Create Folder</button>

                            <div class="folders" style="margin-top:30px">
                                <h5>All Folders</h5>
                                <ul class="folders-list mt-3">
                                    @if($folders)
                                        @foreach ($folders as $folder)
                                            <li><a data-id="{{$folder->id}}" class="folderid"><i class="bi bi-folder-fill"></i> &nbsp;{{$folder->foldername}}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row appendfolder">

                                    @if($files)
                                        @foreach ($files as $file)
                                        <div class="col-lg-3">
                                        <div class="viewdrive" >
                                            <div class="icon">
                                                <i class="bi bi-folder-fill"></i>
                                            </div>
                                            <div class="iconcontent">
                                                <p style="font-size:12px;margin-bottom:5px">{{$file->upload_files}}</p>
                                                <p style="font-size:12px;margin-bottom:5px">{{$file->created_at}}</p>
                                                <a style="font-size:12px;margin-bottom:5px" download href="/images/{{$file->upload_files}}">Download</a>
                                            </div>

                                        </div>
                                    </div>
                                        @endforeach
                                    @endif


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="widget-content widget-content-area br-6 mt-2">
                <table id="zero-config" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Designation</th>
                            <th>OT</th>
                            <th>PF</th>
                            <th>Salary Type</th>
                            <th>Delete</th>
                        </tr>
                    </thead>


                </table>
            </div> --}}
        </div>

    </div>
</div>



<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create Folder</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="/createfolder">
                @csrf
                <input type="text" class="form-control" name="foldername" placeholder="Enter Folder Name">
                <input type="submit" class="btn btn-danger mt-3" value="Submit">
            </form>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">File Uploads</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="/fileupload" enctype="multipart/form-data">
                @csrf
                <select class="form-control" name="foldername">
                    <option>-- Select Folder --</option>
                    @if($folders)
                        @foreach ($folders as $folder)
                            <option value="{{$folder->id}}">{{$folder->foldername}}</option>
                        @endforeach
                    @endif
                </select>
                <div class="form-group mt-3">
                    <label>File Upload</label>
                    <input type="file" class="form-control" name="fileupload">
                </div>
                <input type="hidden" name="userid" class="form-control" value="{{Auth::user()->id}}">
                <input type="submit" class="btn btn-danger mt-3" value="Submit">
            </form>
        </div>

      </div>
    </div>
  </div>
@endsection
