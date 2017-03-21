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
                                                    <button class="btn btn-danger btn-xs delete" data-toggle="modal" data-target="#deleteModal">Delete</button>
                                                @endif
                                            </td>
                                            <td class=" last">{{ $note->Owner->name }} {{ $note->Owner->lastName }}</td>
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
                                            <td class=" last">{{ $note->Owner->name }} {{ $note->Owner->lastName }}</td>
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
          <h4 class="modal-title">Edit Performance Note</h4>
        </div>
         <div class="alert alert-danger err" style="display:none">
            <strong>Whoops! </strong> <span id='errMsg'></span>
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


 <!-- Modal 2 delete request-->
  <div class="modal fade" id="deleteModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id='taskTitle'>Delete Performance Note</h4>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="confirmDelete" type="button" class="btn btn-primary">Delete This Performance Note</button>
        </div>
      </div>
    </div>
  </div> 

<script>
    $('#datatable').DataTable({
        "aaSorting": [], //disables default sort
        "lengthMenu": [ 5, 10, 25, 50, 75, 100 ],
        "pageLength": 5,

        "columnDefs": 
        [
            {"orderable": false, "targets": [5]}
        ]

    });

    $(document).ready(function(){

        $('#datatable').on('click','.editNote', function(){
             $(".err").hide();
             $noteId = $(this).parent().prop('id');
            $('#showNote').val($(this).parent().prev().text()); 
        });

        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        $('#updateNote').on('click', function(){
            if($('#showNote').val().length >= 5 && $('#showNote').val().length <= 100)
            {
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
            }
            else
            {
                $('#errMsg').text("Performance note detail must be in between 10 and 100 characters inclusive")
                $(".err").show('slow');
            }
        });

        $('#datatable').on('click','.delete', function(){
            
            $deleteId = $(this).parent().prop('id');
            console.log($deleteId);
        });

        $('#confirmDelete').on('click', function(){
            var token = $(this).data("token");
                $.ajax({
                    url: '/performance_review/' + $deleteId + '/delete',
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': token
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