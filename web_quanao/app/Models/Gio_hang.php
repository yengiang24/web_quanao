<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gio_hang extends Model
{
    use HasFactory;
    protected $table = 'gio_hang';
    protected $primaryKey = 'ma_gio_hang';
    public $timestamps = false;
    protected $fillable = [
    	'user',
    	'tong_tien_hang',
    	'tong_san_pham'
    ];    
}
