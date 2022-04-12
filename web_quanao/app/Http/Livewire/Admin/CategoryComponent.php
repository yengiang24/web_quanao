<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Danh_muc;
use Illuminate\Http\Request;
use Alert;

class CategoryComponent extends Component
{
    public function them_danh_muc(Request $request){
    	$danh_muc = new Danh_muc();
    	$danh_muc->ten = $request->ten;
    	$danh_muc->mo_ta = $request->mo_ta;
    	$danh_muc->danh_muc_cha = $request->danh_muc_cha;
    	$danh_muc->save();
        return redirect('/danh-muc');
    }

    public function sua_danh_muc($id){
    	$danh_muc = Danh_muc::where('ma_so', $id)->first();
    	$dmuc_cha1 = Danh_muc::where('ma_so', $danh_muc->danh_muc_cha)->first();
    	$dmuc_cha2 = Danh_muc::where('ma_so', '!=', $id)
    	->where('ma_so', '!=', $dmuc_cha1->ma_so)
    	->get();
        return view('livewire.admin.category.edit-category-component', compact('danh_muc', 'dmuc_cha1', 'dmuc_cha2'));
    }

    public function suadanhmuc(Request $request){
    	$danh_muc = Danh_muc::where('ma_so', $request->ma_so)
    	->update([
    		'ten' => $request->ten,
    		'danh_muc_cha' => $request->danh_muc_cha,
    		'mo_ta' => $request->mo_ta
    	]);
    	Alert::success('Sửa thông tin danh mục thành công');
    	return redirect()->back();
    }

    public function xoa_danh_muc($id){
    	Danh_muc::where('ma_so', $id)->delete();
    	return redirect()->back();
    }



    public function render()
    {
    	$danh_muc = Danh_muc::orderby('ten', 'ASC')->get();
    	Alert::success('Sửa thông tin danh mục thành công');
        return view('livewire.admin.category.category-component', compact('danh_muc'));
    }
}
