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
                  <!-- If Errors are detected in validation -->  
                    @if (count($errors) > 0)
            						<div class="alert alert-danger">
            							<strong>Whoops!</strong> There were some problems with your input.<br><br>
            							<ul>
            								@foreach ($errors->all() as $error)
            									<li>{{ $error }}</li>
            								@endforeach
            							</ul>
            						</div>
					           @endif

                <!-- If passed validation --> 
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        {!! \Session::get('success') !!}  
                    </div>
                @endif   
                      
                  <div class="x_panel">
                      <div class="x_content">
                          <br />
                   
                  <div class="x_content">
                    
                      <!-- Form -->
                    <form class="form-horizontal form-label-left" novalidate role="form" method="POST" action ="{{ url('/user/profile') }}/{{ $user->id }}/edit">
                        <input type="hidden" 
                            name="_token" 
                            value="{{ csrf_token() }}"/>
                             
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sinNumber">S.I.N Number <span class="required">*</span>
                                </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="sinNumber" name="sinNumber"   class="form-control col-md-7 col-xs-12"  value="{{ $user->sinNumber}}">
                            </div>
                             </div>
                             
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">First Name </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{ $user->name}}" type="text" id="name" name="name" class="form-control col-md-7 col-xs-12"> </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Last Name </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{ $user->lastName}}" type="text" id="lastName" name="lastName" class="form-control col-md-7 col-xs-12"> </div>
                            </div>
                             
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Address </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{ $user->address}}" type="text" id="address" name="address" class="form-control col-md-7 col-xs-12"> </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">City </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{ $user->city}}" type="text" id="city" name="city" class="form-control col-md-7 col-xs-12"> </div>
                            </div>
                             
<!--
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Province </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{ $user->province}}" type="text" id="province" name="province" class="form-control col-md-7 col-xs-12"> </div>
                            </div>
-->
                             
                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Province
                          <span class="required">*</span>
                          </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select 'selected="selected"' class="form-control" name="province">
                            <option value="">Choose Province</option>
                            <option value="ON">ON</option>
                            <option value="BC">BC</option>
                            <option value="NB">NB</option>
                            <option value="AB">AB</option>
                            <option value="MB">MB</option>
                            <option value="NL">NL</option>
                            <option value="NS">NS</option>
                            <option value="NT">NT</option>
                            <option value="NU">NU</option>
                            <option value="PE">PE</option>
                            <option value="QC">QC</option>
                            <option value="YT">YT</option>
                          </select>
                        </div>
                      </div>
                             
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Postal Code </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{ $user->postalCode}}" type="text" id="postal" name="postal" class="form-control col-md-7 col-xs-12"> </div>
                            </div>
                        <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="birthDate">Birth Date <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="birthDate" name="birthDate" placeholder="DD/MM/YYYY" class="form-control col-md-7 col-xs-12" value="{{ $user['birthDate'] }}">
                        </div>
                      </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Job Title </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="titleId">
                                        @foreach($jobTitles as $title)
                                            <option value={{$title['id']}} {{$user['titleId'] == $title['id'] ? 'selected="selected"' : ''}}>{{ $title['title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        
                            <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">User Type
                          <span class="required">*</span>
                          </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="userTypeId">
                            <option value=0>Choose User Type</option>
                            @foreach ($userTypes as $userType)
                                <option value={{ $userType['id']}}>{{ $userType['userType'] }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Department </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="departmentId">
                                        @if($user['departmentId'] != null)
                                            @foreach($departments as $department)
                                                <option value={{$department['id']}} {{$user['departmentId'] == $department['id'] ? 'selected="selected"' : ''}}>{{ $department['department'] }}</option>
                                            @endforeach
                                        @else
                                            <option value="null" selected="selected">N/A</option>
                                            @foreach($departments as $department)
                                                <option value={{$department['id']}}>{{ $department['department'] }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Email Address </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{ $user->email}}" type="text" id="email" name="email" class="form-control col-md-7 col-xs-12"> </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> Primary Phone Number </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{ $user->primaryPhone}}" type="text" id="primaryPhone" name="primaryPhone" class="form-control col-md-7 col-xs-12"> </div>
                            </div>
                      
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> Secondary Phone Number </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{ $user->secondaryPhone}}" type="text" id="secondaryPhone" name="secondaryPhone" class="form-control col-md-7 col-xs-12"> </div>
                            </div>
                             
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                            </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="{{ $user->email}}" type="email" id="email" name="email" class="form-control col-md-7 col-xs-12" value="{{ old('email') }}">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email_confirmation">Confirm Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input value="{{ $user->email}}" type="email" id="email_confirmation" name="email_confirmation" data-validate-linked="email"   class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                             
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <a href="{{ url('/user/profile/' . auth()->user()->id) }}"><button class="btn btn-primary" type="button">Cancel</button></a>
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    //function to uppercase the postal code onkeydown event
    function PCToUpper(pc)
    {
      setTimeout(function(){pc.value = pc.value.toUpperCase();}, 1)
    }

  $(document).ready(function($){

    //mask input fields
    $('#firstName').mask('AAAAAAAAAAAAAAAAAAAA', {'translation': {A: {pattern: /[A-Za-z]/}}});
    $('#lastName').mask('AAAAAAAAAAAAAAAAAAAA', {'translation': {A: {pattern: /[A-Za-z]/}}});
    $('#city').mask('AAAAAAAAAAAAAAAAAAAA', {'translation': {A: {pattern: /[A-Za-z]/}}})
    $('#sinNumber').mask('000-000-000');
    $('#telephone').mask('(000)-000-0000');
    $('#postalCode').mask('A0A-0A0', {'translation': {A: {pattern: /[A-Za-z]/}}} );

  });
</script>


{{-- todo: adding jquery for masking input fields --}}

<!-- /page content -->
<!-- footer content -->
<footer> @include('includes.footer') </footer>
<!-- /footer content -->@endsection