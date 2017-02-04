@extends('layouts.blank') @push('stylesheets')
<!-- Example -->
<!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->@endpush @section('main_container')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Dashboard</h3> </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <div class="x_content">
                        <div class="row">
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="{{ url('/user_profile') }}">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fa fa-user"></i> </div>
                                        <h3>My Profile</h3>
                                        <p>View/Edit Profile</p>
                                    </div>
                                </a>
                            </div>
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="{{ url('/') }}">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fa fa-calendar"></i> </div>
                                        <h3>Calendar</h3>
                                        <p>View Schedule</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Custom Theme Scripts Go Here -->
<!-- /page content -->
<!-- footer content -->
<footer> @include('includes.footer') </footer>
<!-- /footer content -->@endsection