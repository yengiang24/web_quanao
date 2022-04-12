<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mau_sac extends Model
{
    use HasFactory;

    protected $table = 'mau_sac';
    protected $fillable = [
    	'ma_mau',
    	'ten_mau',
    ];
    public $timestamps = false;      
}
