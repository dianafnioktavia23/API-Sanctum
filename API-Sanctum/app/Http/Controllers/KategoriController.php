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
        // Mengambil semua data menu
        $kategori = Kategori::all();

        // Mengembalikan data menu dalam bentuk respons JSON yang ada pada menuresource
        return response()->json(KategoriResource::collection($kategori));
    }
}
