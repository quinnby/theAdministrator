@extends('layouts.blank') @push('stylesheets')
<!-- Example -->
<!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->@endpush @section('main_container')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edit Profile</h3> </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <br/>
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left input_mask">
                            
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="firstName" placeholder="First Name"> <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span> </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control" id="lastName" placeholder="Last Name"> <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span> </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="email" placeholder="Email"> <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span> </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control" id="telephone" placeholder="Phone"> <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span> </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control has-feedback-left" id="jobTitle" readonly="readonly" placeholder="Job Title"> <span class="fa fa-folder-open form-control-feedback left" aria-hidden="true"></span> </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control" id="hireDate" readonly="readonly" placeholder="Hire Date"> <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span> </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control" id="sinNumber" readonly="readonly" placeholder="SIN Number"> </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control" id="birthDate" placeholder="Birth Date"> </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control" id="address" placeholder="Address"> </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control" id="city" placeholder="City"> </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control" id="province" placeholder="Province"> </div>
                            
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                <input type="text" class="form-control" id="postal" placeholder="Postal Code"> </div>
                            
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Cancel</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
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