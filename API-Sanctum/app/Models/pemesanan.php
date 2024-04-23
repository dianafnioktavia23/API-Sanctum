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
}
