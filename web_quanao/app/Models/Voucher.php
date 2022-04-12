<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $table = 'vouchers';

    protected $fillable = [
    	'ma_voucher',
    	'loai_voucher',
    	'dieu_kien',
    	'loai_giam_gia',
    	'giam_gia',
    	'thoi_gian_bat_dau',
    	'thoi_gian_ket_thuc'
    ];
    public $timestamps = false;    
}
