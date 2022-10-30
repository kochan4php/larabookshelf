<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseJson;
use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    protected $columns = [
        'judul_buku',
        'penerbit',
        'penulis',
        'id_kategori',
        'jumlah_halaman',
        'gambar',
    ];

    protected $rules = [
        'judul_buku' => ['required'],
        'penerbit' => ['required'],
        'penulis' => ['required'],
        'id_kategori' => ['required'],
        'jumlah_halaman' => ['required'],
        'gambar' => ['image', 'mimes:png,jpg,jpeg,webp', 'max:2048']
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Auth::user()->buku()->orderBy('id_buku', 'desc')->get();
        return ResponseJson::success('Mendapatkan Semua Data Buku', $buku);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $attr = $request->only($this->columns);
            $validator = Validator::make($attr, $this->rules);

            if ($validator->fails())
                return ResponseJson::error('Failed to insert data', $validator->errors()->all());

            if ($request->hasFile('gambar'))
                $attr['gambar'] = url()->asset('storage') . '/' . $request->file('gambar')->store('gambar_buku');

            $buku = Auth::user()->buku()->create($attr);
            return ResponseJson::success('Success to insert data', $buku);
        } catch (\Exception $e) {
            return ResponseJson::error('Something went wrong', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        try {
            return ResponseJson::success('Success get one book', $buku);
        } catch (\Exception $e) {
            return ResponseJson::error('Something went wrong', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        try {
            $attr = $request->only($this->columns);
            $validator = Validator::make($attr, $this->rules);

            if ($validator->fails())
                return ResponseJson::error('Failed to update data', $validator->errors()->all());

            if ($request->hasFile('gambar')) {
                $gambar = explode('storage/', $buku->gambar);
                $gambar = end($gambar);
                Storage::delete($gambar);
                $attr['gambar'] = url()->asset('storage') . '/' . $request->file('gambar')->store('gambar_buku');
            }

            Auth::user()->buku()->update($attr);
            return ResponseJson::success('Update data successfully');
        } catch (\Exception $e) {
            return ResponseJson::error('Something went wrong', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        try {
            if (!is_null($buku->gambar)) {
                $gambar = explode('storage/', $buku->gambar);
                $gambar = end($gambar);
                Storage::delete($gambar);
            }
            $buku->delete();
            return ResponseJson::success('Delete data successfully');
        } catch (\Exception $e) {
            return ResponseJson::error('Something went wrong', $e->getMessage());
        }
    }
}
