<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\PerformanceNotes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
    	$notes = PerformanceNotes::All()->sortByDesc("updated_at");
    	$loggedUser = Auth::user()->id;
        return view('reviews.view_performance_reviews', compact('notes','loggedUser'));
    }

    public function create()
    {	
    	$users = User::All();
    	$loggedUser = Auth::user()->id;
        return view('reviews.create_performance_review', compact('users','loggedUser'));
    }
    

    public function add(Request $request)
    {
        //DD($request->all());
    	$performanceNote = new PerformanceNotes($request->all());
        //DD($performanceNote);
    	$performanceNote->userOwner = Auth::user()->id;
        $notes = PerformanceNotes::All();

    	$this->validate($request,[
    		'userId' => 'required|not_in:0',
    		'note' => 'required:min:5|max:100',
            'noteDate' =>'required'
    	]);

    	$performanceNote->save();
    	return redirect('performance_review');
    }

    public function update(Request $request)
    {   
        $note = PerformanceNotes::find($request['noteId']);
        $note->note = $request['note'];
        $note->save();
        return response(['msg' => 'Member Performance note updated', 'status' => 'Success']);
    }
}
