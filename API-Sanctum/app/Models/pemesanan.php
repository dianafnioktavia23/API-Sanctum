<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    use HasFactory;
    protected $table ="pemesanan";
    protected $primarykey ="id";
    protected $keyType = "int";
    public $timestamps=true;
    public $incrementing = true;

    protected $fillable =[
        'nama_pengunjung',
        'meja_id',
        'menu_id',
        'jumlah',
        'subtotal',
        'tanggal_pemesanan',
        'status',
        'keterangan'
    ];

    //relasi one to one
    public function mejas()
    {
        // 1 pemesanan terdiri dari 1 meja
        return $this->belongsTo(meja::class, 'meja_id');
    }

    //relasi one to many
    public function menus()
    {
        // 1 pemesanan terdiri dari banyak menu
        return $this->hasMany(Menu::class, 'menu_id');
    }

    //relasi one to many
    public function detailpesanan()
    {
        // 1 pemesanan terdiri dari banyak detail pesanan
        return $this->hasMany(detailpesanan::class, 'pesanan_id', 'id');
    }
}
