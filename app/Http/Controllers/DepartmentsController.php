<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Department;
use Illuminate\Support\Facades\DB;

class DepartmentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
     public function create()
    {
        return view('departments.create');
    }
    
    public function index()
    {
    	$departments = Department::All()->sortByDesc("department");
        return view('departments.index', compact('departments'));
    }
    
    public function add(Request $request)
    {
        $department = new Department($request->all());
        $departmentRequests = Department::All();
            
        $this->validate($request, [
            'department' => 'required|min:5|max:30',
            'description' => 'required|min:10|max:100',
            ]);
        
        $department->save();
        $msg = "You have successfully added " . $department->department . " department";
        $request->session()->flash('success', $msg);
        return back();
    } 

    public function edit($id, Request $request)
    {
        $department = Department::find($id);
        $department->department = $request['department'];
        $department->description = $request['description'];
        $department->save();
        return response(['msg' => 'department changed', 'status' => 'Success']);
    }

    public function destroy($id)
    {
        DB::table('users')->where('departmentId', $id)->update(array('departmentId' => NULL));
        Department::destroy($id);
        return response(['msg' => 'department deleted', 'status' => 'Success']);
    }
}
