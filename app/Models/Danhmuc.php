<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhmuc extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'tendanhmuc',
        'mota',
        'kichhoat',
        'slug'
    ];
    protected $primaryKey = 'id';
    protected $table = 'danhmuc';
    
    public function layten($id)
    {
        $tendanhmuc = Danhmuc::find($id);
        return $tendanhmuc->tendanhmuc;
    }
    public function truyen()
    {
        return $this->hasMany('App\Models\Truyen');
    }

   
}
