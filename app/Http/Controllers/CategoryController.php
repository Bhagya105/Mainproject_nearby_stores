<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function addCategory(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
           // echo "<pre>";print_r($data);die;

           if(empty($data['status'])){
               $status = 0;
           }else{
            $status = 1;
           }

           


           $category = new Category;
          // $category->id = $data['id'];
    		$category->name = $data['category_name'];
           $category->parent_id = $data['parent_id'];
            $category->description = $data['description'];
            $category->status = $status;
            $category->save();
            return redirect('/Admin/view-categories')->with('flash_message_success','Category added successfully');

        }
        $levels = Category::where(['parent_id'=>0])->get();
        return view('Admin.categories.add_category')->with(compact('levels'));
    }
           public function editCategory(Request $request,$id = null){
               $categoryDetails = Category::where(['id'])->first();
               return view('Admin.categories.edit_category')->with(compact('categoryDetails'));
           }

    public function viewCategories(){
        $categories = Category::get();
        return view('Admin.categories.view_categories')->with(compact('categories'));
    }
}
