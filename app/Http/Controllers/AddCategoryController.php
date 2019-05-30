<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\addcategory;
use View;

class AddCategoryController extends Controller
{
     public function store(Request $request)
    {
        $name = $request->input('category_name');
        $des = $request->input('category_des');
        $status = 1;
        //echo $name;
           $data=array('category_name'=>$name,"category_des"=>$des,"status"=> $status);
           
           DB::table('tbl_addcategory')->insert($data);
        //   if(count($data)>0)
        //      {
          return view('Admin.addcategory');
        //        }
          }
		  
		
		  
		  
		  
		    public function index()
    {
      //$add_category=tbl_addcategory::all();
      // return view('Employee.addcategory',compact('add_category'));
      $viewcategory=addcategory::all();
     //return view('ayurs.Employee.emphome',compact('addcategory'));
    // return view('Admin.viewcategory',with('viewcategory',$viewcategory));
    return View::make('Admin.viewcategory', compact('viewcategory'));
      }
    
}
