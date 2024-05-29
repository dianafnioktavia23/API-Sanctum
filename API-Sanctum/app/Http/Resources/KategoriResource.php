<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KategoriResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Mengembalikan array yang berisi data yang diformat
        return [
            'id' => $this->id_kategori,
            'nama_kategori' => $this->nama_kategori,
            'image' => $this -> image,
        ];
    }
}
