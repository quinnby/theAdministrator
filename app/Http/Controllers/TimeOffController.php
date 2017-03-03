<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimeOffController extends Controller
{
    public function create()
    {
        return view('timeoffrequests.create');
    }
    
    public function index()
    {
        return view('timeoffrequests.index');
    }
}
