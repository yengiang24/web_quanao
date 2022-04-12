<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chi_tiet_hoa_don extends Model
{
    use HasFactory;
    protected $primaryKey = 'ma_chi_tiet';
    protected $table = 'chi_tiet_don_hang';    
    protected $fillable = [
    	'kho_hang',
    	'don_hang',
    	'so_luong',
    	'gia_ban',
    	'gia_nhap',
    	'tong'
    ];
    public $timestamps = false;    
}
