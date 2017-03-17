<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Schedule;
use Auth;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function view()
    {
        return view('schedule.view');
    }
    
    public function create()
    {
        $users = User::all();
        return view('schedule.create', compact('users'));
    }
    
    public function add(Request $request)
    {
        $schedule = new Schedule($request->all());
        $this->validate($request, [
            'userId' => 'required',
            'scheduleStart' => 'required|after:today',
            'scheduleEnd' => 'required|after:scheduleStart'
            ]);
        $schedule->createdBy = Auth::user()->id;
        $users = User::all();
        
        $user = User::find($schedule->userId);
        $schedule->save();
        $msg = "Schedule Added for " . $user->name;
        return view('schedule.create', compact('users', 'msg'));
    }
}
