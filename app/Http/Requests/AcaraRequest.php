<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcaraRequest extends FormRequest
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
            'name' => 'required|min:5',
            'description' => 'required|string',
            // 'photos' => 'required',
            // 'photos.*' => 'image|mimes:png,jpg,jpeg|max:2048', // Aturan untuk setiap file
            'namaPelaksana' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'waktu' => 'required|date',
            'category_id' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => ':attribute Tidak Boleh Kosong',
            'description.required' => ':attribute Tidak Boleh Kosong',
            // 'photos.required' => ':attribute Tidak Boleh Kosong',
            // 'photos.*.image' => ':attribute harus berupa gambar',
            // 'photos.*.mimes' => ':attribute harus berupa file dengan tipe: png, jpg, jpeg',
            'namaPelaksana.required' => ':attribute Tidak Boleh Kosong',
            'lokasi.required' => ':attribute Tidak Boleh Kosong',
            'waktu.required' => ':attribute Tidak Boleh Kosong',
            'category_id.required' => ':attribute Tidak Boleh Kosong',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'Nama',
            'description' => 'Deskripsi',
            // 'photos'  => 'Photo',

            'namaPelaksana'  => 'Nama Pelaksana',
            'lokasi'  => 'Lokasi',
            'waktu'  => 'Waktu',
            'category_id'  => 'Kategori',
        ];
    }
}
