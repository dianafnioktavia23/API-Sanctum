<?php

namespace App\Http\Controllers;

use App\Http\Resources\KategoriResource;
use App\Models\Kategori;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function listkategori(): JsonResponse
    {
        // Mengambil semua data kategori
        $kategori = Kategori::all();

        // Mengembalikan data kategori dalam bentuk respons JSON yang ada pada kategoriresource
        return response()->json(KategoriResource::collection($kategori));
    }
}
