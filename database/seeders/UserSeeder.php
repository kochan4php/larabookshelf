<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $users = collect([
      [
        'nama' => 'Deo Subarno',
        'username' => 'deosubarno',
        'email' => 'aprodeosubarno@gmail.com',
        'password' => bcrypt('password'),
        'id_role' => 1
      ],
      [
        'nama' => 'Fitri Nurfadhila',
        'username' => 'fitrinurfadhila',
        'email' => 'fitrinurfadhila@gmail.com',
        'password' => bcrypt('password'),
        'id_role' => 1
      ],
    ]);

    $users->each(fn ($user) => DB::table('pengguna')->insert($user));
  }
}
