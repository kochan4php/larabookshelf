<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('buku', function (Blueprint $table) {
      $table->integer('id_buku', true);

      $table->integer('id_kategori');
      $table
        ->foreign('id_kategori')
        ->references('id_kategori')
        ->on('kategori_buku')
        ->cascadeOnDelete();

      $table
        ->foreignId('id_user')
        ->index()
        ->constrained('users', 'id_user')
        ->cascadeOnDelete();

      $table->string('judul_buku', 100);
      $table->string('penulis', 100);
      $table->string('penerbit', 100);
      $table->integer('jumlah_halaman');
      $table->text('gambar')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('buku');
  }
};
