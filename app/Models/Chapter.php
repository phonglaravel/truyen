<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
   
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'id',
        'truyen_id',
        'tieude',
        'slug_chapter',
        'tomtat',
        'noidung',
        'kichhoat',
        'created_at',
        'updated_at',
        'chuong'
    ];
    protected $primaryKey = 'id';
    protected $table = 'chapter';
    public function truyen() {
        return $this->belongsTo('App\Models\Truyen', 'truyen_id', 'id');
    }
}
