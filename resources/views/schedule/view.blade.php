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
                <h3>View Schedule</h3> </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <br/>
                <div class="x_panel">
                    <div class="x_content">
                        <a class="btn btn-round btn-success" href="{{ url('/schedule/create') }}"><i class="fa fa-edit m-right-xs"></i> Create New Schedule</a>
                        <hr/>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title">Staff </th>
                                        <th class="column-title">Monday </th>
                                        <th class="column-title">Tuesday </th>
                                        <th class="column-title">Wednesday </th>
                                        <th class="column-title">Thursday </th>
                                        <th class="column-title">Friday </th>
                                         <th class="column-title">Saturday </th>
                                        <th class="column-title no-link last"><span class="nobr">Sunday </span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   
                                </tbody>
                            </table>
                        </div>
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
            {"orderable": false, "targets": [1,2,3,4,5,6,7]}
        ]
    });

</script>
<!-- /page content -->
<!-- footer content -->
<footer> @include('includes.footer') </footer>
<!-- /footer content -->@endsection