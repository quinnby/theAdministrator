<?php

namespace App\Http\Controllers;

use App\JobTitle;
use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        return view('user.manage');
    }
    
    public function create()
    {
        $jobTitles = JobTitle::All();
        $departments = Department::All();
        return view('user.create', compact('jobTitles', 'departments'));
    }
    
    public function dashboard()
    {
        return view('user.dashboard');
    }
    
    public function view()
    {
        return view('user.profile');
    }
    
    public function edit()
    {
        return view('user.edit_profile');
    }
    
    public function requestTimeOff()
    {
        return view('user.request_time_off');
    }
    
    public function viewTimeOff()
    {
        return view('user.view_time_off');
    }
        
    public function add(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required|min:3',
            'lastName' => 'required|min:3',
            'sinNumber' => 'required|regex:/^\d{3}-\d{3}-\d{3}$/',
            'telephone' => 'required|min:10|regex:/^\(\d{3}\)\s\d{3}-\d{4}',
            'address'=> 'required|min:5',
            'city' => 'required',
            'province'=>'required|not_in:0',
            'jobTitle'=> 'required|not_in:0',
            'department'=> 'required|not_in:0'
            
        ]);
        
        $user = new User($request->all());
        return $user;
    }
}
?>
