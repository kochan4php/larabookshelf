<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class StoreBukuRequest extends FormRequest
{
    protected array $attr = ['judul_buku', 'penerbit', 'penulis', 'id_kategori'];

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
            'id_kategori' => ['required']
        ];
    }

    public function insertBook(): void
    {
        DB::table('buku')->insert($this->only($this->attr));
    }

    public function updateBook($id_buku): void
    {
        DB::table('buku')->where('id_buku', '=', $id_buku)->update($this->only($this->attr));
    }
}
