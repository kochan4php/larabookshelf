<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $roles = collect([
      ['nama_role' => 'admin'],
      ['nama_role' => 'pengguna']
    ]);

    $roles->each(fn ($role) => DB::table('roles')->insert($role));
  }
}
