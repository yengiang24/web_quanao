<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vai_tro extends Model
{
    use HasFactory;
    protected $primaryKey = 'ma_vai_tro';
    protected $table = 'vai_tro';
    protected $fillable = [
    	'vai_tro'
    ];
    public $timestamps = false;    
}
