<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\San_pham;
use App\Models\Album_anh;
use App\Models\Kho_hang;
use App\Models\Kich_co;
use App\Models\Mau_sac;
use App\Models\Gio_hang;
use App\Models\Chi_tiet_gio_hang;
use App\Models\Hoa_don;
use App\Models\Chi_tiet_hoa_don;
use App\Models\Danh_muc;
use App\Models\Danh_muc_san_pham;

use App\Models\Dia_chi;
use App\Models\Phuong_xa;
use App\Models\Quan_huyen;
use App\Models\Tinh_thanh_pho;

use App\Models\Danh_gia;
use App\Models\User;
use Alert;

class ProductComponent extends Component
{
	public function product_list($id){
		$product = Danh_muc_san_pham::where('danh_muc', $id)
		->join('San_pham', 'San_pham.ma_so_sp', 'Danh_muc_san_pham.san_pham')
		->get();
    	$danh_muc = Danh_muc::where('danh_muc_cha', 0)->orderby('ten', 'ASC')->get();
    	$danh_muc_con = Danh_muc::where('danh_muc_cha', '!=', 0)->orderby('ten', 'ASC')->get();		

		return view('livewire.customer.product.product-list-component', compact('product', 'danh_muc', 'danh_muc_con'));
	}	

	public function review(Request $request){
		$user = User::where('id', Auth::user()->id)->first();
		$danh_gia = new Danh_gia();
		$danh_gia->user = $user->id;
		$danh_gia->san_pham = $request->san_pham;
		$danh_gia->danh_gia = $request->danh_gia;
		$danh_gia->diem_xep_hang = $request->diem_xep_hang;
		$danh_gia->save();
		Alert::success('Đánh giá sản phẩm thành công');
		return redirect()->back();
	}


	public function search(Request $request){
		$san_pham = San_pham::where('ten_sp','like', $request->search.'%')->get();
		return view('livewire.customer.product.search-result-component', compact('san_pham'));		
	}
	public function cancel_order($id){
		$chi_tiet = Chi_tiet_hoa_don::where('don_hang', $id)->get();
		foreach ($chi_tiet as $chi_tiet ) {
			$kho_hang = Kho_hang::where('ma_kho_hang', $chi_tiet->kho_hang)->first();
			$kho_hang->so_luong += $chi_tiet->so_luong;
			$kho_hang->save();
		}
		Hoa_don::where('ma_don_hang', $id)->update(['tinh_trang' => '5']);
		return redirect('/account');
	}

	public function checkout(Request $request){
		$user = User::where('id', Auth::user()->id)->first();
		$dia_chi = Dia_chi::where('user', Auth::user()->id)
		->join('Phuong_xa', 'Phuong_xa.ma_phuong_xa', 'Dia_chi.phuong_xa')
		->join('Quan_huyen', 'Quan_huyen.ma_quan_huyen', 'Phuong_xa.quan_huyen')
		->join('Tinh_thanh_pho', 'Tinh_thanh_pho.ma_tinh_tp', 'Phuong_xa.tinh_thanh_pho')
		->select('ma_dia_chi', 'ten_dia_chi', 'dia_chi_cu_the', 'ten_phuong_xa', 'ten_quan_huyen', 'Tinh_thanh_pho.tinh_thanh_pho')
		->get();
		foreach ($request->gio_hang as $gio_hang) {
	    	$san_pham[] = Chi_tiet_gio_hang::where('ma_chi_tiet', $gio_hang)
	    	->join('Kho_hang', 'Kho_hang.ma_kho_hang', 'Chi_tiet_gio_hang.kho_hang')
	    	->join('San_pham', 'San_pham.ma_so_sp', 'Kho_hang.san_pham')
	    	->join('Kich_co', 'Kich_co.ma_kich_co', 'Kho_hang.kich_co')
	    	->select('anh_sp', 'ma_so_sp', 'ten_sp', 'ma_kho_hang', 'mau_sac', 'ten_kich_co', 'Chi_tiet_gio_hang.so_luong', 'gia_ban', 'ma_chi_tiet')    	
	    	->first();			
		}
		$tien_hang = 0;
		foreach ($san_pham as $spham) {
			$tien_hang = $tien_hang + $spham['gia_ban'] * $spham['so_luong'];
		}
		$tong_tien = $tien_hang + 30000;
		return view('livewire.customer.product.checkout-component', compact('user', 'dia_chi', 'san_pham', 'tien_hang', 'tong_tien'));
	}



