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
                        <!-- Employee Dashboard -->
                        @if (!auth()->guest() && auth()->user()->isOfType(2))
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="{{ url('/user/profile/') }}/{{ auth()->user()->id }}">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fa fa-user"></i> </div>
                                        <h3>My Profile</h3>
                                        <p>View Profile</p>
                                    </div>
                                </a>
                            </div>
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="{{ url('/schedule/') }}">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fa fa-calendar"></i> </div>
                                        <h3>Schedule</h3>
                                        <p>View Schedule</p>
                                    </div>
                                </a>
                            </div>
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="{{ url('/time_off') }}">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fa fa-clock-o"></i> </div>
                                        <h3>Time Off</h3>
                                        <p>Manage Requests</p>
                                    </div>
                                </a>
                            </div>
                            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <a href="{{ url('/performance_review') }}">
                                    <div class="tile-stats">
                                        <div class="icon"><i class="fa fa-book"></i> </div>
                                        <h3>Reviews</h3>
                                        <p>View Reviews</p>
                                    </div>
                                </a>
                            </div>
                    @endif
                        
                    <!-- Admin Dashboard -->
                    @if (!auth()->guest() && auth()->user()->isOfType(1))
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a href="{{ url('/user/profile/') }}/{{ auth()->user()->id }}">
                                <div class="tile-stats">
                                    <div class="icon"><i class="fa fa-user"></i> </div>
                                    <h3>My Profile</h3>
                                    <p>View Profile</p>
                                </div>
                            </a>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a href="{{ url('/users/') }}">
                                <div class="tile-stats">
                                    <div class="icon"><i class="fa fa-users"></i> </div>
                                    <h3>Employees</h3>
                                    <p>Manage Employees</p>
                                </div>
                            </a>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a href="{{ url('/schedule/') }}">
                                <div class="tile-stats">
                                    <div class="icon"><i class="fa fa-calendar"></i> </div>
                                    <h3>Schedule</h3>
                                    <p>View Schedule</p>
                                </div>
                            </a>
                        </div>
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a href="{{ url('/time_off/') }}">
                                <div class="tile-stats">
                                    <div class="icon"><i class="fa fa-clock-o"></i> </div>
                                    <h3>Time Off</h3>
                                    <p>Manage Requests</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a href="{{ url('/performance_review/') }}">
                                <div class="tile-stats">
                                    <div class="icon"><i class="fa fa-book"></i> </div>
                                    <h3>Reviews</h3>
                                    <p>Manage Reviews</p>
                                </div>
                            </a>
                        </div> 
                          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a href="{{ url('/departments/') }}">
                                <div class="tile-stats">
                                    <div class="icon"><i class="fa fa-folder-open"></i> </div>
                                    <h3>Departments</h3>
                                    <p>Manage Departments</p>
                                </div>
                            </a>
                          </div> 
                          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a href="{{ url('/jobtitles/') }}">
                                <div class="tile-stats">
                                    <div class="icon"><i class="fa fa-briefcase"></i> </div>
                                    <h3>Job Titles</h3>
                                    <p>Manage Job Titles</p>
                                </div>
                            </a>
                        </div> 
                    @endif 
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