<?php

namespace App\Http\Controllers;

use Auth;
use App\TimeOff;
use Illuminate\Http\Request;

class TimeOffController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create()
    {
        return view('timeoffrequests.create');
    }
    
    public function index()
    {
        return view('timeoffrequests.index');
    }
    
    public function add(Request $request)
    {
        $timeOff = new TimeOff($request->all());
        $this->validate($request, [
            'startDate' => 'required',
            'endDate' => 'required',
            'note' => 'required'
            ]);
        
        $timeOff->userId = Auth::user()->id;
        $timeOff->save();
        return view('timeoffrequests.create');
    } 
}
