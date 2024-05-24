<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Http\Resources\MenuResource;
use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function getmenu(): JsonResponse
    {
        // Mengambil semua data menu
        $menu = Menu::all();

        // Mengembalikan data menu dalam bentuk respons JSON yang ada pada menuresource
        return response()->json(MenuResource::collection($menu));
    }

    public function show($id): JsonResponse
    {
        
        // Mengambil menu berdasarkan ID
        $menu = Menu::find($id);

        // Memeriksa apakah menu ditemukan
        if (!$menu) {
            return response()->json(['message' => 'Menu not found'], 404);
        }

        // Mengembalikan data menu dalam bentuk respons JSON
        return response()->json(new MenuResource($menu));
    }

    public function getMenuByCategory($Kategori)
    {
        $menus = Menu::where('kategori', $Kategori)->get();;
        if (!$Kategori) {
            return abort(404);
        }

        return response()->json(MenuResource::collection($menus));
    }

    public function getOrderedMenu(): JsonResponse
    {
        $defaultMenu = Menu::orderBy('nama_menu', 'asc')->get();

        if ($defaultMenu->isEmpty()) {
            return response()->json(['message' => 'Menu not found'], 404);
        }

        return response()->json(MenuResource::collection($defaultMenu));
    }

    public function bestSeller()
{
    $bestSellers = Menu::withCount('pemesanan') // assuming there's a relationship between Menu and Order models
                        ->orderBy('pemesanan_count', 'desc')
                        ->take(10)
                        ->get();

    return response()->json(MenuResource::collection($bestSellers));
}
    public function rekomendasi(): JsonResponse
    {
        $rekomendasi = Menu::inRandomOrder()->get();

        return response()->json(MenuResource::collection($rekomendasi));
    }

}
