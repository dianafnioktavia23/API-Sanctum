<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MejaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //Mengembalikan array yang berisi data yang diformat
        return[
            'meja_id' => $this->meja_id,
            'nomor_meja' => $this->nomor_meja,
            'kapasitas' => $this -> kapasitas,
            'status' => $this->status
        ];
    }
}
