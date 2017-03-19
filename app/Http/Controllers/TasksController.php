<?php

namespace App\Http\Controllers;

use Auth;
use App\Tasks;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
	public function index()
	{
		$tasks = Tasks::All();
		$loggedUser = Auth::user()->id;
		// $task = Tasks::find(1);
		// dd($tasks);
		return view('tasks.view_tasks', compact('tasks','loggedUser'));
	}

    public function create()
    {	
    	$users = User::All();
    	$loggedUser = Auth::user()->id;
        return view('tasks.create_tasks', compact('users','loggedUser'));
    }

    public function add(Request $request)
    {
    	$task = new Tasks($request->all());
    	$task->userOwner = Auth::user()->id;

    	$this->validate($request,[

    		'userId' => 'required|not_in:0',
    		'taskName' => 'required:min:5',
            'taskDescription' =>'required|min:10|max:100',
            'date' => 'required|after:yesterday'
    	]);

    	$task->save();
    	$user = User::find($task->userId);
    	$msg = "You have successfully added a task for " . $user->name . " " . $user->lastName;
    	$request->session()->flash('success', $msg);
    	return redirect()->back();
    }
}
