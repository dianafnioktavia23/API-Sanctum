<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailpesanan extends Model
{
    // Menggunakan trait HasFactory
    use HasFactory;
    protected $table ="detailpesanan";

    // Menentukan kolom yang boleh diisi
    protected $fillable =[
        'pesanan_id',
        'menu_id',
        'subtotal',
        'jumlah'
        
    ];

    // relasi one to many
    public function pemesanan()
    {
        // 1 pemesanan terdiri dari banyak detail pemesanan
        return $this->belongsTo(pemesanan::class, 'pesanan_id', 'id');
    }
}
