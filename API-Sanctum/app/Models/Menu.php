<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table ="menu";
    protected $primarykey ="id";

    public $timestamps=true;
    public $incrementing = true;

    protected $fillable =[
        'nama_menu',
        'deskripsi',
        'kategori',
        'harga',
        'gambar'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id');
    }
}
