<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
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
            'endDate' => 'required|after:startDate',
            'note' => 'required'
            ]);
        
        $timeOff->save();
        return redirect('time_off');
    } 

    public function updateStatus(Request $request)
    {
        $timeOff = TimeOff::find($request['id']);
        $timeOff->status = $request['status'];
        $timeOff->approvedById = Auth::user()->id;
        $timeOff->approvedOn = Carbon::now();
        $timeOff->save();
        return response(['msg' => 'Member Status Request updated', 'status' => 'Success']);
    }
    
    public function bookedOff($id)
    {
        $timeOffRequests = TimeOff::all()->where('userId', $id);
        //$timeOffRequests = TimeOff::all()->first();
        return $timeOffRequests;
    }

}