	public function test(Request $request){
		if($request['submit'] == 'giohang'){
			$gio_hang = Gio_hang::where('user', Auth::user()->id)->first();		
			$ma_kho_hang = Kho_hang::where('san_pham', $request->san_pham)
			->where('mau_sac', $request->mau_sac)
			->where('kich_co', $request->kich_co)
			->first();
			$kho = Kho_hang::where('ma_kho_hang', $ma_kho_hang->ma_kho_hang)->first();
			$gia = San_pham::where('ma_so_sp', $kho->san_pham)->first();			

			$gio_hang->tong_tien_hang = $gio_hang->tong_tien_hang + $gia->gia_ban * $request->so_luong;
			
			$gio_hang->tong_san_pham = $gio_hang->tong_san_pham + $request->so_luong;
				$gio_hang->save();

			$kiem_tra = Chi_tiet_gio_hang::where('kho_hang', $ma_kho_hang->ma_kho_hang)
				->where('gio_hang', $gio_hang->ma_gio_hang)
				->first();
			if($kiem_tra){
				$kiem_tra->so_luong = $kiem_tra->so_luong + $request->so_luong;
				$kiem_tra->save();
			}
			else{
				$chi_tiet = new Chi_tiet_gio_hang();
				$chi_tiet->kho_hang = $ma_kho_hang->ma_kho_hang;
				$chi_tiet->so_luong = $request->so_luong;
				$chi_tiet->gio_hang = $gio_hang->ma_gio_hang;
				$chi_tiet->save();					
			}				
			
			return redirect()->back();
		}




		return $request['submit'];
	}

	public function kichco(Request $request){
        if ($request->ajax()) {
            $kich_co = Kho_hang::where('san_pham', $request->san_pham)
			->where('mau_sac', $request->mau_sac)
			->join('Kich_co', 'Kich_co.ma_kich_co', 'Kho_hang.kich_co')
            ->get();
            return response()->json($kich_co);
        }		
	}

	public function soluong(Request $request){
        if ($request->ajax()) {
            $so_luong = Kho_hang::where('san_pham', $request->san_pham)
			->where('mau_sac', $request->mau_sac)
			->where('kich_co', $request->kich_co)
            ->first();
            $sluong = $so_luong->so_luong;
            return response()->json($so_luong);
        }		
	}

    public function render($id){
    	$san_pham = San_pham::where('ma_so_sp', $id)->first();
    	$anh = Album_anh::where('san_pham', $id)->get();

    	$mau_sac = Kho_hang::where('san_pham', $id)
    	->join('mau_sac', 'mau_sac.ma_mau', 'kho_hang.mau_sac')
    	->groupBy('mau_sac')
    	->select('ma_mau', 'ten_mau')
    	->get();

    	$mau_sac1 = Kho_hang::where('san_pham', $id)
    	->first();

    	$kich_co1 = Kho_hang::where('mau_sac', $mau_sac1->mau_sac)
    	->where('san_pham', $id)
    	->join('Kich_co', 'Kich_co.ma_kich_co', 'Kho_hang.kich_co')
    	->get();

    	$danh_gia = Danh_gia::where('san_pham', $id)
    	->get();

    	$tong_danh_gia = Danh_gia::where('san_pham', $id)->count();
    	$danh_muc = Danh_muc::where('danh_muc_cha', 0)->orderby('ten', 'ASC')->get();
    	$danh_muc_con = Danh_muc::where('danh_muc_cha', '!=', 0)->orderby('ten', 'ASC')->get();

        return view('livewire.customer.product.product-component', compact('san_pham', 'anh','mau_sac', 'kich_co1', 'mau_sac1', 'danh_gia', 'tong_danh_gia', 'danh_muc', 'danh_muc_con'));
    }
}
