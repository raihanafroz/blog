<?php

namespace Database\Seeders;

use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $now = Carbon::now();
      $tags = [
        'Advertising',
        'Advice',
        'Android',
        'Anime',
        'Apple',
        'Architecture',
        'Art',
        'Baking',
        'Beauty',
        'Bible',
        'Blog',
        'Blogging',
        'Book Reviews',
        'Books',
        'Business',
        'Canada',
        'Cars',
        'Cartoons',
        'Celebrities',
        'Celebrity',
        'Children',
        'Christian',
        'Christianity',
        'Comedy',
        'Comics',
        'Cooking',
        'Cosmetics',
        'Crafts',
        'Cuisine',
        'Culinary',
        'Culture',
        'Dating',
        'Design',
        'Diy',
        'Dogs',
        'Drawing',
        'Economy',
        'Education',
        'Entertainment',
        'Environment',
        'Events',
        'Exercise',
        'Faith',
        'Family',
        'Fantasy',
        'Fashion',
        'Fiction',
        'Film',
        'Fitness',
        'Folk',
        'Food',
        'Football',
        'France',
        'Fun',
        'Funny',
        'Gadgets',
        'Games',
        'Gaming',
        'Geek',
        'Google',
        'Gossip',
        'Graphic Design',
        'Green',
        'Health',
        'Hip Hop',
        'History',
        'Home',
        'Home Improvement',
        'Homes',
        'Humor',
        'Humour',
        'Hunting',
        'Illustration',
        'Indie',
        'Inspiration',
        'Interior Design',
        'Internet',
        'Internet Marketing',
        'Iphone',
        'Italy',
        'Kids',
        'Landscape',
        'Law',
        'Leadership',
        'Life',
        'Lifestyle',
        'Literature'
      ];
      foreach ($tags as $tag){
        Tag::create([
          'name' => $tag,
          'created_at' => $now,
          'updated_at' => $now,
        ]);
      }
    }
}
