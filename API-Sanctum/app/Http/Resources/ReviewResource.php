<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //Mengembalikan array yang berisi data yang diformat
        return [
            'menu_id' => $this->menu_id,
            'pesanan_id' => $this->pesanan_id,
            'comment' => $this->comment,
            'rating' => $this->rating,
        ];
    }
}
