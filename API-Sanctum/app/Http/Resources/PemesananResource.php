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
        $total = $this->detailpesanan->sum('subtotal');

        return [
            'id' => $this->id,
            'nama_pengunjung' => $this->nama_pengunjung,
            'meja_id' => $this->meja_id,
            'tanggal_pemesanan' => $this->tanggal_pemesanan,
            'status' => $this->status,
            'keterangan' => $this->keterangan,
            'detailpesanan' => DetailPesananResource::collection($this->detailpesanan),
            'total'=>$total,
        ];
    }
}
