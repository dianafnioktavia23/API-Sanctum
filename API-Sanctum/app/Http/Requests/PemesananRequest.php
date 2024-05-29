<?php

// app/Http/Requests/PemesananRequest.php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PemesananRequest extends FormRequest
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
            'nama_pengunjung' => ['required', 'max:100'],
            'meja_id' => ['required', 'exists:meja,meja_id'],
            'menus' => ['required', 'array'],
            'menus.*.menu_id' => ['required', 'exists:menu,menu_id'],
            'menus.*.jumlah' => ['required', 'integer', 'min:1'],
            'menus.*.subtotal' => ['required', 'numeric', 'min:0'],
            'keterangan' => ['required', 'max:255'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        // Jika validasi gagal, kembalikan respons JSON dengan pesan error
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors()
        ], 422));
    }
}
