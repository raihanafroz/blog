<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'u_id' => uniqid('POST-'),
          'author_id' => User::where('type', 'author')->get()->random()->id,
          'category_id' => Category::all()->random()->id,
          'title' => $this->faker->unique()->sentence,
          'like' => $this->faker->numberBetween(1, 50000),
          'dislike' => $this->faker->numberBetween(1, 50000),
          'views' => $this->faker->numberBetween(1, 50000),
          'body' => $this->faker->paragraph,
          'status' => Arr::random(['active', 'inactive'])
        ];
    }
}
