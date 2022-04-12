<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Notifications\ThongBaoNguoiDungMoi;
use App\Models\Vai_tro;
use App\Models\User;
use Hash;

class UserComponent extends Component
{
    public function themthanhvien(Request $request){
    	$user = new User();
		$user->last_name = $request->ho;
		$user->first_name = $request->ten;
		$user->email = $request->email;
		$user->password = Hash::make($request->matkhau);
		$user->phone_number = $request->sdt;
		$user->role = $request->vai_tro;
		$user->save();
		$user->notify(new ThongBaoNguoiDungMoi($request->matkhau));
        return redirect('/thanh-vien');
    }

    public function them_thanh_vien(){
    	$vai_tro = Vai_tro::get();
    	$mat_khau = Str::random(10);
        return view('livewire.admin.user.add-user-component', compact('vai_tro', 'mat_khau'));
    }

    public function render()
    {
    	$users = Vai_tro::join('Users', 'Vai_tro.ma_vai_tro', 'Users.role')->get();
        return view('livewire.admin.user.user-component', compact('users'));
    }
}
