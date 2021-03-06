<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Schedule;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
            'scheduleStart' => 'required',
            'scheduleEnd' => 'required|after:scheduleStart'
            ]);
        $schedule->createdBy = Auth::user()->id;
        $users = User::all();
        
        $user = User::find($schedule->userId);
        $schedule->save();
        $msg = "Schedule Added for " . $user->name;
        return view('schedule.create', compact('users', 'msg'));
    }
    
    public function viewWeek($week = 0)
    {
        $monday = Carbon::now()->addDays($week * 7)->startOfWeek();
        //$monday = Carbon::now()->startOfWeek();
        $sunday = Carbon::now()->addDays($week * 7)->endOfWeek();
        $users = User::all();
        foreach ($users as $user)
        {
            $schedule[$user->id]['schedule'] = DB::table('schedules')->where('scheduleStart', '>=', $monday)->where('scheduleStart', '<=', $sunday)->where('userId', '=', $user->id)->orderBy('scheduleStart', 'asc')->get();
            //$schedule[$user->id]['schedule'] = $user->schedule->sortByDesc('scheduleStart')->where('scheduleStart', '>=', $monday)->where('scheduleStart', '<=', $sunday);
            //$schedule[$user->id]['bookoff'] = $user->bookedOff->where('startDate', '<=', $sunday)->where('endDate', '>=', $monday)->where('status', '=', 'Approved');
            $schedule[$user->id]['bookoff'] = DB::table('time_offs')->where('startDate', '<=', $sunday)->where('endDate', '>=', $monday)->where('status', '=', 'Approved')->where('userId', '=', $user->id)->get();
        }
        //$schedule = User::find('3');
        //$schedule = $schedule->schedule;
        
        //$schedule = Schedule::all()->where('scheduleStart', '>=', '2017-03-17')->where('scheduleStart', '<=', '2017-03-23');
        //return $monday->format('d');
        return view('schedule.index', compact('schedule', 'monday', 'users', 'week'));
        //return compact('schedule', 'monday', 'users');
    }
}
