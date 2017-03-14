@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
        <br/>
        <img src="{{ asset('/images/dcpic1.jpg') }}" ""alt="Durham College Banner" />
        <img src="{{ asset('/images/dcpic2.gif') }}" ""alt="Durham College Banner" />
        <p> This website is the capstone project of Quinn Craven, Ellen Coombs, David Portillo and William Beniuk, and was designed for the CAPR 6203 course at Durham College during the Winter 2017 semester. It was developed using the <a href="https://laravel.com/"> Laravel</a> framework and the<a href="https://colorlib.com/polygon/gentelella/"> Gentelella Alela! </a>CSS Admin template. <br/> <br/> 
        
        This website was created for educational purposes only, to demonstrate the knowledge gained during the <a href="http://www.durhamcollege.ca/programs/computer-programmer-analyst-three-year"> Computer Programmer Analyst </a> program at Durham College. </p>
    </div>

    <!-- footer content -->
    <footer>
            @include('includes.footer')
    </footer>
    <!-- /footer content -->
@endsection