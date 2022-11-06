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
    Schema::create('catatan', function (Blueprint $table) {
      $table->integer('id_catatan', true);

      $table
        ->foreignId('id_user')
        ->index()
        ->constrained('users', 'id_user')
        ->cascadeOnUpdate()
        ->cascadeOnDelete();

      $table->string('judul');
      $table->text('isi');
      $table->boolean('arsip')->default(false);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('catatan');
  }
};
