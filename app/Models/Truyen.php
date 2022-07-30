<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'id',
        'tentruyen',
        'slug_truyen',
        'tomtat',
        'danhmuc_id',
        'image',
        'kichhoat',
        'tacgia',
        'luotxem',
        'trangthai',
        'created_at',
        'updated_at',
        'tukhoa',
        'truyen_noibat',
        
    ];
   
    protected $table = 'truyen';

    public function danhmuctruyen()
    {
        return $this->belongsTo('App\Models\Danhmuc', 'danhmuc_id', 'id');
    }
    public function chapter() {
        return $this->hasMany('App\Models\Chapter');
    }
    public function thuocnhieudanhmuc(){
        return $this->belongsToMany(Danhmuc::class, 'thuocdanh', 'truyen_id', 'danhmuc_id');
    }
    
    
}
