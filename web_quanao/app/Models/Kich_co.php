<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kich_co extends Model
{
    use HasFactory;
    protected $primaryKey = 'ma_kich_co';
    protected $table = 'kich_co';
    protected $fillable = [
    	'ma_kich_co',
    	'ten_kich_co',
    ];
    public $timestamps = false;    
}
