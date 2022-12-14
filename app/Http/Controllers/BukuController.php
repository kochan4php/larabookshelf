<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBukuRequest;
use App\Models\{Buku, KategoriBuku};
use Illuminate\Contracts\View\View;
use Illuminate\Http\{RedirectResponse, JsonResponse};
use Illuminate\Support\Facades\Auth;

class BukuController extends Controller
{
  private string $successTypeMsg = 'success';

  public function index(): View
  {
    $buku = Auth::user()->buku()->orderBy('id_buku', 'desc')->get();
    $kategori = KategoriBuku::get();
    return view('buku.index', compact('buku', 'kategori'));
  }

  public function store(StoreBukuRequest $request): RedirectResponse
  {
    $request->insertBook();
    return redirect()->back()->with($this->successTypeMsg, 'Berhasil Menambahkan Buku');
  }

  public function show($buku): JsonResponse
  {
    $buku = Buku::whereIdBuku($buku)->first();
    return response()->json($buku);
  }

  public function update(StoreBukuRequest $request, $buku): RedirectResponse
  {
    $request->updateBook($buku);
    return redirect()->route('home')->with($this->successTypeMsg, 'Berhasil Mengupdate Buku');
  }

  public function destroy($buku): RedirectResponse
  {
    Buku::whereIdBuku($buku)->delete();
    return redirect('/')->with($this->successTypeMsg, 'Berhasil Menghapus Buku');
  }

  // private function joinBetweenBookWithBookCategoryAndUser(): Collection
  // {
  //   $columns = [
  //     'buku.id_buku',
  //     'buku.id_kategori',
  //     'buku.judul_buku',
  //     'buku.penulis',
  //     'buku.penerbit',
  //     'buku.jumlah_halaman',
  //     'buku.gambar',
  //     'kategori_buku.kategori',
  //     'users.nama'
  //   ];

  //   return DB::table($this->table)
  //     ->select($columns)
  //     ->join('kategori_buku', 'buku.id_kategori', '=', 'kategori_buku.id_kategori')
  //     ->join('users', 'buku.id_user', '=', 'users.id_user')
  //     ->orderBy('id_buku', 'desc')
  //     ->get();
  // }
}
