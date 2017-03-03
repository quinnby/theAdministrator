<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimeOffController extends Controller
{
    public function createRequest()
    {
        return view('timeoffrequests.create');
    }
    
    public function view()
    {
        return view('timeoffrequests.view');
    }
}
