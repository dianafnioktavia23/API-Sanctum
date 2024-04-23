<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class meja extends Model
{
    use HasFactory;
    protected $table ="meja";
    protected $primarykey ="id";
    protected $keyType = "int";
    public $timestamps=true;
    public $incrementing = true;

    protected $fillable =[
        'nomor_meja',
        'kapasitas',
        'status'
    ];
}
