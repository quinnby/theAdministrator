@extends('layouts.blank') @push('stylesheets')
<!-- Example -->
<!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->@endpush @section('main_container')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Create Employee</h3> </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <br/>
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        <div class="x_content">
                            <!-- If Errors are detected in validation -->@if (count($errors) > 0)
                            <div class="alert alert-danger"> <strong>Whoops!</strong> There were some problems with your input.
                                <br>
                                <br>
                                <ul> @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li> @endforeach </ul>
                            </div> @endif
                            <!-- Form -->
                            <form class="form-horizontal form-label-left" novalidate role="form" method="POST" action="{{ url('create_user') }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="firstName"> First Name <span class="required">*</span> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="firstName" class="form-control col-md-7 col-xs-12" name="firstName" type="text" value="{{ old('firstName') }}"> </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lastName"> Last Name <span class="required">*</span> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="lastName" class="form-control col-md-7 col-xs-12" name="lastName" type="text" value="{{ old('lastName') }}"> </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sinNumber">S.I.N Number <span class="required">*</span> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="sinNumber" name="sinNumber" class="form-control col-md-7 col-xs-12" placeholder="999-999-999" value="{{ old('sinNumber') }}"> </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telephone <span class="required">*</span> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="tel" id="telephone" name="phone" class="form-control col-md-7 col-xs-12" placeholder="(999) 999 9999"> </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address"> Address <span class="required">*</span> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="address" class="form-control col-md-7 col-xs-12" name="address" type="text"> </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city"> City <span class="required">*</span> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="city" class="form-control col-md-7 col-xs-12" name="city" type="text"> </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Province <span class="required">*</span> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name="province">
                                            <option value="0">Choose Province</option>
                                            <option value="1">ON</option>
                                            <option value="2">BC</option>
                                            <option value="3">NB</option>
                                            <option value="4">AB</option>
                                            <option value="5">MB</option>
                                            <option value="6">NL</option>
                                            <option>NS</option>
                                            <option>NT</option>
                                            <option>NU</option>
                                            <option>PE</option>
                                            <option>QC</option>
                                            <option>YT</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="postal"> Postal Code <span class="required">*</span> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="city" class="form-control col-md-7 col-xs-12" name="postal" type="text" placeholder="X1X1X1"> </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="birthDate">Birth Date <span class="required">*</span> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="birthDate" name="birthDate" placeholder="DD/MM/YYYY" class="form-control col-md-7 col-xs-12"> </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" id="email" name="email" class="form-control col-md-7 col-xs-12"> </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Confirm Email <span class="required">*</span> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" id="email2" name="confirm_email" data-validate-linked="email" class="form-control col-md-7 col-xs-12"> </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="hireDate">Hire Date <span class="required">*</span> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="url" id="hireDate" name="hireDate" placeholder="DD/MM/YYYY" class="form-control col-md-7 col-xs-12"> </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Job Title <span class="required">*</span> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name="jobTitle">
                                            <option>Choose Title</option> @foreach ($jobTitles as $title)
                                            <option>{{ $title['title'] }}</option> @endforeach </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Department <span class="required">*</span> </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name="department">
                                            <option>Choose Department</option> @foreach ($departments as $department)
                                            <option>{{ $department['department'] }}</option> @endforeach </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label for="password" class="control-label col-md-3">Password</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="password" type="password" name="password" class="form-control col-md-7 col-xs-12"> </div>
                                </div>
                                <div class="item form-group">
                                    <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="password2" type="password" name="password2" class="form-control col-md-7 col-xs-12"> </div>
                                </div>
                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary">Cancel</button>
                                        <button id="send" type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
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