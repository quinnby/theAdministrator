<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\JobTitle;
use App\Department;
use App\UserType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::All();
        return view('user.index', compact('users'));
    }
    
    public function create()
    {
        $userTypes = UserType::All();
        $jobTitles = JobTitle::All();
        $departments = Department::All();
        return view('user.create', compact('jobTitles', 'departments', 'userTypes'));
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
        
    public function add(Request $request)
    {
        $user = new User($request->all());
        $user->password = bcrypt($request['password']);

        //|regex:/^\(\d{3}\)\s\d{3}-\d{4}$/'
        $this->validate($request, [
            'name' => 'required|min:3',
            'lastName' => 'required|min:3',
            'sinNumber' => 'required|regex:/^\d{3}-\d{3}-\d{3}$/',
            'primaryPhone' => 'required|min:10',
            'address'=> 'required|min:5',
            'city' => 'required',
            'email' => 'Required|Email|Confirmed',
            'password' => 'required|Confirmed',
            'province'=>'required|not_in:0',
            'userTypeId' => 'required|not_in:0',
            'titleId'=> 'required|not_in:0',
            'departmentId'=> 'required|not_in:0'
        ]);
        
        $user->save();
        return $user;
    }
}
?>
