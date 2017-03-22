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
                     
                        
                         <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                             
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
                                    <input value="{{ $user->name}}" type="text" id="firstName" name="firstName" class="form-control col-md-7 col-xs-12"> </div>
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
                             
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Province </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{ $user->province}}" type="text" id="province" name="province" class="form-control col-md-7 col-xs-12"> </div>
                            </div>
                             
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Postal Code </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{ $user->postalCode}}" type="text" id="postal" name="postal" class="form-control col-md-7 col-xs-12"> </div>
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

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Department </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="titleId">
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
                                    <input value="{{ $user->primaryPhone}}" type="text" id="primaryTelephone" name="primaryTelephone" class="form-control col-md-7 col-xs-12"> </div>
                            </div>
                      
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"> Secondary Phone Number </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="{{ $user->secondaryPhone}}" type="text" id="secondaryTelephone" name="secondaryTelephone" class="form-control col-md-7 col-xs-12"> </div>
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

{{-- todo: adding jquery for masking input fields --}}

<!-- /page content -->
<!-- footer content -->
<footer> @include('includes.footer') </footer>
<!-- /footer content -->@endsection