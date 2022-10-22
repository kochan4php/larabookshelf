<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class StoreBukuRequest extends FormRequest
{
    protected array $attr = [
        'judul_buku',
        'penerbit',
        'penulis',
        'id_kategori',
        'jumlah_halaman',
    ];

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'judul_buku' => ['required'],
            'penerbit' => ['required'],
            'penulis' => ['required'],
            'id_kategori' => ['required'],
            'jumlah_halaman' => ['required'],
            'gambar' => ['required', 'image', 'mimes:png,jpg,jpeg,webp', 'max:2048']
        ];
    }

    public function insertBook(): void
    {
        $attr = $this->only($this->attr);
        // $attr['id_user'] = auth()->user()->id;
        $attr['id_user'] = 1;
        $attr['gambar'] = $this->file('gambar')->store('gambar_buku');
        DB::table('buku')->insert($attr);
    }

    public function updateBook($id_buku): void
    {
        DB::table('buku')->where('id_buku', '=', $id_buku)->update($this->only($this->attr));
    }
}
