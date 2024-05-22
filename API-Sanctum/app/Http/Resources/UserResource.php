<?php

namespace App\Http\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => $this->id,
            'nama_pengguna'=>$this->nama_pengguna,
            'email'=>$this->email,
            'telepon'=>$this->telepon,
            'alamat'=>$this->alamat,
            'token'=>$this->whenNotNull($this->token)
        ];
    }
}
