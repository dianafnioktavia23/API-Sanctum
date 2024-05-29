<?php

namespace App\Http\Resources;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
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
            'id' => $this->menu_id,
            'nama_menu'=>$this->nama_menu,
            'deskripsi'=>$this->deskripsi,
            'kategori' => $this->id_kategori, // Memanggil resource untuk kategori
            // 'o' => Kategori::select('nama_kategori')->where('id', $this->kategori)->first(), 
            'harga'=>$this->harga,
            'stok'=>$this->stok,
            'gambar'=>$this->gambar
        ];
    }
}
