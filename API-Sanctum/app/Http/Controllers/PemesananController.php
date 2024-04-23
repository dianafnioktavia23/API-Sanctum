<?php

namespace App\Http\Controllers;

use App\Http\Requests\PemesananRequest;
use App\Http\Resources\PemesananResource;
use App\Models\pemesanan;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
  // public function store(PemesananRequest $request): JsonResponse
  // {
  //     // Validasi request menggunakan PemesananRequest
  //     $validatedData = $request->validated();
  
  //     // Periksa apakah pemesanan dengan meja_id dan tanggal_pemesanan yang sama sudah ada di database
  //     if (pemesanan::where('meja_id', $validatedData['meja_id'])
  //         ->where('tanggal_pemesanan', $validatedData['tanggal_pemesanan'])
  //         ->count() > 0) {
  //         throw new HttpResponseException(response([
  //             "errors" => [
  //                 'meja_id' => [
  //                     'Pemesanan untuk meja tersebut pada tanggal tersebut sudah ada.'
  //                 ]
  //             ]
  //         ], 400));
  //     }
  
  //     // Buat transaksi baru menggunakan method create pada model Pemesanan
  //     $transaksi = pemesanan::create($validatedData);
  
  //     // Kembalikan respons JSON dengan transaksi yang baru dibuat
  //     return response()->json(new PemesananResource($transaksi));
  // }

  public function index(): JsonResponse
  {
      // Ambil semua data pemesanan dengan status "completed" dari database
      $pemesanan = pemesanan::where('status', 'completed')->get();
  
      // Kembalikan respons JSON dengan data pemesanan 
      return response()->json(PemesananResource::collection($pemesanan));
  }


  public function store(PemesananRequest $request): JsonResponse
{
    // Mulai transaksi database
    DB::beginTransaction();

    try {
        // Lakukan validasi request jika diperlukan

        // Misalnya, untuk setiap jenis menu yang dipesan
        foreach ($request->menus as $menu) {
            // Lakukan validasi data menu jika diperlukan

            // Buat pemesanan untuk setiap menu
            $pemesanan = new pemesanan();
            $pemesanan->nama_pengunjung = $request->nama_pengunjung;
            $pemesanan->meja_id = $request->meja_id;
            $pemesanan->menu_id = $menu['menu_id']; // ID menu dari request
            $pemesanan->jumlah = $menu['jumlah']; // Jumlah menu dari request
            $pemesanan->subtotal = $menu['subtotal']; // Subtotal menu dari request
            $pemesanan->tanggal_pemesanan = $request->tanggal_pemesanan;
            $pemesanan->status = $request->status;
            $pemesanan->keterangan = $request->keterangan;
            $pemesanan->save();
        }

        // Commit transaksi jika berhasil
        DB::commit();

        // Response JSON berhasil
        return response()->json(new PemesananResource($pemesanan), 201);
    } catch (\Exception $e) {
        // Rollback transaksi jika terjadi kesalahan
        DB::rollback();

        // Response JSON gagal
        return response()->json(['message' => 'Transaksi gagal: ' . $e->getMessage()], 500);
    }
}
}
