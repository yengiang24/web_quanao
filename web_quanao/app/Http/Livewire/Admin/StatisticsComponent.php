<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Chi_tiet_hoa_don;
use App\Models\Kho_hang;
use App\Models\San_pham;
use App\Models\Hoa_don;
use App\Charts\UserChart;
use Alert;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticsComponent extends Component
{

    public function loc_doanh_thu(Request $request){
        $hom_nay = Carbon::now()->format('Y-m-d');
        $thang_nay = Carbon::now()->format('m');
        $nam_nay = Carbon::now()->format('Y');

        if($request->value == 'thang_nay'){
            $ngay_bat_dau = Carbon::create($nam_nay, $thang_nay, '1');
            $ngay_ket_thuc = Carbon::create($nam_nay, $thang_nay+1, '1');
            $doanh_thu = Hoa_don::groupBy('ngay_tao')
            ->where('created_at', '>=', $ngay_bat_dau)
            ->where('created_at', '<', $ngay_ket_thuc)
            ->select(DB::raw('DATE(created_at) as ngay_tao'), DB::raw("SUM(tong_tien) as value"))
            ->get();
        }
        else if ($request->value == 'thang_truoc') {
            $ngay_bat_dau = Carbon::create($nam_nay, $thang_nay-1, '2');
            $ngay_ket_thuc = Carbon::create($nam_nay, $thang_nay, '1');
            $doanh_thu = Hoa_don::groupBy('ngay_tao')
            ->where('created_at', '>=', $ngay_bat_dau)
            ->where('created_at', '<', $ngay_ket_thuc)
            ->select(DB::raw('DATE(created_at) as ngay_tao'), DB::raw("SUM(tong_tien) as value"))
            ->get();            
        }
        else if ($request->value == 'nam_nay') {
            $ngay_bat_dau = Carbon::create($nam_nay, $thang_nay-1, '2');
            $ngay_ket_thuc = Carbon::create($nam_nay, $thang_nay, '1');
            $doanh_thu = Hoa_don::groupBy('ngay_tao')
            ->select(DB::raw('MONTH(created_at) as ngay_tao'), DB::raw("SUM(tong_tien) as value"))
            ->get();            
        }        
        return response()->json($doanh_thu);
    }

    public function thong_ke_doanh_thu(){
        $hom_nay = Carbon::now()->format('Y-m-d');
        $thang_nay = Carbon::now()->format('m');
        $nam_nay = Carbon::now()->format('Y');
        $ngay_bat_dau = Carbon::create($nam_nay, $thang_nay, '1');
        $ngay_ket_thuc = Carbon::create($nam_nay, $thang_nay+1, '1');

        $doanh_thu = Hoa_don::groupBy('ngay_tao')
        ->where('created_at', '>=', $ngay_bat_dau)
        ->where('created_at', '<', $ngay_ket_thuc)
        ->select(DB::raw("SUM(tong_tien) as so_luong"),
                 DB::raw('DATE(created_at) as ngay_tao'))    
        ->get();

        return view('livewire.admin.statistics.revenue-component', compact('doanh_thu', 'hom_nay'));
    }    

    public function loc_don_hang(Request $request){
        $hom_nay = Carbon::now()->format('Y-m-d');
        $thang_nay = Carbon::now()->format('m');
        $nam_nay = Carbon::now()->format('Y');

        if($request->value == 'thang_nay'){
            $ngay_bat_dau = Carbon::create($nam_nay, $thang_nay, '1');
            $ngay_ket_thuc = Carbon::create($nam_nay, $thang_nay+1, '1');
            $don_hang = Hoa_don::groupBy('ngay_tao')
            ->where('created_at', '>=', $ngay_bat_dau)
            ->where('created_at', '<', $ngay_ket_thuc)
            ->select(DB::raw('DATE(created_at) as ngay_tao'), DB::raw("COUNT(*) as value"))
            ->get();
        }
        else if ($request->value == 'thang_truoc') {
            $ngay_bat_dau = Carbon::create($nam_nay, $thang_nay-1, '2');
            $ngay_ket_thuc = Carbon::create($nam_nay, $thang_nay, '1');
            $don_hang = Hoa_don::groupBy('ngay_tao')
            ->where('created_at', '>=', $ngay_bat_dau)
            ->where('created_at', '<', $ngay_ket_thuc)
            ->select(DB::raw('DATE(created_at) as ngay_tao'), DB::raw("COUNT(*) as value"))
            ->get();            
        }
        else if ($request->value == 'nam_nay') {
            $ngay_bat_dau = Carbon::create($nam_nay, $thang_nay-1, '2');
            $ngay_ket_thuc = Carbon::create($nam_nay, $thang_nay, '1');
            $don_hang = Hoa_don::groupBy('ngay_tao')
            ->select(DB::raw('MONTH(created_at) as ngay_tao'), DB::raw("COUNT(*) as value"))
            ->get();            
        }        
        return response()->json($don_hang);
    }


    public function thong_ke_don_hang(){
        $hom_nay = Carbon::now()->format('Y-m-d');
        $thang_nay = Carbon::now()->format('m');
        $nam_nay = Carbon::now()->format('Y');
        $ngay_bat_dau = Carbon::create($nam_nay, $thang_nay, '1');
        $ngay_ket_thuc = Carbon::create($nam_nay, $thang_nay+1, '1');

        $don_hang = Hoa_don::groupBy('ngay_tao')
        ->where('created_at', '>=', $ngay_bat_dau)
        ->where('created_at', '<', $ngay_ket_thuc)
        ->select(DB::raw("COUNT(*) as so_luong"),
                 DB::raw('DATE(created_at) as ngay_tao'))    
        ->get();

        return view('livewire.admin.statistics.orders-component', compact('don_hang', 'hom_nay'));
    }

	public function spbc(){
    	$range = Carbon::now()->subDays(7);
		$stats = DB::table('chi_tiet_don_hang')
	  		->groupBy('kho_hang')
	    	->get([
	    		DB::raw('kho_hang as date'),
	    		DB::raw('SUM(so_luong) as value')
	    ]);   	   	
        return response()->json($stats);
	}

    public function render()
    {
    	$san_pham = Chi_tiet_hoa_don::groupBy('san_pham')
        ->join('Kho_hang', 'Kho_hang.ma_kho_hang', 'Chi_tiet_don_hang.kho_hang')
        ->join('san_pham', 'san_pham.ma_so_sp', 'Kho_hang.san_pham')
    	->select(DB::raw("SUM(chi_tiet_don_hang.so_luong) as so_luong"), DB::raw('san_pham as san_pham'))
    	->get();

        return view('livewire.admin.statistics.statistics-component', compact('san_pham'));
    }
}
