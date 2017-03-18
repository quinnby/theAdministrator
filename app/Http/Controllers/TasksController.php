<?php

namespace App\Http\Controllers;

use Auth;
use App\Tasks;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
	public function index()
	{
		$tasks = Tasks::All();
		$loggedUser = Auth::user()->id;
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


    	//dd($task);
    	$this->validate($request,[

    		'userId' => 'required|not_in:0',
    		'taskName' => 'required:min:5',
            'taskDescription' =>'required',
            'date' => 'required|after:today'

    	]);

    	$task->save();
    	return redirect('performance_review');
    }
}
