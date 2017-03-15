<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Department;

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
        //dd($department);
        $departmentRequests = Department::All();
            
        $this->validate($request, [
            'department' => 'required',
            'description' => 'required',
            ]);
        
        $department->save();
        return redirect('departments');
    } 
}
