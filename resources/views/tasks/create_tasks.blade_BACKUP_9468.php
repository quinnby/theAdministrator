@extends('layouts.blank') @push('stylesheets')
<!-- Example -->
<!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->@endpush @section('main_container')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Assign a Task</h3> </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <br/>

                <!-- If Errors are detected in validation -->  
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
               @endif
                
                <!-- If passed validation --> 
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        {!! \Session::get('success') !!}  
                    </div>
                @endif               

                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" role="form" method="POST" action ="{{ url('tasks/create') }}">

                        <input type="hidden" 
                            name="_token" 
                            value="{{ csrf_token() }}"/>

                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee
                              </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" name="userId">
                                <option value=0 >Choose Employee</option>
                                @foreach ($users as $user)
                                    @if($user->id != $loggedUser)
                                        @if (old('userId') != null && $user->id == old('userId'))
                                            <option selected value={{ $user['id']}}>{{ $user['name'] }} {{ $user['lastName'] }}</option>
                                        @else
                                            <option value={{ $user['id']}}>{{ $user['name'] }} {{ $user['lastName'] }}</option>
                                        @endif
                                    @endif
                                @endforeach
                              </select>
                            </div>
                          </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Task Name </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="taskName" name="taskName" class="form-control col-md-7 col-xs-12" placeholder="Task Name" value={{old('taskName')}}> </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Task Detail </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea class="form-control" rows="3" id="taskDescription" name="taskDescription" placeholder="Task Details" >{{ old('note') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Complete by </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="date" id="date" name="date" class="form-control col-md-7 col-xs-12" placeholder="Task Name" value={{old('date')}}> </div>
                            </div>
                            
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a class="btn btn-primary" type="button" href="{{ url()->previous() }}">Cancel</a>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    
</script>
<!-- /page content -->
<!-- footer content -->
<footer> @include('includes.footer') </footer>
<!-- /footer content -->@endsection