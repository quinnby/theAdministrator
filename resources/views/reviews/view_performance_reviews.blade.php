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
                <h3>View Performance Reviews</h3> </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <br/>
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        <a class="btn btn-success" href="{{ url('/create_performance_review') }}"><i class="fa fa-edit m-right-xs"></i> Create New Review</a>
                        <hr/>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title">Employee Name </th>
                                        <th class="column-title">Position </th>
                                        <th class="column-title">Department </th>
                                        <th class="column-title">Review Date </th>
                                        <th class="column-title no-link last"><span class="nobr">Details </span></th>
                                        <th class="column-title no-link last"><span class="nobr">Action </span></th>
                                        <th class="column-title">Issued By </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($notes as $note)
                                        <tr class="even pointer">
                                            <td>{{ $note->userAbout->name }} {{ $note->userAbout->lastName }}</td>
                                            <td>{{ $note->userAbout->jobTitle->title}}</td>
                                            <td>{{ $note->userAbout->department->department}}</td>
                                            <td>{{ $note->noteDate }}</td>
                                            <td>{{ $note->note }} </td>
                                            <td id={{ $note['id'] }}><a href="#" class="btn btn-primary btn-xs editNote" data-toggle="modal" data-target="#myModal">Edit</a></td>
                                            <td class=" last">{{ $note->Owner->name }} </td>
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


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea class="form-control" rows="3" id="editNote" name="editNote" ></textarea>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    $('#datatable').DataTable({
        "columnDefs": 
        [
            {"orderable": false, "targets": [4]}
        ]

        
    });
</script>
<!-- /page content -->
<!-- footer content -->
<footer> @include('includes.footer') </footer>
<!-- /footer content -->@endsection