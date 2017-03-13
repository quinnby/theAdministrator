<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        $users = User::all();
        $msg = "Schedule Added";
        return view('schedule.create', compact('users', 'msg'));
    }
}
