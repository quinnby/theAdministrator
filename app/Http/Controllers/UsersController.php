<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        return view('user.manage');
    }
    
    public function create()
    {
        return view('user.create');
    }
    
    public function view()
    {
        return view('user.profile');
    }
    
    public function edit()
    {
        return view('user.edit_profile');
    }
    
    public function dashboard()
    {
        return view('user.dashboard');
    }
    
    public function add(Request $request)
    {
        $this->validate($request, [
            
        ]);
        
        $user = new User($request->all());
        return $user;
    }
}
?>
