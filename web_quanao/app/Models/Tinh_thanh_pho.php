<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tinh_thanh_pho extends Model
{
    use HasFactory;
    protected $table = 'tinh_thanh_pho';
    protected $fillable = [
    	'tinh_thanh_pho'
    ];
    public $timestamps = false;    
}
