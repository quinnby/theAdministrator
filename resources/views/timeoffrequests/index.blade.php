@extends('layouts.blank') 
@push('stylesheets')
<!-- Example -->
<!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush 
@section('main_container')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Manage Time Off Requests</h3> </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <br/>
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        @if (!auth()->guest() && auth()->user()->isOfType(2))   
                        <a class="btn btn-round btn-success" href="{{ url('/time_off/create') }}"><i class="fa fa-edit m-right-xs"></i> Submit New Request</a>
                        <hr/>
                        @endif
                        
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title">Employee Name </th>
                                        <th class="column-title">Requested Dates </th>
                                        <th class="column-title">Details </th>
                                        <th class="column-title">Status </th>
                                        <th class="column-title">Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($timeOffRequests as $timeOffRequest)
                                        <tr class="even pointer">
                                            <td>{{ $timeOffRequest->user->name }} {{ $timeOffRequest->user->lastName }}</td>
                                            <td>{{ $timeOffRequest->startDate }} - {{ $timeOffRequest->endDate }}</td>
                                            <td>{{ $timeOffRequest->note }}</td>
                                            
                                        <!-- If request has not been approved, dispaly pending status -->
                                            @if(empty($timeOffRequest->approvedById))
                                                <td><span class="label label-warning">Pending </span></td> 
                                            @endif
                                            
                                            <td><button class="btn btn-primary btn-xs approve" data-toggle="modal" data-target="#approveModal">Approve</button><button class="btn btn-danger btn-xs reject">Reject</button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
  <div class="modal fade" id="approveModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Approve Time Off Request</h4>
        </div>
        <div class="modal-body">
            <form role="form" method="PATCH">
                <div >
                   
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="confirmApprove" type="button" class="btn btn-primary">Approve Request</button>
        </div>
      </div>
    </div>
  </div>

<script>
    $('#datatable').DataTable();
    
     
</script>
<!-- /page content -->
<!-- footer content -->
<footer> @include('includes.footer') </footer>
<!-- /footer content -->@endsection