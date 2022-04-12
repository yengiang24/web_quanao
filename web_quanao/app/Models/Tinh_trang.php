<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tinh_trang extends Model
{
    use HasFactory;
    protected $primaryKey = 'ma_tinh_trang';
    protected $table = 'tinh_trang';    
}
