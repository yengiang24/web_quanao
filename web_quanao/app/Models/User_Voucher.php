<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Voucher extends Model
{
    use HasFactory;
    protected $primaryKey = 'ma_uv';
    protected $table = 'user_voucher';
    protected $fillable = [
    	'user',
    	'voucher',
    	'so_luong'
    ];
    public $timestamps = false;     
}
