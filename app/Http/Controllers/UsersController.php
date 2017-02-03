<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        return view('manage_users');
    }
    
    public function create()
    {
        return view('create_user');
    }
    
    public function view()
    {
        return view('user_profile');
    }
}
?>
