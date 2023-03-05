<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;



class UserController extends Controller
{
    public function create(){

       return view('home.create');
    }

    public function store(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:user_models,email',
            'password'=>'required|min:6',
            're_password' => 'required|same:password|',
            'profile'=>'required|mimes:jpg,jpeg,png,svg|max:500000000'
        ]);

        $data = new UserModel;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = hash::make($request->password);

        $image = $request->profile;
        if($image){
        $imgname = time().'.'.$image->getClientOriginalExtension();
        $request->profile->move('users_img',$imgname);
        $data->profile=$imgname;
        }
        $data->save();
        return redirect()->back()->with('message','New users created');
    }

    public function login(){
        return view('home.login');
    }

    public function user_logged(Request $request){    

        $user = UserModel::where(['email'=>$request->email])->first();
        if(!$user || (!Hash::check($request->password,$user->password))){
            redirect()->back()->withErrors([
            'email'=>'email or password do not match'
        ])->onlyInput('email');

        }else{
           $request->session()->put('user',$user,compact('user'));
           return redirect()->intended('/');
       }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function account(){
        return view('home.account');
    }
}
