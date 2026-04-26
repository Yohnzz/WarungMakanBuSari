<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'kategori' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
    public function messages(): array
    {
        return [
            'nama.required' => 'Nama menu harus diisi.',
            'nama.string' => 'Nama menu harus berupa string.',
            'nama.max' => 'Nama menu tidak boleh lebih dari 255 karakter.',
            'harga.required' => 'Harga menu harus diisi.',
            'harga.numeric' => 'Harga menu harus berupa angka.',
            'harga.min' => 'Harga menu tidak boleh kurang dari 0.',
            'kategori.required' => 'Kategori menu harus dipilih.',
            'gambar.image' => 'File yang diunggah harus berupa gambar.',
            'gambar.mimes' => 'Gambar harus berformat jpeg, png, jpg, atau gif.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ];
    }
}
