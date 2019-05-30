<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\User;
use Session;
use Image;
use App\Category;
use App\Brand;
use App\Product;
use App\ProductsAttribute;

use App\ProductsImage;
use App\Coupon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$email=$request->input('email');
        // $login=DB::select("select email from tbl_login where email='$email';");
        // if(count($login)>0)
        // {
        //     return redirect('/')->with ('alert','User already exist');
        // }
        //return Auth::logout();
        if(Auth::user()->type =='1'){
            return redirect('/cart');
         } elseif(Auth::user()->type =='2'){
            return view('Admin.adminhome');

         }
         
        //return view('template.about');
      //  return Auth::user();
    }
  
}
