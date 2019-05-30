<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\userreg;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/signup';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'name' => ['required', 'string', 'max:255'],
             'email' => ['required', 'string', 'email', 'max:255', 'unique:tbl_login'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user=  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'type' => $data['type'],
            'status'=>1,
            'password' => Hash::make($data['password']),
              // Send Register Email
            //   $email = $data['email'],
            //   $messageData = ['email'=>$data['email'],'name'=>$data['name']],
            //   Mail::send('emails.register',$messageData,function($message) use($email){
            //       $message->to($email)->subject('Registration with Nearby Stores');
            //   })
        ]);
        userreg::create([
            'id' => $user->id,
            'name' => $data['name'],
            'status' =>1,
            
        ]);
       return $user;
      


       return redirect('/');
    }
}
