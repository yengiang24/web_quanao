<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Hoa_don;
use App\Models\Kho_hang;
use App\Models\San_pham;
use App\Models\Dia_chi;
use App\Models\Chi_tiet_hoa_don;
use Alert;

class AccountComponent extends Component
{
	
	public function order_detail($id){
		$hoa_don = Hoa_don::where('ma_don_hang', $id)->first();
		$user = User::where('id', Auth::user()->id)->first();
		$dia_chi = Dia_chi::where('ma_dia_chi', $hoa_don->dia_chi)
		->join('Phuong_xa', 'Phuong_xa.ma_phuong_xa', 'Dia_chi.phuong_xa')
		->join('Quan_huyen', 'Quan_huyen.ma_quan_huyen', 'Phuong_xa.quan_huyen')
		->join('Tinh_thanh_pho', 'Tinh_thanh_pho.ma_tinh_tp', 'Phuong_xa.tinh_thanh_pho')
		->select('ma_dia_chi', 'ten_dia_chi', 'dia_chi_cu_the', 'ten_phuong_xa', 'ten_quan_huyen', 'Tinh_thanh_pho.tinh_thanh_pho')
		->first();		
		$san_pham = Chi_tiet_hoa_don::where('don_hang', $id)
		->join('Kho_hang', 'Kho_hang.ma_kho_hang', 'Chi_tiet_don_hang.kho_hang')
		->join('San_pham', 'San_pham.ma_so_sp', 'Kho_hang.san_pham')
		->get();
		return view('livewire.customer.user.order-detail-component', compact('hoa_don', 'dia_chi', 'user', 'san_pham'));
	}

	public function updateaccount(Request $request){
		$user = User::where('id', Auth::user()->id)->first();
		$user->first_name = $request->first_name;
		$user->last_name = $request->last_name;
		$user->phone_number = $request->phone_number;
		$user->save();
		Alert::success('Cập nhật thông tin thành công');
		return redirect()->back();
	}


    public function render()
    {
    	$user = User::where('id', Auth::user()->id)->first();
    	$hoa_don = Hoa_don::where('user', Auth::user()->id)
    	->join('Tinh_trang', 'Tinh_trang.ma_tinh_trang', 'don_hang.tinh_trang')
    	->orderBy('ma_don_hang', 'desc')
    	->get();
        return view('livewire.customer.user.account-component', compact('user', 'hoa_don'));
    }
}
