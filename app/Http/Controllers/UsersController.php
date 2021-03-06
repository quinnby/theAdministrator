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
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
    
    public function view($id)
    {
        $user = User::find($id);
        return view ('user.profile',compact('user'));
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
            'birthDate' => 'required',
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
        $msg = "You have successfully created " . $user->name . " " . $user->lastName;
        $request->session()->flash('success', $msg);
        return back();

        //Todo: Redirect user to an actual page 
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        $jobTitles = JobTitle::All();
        $departments = Department::All();
        $userTypes = UserType::All();
        
        return view ('user.edit_profile',compact('user', 'departments', 'jobTitles', 'userTypes'));
    }
    
    public function edited(Request $request, User $user)
    {
        
        //$user = User::whereId($id)->update($request->except(['_method','_token']));
        //$user->password = bcrypt($request['password']);

        //|regex:/^\(\d{3}\)\s\d{3}-\d{4}$/'
        $this->validate($request, [
            'name' => 'required|min:3',
            'lastName' => 'required|min:3',
            'sinNumber' => 'required|regex:/^\d{3}-\d{3}-\d{3}$/',
            'primaryPhone' => 'required|min:10',
            'birthDate' => 'required',
            'address'=> 'required|min:5',
            'city' => 'required',
            'email' => 'Required|Email|Confirmed',
           // 'password' => 'required|Confirmed',
            'province'=>'required|not_in:0',
            'userTypeId' => 'required|not_in:0',
            'titleId'=> 'required|not_in:0',
            'departmentId'=> 'required|not_in:0'
        ]);
        $user->update($request->all());
        //$user->save();
        $msg = "You have successfully edited " . $user->name . " " . $user->lastName;
        $request->session()->flash('success', $msg);
        return back();

        //Todo: Redirect user to an actual page 
    }
        
    
    public function destroy($id, Request $request)
    {   
        $user = User::find($id);
        $msg = "You have successfully deleted " . $user->name . " " . $user->lastName;
        $request->session()->flash('success', $msg);
        User::destroy($id);
        return response(['msg' => 'Member deleted', 'status' => 'Success']);
    }
    
    public function toggleActivation(User $user, Request $request)
    {
        $user = User::find($id);
        $user->active = !$user->active;
        $user->save();
        $msg = "You have successfully changed activation for " . $user->name . " " . $user->lastName;
        $request->session()->flash('success', $msg);
        return response(['msg' => 'Member activation toggled', 'status' => 'Success']);
    }
    
    public function setSickDays($id, Request $request)
    {
        $user = User::find($id);
        $user->totalSickDays = $request->totalSickDays;
        $user->save();
        //$request->session()->flash('success', $msg);
        return response(['msg' => 'Sick days set.', 'status' => 'Success']);
    }
}
?>
