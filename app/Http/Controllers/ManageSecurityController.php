<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageSecurityController extends Controller
{
        public function index()
    {
        return view('manage_security');
    }
}
