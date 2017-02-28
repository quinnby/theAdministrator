<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function create()
    {
        return view('reviews.create_performance_review');
    }
}
