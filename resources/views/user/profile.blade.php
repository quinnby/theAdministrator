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
                                <li> <i class="fa fa-briefcase user-profile-icon"></i> {{ $user->jobTitle->title }}, <i>{{ ($user->department != null) ? $user->department->department : "N/A"}}</i> </li>
                            </ul> 
                            
                            <!-- Edit Profile Button -->
                            @if (!auth()->guest() && auth()->user()->isOfType(1))  
                                <a class="btn btn-success" href="{{ url('/user/profile') }}/{{ $user->id }}/edit">
                                <i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                                <div id="editTotalSick" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit m-right-xs"></i>Edit Total Sick Days</div>
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
                                                <tr>
                                                    <td><strong>Allowed Sick Days</strong></td>
                                                    <td>{{ ($user->totalSickDays == null)? "Not Set" : $user->totalSickDays }}</td>
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
        <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Set Total Sick Days</h4>
                </div>
                <div class="alert alert-danger err" style="display:none">
                    <strong>Whoops! </strong> <span id='errMsg'></span>
                </div>
                <div class="modal-body">
                    <form role="form" method="PATCH" >
                        <div class="form-group">
                            <label><strong>Total Allowed</strong></label><input class="form-control" id="totalSickDays" value="{{ ($user->totalSickDays == null)? "0" : $user->totalSickDays }}"></input>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button id="updateSick" type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
<script>
     $(document).ready(function(){

        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
            
            $('#updateSick').on('click', function(){

                if($('#totalSickDays').val().length >= 0)
                {
                    if(Math.floor($('#totalSickDays').val()) == $('#totalSickDays').val() && $.isNumeric($('#totalSickDays').val()))
                    {
                        var token = $(this).data("token");
                        $.ajax({
                            url: '/users/' + {{ $user->id }} +'/setSickDays/',
                            type: 'PATCH',
                            data: {
                                'totalSickDays': $('#totalSickDays').val()
                            },

                            success: function(result){
                                location.reload();
                                console.log('successfully edited department');
                            }
                        });
                    }

                    else
                    {
                        $('#errMsg').text("Total sick days must be a positive whole number.");
                        $(".err").show('slow');
                    }
                }
                else
                {
                    $('#errMsg').text("You must enter in a sick day.")
                    $(".err").show('slow');
                }
            });
        });
     
    
</script>
    
<!-- /page content -->
<!-- footer content -->
<footer> @include('includes.footer') </footer>
<!-- /footer content -->@endsection