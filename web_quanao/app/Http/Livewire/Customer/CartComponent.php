<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Gio_hang;
use App\Models\Chi_tiet_gio_hang;
use App\Models\San_pham;
use App\Models\Kho_hang;
use App\Models\User;

class CartComponent extends Component
{
    public function del_cart_item($id){
        $chi_tiet = Chi_tiet_gio_hang::where('ma_chi_tiet', $id)
        ->join('Kho_hang', 'Kho_hang.ma_kho_hang', 'Chi_tiet_gio_hang.kho_hang')
        ->join('San_pham', 'San_pham.ma_so_sp', 'Kho_hang.san_pham')
        ->select('gia_ban', 'Chi_tiet_gio_hang.so_luong', 'gio_hang')        
        ->first();
        $gio_hang = Gio_hang::where('ma_gio_hang', $chi_tiet->gio_hang)->first();
        $gio_hang->tong_tien_hang = $gio_hang->tong_tien_hang - $chi_tiet->gia_ban * $chi_tiet->so_luong;
        $gio_hang->tong_san_pham -= $chi_tiet->so_luong;
        $gio_hang->save();
        Chi_tiet_gio_hang::where('ma_chi_tiet', $id)->delete();
        return redirect()->back();             
    }


	public function add_to_cart(Request $request){
		$gio_hang = Gio_hang::where('user', Auth::user()->id)->first();
		$kho = Kho_hang::where('ma_kho_hang', $request->ma_kho_hang)->first();
		$gia = San_pham::where('ma_so_sp', $kho->san_pham)->first();

		$chi_tiet = Chi_tiet_gio_hang();
		$chi_tiet->kho_hang = $request->ma_kho_hang;
		$chi_tiet->so_luong = $request->so_luong;
		$gio_hang->tong_tien_hang = $gio_hang->tong_tien_hang + $gia->gia_ban * $request->so_luong;
		$gio_hang->tong_san_pham = $gio_hang->tong_san_pham + $request->so_luong;
		$gio_hang->save();

		$chi_tiet->gio_hang = $gio_hang->ma_gio_hang;
		$chi_tiet->save();				
	}


    public function render()
    {
    	$user = User::where('id', Auth::user()->id)
    	->where('role', '3')->first();
    	
    	$gio_hang = Gio_hang::where('user', $user->id)->first();

    	$chi_tiet = Chi_tiet_gio_hang::where('gio_hang', $gio_hang->ma_gio_hang)
    	->join('Kho_hang', 'Kho_hang.ma_kho_hang', 'Chi_tiet_gio_hang.kho_hang')
    	->join('San_pham', 'San_pham.ma_so_sp', 'Kho_hang.san_pham')
    	->join('Kich_co', 'Kich_co.ma_kich_co', 'Kho_hang.kich_co')
    	->select('anh_sp', 'ma_so_sp', 'ten_sp', 'ma_kho_hang', 'mau_sac', 'ten_kich_co', 'Chi_tiet_gio_hang.so_luong', 'gia_ban', 'ma_chi_tiet')    	
    	->get();
        return view('livewire.customer.cart.cart-component', compact('chi_tiet'));
    }
}
