<?php

// app/Http/Controllers/MenuController.php
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

    public function show($menu_id): JsonResponse
    {
        // Mengambil menu berdasarkan ID
        $menu = Menu::find($menu_id);

        // Memeriksa apakah menu ditemukan
        if (!$menu) {
            return response()->json(['message' => 'Menu not found'], 404);
        }

        // Mengembalikan data menu dalam bentuk respons JSON
        return response()->json(new MenuResource($menu));
    }

    public function getMenuByCategory($kategori_id)
    {
        $menus = Menu::where('id_kategori', $kategori_id)->get();
        if ($menus->isEmpty()) {
            return response()->json(['message' => 'Menu not found'], 404);
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

    public function bestSeller(): JsonResponse
    {
        // Menghitung jumlah pemesanan untuk setiap menu dan mengurutkannya
        $bestSellers = Menu::withCount('detailpemesanan')
                            ->orderBy('detailpemesanan_count', 'desc')
                            ->take(10)
                            ->get();

        // Mengembalikan data dalam bentuk JSON
        return response()->json(MenuResource::collection($bestSellers));
    }

    public function rekomendasi(): JsonResponse
    {
        $rekomendasi = Menu::inRandomOrder()->get();

        return response()->json(MenuResource::collection($rekomendasi));
    }
}
