<?php

namespace App\Http\Controllers;

use App\Http\Resources\MejaResource;
use App\Models\meja;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    public function listmeja(): JsonResponse
    {
        // Mengambil semua data meja
        $meja = meja::all();

        // Mengembalikan data menu dalam bentuk respons JSON yang ada pada mejaresource
        return response()->json(MejaResource::collection($meja));
    }
}
