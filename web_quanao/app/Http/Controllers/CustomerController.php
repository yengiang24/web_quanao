<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function login(Request $request){
    	$credentials = array('email'=>$request->email_login,'password'=>$request->password_login);
        if(Auth::attempt($credentials)){
        	return redirect('/index');
        }
        else{
        	return redirect()->back()->with(['flagg'=>'danger','message'=>'Sai tên email hoặc mật khẩu']);
        }            	
    }
}
