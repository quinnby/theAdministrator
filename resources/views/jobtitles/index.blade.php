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
                <h3>Manage Job Titles</h3> </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <br/>


                 <!-- If passed validation --> 
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        {!! \Session::get('success') !!}  
                    </div>
                @endif  
                
                <div class="x_panel">
                    <div class="x_content">
                        <a class="btn btn-round btn-success" href="{{ url('/jobtitles/create') }}"><i class="fa fa-edit m-right-xs"></i> Create New Job Title</a>
                        <hr/>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title">Job Title </th>
                                        <th class="column-title">Number of Employees</th>
                                        <th class="column-title no-link last"><span class="nobr">Action </span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jobTitles as $jobTitle)
                                        <tr class="even pointer">
                                            <td>{{ $jobTitle->title }}</td>
                                            <td>{!!\App\Models\User::Where('titleId',$jobTitle->id)->count() !!} Employee(s)</td>
                                            <td id={{ $jobTitle['id'] }}>
                                                 @if (!auth()->guest() && auth()->user()->isOfType(1))   
                                                    <button class="btn btn-primary btn-xs editTitle" data-toggle="modal" data-target="#myModal">Edit</button>
                                                    <button class="btn btn-danger btn-xs delete" data-toggle="modal" data-target="#deleteModal">Delete</button>
                                                @endif
                                            </td>
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
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Job Title</h4>
        </div>
        <div class="alert alert-danger err" style="display:none">
            <strong>Whoops! </strong> <span id='errMsg'></span>
        </div>
        <div class="modal-header">
            <h4 class="modal-title">
                <input type="text" id="showTitleName" class="form-control" data-id="">
            </h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="updateTitle" type="button" class="btn btn-primary">Save changes</button>
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
          <h4 class="modal-title" id='jobTitle'>Delete Job Title</h4>
        </div>
         <div class="modal-header">
            <h5 class="modal-title" id="showJobDel" data-id="">
            </h5>
        </div>   
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="confirmDelete" type="button" class="btn btn-primary">Delete This Department</button>
        </div>
      </div>
    </div>
  </div> 

    <script>
   var table = $('#datatable').DataTable({
        "lengthMenu": [ 5, 10, 25, 50, 75, 100 ],
        "pageLength": 5
       });

     $(document).ready(function(){

        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

            $("#datatable").on("click",'.editTitle', function(){

                var $name = $( this ).parent().prev().prev().text();
                var $id = $(this).parent().prop("id");
                console.log($id);
                console.log($name);

                $('#showTitleName').val($name);
                $('#showTitleName').attr('data-id', $id);
            });

         $('#updateTitle').on('click', function(){

            if($('#showTitleName').val().length >= 5 && $('#showTitleName').val().length <= 30)
            {
                    var token = $(this).data("token");
                    $.ajax({
                        url: '/jobtitles/' + $('#showTitleName').attr("data-id") +'/edit/',
                        type: 'PATCH',
                        data: {
                            'title': $('#showTitleName').val()
                        },

                        success: function(result){
                            location.reload();
                            console.log('successfully edited title');
                        }
                    });
            }
            else
            {
                $('#errMsg').text("Job title must be in between 5 and 30 characters inclusive")
                $(".err").show('slow');
            }
        });

            $("#datatable").on("click",'.delete', function(){

                var $id = $(this).parent().prop("id");
                var $name = $( this ).parent().prev().prev().text();

                $('#showJobDel').text('Do you want to delete ' + $name + ' job title ?');
                $('#showJobDel').attr('data-id', $id);
                console.log($id);
            });

            $('#confirmDelete').on('click',function(){
                var token = $(this).data("token");
                console.log($('#showJobDel').attr('data-id'));
                $.ajax({
                    url: '/jobtitles/' + $('#showJobDel').attr('data-id') + '/delete/',
                    type: 'DELETE',  // user.destroy
                    headers: {
                       'X-CSRF-TOKEN': token
                    },
                    success: function(result) {
                        //table.row($(this).closest('tr')).remove().draw();
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