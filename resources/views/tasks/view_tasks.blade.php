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
                <h3>My Tasks</h3> </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <br/>
                <div class="x_panel">
                    <div class="x_content">
         
                        <hr/>   <div class="table-responsive">
                            <table id="datatable" class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title"></th>
                                        <th class="column-title">Task Name</th>
                                        <th class="column-title">Task Description </th>
                                        <th class="column-title">Complete by</th>
                                        <th class="column-title">Time Left</th>
                                        <th class="column-title">Issued By </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- If User Is An Admin -->
                                    @if (!auth()->guest() && auth()->user()->isOfType(1)) 
                                    @foreach($tasks as $task)

                                        @if($task['userId'] == $loggedUser)
                                            <tr class="even pointer">
                                                <td><input type="checkbox" {{$task['completed'] == 1 ? 'checked="checked"' : ''}}></td>
                                                <td>{{$task->taskName}}</td>
                                                <td>{{$task->taskDescription}}</td>
                                                <td>{{$task->date}}</td>
                                                <td>{{$task->getDaysLeft($task->created_at, $task->date)}}</td>
                                                <td> {{$task->Owner->name}} {{$task->Owner->lastName}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @endif
                                    
                         
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    <button id="myTaskUpdate" type="button" class="btn btn-primary btn-sm pull-right">Update</button>

                </div>


            </div>

        </div>
    </div>

@if (!auth()->guest() && auth()->user()->isOfType(1))

<div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Given Tasks</h3> </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <br/>
                <div class="x_panel">
                    <div class="x_content">
                        <!-- If User Is An Admin -->
                                    @if (!auth()->guest() && auth()->user()->isOfType(1)) 
                        <a class="btn btn-round btn-success" href="{{ url('/tasks/create') }}"><i class="fa fa-edit m-right-xs"></i> Create New Task</a>
                        @endif
                        <hr/>
                        <div class="table-responsive">
                            <table id="givendatatable" class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title">To</th>
                                        <th class="column-title">Task Name</th>
                                        <th class="column-title">Task Description </th>
                                        <th class="column-title">Complete by</th>
                                        <th class="column-title">Time Left</th>
                                        <th class="column-title">Status</th>
                                        <th class="column-title">Issued By </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- If User Is An Admin -->
                                    @if (!auth()->guest() && auth()->user()->isOfType(1)) 
                                    @foreach($tasks as $task)

                                        @if($task['userOwner'] == $loggedUser)
                                            <tr class="even pointer">
                                                <td>{{$task->userAbout->name}} {{$task->userAbout->lastName}}</td>
                                                <td>{{$task->taskName}}</td>
                                                <td>{{$task->taskDescription}}</td>
                                                <td>{{$task->date}}</td>
                                                <td>{{$task->getDaysLeft($task->created_at, $task->date)}}</td>
                                                <td>
                                                    @if($task['completed'] == 1)
                                                        <span class="label label-success">Complete</span>
                                                    @else
                                                        <span class="label label-warning">Incomplete</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($task->userOwner == $loggedUser)
                                                        You
                                                    @endif
                                                </td>
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
@endif



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
        "lengthMenu": [ 5, 10, 25, 50, 75, 100 ],
        "pageLength": 5
    });

    $('#givendatatable').DataTable({
       "aaSorting": [], //disables default sort
        "lengthMenu": [ 5, 10, 25, 50, 75, 100 ],
        "pageLength": 5
   
    });

    $(document).ready(function(){


    }); // closes document.ready()

</script>
<!-- /page content -->
<!-- footer content -->
<footer> @include('includes.footer') </footer>
<!-- /footer content -->@endsection