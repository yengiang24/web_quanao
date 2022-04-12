<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tinh_thanh_pho;
use App\Models\Quan_huyen;
use App\Models\Phuong_xa;
use App\Models\Dia_chi;
use App\Models\Gio_hang;
use Hash;

class LoginComponent extends Component
{
	public function signup(Request $request){
		$email = User::where('email', $request->email)->first();

		if($email){
			return redirect()->back()->with(['flag'=>'danger','message'=>'Email này đã được sử dụng. Vui lòng sử dụng email khác']);
		}
		else if($request->password != $request->re_password){
			return redirect()->back()->with(['flag'=>'danger','message'=>'Mật khẩu nhập lại không đúng']);
		}
		else{
			$customer = new User();
			$customer->first_name = $request->first_name;
			$customer->last_name = $request->last_name;
			$customer->email = $request->email;
			$customer->password = Hash::make($request->password);
			$customer->phone_number = $request->telephone;
			$customer->role = '3';
			$customer->save();

			$dia_chi = new Dia_chi();
			$dia_chi->ten_dia_chi = $request->address_name;
			$dia_chi->dia_chi_cu_the = $request->address;
			$dia_chi->phuong_xa = $request->phuong_xa;
			$dia_chi->user = $customer->id;
			$dia_chi->save();

			$gio_hang = new Gio_hang();
			$gio_hang->user = $customer->id;
			$gio_hang->tong_tien_hang = '0';
			$gio_hang->tong_san_pham = '0';
			$gio_hang->save();
			
			return redirect()->back()->with(['flag'=>'success','message'=>'Tài khoản được tạo thành công. Bạn có thể đăng nhập vào tài khoản.']);
		}
	}

	public function quanhuyen(Request $request){
        if ($request->ajax()) {
            $quan_huyen = Quan_huyen::where('tinh_thanh_pho', $request->tinh_tp)->get();
            return response()->json($quan_huyen);
        }		
	}

	public function phuongxa(Request $request){
        if ($request->ajax()) {
            $phuong_xa = phuong_xa::where('quan_huyen', $request->quan_huyen)->get();
            return response()->json($phuong_xa);
        }		
	}



    public function render()
    {
    	$tinh_thanh_pho = Tinh_thanh_pho::get();
        return view('livewire.customer.user.login-component', compact('tinh_thanh_pho'));
    }
}
