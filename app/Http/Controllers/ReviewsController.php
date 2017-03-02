<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\PerformanceNotes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewsController extends Controller
{

    public function create()
    {	
    	$users = User::All();
    	$loggedUser = Auth::user()->id;
        return view('reviews.create_performance_review', compact('users','loggedUser'));
    }
    
    public function view()
    {
    	$notes = PerformanceNotes::All();
    	
        return view('reviews.view_performance_reviews', compact('notes'));
    }

     public function add(Request $request)
    {
    	$performanceNote = new PerformanceNotes($request->all());
    	$performanceNote->userOwner = Auth::user()->id;

    	$this->validate($request,[
    		'userId' => 'required|not_in:0',
    		'note' => 'required:min:5'
    	]);

    	$performanceNote->save();
    	return redirect('view_performance_reviews');
    }
}
