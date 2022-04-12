<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\San_pham;
use App\Models\Danh_muc;

class IndexComponent extends Component
{
    public function render()
    {
    	$san_pham = San_pham::skip(0)->take(5)->get();
    	$danh_muc = Danh_muc::where('danh_muc_cha', 0)->orderby('ten', 'ASC')->get();
    	$noi_bat = San_pham::where('noi_bat', 1)->get();
    	$danh_muc_con = Danh_muc::where('danh_muc_cha', '!=', 0)->orderby('ten', 'ASC')->get();
        return view('livewire.customer.index-component', compact('san_pham', 'danh_muc', 'noi_bat', 'danh_muc_con'));
    }
}
