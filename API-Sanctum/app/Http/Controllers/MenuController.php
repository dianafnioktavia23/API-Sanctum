<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function getmenu(): JsonResponse
    {
        // Mengambil semua data menu
        $menus = Menu::all();

        // Mengembalikan data menu dalam bentuk respons JSON
        return response()->json($menus);
    }
}
