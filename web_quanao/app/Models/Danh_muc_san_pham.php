<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danh_muc_san_pham extends Model
{
    use HasFactory;
    protected $table = 'danh_muc_san_pham';
    protected $primaryKey = 'ma_so_dmsp';
    protected $fillable = [
    	'danh_muc',
    	'san_pham'
    ];
    public $timestamps = false;    
}
