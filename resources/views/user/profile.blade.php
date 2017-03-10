@extends('layouts.blank') @push('stylesheets')
<!-- Example -->
<!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->@endpush @section('main_container')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>View Profile</h3> </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <br/>
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view" src="{{ Gravatar::src(Auth::user()->email) }}" alt="Avatar of {{ Auth::user()->name }}">
                                </div>
                            </div>
                            
                             <!-- Name -->
                            <h3>{{ $user->name }} {{ $user->lastName}}</h3>
                            <ul class="list-unstyled user_data">
                                
                                 <!-- Job Title and Department -->
                                <li> <i class="fa fa-briefcase user-profile-icon"></i> {{ $user->jobTitle->title }}, <i>{{ $user->department->department}}</i> </li>
                            </ul> 
                            
                            <!-- Edit Profile Button -->
                            @if (!auth()->guest() && auth()->user()->isOfType(1))  
                                <a class="btn btn-success" href="{{ url('/user/profile') }}/{{ $user->id }}/edit">
                                <i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                                <br />
                            @endif
                            
                            <br />
                            
                            <ul class="list-unstyled user_data">
                                 <!-- Hire Date -->
                                <li>
                                    <p>Hired on {{ $user->hireDate}}</p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                              
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                        <!-- start personal info -->
                                        <table class="data table table-striped no-margin">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Date of Birth</strong></td>
                                                    <td>{{ $user->birthDate}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>SIN Number</strong></td>
                                                    <td>{{ $user->sinNumber}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Address</strong></td>
                                                    <td>{{ $user->address}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>City</strong></td>
                                                    <td>{{ $user->city}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Province</strong></td>
                                                    <td>{{ $user->province}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Postal Code</strong></td>
                                                    <td>{{ $user->postalCode}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Primary Phone Number</strong></td>
                                                    <td>{{ $user->primaryPhone}}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Secondary Phone Number</strong></td>
                                                    <td>{{ $user->secondaryPhone}}</td>
                                                </tr>
                                                 <tr>
                                                    <td><strong>Email Address</strong></td>
                                                    <td>{{ $user->email}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- end personal info -->
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
<!-- /page content -->
<!-- footer content -->
<footer> @include('includes.footer') </footer>
<!-- /footer content -->@endsection