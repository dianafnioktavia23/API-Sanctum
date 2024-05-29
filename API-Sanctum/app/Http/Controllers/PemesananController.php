<?php

// app/Http/Controllers/PemesananController.php

namespace App\Http\Controllers;

use App\Http\Requests\PemesananRequest;
use App\Http\Resources\PemesananResource;
use App\Models\DetailPemesanan;
use App\Models\Pemesanan;
use Illuminate\Http\JsonResponse;

class PemesananController extends Controller
{
    public function store(PemesananRequest $request): JsonResponse
    {
        // Validasi input data dari request POST
        $validatedData = $request->validated();
        
        // Simpan data pemesanan ke database
        $pemesanan = pemesanan::create($validatedData);
        
        // Simpan data detail pemesanan ke database
        foreach ($request->menus as $menu) {
            $pemesanan->detailpemesanan()->create([
                'menu_id' => $menu['menu_id'],
                'subtotal' => $menu['subtotal'],
                'jumlah' => $menu['jumlah'],
            ]);
        }
        
        // Kembalikan respons JSON dengan data pemesanan yang baru dibuat
        return response()->json(new PemesananResource($pemesanan->load('detailpemesanan.menu')), 201);
    }

    public function details($pemesanan_id): JsonResponse
    {
        // Mengambil pemesanan berdasarkan ID
        $pemesanan = Pemesanan::with('detailpemesanan.menu')->find($pemesanan_id);

        // Memeriksa apakah pemesanan ditemukan
        if (!$pemesanan) {
            return response()->json(['message' => 'Pemesanan not found'], 404);
        }

        // Mengembalikan data pemesanan dalam bentuk respons JSON
        return response()->json(new PemesananResource($pemesanan));
    }

    public function index(): JsonResponse
    {
        // Ambil semua data pemesanan dengan status "selesai" dari database
        $pemesanan = Pemesanan::where('status', 'selesai')->with('detailpemesanan.menu')->get();
    
        // Kembalikan respons JSON dengan data pemesanan 
        return response()->json(PemesananResource::collection($pemesanan));
    }
}
