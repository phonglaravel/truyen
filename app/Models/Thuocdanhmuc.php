<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thuocdanhmuc extends Model
{
    use HasFactory;
    protected $fillable = [
        'danhmuc_id',
        'truyen_id',
        
        
    ];
    protected $pmimaryKey = 'id';
    protected $table = 'thuocdanh';
}
