<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Buku extends Model
{
  use HasFactory;

  protected $table = 'buku';

  protected $primaryKey = 'id_buku';

  public $timestamps = false;

  protected $fillable = [
    'id_kategori',
    'id_user',
    'judul_buku',
    'penulis',
    'penerbit',
    'jumlah_halaman',
    'gambar'
  ];

  public function kategoriBuku(): BelongsTo
  {
    return $this->belongsTo(KategoriBuku::class, 'id_kategori', 'id_kategori');
  }

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class, 'id_user', 'id_user');
  }
}
