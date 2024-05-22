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
        //menambahkan jumlah total harga pemesanan
        $total = $this->detailpesanan->sum('subtotal');

        //Mengembalikan array yang berisi data yang diformatkan
        return [
            'id' => $this->id,
            'nama_pengunjung' => $this->nama_pengunjung,
            'meja_id' => $this->meja_id,
            'detailpesanan' => DetailPesananResource::collection($this->detailpesanan),
            'keterangan' => $this->keterangan,
            'total'=>$total,
        ];
    }
}
