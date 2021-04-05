<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $now = Carbon::now();
      $user = [
        [
          'name' => 'RAST',
          'email' => 'admin@rast.com',
          'phone' => '01234567890',
          'password' => Hash::make('12345600'),
          'type' => 'admin',
          'status' => 'active',
          'created_at' => $now,
          'updated_at' => $now,
        ], [
          'name' => 'RAST',
          'email' => 'customer@rast.com',
          'phone' => '01234567891',
          'password' => Hash::make('12345600'),
          'type' => 'user',
          'status' => 'active',
          'created_at' => $now,
          'updated_at' => $now,
        ],
      ];

      DB::table('users')->insert($user);

      User::factory(20)->create();
    }
}
