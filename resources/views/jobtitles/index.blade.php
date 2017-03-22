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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jobTitles as $jobTitle)
                                        <tr class="even pointer">
                                            <td>{{ $jobTitle->title }}</td>
                                            <td>{!!\App\Models\User::Where('titleId',$jobTitle->id)->count() !!} Employee(s)</td>
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
    <script>
    $('#datatable').DataTable();
    </script>
<!-- /page content -->
<!-- footer content -->
<footer> @include('includes.footer') </footer>
<!-- /footer content -->@endsection