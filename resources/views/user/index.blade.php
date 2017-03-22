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
                <h3>User Management</h3>
              </div>
            </div>

            <div class="clearfix"></div>
              
            <div class="row">
                 <div class="col-md-12 col-sm-12 col-xs-12"> 
                      <br/>
                <div class="x_panel">
                  <div class="x_content">

                            @if (\Session::has('success'))
                    <div class="alert alert-success">
                        {!! \Session::get('success') !!}  
                    </div>
                @endif               

                      
                
              <a href="{{ url('users/create') }}"><button class="btn btn-round btn-success" type="button"> Create Employee
              <i class="fa fa-user"> </i></button></a>
                    <div class="row">
                        <hr/>
                        <span style="color:green" clas="msg"></span>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title">Employee Name </th>
                                        <th class="column-title">Position </th>
                                        <th class="column-title">Department </th>
                                        <th class="column-title">User Type </th>
                                        <th class="column-title">Primary Phone </th>
                                        <th class="column-title">Secondary Phone </th>
                                        <th class="column-title">Active </th>
                                        <th class="column-title no-link last"><span class="nobr">Action </span></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr class="even pointer">
                                            <td><a href="{{ url('/user/profile') }}/{{  $user->id }}">{{ $user->name }} {{ $user->lastName }}</a></td>
                                            <td>{{ $user->jobTitle->title}}</td>
                                            @if($user->department != null)
                                                <td>{{ $user->department->department}}</td>
                                            @else
                                               <td>N/A</td>
                                            @endif
                                            <td>{{ $user->userType->userType }}</td>
                                            <td>{{ $user->primaryPhone }}</td>
                                            <td>{{ $user->secondaryPhone }} </td>
                                            <td>{{ $user->active ? "Enabled" : "Disabled" }} </td>
                                            <td id="{{ $user->id }}" class=" last">
                                                @if (Auth::user()->id != $user->id)
                                                    <button class="btn btn-primary btn-xs active" data-toggle="modal" data-target="#myModal">{{ $user->active ? "disable" : "enable" }}</button> 
                                                    <button class="btn btn-danger btn-xs delete" data-toggle="modal" data-target="#deleteModal">delete</button>
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
        </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Change Activation</h4>
        </div>
        <div class="modal-header">
            <h5 class="modal-title" id="showUser" data-id="">
            </h5>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
          <button id="updateStatus" type="button" class="btn btn-primary">Yes</button>
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
          <h4 class="modal-title" id='taskTitle'>Delete User</h4>
        </div>
        <div class="modal-header">
            <h5 class="modal-title" id="showUserDel" data-id="">
            </h5>
        </div>       
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button id="confirmDelete" type="button" class="btn btn-primary">Delete This User</button>
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
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            
            $("#datatable").on("click",'.active', function(){

                var $user = $( this ).parent().parent().children().first().text();
                var $btnText = $(this).text();
                var $id = $(this).parent().prop("id");

                $('#showUser').text('Do you want to ' + $btnText + ' ' + $user + '?');
                $('#showUser').attr('data-id', $id);
            });

            $('#updateStatus').on('click',function(){
                var token = $(this).data("token");
                $.ajax({
                    url: '/user/' + $('#showUser').attr("data-id") + '/toggleActivation',
                    type: 'PATCH',  // user.destroy
                   // headers: {
                    //    'X-CSRF-TOKEN': token
                    //},
                    success: function(result) {
                        //table.row($(this).closest('tr')).remove().draw();
                        location.reload();
                    }
                });
            
            });


            $("#datatable").on("click",'.delete', function(){

                var $user = $( this ).parent().parent().children().first().text();
                var $btnText = $(this).text();
                var $id = $(this).parent().prop("id");
                
                $('#showUserDel').text('Do you want to ' + $btnText + ' ' + $user + '?');
                $('#showUserDel').attr('data-id', $id);
            });

            $('#confirmDelete').on('click',function(){
                var token = $(this).data("token");
                $.ajax({
                    url: '/user/' + $('#showUserDel').attr("data-id") + '/delete',
                    type: 'DELETE',  // user.destroy
                   // headers: {
                    //    'X-CSRF-TOKEN': token
                    //},
                    success: function(result) {
                        //table.row($(this).closest('tr')).remove().draw();
                        location.reload();
                    }
                });
            
            });
        });

    </script>
    <!-- footer content -->
    <footer>
            @include('includes.footer')     
    </footer>
    <!-- /footer content -->
@endsection