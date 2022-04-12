<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danh_muc extends Model
{
    use HasFactory;
    protected $primaryKey = 'ma_so';
    protected $table = 'danh_muc';
    protected $fillable = [
    	'ten',
    	'mo_ta',
    	'danh_muc_cha'
    ];
    public $timestamps = false;    
}
