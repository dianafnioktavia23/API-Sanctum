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

    //relasi one to many , 
    public function kategori()
    {
        // 1 kategori terdiri dari banyak menu
        return $this->belongsTo(Kategori::class, 'id');
    }
    public function pemesanan()
{
    // 1 menu terdiri dari banyak pemesanan
    return $this->hasMany(Pemesanan::class, 'menu_id', 'id');
}
}
