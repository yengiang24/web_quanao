<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Danh_muc;
use App\Models\San_pham;
use App\Models\Album_anh;
use App\Models\Danh_muc_san_pham;
use App\Models\Kho_hang;
use App\Models\Mau_sac;
use App\Models\Kich_co;

class ProductComponent extends Component
{
    public function huy_noi_bat($id){
        San_pham::where('ma_so_sp', $id)
        ->update(['noi_bat' => '0']);
        return redirect()->back();
    }

    public function san_pham_noi_bat($id){
        San_pham::where('ma_so_sp', $id)
        ->update(['noi_bat' => '1']);
        return redirect()->back();
    }

    public function them_san_pham(){
    	$so_luong = Danh_muc::count();
    	$danh_muc = Danh_muc::skip(0)->take($so_luong)->orderby('ten', 'ASC')->get();
        return view('livewire.admin.product.add-product-component', compact('danh_muc'));
    }
    public function themsanpham(Request $request){
    	$san_pham = new San_pham();
    	$san_pham->ten_sp = $request->ten;
    	$san_pham->tinh_trang = 0;
    	$san_pham->gia_ban = $request->gia_ban;
    	$san_pham->gia_nhap = $request->gia_nhap;
    	$san_pham->mo_ta = $request->mo_ta;
    	$san_pham->anh_sp = $request->anh_san_pham;
		$san_pham->save();    	

    	$danh_muc = Danh_muc::get();
    	foreach ($danh_muc as $danh_muc) {
    		$dmuc[] = 'dmuc'.$danh_muc->ma_so;
    	}
    	foreach($dmuc as $key => $value){
    		if(isset($request->$value)){
    			$danhmuc = new Danh_muc_san_pham();
    			$danhmuc->san_pham = $san_pham->ma_so_sp;
    			$danhmuc->danh_muc = $request->$value;
    			$danhmuc->save();
    		}
    	}
    	foreach($request->anh_sp as $key => $value){
    		$album = new Album_anh();
    		$album->anh = $value;
    		$album->san_pham = $san_pham->ma_so_sp;
    		$album->save();
    	}
    	return redirect('/san-pham');
    }

    public function xoa_san_pham($id){
    	San_pham::where('ma_so_sp', $id)
    	->delete();
    	return redirect('/san-pham');
    }

    public function chi_tiet_san_pham($id){
    	$san_pham = San_pham::where('ma_so_sp', $id)->first();
    	$danh_muc = Danh_muc_san_pham::where('san_pham', $id)
    	->join('Danh_muc', 'Danh_muc_san_pham.danh_muc', 'Danh_muc.ma_so')
    	->get();
    	$album_anh = Album_anh::where('san_pham', $id)->get();
    	$kho_hang = Kho_hang::where('san_pham', $id)
        ->join('Kich_co', 'Kich_co.ma_kich_co', 'Kho_hang.kich_co')
        ->get();
    	$mau_sac = Mau_sac::get();
    	$kich_co = Kich_co::get();
    	return view('livewire.admin.product.product-details-component', compact('san_pham', 'danh_muc', 'album_anh', 'kho_hang', 'mau_sac', 'kich_co'));
    }

    public function thembienthe(Request $request){
    	$bien_the = new Kho_hang();
    	$bien_the->mau_sac = $request->mau_sac;
    	$bien_the->kich_co = $request->kich_co;
		$bien_the->so_luong = $request->so_luong;
		$bien_the->san_pham = $request->san_pham;
		$bien_the->save();
		return redirect()->back();
    }

    public function doianhbia(Request $request){
    	San_pham::where('ma_so_sp', $request->san_pham)
    	->update(['anh_sp' => $request->anh]);
    	return redirect()->back();
    }

    public function themanh(Request $request){
    	$anh = new Album_anh();
    	$anh->anh = $request->anh;
    	$anh->san_pham = $request->san_pham;
    	$anh->save();
    	return redirect()->back();
    }    


    public function render()
    {
    	$san_pham = San_pham::get();
        return view('livewire.admin.product.product-component', compact('san_pham'));
    }
}
