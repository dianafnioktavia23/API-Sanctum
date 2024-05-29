<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu'; // Nama tabel di database
    protected $primaryKey = 'menu_id'; // Primary key

    protected $fillable = [
        'nama_menu',
        'deskripsi',
        'id_kategori',
        'harga',
        'gambar',
        'stok'
    ];

    //relasi one to many , 
    public function kategori()
    {
        // 1 kategori terdiri dari banyak menu
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
    public function pemesanan()
    {
        // 1 menu terdiri dari banyak pemesanan
        return $this->hasMany(Pemesanan::class, 'menu_id', 'pemesanan_id');
    }
    public function detailpemesanan()
    {
        return $this->hasMany(detailpemesanan::class, 'menu_id', 'menu_id');
    }
}
