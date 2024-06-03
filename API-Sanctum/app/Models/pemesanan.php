<?php

// app/Models/Pemesanan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';
    protected $primaryKey = 'pemesanan_id';

    protected $fillable = ['nama_pengunjung', 'meja_id', 'tanggal_pemesanan', 'status',];

    public function detailpemesanan()
    {
        return $this->hasMany(detailpemesanan::class, 'pemesanan_id');
    }
}
