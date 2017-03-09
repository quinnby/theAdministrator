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
    	$timeOffRequests = TimeOff::All()->sortByDesc("startDate");
    	$loggedUser = Auth::user()->id;
        return view('timeoffrequests.index', compact('timeOffRequests','loggedUser'));
    }
    
    public function add(Request $request)
    {
        $timeOff = new TimeOff($request->all());
        $timeOff->userId = Auth::user()->id;
        $timeOffRequests = TimeOff::All();
            
        $this->validate($request, [
            'startDate' => 'required',
            'endDate' => 'required',
            'note' => 'required'
            ]);
        
        $timeOff->save();
        return redirect('time_off');
    } 
}