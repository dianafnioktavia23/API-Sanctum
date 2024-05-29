<?php

// app/Models/DetailPemesanan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPemesanan extends Model
{
    use HasFactory;

    protected $table = 'detailpemesanan';
    public $timestamps = false;

    protected $fillable = ['pemesanan_id', 'menu_id', 'subtotal', 'jumlah'];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
