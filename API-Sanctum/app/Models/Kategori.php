<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    //nama table yang digunakan oleh model
    protected $table ="kategori";
    protected $primarykey ="id_kategori";
    protected $keyType = "int";
    public $timestamps=true;
    public $incrementing = true;

    // Menentukan kolom yang boleh diisi
    protected $fillable =[
        'nama_kategori',
        'image',
        'keterangan'
    ];

    // Relasi One To Many 
    public function menu()
    {
        // 1 kategori terdiri dari banyak menu
        return $this->hasMany(Menu::class);
    }
}
