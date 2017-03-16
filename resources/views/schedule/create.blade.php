@extends('layouts.blank') @push('stylesheets')
<!-- Example -->
<!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->@endpush @section('main_container')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Create Schedule</h3> </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <br/>
                <div class="x_panel">
                    <div class="x_content">
                        @if (! empty($msg))
                        
                            <div class="alert alert-success">{{ $msg }}</div>
                        @endif
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
                        <br />
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action ="{{ url('/schedule/create') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            
                            <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee
                              </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="userId" class="form-control" name="userId">
                                <option selected disabled>Choose Employee</option>
                                @foreach ($users as $user)
                                        <option value={{ $user['id']}}>{{ $user['name'] }} {{ $user['lastName'] }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                               
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Start Date Time </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="datetime-local" id="scheduleStart" name="scheduleStart" class="form-control col-md-7 col-xs-12" placeholder="DD/MM/YYYY"> </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">End Date Time </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="datetime-local" id="scheduleEnd" name="scheduleEnd" class="form-control col-md-7 col-xs-12" placeholder="DD/MM/YYYY"> </div>
                            </div>
                            
                            <div id="booked" style="display: none">
                                <h4>Dates Booked Off</h4>
                                <div class="table-responsive">
                                <table id="datatable" class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings">
                                            <th class="column-title">Date(s) Booked Off </th>
                                            <th class="column-title">Reason </th>
                                            <th class="column-title">Status </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    </tbody>
                                </table>
                            </div>
                            </div>
                            
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-primary" type="button">Cancel</button>
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
    $( document ).ready(function (){    
        
        $( "#userId" ).on("change", function() {
            $( "tbody" ).children().remove();
            
            $.ajax({
                url: '/time_off/get/' + $( '#userId' ).val(),
                type: 'GET',
                
                success: function(data){
                    console.log(data);
                    $.each(data, function(i, booked) {
                       console.log(booked.startDate);
                        if (booked.status == "Pending"){
                            
                            $( "tbody" ).append( "<tr><td>" + booked.startDate + " - " + booked.endDate + "</td><td>" + booked.note + "</td><td><span class='label label-warning'>" + booked.status +  "</span></td></tr>" );
                        } else if (booked.status == "Approved") {
                            $( "tbody" ).append( "<tr><td>" + booked.startDate + " - " + booked.endDate + "</td><td>" + booked.note + "</td><td><span class='label label-success'>" + booked.status +  "</span></td></tr>" );
                        } else {
                            $( "tbody" ).append( "<tr><td>" + booked.startDate + " - " + booked.endDate + "</td><td>" + booked.note + "</td><td><span class='label label-danger'>" + booked.status +  "</span></td></tr>" );
                        }
                    });
                    if (data.length > 0){
                        $( "#booked" ).slideDown("slow");
                    } else {
                        $( "#booked" ).slideUp("slow");
                    }
                    
                }
            });
        });
    });

</script>
<!-- /page content -->
<!-- footer content -->
<footer> @include('includes.footer') </footer>
<!-- /footer content -->@endsection