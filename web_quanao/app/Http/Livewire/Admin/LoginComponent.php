<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;

class LoginComponent extends Component
{
	
    public function render()
    {
    	alert()->success('Title','Lorem Lorem Lorem');
    	$noti = 'Đây là thông báo';
        return view('livewire.admin.user.login-component', compact('noti'));
    }
}
