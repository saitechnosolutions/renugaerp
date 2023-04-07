@extends('layout.app');
@section('title','ERP - Dashboard');
@section('main-content')

<div class="layout-px-spacing">
    @if(session()->get('success'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{session()->get('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif
    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="row">
                    <div class="col-lg-6">
                        <h4><b>PF Data</b></h4>
                    </div>
                    {{-- <div class="col-lg-6 text-right">
                        <button class="btn btn-success btn-outline fancy-button btn-0" style="font-size:16px;" data-toggle="modal" data-target="#myModal">Add Users</button>
                <button class="btn btn-info btn-outline fancy-button btn-0" style="font-size:16px;">Back</button>
                    </div> --}}
                </div>

            </div>
            <div class="widget-content widget-content-area br-6 mt-2">
                <table  class="table dt-table-hover userTable" style="width:100%">
                    <thead>
                        <tr>
                            {{-- <th>S.No</th> --}}
                            <th>ID</th>
                            <th>ESI (%)</th>
                            <th>PF (%)</th>
                            <th>Bonus (%)</th>
                            <th>ESI Above Amount</th>
                            <th>PF Fixed Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if($pf)

                                <tr>
                                    <td>{{$pf->id}}</td>
                                    <td>{{$pf->esi}}</td>
                                    <td>{{$pf->pf}}</td>
                                    <td>{{$pf->bonus}}</td>
                                    <td>{{$pf->esi_aboveamt}}</td>
                                    <td>{{$pf->pf_fixed_amt}}</td>
                                    <td><a href="" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Change Data</a></td>
                                </tr>

                        @endif
                    </tbody>

                </table>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">PF Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="updatepf">
                @csrf
             <div class="form-group">
                <label style="margin-bottom:10px">PF (%)</label>
                <input  type="text" name="pf" id="user"  class="form-control" autocomplete="off" required value="{{$pf->pf}}">
              </div>
              <div class="form-group">
                <label style="margin-bottom:10px">ESI (%)</label>
                    <input type="text" name="esi" id="Password"  class="form-control" autocomplete="off" required value="{{$pf->esi}}" >
              </div>
              <div class="form-group">
                <label style="margin-bottom:10px">Bonus (%)</label>
                    <input type="text" name="bonus" id="Password"  class="form-control" autocomplete="off" required value="{{$pf->bonus}}" >
              </div>
              <div class="form-group">
                <label style="margin-bottom:10px">ESI Above Amount</label>
                    <input type="text" name="esiamt" id="esiamt"  class="form-control" autocomplete="off" required value="{{$pf->esi_aboveamt}}" >
              </div>
              <div class="form-group">
                <label style="margin-bottom:10px">PF Fixed Amount</label>
                    <input type="text" name="pfamt" id="pfamt"  class="form-control" autocomplete="off" required value="{{$pf->pf_fixed_amt}}" >
              </div>


        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>

@endsection
