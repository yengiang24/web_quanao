<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Hoa_don;
use App\Models\Chi_tiet_hoa_don;
use App\Models\Chi_tiet_gio_hang;
use App\Models\Kho_hang;
use App\Models\San_pham;
use App\Models\Gio_hang;
use Alert;

class CheckoutComponent extends Component
{
	public function checkout(Request $request){
		$hoa_don = new Hoa_don();
		$hoa_don->user = $request->user;
		$hoa_don->dia_chi = $request->dia_chi;
		$hoa_don->tong_tien_hang = $request->tong_tien_hang;
		$hoa_don->phi_van_chuyen = $request->phi_van_chuyen;
		$hoa_don->giam_gia = $request->giam_gia;
		$hoa_don->tong_tien = $request->tong_thanh_toan;		
		$hoa_don->tinh_trang = 1;

		$so_luong = 0;

		foreach ($request->san_pham as $san_pham) {
			$spham[] = Chi_tiet_gio_hang::where('ma_chi_tiet', $san_pham)
			->join('Kho_hang', 'Kho_hang.ma_kho_hang', 'Chi_tiet_gio_hang.kho_hang')
			->join('San_pham', 'Kho_hang.san_pham', 'San_pham.ma_so_sp')
			->select('Kho_hang.ma_kho_hang', 'Chi_tiet_gio_hang.so_luong', 'gia_ban', 'gia_nhap', 'ma_chi_tiet')
			->first();
		}

		foreach ($spham as $sanpham) {
			$so_luong = $so_luong + $sanpham->so_luong;
		}

		$hoa_don->tong_san_pham = $so_luong;
		$hoa_don->save();

		$gio_hang = Gio_hang::where('user', $request->user)->first();

		foreach ($spham as $spham) {
			$chi_tiet = new Chi_tiet_hoa_don();
			$chi_tiet->kho_hang = $spham->ma_kho_hang;
			$chi_tiet->don_hang = $hoa_don->ma_don_hang;
			$chi_tiet->so_luong = $spham->so_luong;
			$chi_tiet->gia_ban = $spham->gia_ban;
			$chi_tiet->gia_nhap = $spham->gia_nhap;
			$chi_tiet->tong = $spham->gia_ban * $spham->so_luong;
			$chi_tiet->save();

			$sluong = Kho_hang::where('ma_kho_hang', $spham->ma_kho_hang)->first();
			$sluong->so_luong = $sluong->so_luong - $spham->so_luong;
			$sluong->save();

			$gio_hang->tong_san_pham = $gio_hang->tong_san_pham - $spham->so_luong;
			$gio_hang->tong_tien_hang = $gio_hang->tong_tien_hang - $spham->so_luong * $spham->gia_ban;

			Chi_tiet_gio_hang::where('ma_chi_tiet', $spham->ma_chi_tiet)->delete();
		}
		$gio_hang->save();

		Alert::success('Đặt hàng thành công');
		return redirect('/index');
	}


    public function render()
    {
        return view('livewire.customer.checkout-component');
    }
}
