<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseJson;
use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Auth::user()->buku()->orderBy('id_buku', 'desc')->get();
        return ResponseJson::success('success', 'Mendapatkan Semua Data Buku', $buku);
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
            $attr = $request->only([
                'judul_buku',
                'penerbit',
                'penulis',
                'id_kategori',
                'jumlah_halaman',
            ]);

            $validator = Validator::make($attr, [
                'judul_buku' => ['required'],
                'penerbit' => ['required'],
                'penulis' => ['required'],
                'id_kategori' => ['required'],
                'jumlah_halaman' => ['required'],
                'gambar' => ['image', 'mimes:png,jpg,jpeg,webp', 'max:2048']
            ]);

            if ($request->hasFile('gambar')) {
                $attr['gambar'] = $request->file('gambar')->store('gambar_buku');
            }

            if ($validator->fails()) {
                return ResponseJson::error('error', 'Failed to insert data', $validator->errors()->all());
            }

            $buku = Auth::user()->buku()->create($attr);
            return ResponseJson::success('success', 'Success to insert data', $buku);
        } catch (\Exception $e) {
            return ResponseJson::error('error', 'Something went wrong', $e->getMessage());
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        //
    }
}
