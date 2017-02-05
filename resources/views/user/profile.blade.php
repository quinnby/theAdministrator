@extends('layouts.blank') @push('stylesheets')
<!-- Example -->
<!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->@endpush @section('main_container')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>User Profile</h3> </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <br/>
                <div class="x_panel">
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                            <h3>Samuel Doe</h3>
                            <ul class="list-unstyled user_data">
                                <li> <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer, <i>Department</i> </li>
                            </ul> <a class="btn btn-success" href="{{ url('/edit_user_profile') }}"><i class="fa fa-edit m-right-xs"></i> Edit Profile</a>
                            <br />
                            <!-- start skills -->
                            <h4>Skills</h4>
                            <ul class="list-unstyled user_data">
                                <li>
                                    <p>Web Applications</p>
                                    <div class="progress progress_sm">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                                    </div>
                                </li>
                                <li>
                                    <p>Website Design</p>
                                    <div class="progress progress_sm">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70"></div>
                                    </div>
                                </li>
                                <li>
                                    <p>Automation & Testing</p>
                                    <div class="progress progress_sm">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                                    </div>
                                </li>
                                <li>
                                    <p>UI / UX</p>
                                    <div class="progress progress_sm">
                                        <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                                    </div>
                                </li>
                            </ul>
                            <!-- end of skills -->
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Personal Information</a> </li>
                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Employee Information</a> </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                        <!-- start personal info -->
                                         <table class="data table table-striped no-margin">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Address</strong</td>
                                                    <td>*info from database here*</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>City</strong</td>
                                                    <td>*info from database here*</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Province</strong</td>
                                                    <td>*info from database here*</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Postal Code</strong</td>
                                                    <td>*info from database here*</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>SIN Number</strong</td>
                                                    <td>*info from database here*</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Email</strong></td>
                                                    <td>*info from database here*</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Phone</strong></td>
                                                    <td>*info from database here*</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- end personal info -->
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                        <!-- start employee info -->
                                        <table class="data table table-striped no-margin">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Employee ID</strong</td>
                                                    <td>*info from database here*</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Hire Date</strong></td>
                                                    <td>*info from database here*</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- end employee info -->
                                    </div>
                                </div>
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