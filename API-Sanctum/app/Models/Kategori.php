<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table ="kategori";
    protected $primarykey ="id";
    protected $keyType = "int";
    public $timestamps=true;
    public $incrementing = true;

    protected $fillable =[
        'nama_kategori',
        'image',
        'keterangan'
    ];

    public function menu()
    {
        return $this->hasMany(Menu::class);
    }
}
