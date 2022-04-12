<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Models\Danh_muc;
use App\Models\Gio_hang;
use App\Models\Kho_hang;
use App\Models\San_pham;
use App\Models\Chi_tiet_gio_hang;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['livewire.customer.layout.master'],function($view){
            $danhmuc = Danh_muc::where('ma_so', '!=',0)->get();
            $view->with('danhmuc', $danhmuc);
        });
        view()->share('user', auth()->user());  

        view()->composer('*',function($view){
            if(Auth::check()){
                $user = User::where('id', Auth::user()->id)
                ->where('role', '3')
                ->first();
                $view->with('user', $user);
                if($user){
                    $gio_hang = Gio_hang::where('user', $user->id)->first();
                    $chi_tiet_gio_hang = Chi_tiet_gio_hang::where('gio_hang', $gio_hang->ma_gio_hang)
                    ->join('Kho_hang', 'Kho_hang.ma_kho_hang', 'Chi_tiet_gio_hang.kho_hang')
                    ->join('San_pham', 'San_pham.ma_so_sp', 'Kho_hang.san_pham')
                    ->select('anh_sp', 'Chi_tiet_gio_hang.so_luong', 'ten_sp', 'gia_ban', 'ma_chi_tiet')
                    ->get();
                    $view->with('gio_hang', $gio_hang);
                    $view->with('chi_tiet_gio_hang', $chi_tiet_gio_hang);
                }
            }
        });        
    }
}
