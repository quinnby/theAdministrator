@extends('layouts.blank') 
@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush 
@section('main_container')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>View Performance Reviews</h3> </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <br/>
                <div class="x_panel">
                    <div class="x_content">
                        <br />
                        <a class="btn btn-success" href="{{ url('/create_performance_review') }}"><i class="fa fa-edit m-right-xs"></i> Create New Review</a>
                        <hr/>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title">Employee Name </th>
                                        <th class="column-title">Position </th>
                                        <th class="column-title">Review Date </th>
                                        <th class="column-title no-link last"><span class="nobr">Details </span></th>
                                        <th class="column-title no-link last"><span class="nobr">Action </span></th>
                                        <th class="column-title">Issued By </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($notes as $note)
                                        <tr class="even pointer">
                                            <td class=" ">{{ $note->userAbout->name }} {{ $note->userAbout->lastName }}</td>
                                            <td class=" ">{{ $note->userAbout->titleId}}</td>
                                            <td class=" ">{{ $note->noteDate }}</td>
                                            <td class=" ">{{ $note->note }} </td>
                                            <td class=" "><a href="#" class="btn btn-primary btn-xs editNote" data-toggle="modal" data-target="#myModal" value={{$note['id']}}>Edit</a></td>
                                            <td class=" last">{{ $note->Owner->name }} </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">


            <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" 
                        id="inputEmail3" placeholder="Email"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control"
                            id="inputPassword3" placeholder="Password"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                            <input type="checkbox"/> Remember me
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Sign in</button>
                    </div>
                  </div>
                </form>
        
           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      
    </div>
  </div>
  

</div>


<script>
    $('#datatable').DataTable({
        "columnDefs": 
        [
            {"orderable": false, "targets": [4]}
        ]
    });
</script>
<!-- /page content -->
<!-- footer content -->
<footer> @include('includes.footer') </footer>
<!-- /footer content -->@endsection