<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;
    protected $table ="reviews";
    protected $fillable = ['menu_id', 'pesanan_id', 'comment', 'rating'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function pemesanan()
    {
        return $this->belongsTo(pemesanan::class);
    }
}
