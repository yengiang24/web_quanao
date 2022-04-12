<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loai_voucher extends Model
{
    use HasFactory;
    protected $primaryKey = 'ma_loai_voucher';
    protected $table = 'loai_voucher';
}
