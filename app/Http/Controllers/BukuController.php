<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBukuRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    private string $table = 'buku';

    public function getBookById($id)
    {
        return DB::table($this->table)->where('id_buku', '=', $id);
    }

    public function index(): View
    {
        $buku = DB::table($this->table)
            ->join('kategori_buku', 'buku.id_kategori', '=', 'kategori_buku.id_kategori')
            ->orderBy('id_buku', 'desc')
            ->get();
        $kategori = DB::table('kategori_buku')->select()->get();

        return view('buku.index', [
            'buku' => $buku,
            'kategori' => $kategori
        ]);
    }

    public function store(StoreBukuRequest $request)
    {
        $request->insertBook();
        return redirect()->back()->with('success', 'Berhasil Menambahkan Buku');
    }

    public function show($buku)
    {
        $buku = $this->getBookById($buku)->first();
        return response()->json($buku);
    }

    public function update($buku)
    {
        dd('okey');
    }

    public function destroy($buku)
    {
        $this->getBookById($buku)->delete();
        return redirect('/')->with('success', 'Berhasil Menghapus Buku');
    }
}
