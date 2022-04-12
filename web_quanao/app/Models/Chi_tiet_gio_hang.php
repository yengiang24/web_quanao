<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chi_tiet_gio_hang extends Model
{
    use HasFactory;
    protected $table = 'chi_tiet_gio_hang';
    protected $primaryKey = 'ma_chi_tiet';
    public $timestamps = false;
    protected $fillable = [
    	'gio_hang',
    	'kho_hang',
    	'so_luong'
    ];    
}
