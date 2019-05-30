<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
     public function addBrand(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
           // echo "<pre>";print_r($data);die;
           $brand = new Brand;
          // $category->id = $data['id'];
    		$brand->name = $data['name'];
          // $category->parent_id = $data['parent_id'];
    		//$category->description = $data['description'];
            $brand->save();
            // return redirect()->back()->with( 'alert','Please select under Category' );
           // return redirect('/Admin/view-brand')->with('alert-success','Category added successfully');
        //    Session::flash('alert-success', 'success');
        }
      
         return view('Admin.brands.add_brand');
     }
      
     public function viewBrand(){
        $brands = Brand::get();
        return view('Admin.brands.view_brand')->with(compact('brands'));
    }
     }

