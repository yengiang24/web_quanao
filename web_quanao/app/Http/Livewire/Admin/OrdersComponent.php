<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Hoa_don;
use App\Models\Chi_tiet_hoa_don;
use App\Models\Tinh_trang;
use App\Models\User;
use App\Models\Dia_chi;
use App\Models\San_pham;
use App\Models\Kich_co;
use Alert;

class OrdersComponent extends Component
{
	public function duyet_don_hang($id){
		$hoa_don = Hoa_don::where('ma_don_hang', $id)->first();
		$hoa_don->tinh_trang = $hoa_don->tinh_trang + 1;
		$hoa_don->save();
		Alert::success('Cập nhật trạng thái đơn hàng thành công');
		return redirect()->back();
	}

	public function chi_tiet($id){
		$hoa_don = Hoa_don::where('ma_don_hang', $id)
		->join('Tinh_trang', 'Tinh_trang.ma_tinh_trang', 'don_hang.tinh_trang')
		->first();
		$khach_hang = User::where('id', $hoa_don->user)->first();
		$dia_chi = Dia_chi::where('ma_dia_chi', $hoa_don->dia_chi)
		->join('Phuong_xa', 'Phuong_xa.ma_phuong_xa', 'Dia_chi.phuong_xa')
		->join('Quan_huyen', 'Quan_huyen.ma_quan_huyen', 'Phuong_xa.quan_huyen')
		->join('Tinh_thanh_pho', 'Tinh_thanh_pho.ma_tinh_tp', 'Phuong_xa.tinh_thanh_pho')
		->select('ma_dia_chi', 'ten_dia_chi', 'dia_chi_cu_the', 'ten_phuong_xa', 'ten_quan_huyen', 'Tinh_thanh_pho.tinh_thanh_pho')
		->first();
    	$san_pham = Chi_tiet_hoa_don::where('don_hang', $hoa_don->ma_don_hang)
    	->join('Kho_hang', 'Kho_hang.ma_kho_hang', 'chi_tiet_don_hang.kho_hang')
    	->join('San_pham', 'San_pham.ma_so_sp', 'Kho_hang.san_pham')
    	->join('Kich_co', 'Kich_co.ma_kich_co', 'Kho_hang.kich_co')
    	->select('ma_so_sp', 'ten_sp', 'mau_sac', 'ten_kich_co', 'Chi_tiet_don_hang.so_luong', 'Chi_tiet_don_hang.gia_ban', 'Chi_tiet_don_hang.gia_nhap', 'Chi_tiet_don_hang.tong')
    	->get();

		return view('livewire.admin.orders.order-detail-component', compact('hoa_don', 'khach_hang', 'dia_chi', 'san_pham'));
	}

    public function render(){
    	$hoa_don = Hoa_don::join('Tinh_trang', 'Tinh_trang.ma_tinh_trang', 'don_hang.tinh_trang')
    	->orderBy('ma_don_hang', 'desc')
    	->get();
        return view('livewire.admin.orders.orders-component', compact('hoa_don'));
    }
}
