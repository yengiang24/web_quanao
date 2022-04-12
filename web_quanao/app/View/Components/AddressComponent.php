<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tinh_thanh_pho;
use App\Models\Dia_chi;

class AddressComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function newadress(Request $request){
        $dia_chi = new Dia_chi();
        $dia_chi->ten_dia_chi = $request->address_name;
        $dia_chi->dia_chi_cu_the = $request->address;
        $dia_chi->phuong_xa = $request->phuong_xa;
        $dia_chi->user = Auth::user()->id;
        $dia_chi->save();
        return redirect()->back();
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $tinh_thanh_pho = Tinh_thanh_pho::get();
        return view('components.address-component', compact('tinh_thanh_pho'));
    }
}
