<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobTitle;

class JobTitlesController extends Controller
{
    public function create()
    {
        return view('jobtitles.create');
    }
    
    public function index()
    {
    	$jobTitles = JobTitle::All()->sortByDesc("title");
        return view('jobtitles.index', compact('jobTitles'));
    }
    
    public function add(Request $request)
    {
        $jobTitle = new JobTitle($request->all());
        $jobTitleRequests = JobTitle::All();
            
        $this->validate($request, [
            'title' => 'required|min:5|max:30',
            ]);
        
        $jobTitle->save();
        $msg = "You have successfully added " . $jobTitle->title . "  job title";
        $request->session()->flash('success', $msg);
        return back();
    } 

    public function edit($id, Request $request)
    {
        $job = JobTitle::find($id);
        $job->title = $request['title'];
        $job->save();
        $msg = "You have successfully changed " . $job->title . " title";
        $request->session()->flash('success', $msg);
        return response(['msg' => 'Job title changed', 'status' => 'Success']);
    }

    public function destroy($id)
    {
        JobTitle::destroy($id);
        $msg = "You have successfully deleted " . $job->title . " title";
        $request->session()->flash('success', $msg);
        return response(['msg' => 'job title deleted', 'status' => 'Success']);
    }


}
