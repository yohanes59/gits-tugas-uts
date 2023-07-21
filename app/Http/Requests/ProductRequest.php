<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'kategori_produk' => ['required'],
            'nama_produk' => ['required', 'string'],
            'harga' => ['required', 'numeric'],
            'deskripsi' => ['required', 'string'],
            'gambar' => ['mimes:png,jpg,jpeg', 'max:2048']
        ];
    }
}
