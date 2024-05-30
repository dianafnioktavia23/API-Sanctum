<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\review;
use Illuminate\Http\JsonResponse;


class ReviewController extends Controller
{
    
    public function store(ReviewRequest $request): JsonResponse
    {
        // Validasi input data dari request
        $validatedData = $request->validated();

        // Menyimpan data review
        $review = Review::create($validatedData);

        // Mengembalikan respons JSON dengan review yang baru dibuat
        return response()->json(new ReviewResource($review), 201);
    }

    public function showById($id): JsonResponse
    {
        // Mengambil menu berdasarkan ID
        $review = review::find($id);

        // Memeriksa apakah menu ditemukan
        if (!$review) {
            return response()->json(['message' => 'REVIEW not found'], 404);
        }

        // Mengembalikan data menu dalam bentuk respons JSON
        return response()->json(new ReviewResource($review));
    }

    public function showReview()
    {
        // Mengambil semua review
        $reviews = review::all();

        // Mengembalikan respons JSON dengan daftar review yang tersedia 
        return response()->json(ReviewResource::collection($reviews));
    }

}
