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
        $validatedData = $request->validated();

        $review = review::create($validatedData);

        return response()->json(new ReviewResource($review));
    }

    public function showByMenu($menu_id)
    {
        $reviews = Review::where('menu_id', $menu_id)->get();

        return response()->json(ReviewResource::collection($reviews));
    }

    public function showReview()
    {
        $reviews = review::all();

        return response()->json(ReviewResource::collection($reviews));
    }

}
