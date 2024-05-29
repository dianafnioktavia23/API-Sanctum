<?php

// app/Http/Resources/PemesananResource.php

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
        // Menambahkan jumlah total harga pemesanan
        $total = $this->detailpemesanan->sum('subtotal');

        // Mengembalikan array yang berisi data yang diformatkan
        return [
            'id' => $this->pemesanan_id,
            'nama_pengunjung' => $this->nama_pengunjung,
            'meja_id' => $this->meja_id,
            'detailpemesanan' => DetailPesananResource::collection($this->detailpemesanan),
            'keterangan' => $this->keterangan,
            'status' => $this->status,
            'tanggal_pemesanan' => $this->created_at,
            'total' => $total,
        ];
    }
}
