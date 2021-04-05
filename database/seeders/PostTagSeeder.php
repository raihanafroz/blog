<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $now = now();
      $i = 0;
      while ($i < 500){
        DB::table('post_tag')->insert([
          'post_id' => Post::all()->random()->id,
          'tag_id' => Tag::all()->random()->id,
          'created_at' => $now,
          'updated_at' => $now,
        ]);
        $i++;
      }
    }
}
