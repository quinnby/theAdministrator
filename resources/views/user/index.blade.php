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
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content">
                
              <a href="{{ url('/user/create') }}"><button class="btn btn-round btn-success" type="button"> Create Employee
              <i class="fa fa-user"> </i></button></a>
                    <div class="row">
                        <hr/>
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
                                            <td>{{ $user->name }} {{ $user->lastName }}</td>
                                            <td>{{ $user->jobTitle->title}}</td>
                                            <td>{{ $user->department->department}}</td>
                                            <td>{{ $user->userType->userType }}</td>
                                            <td>{{ $user->primaryPhone }}</td>
                                            <td>{{ $user->secondaryPhone }} </td>
                                            <td>{{ $user->active ? "Enabled" : "Disabled" }} </td>
                                            <td id="{{ $user->id }}" class=" last"><button id="active">Deactivate</button> <button class="delete">Delete</button></td>
                                            
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
    <script>
        
        $('#datatable').DataTable();
        
        $(document).ready(function(){
            $("#active").on("click", function(){
                if (confirm("Do you want to change activation of " + $( this ).parent().parent().children().first().text() + "?" )){
                    window.location.href = "{{ url('user/toggleActivation') }}" + "/" + $( this ).parent().prop("id");
                }
            });
            $(".delete").on("click", function(){
                if (confirm("Do you want to delete " + $( this ).parent().parent().children().first().text() + "?" )){
                    window.location.href = "{{ url('user/delete') }}" + "/" + $( this ).parent().prop("id");
                }
            });
            //window.location.href = "http://stackoverflow.com";
        });
    </script>
    <!-- footer content -->
    <footer>
            @include('includes.footer')     
    </footer>
    <!-- /footer content -->
@endsection