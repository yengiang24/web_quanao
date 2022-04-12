<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quan_huyen extends Model
{
    use HasFactory;
    protected $table = 'quan_huyen';
    protected $fillable = [
    	'ten_quan_huyen',
    	'tinh_thanh_pho'
    ];
    public $timestamps = false;    
}
