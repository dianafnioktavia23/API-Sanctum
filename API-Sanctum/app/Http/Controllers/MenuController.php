<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Http\Resources\MenuResource;
use App\Models\Menu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function getmenu(): JsonResponse
    {
        // Mengambil semua data menu
        $menus = Menu::all();

        // Mengembalikan data menu dalam bentuk respons JSON
        return response()->json($menus);
    }

    // //mengambil data dengan filter Id
    // public function show($id)
    // {
    //     $menu = Menu::findOrFail($id);

    //     return response()->json(['data' => $menu]);
    // }

        //     public function getMenu(Request $request): MenuResource
        // {
        //     $menu = Menu::all();

        //     return response()->json(new MenuResource($menu));
        // }

}
