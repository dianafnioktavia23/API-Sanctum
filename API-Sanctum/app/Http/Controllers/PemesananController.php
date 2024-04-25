<?php

namespace App\Http\Controllers;

use App\Http\Requests\PemesananRequest;
use App\Http\Resources\PemesananResource;
use App\Models\pemesanan;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class PemesananController extends Controller
{
    public function store(PemesananRequest $request): JsonResponse
    {

        // Validasi request menggunakan PemesananRequest
        $validatedData = $request->validated();
    
        // Periksa apakah pemesanan dengan meja_id dan tanggal_pemesanan yang sama sudah ada di database
        if (pemesanan::where('meja_id', $validatedData['meja_id'])
            ->where('tanggal_pemesanan', $validatedData['tanggal_pemesanan'])
            ->exists()) {
            return response()->json(['message' => 'Pemesanan untuk meja tersebut pada tanggal tersebut sudah ada.'], 400);
        }
    
        // Buat transaksi baru menggunakan method create pada model Pemesanan
        $transaksi = pemesanan::create($validatedData);
    
        // Buat pemesanan untuk setiap menu
        foreach ($request->menus as $menu) {
            $pemesanan = new pemesanan($validatedData);
            $pemesanan->nama_pengunjung = $request->nama_pengunjung;
            $pemesanan->meja_id = $request->meja_id;
            $pemesanan->menu_id = $menu['menu_id']; // ID menu dari request
            $pemesanan->jumlah = $menu['jumlah']; // Jumlah menu dari request
            $pemesanan->subtotal = $menu['subtotal']; 
            $pemesanan->save();
        }
    
        // Kembalikan respons JSON dengan transaksi yang baru dibuat
        return response()->json(new PemesananResource($transaksi), 201);
    }
    

  public function details($id): JsonResponse
  {
    //Ambil data pemesanan sesuai ID
    $pemesanan = pemesanan::find($id);

    // Kembalikan respons JSON dengan data pemesanan
    return response()->json(new PemesananResource($pemesanan));

  }

  public function index(): JsonResponse
  {
      // Ambil semua data pemesanan dengan status "completed" dari database
      $pemesanan = pemesanan::where('status', 'completed')->get();
  
      // Kembalikan respons JSON dengan data pemesanan 
      return response()->json(PemesananResource::collection($pemesanan));
  }
}
