<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Nhan_vien;
use Illuminate\Support\Facades\Auth;
use App\Charts\TestChart;

class PageController extends Controller
{
    public function test(){
        $usersChart = new TestChart;
        $usersChart->labels(['Jan', 'Feb', 'Mar']);
        $usersChart->dataset('Users by trimester', 'line', [10, 25, 13]);
        return view('users', [ 'usersChart' => $usersChart ] );
    }

    public function error(){
        return view('livewire.admin.error-component');
    }


	public function dangnhap(Request $request){
        $this->validate($request,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu không quá 20 kí tự'
            ]
        );
        $credentials = array('email'=>$request->email,'password'=>$request->password);
        $user = Nhan_vien::where('email', $request->email)->first();

        if(Auth::guard('nhan_vien')->attempt($credentials)){
        	return redirect('/index-ad');
        }
        else{
        	return redirect()->back()->with(['flag'=>'danger','message'=>'Sai tên email hoặc mật khẩu']);
        }      
	}

	public function dang_xuat(){
    	Auth::logout();
    	return redirect('/index');
	}

}
