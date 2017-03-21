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
                <h3>Schedule</h3> <br/>
                <a class="btn btn-round btn-default" href="{{ url('/schedule/week') }}/{{ $week - 1 }}"><i class="fa fa-arrow-circle-left m-right-xs"></i> Previous Week </a>
                <a class="btn btn-round btn-default" href="{{ url('/schedule/week') }}/{{ $week + 1 }}"> Next Week <i class="fa fa-arrow-circle-right m-right-xs"></i></a>
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <br/>
                <div class="x_panel">
                    <div class="x_content">
                        <h4>{{ $monday->format('F') }} {{ $monday->format('Y') }}</h4>
                        <hr/>
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title">Staff </th>
                                        <th class="column-title">Monday - {{ $monday->format('d') }} </th>
                                        <th class="column-title">Tuesday - {{ $monday->addDays(1)->format('d') }} </th>
                                        <th class="column-title">Wednesday - {{ $monday->addDays(1)->format('d') }} </th>
                                        <th class="column-title">Thursday - {{ $monday->addDays(1)->format('d') }} </th>
                                        <th class="column-title">Friday - {{ $monday->addDays(1)->format('d') }} </th>
                                        <th class="column-title">Saturday - {{ $monday->addDays(1)->format('d') }} </th>
                                        <th class="column-title no-link last"><span class="nobr">Sunday - {{ $monday->addDays(1)->format('d') }} </span></th>
                                        <?php $monday->addDays(-6); ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr><td>{{ $user->name }} {{$user->lastName}}</td>
                                        <?php $scheduleIt = 0;
                                            $bookedIt = 0; ?>
                                        @for ($i = 0; $i < 7; $i++)
                                            <td>
                                                @if(!is_null($schedule[$user->id]['schedule']) && count($schedule[$user->id]['schedule']) > $scheduleIt)
                                                @for($inner = $scheduleIt; $inner < count($schedule[$user->id]['schedule']); $inner++)
                                                    <?php $date = \Carbon\Carbon::parse($schedule[$user->id]['schedule'][$scheduleIt]->scheduleStart) ?>
                                                
                                                @if($date->day == ($monday->day + $i))
                                                    <?php $end = \Carbon\Carbon::parse($schedule[$user->id]['schedule'][$scheduleIt]->scheduleEnd) ?>
                                                <span>{{ $date->hour }}:{{ $date->minute }} -  {{ $end->hour }}:{{ $end->minute }}</span></br>
                                                    <?php $scheduleIt++ ?>
                                                @endif
                                                @endfor
                                                @endif
                                                @if(!is_null($schedule[$user->id]['bookoff']))
                                                @for($booked = 0; $booked < count($schedule[$user->id]['bookoff']); $booked++)
                                                    <?php $bookStart = \Carbon\Carbon::parse($schedule[$user->id]['bookoff'][$booked]->startDate);
                                                        $bookEnd = \Carbon\Carbon::parse($schedule[$user->id]['bookoff'][$booked]->endDate); ?>
                                                    @if($monday->day + $i >= $bookStart->day && $monday->day + $i <= $bookEnd->day)
                                                <span class="label label-warning">Booked Off</span></br>
                                                    @endif
                                                @endfor
                                                @endif
                                            </td>
                                        @endfor 
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
    </div>

<script>
    $('#datatable').DataTable({
        "aaSorting": [], //disables default sort
        "columnDefs": 
        [
            {"orderable": false, "targets": [1,2,3,4,5,6,7]}
        ]
    });

</script>
<!-- /page content -->
<!-- footer content -->
<footer> @include('includes.footer') </footer>
<!-- /footer content -->@endsection