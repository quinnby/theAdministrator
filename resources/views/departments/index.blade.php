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
                <h3>Manage Departments</h3> </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <br/>
                <div class="x_panel">
                    <div class="x_content">
                        <a class="btn btn-round btn-success" href="{{ url('/departments/create') }}"><i class="fa fa-edit m-right-xs"></i> Create New Department</a>
                        <hr/>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title">Department Name </th>
                                        <th class="column-title">Department Head </th>
                                        <th class="column-title">Description </th>
                                        <th class="column-title">Number of Employees </th>
                                        <th class="column-title no-link last"><span class="nobr">Action </span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($departments as $department)
                                        
                                        <tr class="even pointer">
                                            <td>{{ $department->department }}</td>
                                            <td>{{ $department->userId }} </td>
                                            <td>{{ $department->description }} </td>

                                            <td class="last"></td>

                                            <td>Not sure how to get this working</td>
                                            <td id={{ $department['department'] }}>
                                                 @if (!auth()->guest() && auth()->user()->isOfType(1))   
                                                    <button class="btn btn-primary btn-xs editDepartment" data-toggle="modal" data-target="#myModal">Edit</button>
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
          <h4 class="modal-title">Edit Department</h4>
        </div>
        <div class="alert alert-danger err" style="display:none">
            <strong>Whoops! </strong> <span id='errMsg'></span>
        </div>
        <div class="modal-header">
            <h4 class="modal-title">
                <input type="text" id="showDepartmentName" class="form-control">
            </h4>
        </div>
        <div class="modal-body">
            <form role="form" method="PATCH" >
                <div class="form-group">
                    <textarea class="form-control" rows="3" id="showDepartmentDesc"></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="updateDepartment" type="button" class="btn btn-primary">Save changes</button>
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
          <h4 class="modal-title" id='departmentTitle'>Delete Department</h4>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="confirmDelete" type="button" class="btn btn-primary">Delete This Department</button>
        </div>
      </div>
    </div>
  </div> 
<script>
     $(document).ready(function($){

        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

         $('#updateDepartment').on('click', function(){

            if($('#showDepartment').val().length >= 5 && $('#showDepartment').val().length <= 30)
            {
                if($('#showDepartmentDesc').val().length >= 10 && $('#showDepartmentDesc').val().length <= 100)
                {
                    var token = $(this).data("token");
                    $.ajax({
                        url: '/departments/edit',
                        type: 'PATCH',
                        data: {
                            'id': $id,
                            'departmentDescrition': $('#showDepartment').val(),
                            'departmentDescription': $('#showDepartmentDesc').val()
                        },

                        success: function(result){
                            location.reload();
                            console.log('successfully edited department');
                        }
                    });

                }

                else
                {
                    $('#errMsg').text("Department description must be in between 10 and 100 characters inclusive")
                    $(".err").show('slow');
                }
            }
            else
            {
                $('#errMsg').text("Department name must be in between 5 and 30 characters inclusive")
                $(".err").show('slow');
            }
        });

          $('#confirmDelete').on('click', function(){
            var token = $(this).data("token");
                $.ajax({
                    url: '/departments/' + $deleteId + '/delete',
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