<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class HomeController extends Controller
{

    public function index(){
        return view('index');
    }
    public function forgot(){
        return view('forgot');
    }
    public function register(){
        return view('register');
    }
    public function login(Request $request){
        $validator=$request->validate([
            'email'=>'required | email',
            'password'=>'required | min:6'
        ]);
       if(Auth::check($validator)){
        $request->session()->regenerate();
        return redirect()->intended('admin.index');
       }
      
       return back()->withErrors([
        'email'=>'Invalid input credentials!'
       ]);
        
    }

    public function register_data(Request $request){
      $validationData =$request->validate([
                'fname'=>'required'|'min:3',
                'lname'=>'required'|'min:3',
                'email'=>'required | email |unique:users',
                'password'=>'required |confrimed |min:6'
            ]);
         $validationData['password']=Hash::make($validationData['password']);
        $chek= User::create($validationData);
        if($chek){
        return redirect('/register')->with(['message'=>'user succeful created']);
        }
        return redirect()->back();
    }
    
   


}
