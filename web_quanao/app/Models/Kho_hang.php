<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kho_hang extends Model
{
    use HasFactory;
    protected $primaryKey = 'ma_kho_hang';
    protected $table = 'kho_hang';
    protected $fillable = [
    	'mau_sac',
    	'kich_co',
    	'so_luong',
    	'san_pham'
    ];
    public $timestamps = false;    
}
