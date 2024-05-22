<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\review;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewController extends Controller
{
    
    public function store(ReviewRequest $request): JsonResponse
    {
        // Validasi input data dari request
        $validatedData = $request->validated();

        // Menyimpan data review
        $review = review::create($validatedData);

        // Mengembalikan respons JSON dengan review yang baru dibuat
        return response()->json(new ReviewResource($review));
    }

    public function showByMenu($menu_id)
    {
        // Mengambil semua review berdasarkan menu
        $reviews = Review::where('menu_id', $menu_id)->get();

        // Mengembalikan respons JSON dengan daftar review
        return response()->json(ReviewResource::collection($reviews));
    }

    public function showReview()
    {
        // Mengambil semua review
        $reviews = review::all();

        // Mengembalikan respons JSON dengan daftar review yang tersedia 
        return response()->json(ReviewResource::collection($reviews));
    }

}
