<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class San_pham extends Model
{
    use HasFactory;
    protected $primaryKey = 'ma_so_sp';
    protected $table = 'san_pham';
    protected $fillable = [
    	'ten_sp',
    	'tinh_trang',
    	'gia_ban',
    	'gia_nhap',
    	'mo_ta',
    	'anh_sp'
    ];        
}
