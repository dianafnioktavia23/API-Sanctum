<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;
    protected $table ="reviews";
    protected $fillable = ['menu_id', 'pemesanan_id', 'comment', 'rating'];

    // relasi many to many
    public function menu()
    {
        // banyak menu memiliki banyak review
        return $this->belongsTo(Menu::class);
    }

    // relasi one to many
    public function pemesanan()
    {
        // 1 pemesanan punya banyak review
        return $this->belongsTo(pemesanan::class);
    }
}
