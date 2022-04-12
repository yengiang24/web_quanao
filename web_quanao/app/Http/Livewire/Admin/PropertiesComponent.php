<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Mau_sac;
use App\Models\Kich_co;
use Illuminate\Http\Request;

class PropertiesComponent extends Component
{
    public function themkichco(Request $request){
    	$kich_co = new Kich_co();
    	$kich_co->kich_co = $request->kich_co;
    	$kich_co->save();
        return redirect()->back();
    }

    public function themmausac(Request $request){
    	$mau_sac = new Mau_sac();
    	$mau_sac->ten_mau = $request->mau_sac;
    	$mau_sac->ma_mau = $request->ma_mau;
    	$mau_sac->save();
        return redirect()->back();
    }


    public function render()
    {
    	$mau_sac = Mau_sac::get();
    	$kich_co = Kich_co::get();
        return view('livewire.admin.properties-component', compact('mau_sac', 'kich_co'));
    }
}
