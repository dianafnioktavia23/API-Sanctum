<?php

// app/Http/Resources/DetailPemesananResource.php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailPesananResource extends JsonResource
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
            'menu_id'  => $this->menu->nama_menu,
            'jumlah' => $this->jumlah,
            'subtotal' => $this->subtotal,
            'keterangan' => $this->keterangan,
        ];
    }
}
