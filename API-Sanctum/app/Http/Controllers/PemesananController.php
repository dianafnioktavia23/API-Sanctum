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

}
