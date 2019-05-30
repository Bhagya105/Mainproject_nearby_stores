<?php

namespace App\Http\Controllers;
use Session;
use Auth;
use Illuminate\Http\Request;
use App\Country;
use App\userreg;
use App\User;
class UsersController extends Controller
{

    public function account(Request $request){
        $user_id = Auth::user()->id;
        $userDetails = userreg::find($user_id);
        // echo "<pre>"; print_r($userDetails); die;
        $countries = Country::get();

        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
     if(empty($data['name'])){
         return redirect()->back()->with('alert-warning','Please enter your name to update your account details');
     }

     if(empty($data['address'])){
          $data['address'] = '';
     }

     if(empty($data['city'])){
        $data['city'] = '';
   }
   if(empty($data['state'])){
    $data['state'] = '';
}
if(empty($data['pincode'])){
    $data['pincode'] = '';
}
if(empty($data['mobile'])){
    $data['mobile'] = '';
}


            $user = userreg::find($user_id);
            $user->name = $data['name'];
            $user->address = $data['address'];
            $user->city = $data['city'];
            $user->state = $data['state'];
            $user->country = $data['country'];
            $user->pincode = $data['pincode'];
            $user->mobile = $data['mobile'];
            $user->save();
            return redirect()->back()->with('alert-success','Your account details has been successfully updated');

        }
        return view('users.account')->with(compact('countries','userDetails'));

    }
    public function logout(){
        Auth::logout();
        Session::forget('session_id');
        return redirect('/');
    }
}