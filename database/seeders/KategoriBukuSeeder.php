<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategoriBuku = collect([
            ['kategori' => 'Biografi'],
            ['kategori' => 'Autobiografi'],
            ['kategori' => 'Ensiklopedia'],
            ['kategori' => 'Kamus'],
            ['kategori' => 'Sejarah'],
            ['kategori' => 'Sains'],
            ['kategori' => 'Motivasi'],
            ['kategori' => 'Ilmu Pengetahuan'],
            ['kategori' => 'Filsafat'],
            ['kategori' => 'Fantasi'],
            ['kategori' => 'Romance'],
            ['kategori' => 'SCI-FI'],
            ['kategori' => 'Horor'],
            ['kategori' => 'Petualangan'],
            ['kategori' => 'Misteri'],
        ]);
        $kategoriBuku->each(fn ($kb) => DB::table('kategori_buku')->insert($kb));
    }
}
