<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id' => rand(1,5),
            'title' => $this->faker->realText(20),
            'content_small' => $this->faker->realText(50),
            'content' => $this->faker->realText(200),
            'sort' => rand(0,10),
            'status' => $this->faker->randomElement(['draft','published']),
            'pic' => 'img/blog-recent-'. rand(1,5) .'.jpg',
        ];
    }
}
