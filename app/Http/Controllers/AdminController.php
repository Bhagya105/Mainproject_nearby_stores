<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

class AdminController extends Controller
{
    public function dashboard(){
        return view('Admin.adminhome');
    }
    public function logout(){
       Session::flush();
       return redirect('/');
    }

  
}
