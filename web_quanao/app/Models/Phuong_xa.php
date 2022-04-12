<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phuong_xa extends Model
{
    use HasFactory;
    protected $table = 'phuong_xa';
    protected $fillable = [
    	'ten_phuong_xa',
    	'tinh_thanh_pho',
    	'quan_huyen'
    ];
    public $timestamps = false;    
}
