<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danh_gia extends Model
{
    use HasFactory;
    protected $primaryKey = 'ma_danh_gia';
    protected $table = 'danh_gia';
    protected $fillable = [
    	'san_pham',
    	'user',
    	'danh_gia',
    	'diem_xep_hang'
    ];     
}
