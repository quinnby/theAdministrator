@extends('layouts.blank') @push('stylesheets')
<!-- Example -->
<!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->@endpush @section('main_container')
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
                        <br />
                        <a class="btn btn-success" href="{{ url('/create_performance_review') }}"><i class="fa fa-edit m-right-xs"></i> Create New Review</a>
                        <hr/>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title">Employee Name </th>
                                        <th class="column-title">Position </th>
                                        <th class="column-title">Review Date </th>
                                        <th class="column-title no-link last"><span class="nobr">Details </span> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="even pointer">
                                        <td class=" ">Employee Name </td>
                                        <td class=" ">Developer </td>
                                        <td class=" ">15/01/2017 </td>
                                        <td class=" last">*performance review* </td>
                                    </tr>
                                    <tr class="odd pointer">
                                        <td class=" ">Employee Name </td>
                                        <td class=" ">Developer </td>
                                        <td class=" ">15/01/2017</td>
                                        <td class=" last">*performance review* </td>
                                    </tr>
                                    <tr class="even pointer">
                                        <td class=" ">Employee Name </td>
                                        <td class=" ">Developer </td>
                                        <td class=" ">15/01/2017</td>
                                        <td class=" last">*performance review* </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<!-- footer content -->
<footer> @include('includes.footer') </footer>
<!-- /footer content -->@endsection