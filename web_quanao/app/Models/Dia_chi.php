<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dia_chi extends Model
{
    use HasFactory;
    protected $table = 'dia_chi';
    protected $fillable = [
    	'ten_dia_chi',
    	'user',
    	'phuong_xa',
    	'dia_chi_cu_the'
    ];
    public $timestamps = false;    
}
