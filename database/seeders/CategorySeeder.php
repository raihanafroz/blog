<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now = Carbon::now();
      $categories = [
        [
          'u_id' => uniqid('CAT-'),
          'name' => 'Fashion',
          'status' => 'active',
          'created_at' => $now,
          'updated_at' => $now,
        ],  [
          'u_id' => uniqid('CAT-'),
          'name' => 'Food',
          'status' => 'active',
          'created_at' => $now,
          'updated_at' => $now,
        ],  [
          'u_id' => uniqid('CAT-'),
          'name' => 'Travel',
          'status' => 'active',
          'created_at' => $now,
          'updated_at' => $now,
        ],  [
          'u_id' => uniqid('CAT-'),
          'name' => 'Music',
          'status' => 'active',
          'created_at' => $now,
          'updated_at' => $now,
        ],  [
          'u_id' => uniqid('CAT-'),
          'name' => 'Lifestyle',
          'status' => 'active',
          'created_at' => $now,
          'updated_at' => $now,
        ],  [
          'u_id' => uniqid('CAT-'),
          'name' => 'Fitness',
          'status' => 'active',
          'created_at' => $now,
          'updated_at' => $now,
        ],  [
          'u_id' => uniqid('CAT-'),
          'name' => 'DIY',
          'status' => 'active',
          'created_at' => $now,
          'updated_at' => $now,
        ],  [
          'u_id' => uniqid('CAT-'),
          'name' => 'Sports',
          'status' => 'active',
          'created_at' => $now,
          'updated_at' => $now,
        ],  [
          'u_id' => uniqid('CAT-'),
          'name' => 'Finance',
          'status' => 'active',
          'created_at' => $now,
          'updated_at' => $now,
        ],  [
          'u_id' => uniqid('CAT-'),
          'name' => 'Political',
          'status' => 'active',
          'created_at' => $now,
          'updated_at' => $now,
        ],  [
          'u_id' => uniqid('CAT-'),
          'name' => 'Parenting',
          'status' => 'active',
          'created_at' => $now,
          'updated_at' => $now,
        ],  [
          'u_id' => uniqid('CAT-'),
          'name' => 'Business',
          'status' => 'active',
          'created_at' => $now,
          'updated_at' => $now,
        ],  [
          'u_id' => uniqid('CAT-'),
          'name' => 'Personal',
          'status' => 'active',
          'created_at' => $now,
          'updated_at' => $now,
        ]
      ];
      foreach ($categories as $category){
        Category::create($category);
      }
    }
}
