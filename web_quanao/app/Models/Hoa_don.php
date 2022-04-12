<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoa_don extends Model
{
    use HasFactory;
    protected $primaryKey = 'ma_don_hang';
    protected $table = 'don_hang';
    protected $fillable = [
    	'user',
        'dia_chi',
    	'tong_tien_hang',
    	'phi_van_chuyen',
    	'giam_gia',
    	'tong_tien',
    	'tong_san_pham',
    	'created_at',
    	'updated_at',
    	'tinh_trang'
    ];        
}
