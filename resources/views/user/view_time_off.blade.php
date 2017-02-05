@extends('layouts.blank') @push('stylesheets')
<!-- Example -->
<!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->@endpush @section('main_container')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>View Time Off Requests</h3> </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <br/>
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        <a class="btn btn-success" href="{{ url('/request_time_off') }}"><i class="fa fa-edit m-right-xs"></i>Submit New Request</a>
                        <hr/>
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title">Requested Dates </th>
                                        <th class="column-title">Details </th>
                                        <th class="column-title">Status </th>
                                        <th class="column-title no-link last"><span class="nobr">Date Submitted </span> </th>
                                        <th class="bulk-actions" colspan="7"> <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="even pointer">
                                        <td class=" ">02/02/2017 - 02/02/2017 </td>
                                        <td class=" ">Vacation </td>
                                        <td class=" "><span class="label label-success">Approved </span></td>
                                        <td class=" last">15/01/2017 </td>
                                    </tr>
                                    <tr class="odd pointer">
                                        <td class=" ">03/01/2017 - 03/02/2017 </td>
                                        <td class=" ">Vacation </td>
                                        <td class=" "><span class="label label-danger">Rejected </span></td>
                                        <td class=" last">10/02/2017 </td>
                                    </tr>
                                    <tr class="even pointer">
                                        <td class=" ">03/03/2017 - 03/05/2017 </td>
                                        <td class=" ">Vacation </td>
                                        <td class=" "><span class="label label-warning">Pending </span></td>
                                        <td class=" last">27/02/2017 </td>
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