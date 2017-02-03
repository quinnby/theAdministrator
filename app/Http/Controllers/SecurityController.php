<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SecurityController extends Controller
{
        public function index()
    {
        return view('manage_security');
    }
}
