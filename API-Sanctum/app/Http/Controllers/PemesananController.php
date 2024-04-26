<?php

namespace App\Http\Controllers;

use App\Http\Requests\PemesananRequest;
use App\Http\Resources\PemesananResource;
use App\Models\detailpesanan;
use App\Models\Menu;
use App\Models\pemesanan;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class PemesananController extends Controller
{
        public function store(PemesananRequest $request): JsonResponse
        {
            $validatedData = $request->validated();
    
            $pemesanan = pemesanan::create($validatedData);
    
            foreach ($request->menus as $menu) {
                $pemesanan->detailpesanan()->create([
                    'menu_id' => $menu['menu_id'],
                    'subtotal' => $menu['subtotal'],
                    'jumlah' => $menu['jumlah'],
                ]);
            }
    
            return response()->json(new PemesananResource($pemesanan));
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

//   public function store(Request $request)
// {
//     // Validasi request
//     $validatedData = $request->validate([
//         'nama_pengunjung' => 'required|string',
//         'meja_id' => 'required|exists:meja,id',
//         'tanggal_pemesanan' => 'required|date',
//         'menus' => 'required|array',
//         'menus.*.menu_id' => 'required|exists:menu,id',
//         'menus.*.jumlah' => 'required|integer|min:1',
//     ]);

//     // Buat pemesanan baru
//     $pemesanan = Pemesanan::create([
//         'nama_pengunjung' => $validatedData['nama_pengunjung'],
//         'meja_id' => $validatedData['meja_id'],
//         'tanggal_pemesanan' => $validatedData['tanggal_pemesanan'],
//         'status' => 'Pending', // Atur status sesuai kebutuhan
//         'keterangan' => '', // Atur keterangan sesuai kebutuhan
//     ]);

//     // Proses setiap menu yang dipesan
//     foreach ($validatedData['menus'] as $menu) {
//         // Buat detail pemesanan untuk setiap menu
//         detailpesanan::create([
//             'pesanan_id' => $pemesanan->id,
//             'menu_id' => $menu['menu_id'],
//             'jumlah' => $menu['jumlah'],
//             'subtotal' => $menu['jumlah'] * Menu::findOrFail($menu['menu_id'])->harga,
//         ]);
//     }

//     return response()->json(['message' => 'Pemesanan berhasil', 'data' => $pemesanan], 201);
// }
}
