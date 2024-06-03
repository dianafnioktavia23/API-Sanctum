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

    protected $fillable = ['pemesanan_id', 'menu_id', 'subtotal', 'jumlah', 'keterangan'];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($detailpemesanan) {
            // Hitung subtotal
            $menu = Menu::findOrFail($detailpemesanan->menu_id);
            $subtotal = $menu->harga * $detailpemesanan->jumlah;
            $detailpemesanan->subtotal = $subtotal;
        });
    }
}
