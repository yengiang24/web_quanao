<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loai_giam_gia extends Model
{
    use HasFactory;
    protected $primaryKey = 'ma_loai_giam_gia';
    protected $table = 'loai_giam_gia';    
}
