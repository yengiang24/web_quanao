<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\San_pham;

class ProductComponent extends Component
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

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $san_pham = San_pham::get();
        return view('components.product-component', compact('san_pham'));
    }
}
