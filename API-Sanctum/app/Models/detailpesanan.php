<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailpesanan extends Model
{
    use HasFactory;
    protected $table ="detailpesanan";
    protected $primarykey ="id";
    protected $keyType = "int";
    public $timestamps=true;
    public $incrementing = true;

    protected $fillable =[
        'id_pesanan',
        'menu_id',
        'subtotal',
        'jumlah'
        
    ];

    public function pemesanan()
    {
        return $this->belongsTo(pemesanan::class, 'meja_id');
    }
}
