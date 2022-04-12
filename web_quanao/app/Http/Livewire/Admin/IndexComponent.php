<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Hoa_don;
use Carbon\Carbon;
class IndexComponent extends Component
{
    public function render()
    {
    	$created = Hoa_don::select('created_at')->get();
    	foreach ($created as $created) {
    		$date[] = $created->created_at->toDateString();
    	}
    	$hom_nay = Carbon::now()->toDateString();
    	$count = array_count_values($date);
    	if(array_key_exists($hom_nay, $count)){
    		$hoa_don = $count[$hom_nay];
    	}
    	else{
    		$hoa_don = 0;
    	}
        return view('livewire.admin.index-component', compact('hoa_don'));
    }
}
