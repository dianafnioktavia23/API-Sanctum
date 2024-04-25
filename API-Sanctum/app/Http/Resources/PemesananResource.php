<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class PemesananResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama_pengunjung'=> $this->nama_pengunjung,
            'meja_id'=> $this->meja_id,// Memanggil resource untuk meja
            'menu_id'=> $this->menu_id,
            'jumlah'=> $this->jumlah,
            'subtotal'=> $this->subtotal,
            'tanggal_pemesanan'=> $this->tanggal_pemesanan,
            'status'=> $this->status,
            'keterangan'=> $this->keterangan,
            
        ];
    }
}
