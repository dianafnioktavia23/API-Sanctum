<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailpesanan extends Model
{
    use HasFactory;
    protected $table ="detailpesanan";

    protected $fillable =[
        'pesanan_id',
        'menu_id',
        'subtotal',
        'jumlah'
        
    ];

    public function pemesanan()
    {
        return $this->belongsTo(pemesanan::class, 'pesanan_id', 'id');
    }
}
