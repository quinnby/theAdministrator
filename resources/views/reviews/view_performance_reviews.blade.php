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
                        <!-- If User Is An Admin -->
                                    @if (!auth()->guest() && auth()->user()->isOfType(1)) 
                        <a class="btn btn-round btn-success" href="{{ url('/performance_review/create') }}"><i class="fa fa-edit m-right-xs"></i> Create New Review</a>
                        @endif
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
                                    <!-- If User Is An Admin -->
                                    @if (!auth()->guest() && auth()->user()->isOfType(1)) 
                                    @foreach($notes as $note)
                                        <tr class="even pointer">
                                            <td>{{ $note->userAbout->name }} {{ $note->userAbout->lastName }}</td>
                                            <td>{{ $note->userAbout->jobTitle->title}}</td>
                                            <td>{{ $note->userAbout->department->department}}</td>
                                            <td>{{ $note->noteDate }}</td>
                                            <td>{{ $note->note }} </td>
                                            <td id={{ $note['id'] }}>
                                                @if($note->userOwner == $loggedUser)
                                                    <button class="btn btn-primary btn-xs editNote" data-toggle="modal" data-target="#myModal">Edit</button>
                                                @endif
                                            </td>
                                            <td class=" last">{{ $note->Owner->name }} </td>
                                        </tr>
                                    @endforeach
                                    @endif
                                    
                                         <!-- If User Is Not An Admin -->
                                    @if (!auth()->guest() && auth()->user()->isOfType(2)) 
                                    @foreach($notes as $note)
                                    @if ($note->userId ==auth()->id())
                                        <tr class="even pointer">
                                            <td>{{ $note->userAbout->name }} {{ $note->userAbout->lastName }}</td>
                                            <td>{{ $note->userAbout->jobTitle->title}}</td>
                                            <td>{{ $note->userAbout->department->department}}</td>
                                            <td>{{ $note->noteDate }}</td>
                                            <td>{{ $note->note }} </td>
                                            <td id={{ $note['id'] }}>
                                                @if($note->userOwner == $loggedUser)
                                                    <button class="btn btn-primary btn-xs editNote" data-toggle="modal" data-target="#myModal">Edit</button>
                                                @endif
                                            </td>
                                            <td class=" last">{{ $note->Owner->name }} </td>
                                        </tr>
                                    @endif
                                    @endforeach
                                    @endif
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
            <form role="form" method="PATCH" >
                <div class="form-group">
                    <textarea class="form-control" rows="3" id="showNote"></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="updateNote" type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    $('#datatable').DataTable({
        "aaSorting": [], //disables default sort
        "columnDefs": 
        [
            {"orderable": false, "targets": [5]}
        ]
    });

    $(document).ready(function(){

        $('.editNote').on('click', function(){
             $noteId = $(this).parent().prop('id');
            $('#showNote').val($(this).parent().prev().text()); 
        });

        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        $('#updateNote').on('click', function(){

            var token = $(this).data("token");
                    $.ajax({
                        url: '/performance_review/',
                        type: 'PATCH',
                        data: {
                            'noteId': $noteId,
                            'note': $('#showNote').val()
                        },
                       
                        success: function(result) {
                            location.reload();
                        }
                    });
        });


    }); // closes document.ready()

</script>
<!-- /page content -->
<!-- footer content -->
<footer> @include('includes.footer') </footer>
<!-- /footer content -->@endsection