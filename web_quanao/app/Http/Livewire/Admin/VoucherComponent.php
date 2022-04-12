<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Loai_voucher;
use App\Models\Voucher;
use App\Models\Loai_giam_gia;
use App\Models\Tinh_trang;
use App\Models\User;
use App\Models\User_voucher;
use Carbon\Carbon;
use Alert;
use Illuminate\Http\Request;


class VoucherComponent extends Component
{
	public function danhsachuser(Request $request){
		$danhsach = User_voucher::where("voucher", $request->voucher)->get();

		return response()->json($danhsach);
	}
	
	public function guivoucher(Request $request){
		foreach ($request->user as $user) {
			$u_v = new User_voucher();
			$u_v->user = $user;
			$u_v->voucher = $request->voucher;
			$u_v->save();
		}
		Alert::success('Gửi voucher thành công');
		return redirect()->back();
	}

	public function gui_voucher($id){
    	$voucher = Voucher::where('ma_voucher', $id)
    	->join('Loai_voucher', 'Vouchers.loai_voucher', 'Loai_voucher.ma_loai_voucher')
    	->join('Tinh_trang', 'Tinh_trang.ma_tinh_trang', 'vouchers.tinh_trang')
    	->first();

    	$user = User::get();
    	foreach ($user as $user) {
    		$danh_sach[$user->id] = $user->email;
    	}

    	$u_v = User_voucher::where('voucher', $id)
    	->join('Users', 'Users.id', 'User_voucher.user')
    	->get();
    	$da_gui = [];
    	foreach ($u_v as $vch) {
    		$da_gui[$vch->user] = $vch->email;
    	}

    	$chua_gui = array_diff($danh_sach, $da_gui);

		return view('livewire.admin.voucher.send-voucher-component', compact('voucher', 'chua_gui', 'da_gui'));
	}


	public function themvoucher(Request $request){
		$voucher = new Voucher();
		if($request->loai_voucher == '1'){
			$voucher->ma_voucher = 'GGVC'.mt_rand(1, 1000);
		}
		else{
			$voucher->ma_voucher = 'GGDH'.mt_rand(1, 1000);
		}

		$voucher->loai_voucher = $request->loai_voucher;
		$voucher->dieu_kien = $request->dieu_kien;
		$voucher->loai_giam_gia = $request->loai_giam_gia;
		$voucher->giam_gia = $request->giam_gia;
		$voucher->thoi_gian_bat_dau = $request->bat_dau;
		$voucher->thoi_gian_ket_thuc = $request->ket_thuc;
		$voucher->save();
		return redirect('/voucher');	
	}

    public function render()
    {
    	$loai_voucher = Loai_voucher::get();
    	$loai_giam_gia = Loai_giam_gia::get();
    	$voucher = Voucher::join('Loai_voucher', 'Vouchers.loai_voucher', 'Loai_voucher.ma_loai_voucher')
    	->join('Tinh_trang', 'Tinh_trang.ma_tinh_trang', 'vouchers.tinh_trang')
    	->get();

    	$hom_nay = Carbon::now();
    	foreach ($voucher as $vouchers) {
    		$vch = Voucher::where('ma_voucher', $vouchers->ma_voucher)->first();

    		if($hom_nay > $vch->thoi_gian_bat_dau && $hom_nay < $vch->thoi_gian_ket_thuc){
    			$vch->tinh_trang = '7';
    		}
    		if ($hom_nay < $vch->thoi_gian_bat_dau) {
				$vch->tinh_trang = '6';
    		}
    		if ($hom_nay > $vch->thoi_gian_ket_thuc) {
				$vch->tinh_trang = '8';
    		} 
    		$vch->save();   		
    	}

    	$ggvc = Voucher::join('Loai_voucher', 'Vouchers.loai_voucher', 'Loai_voucher.ma_loai_voucher')
    	->where('Vouchers.loai_voucher', '1')
    	->get();
    	$ggdh = Voucher::join('Loai_voucher', 'Vouchers.loai_voucher', 'Loai_voucher.ma_loai_voucher')
    	->where('Vouchers.loai_voucher', '2')
    	->get();
    	$user = User::get();    	
        return view('livewire.admin.voucher.voucher-component', compact('loai_voucher', 'loai_giam_gia', 'voucher', 'ggvc', 'ggdh', 'user'));
    }
}
