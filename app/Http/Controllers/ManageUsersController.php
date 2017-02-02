<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageUsersController extends Controller
{
    public function index()
    {
        return view('manage_users');
    }
    
        public function create()
    {
        return view('create_user');
    }
}
?>
