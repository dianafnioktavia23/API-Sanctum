<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "nama_menu"=>["required", "max:100"],
            "deskripsi"=>["required", "max:255"],
            "kategori" => ["required", "exists:Kategori,nama_kategori"],
            "harga" => ["required", "numeric", "regex:/^\d+(\.\d{1,2})?$/"], // Angka dengan maksimal 2 digit di belakang koma
            "gambar" => ["required", "image"], // Gambar harus berupa file gambar

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response([
            "errors" =>$validator->getMessageBag()
        ], 400));
    }
}
