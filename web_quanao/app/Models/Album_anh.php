<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album_anh extends Model
{
    use HasFactory;
    protected $primaryKey = 'ma_so_anh';
    protected $table = 'album_anh';
    protected $fillable = [
    	'anh',
    	'san_pham',
    ];
    public $timestamps = false;    
}
