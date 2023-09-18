<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
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
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'category_id' => rand(1, 5),
            'title' => $this->faker->words(rand(2, 4), true),
            'view_count' => 1,
            'slug' => $this->faker->slug,
            'thumbnail' => 'thumbnails/illustration-1.png',
            'exerpt' => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',
            'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(6)) . '</p>',
        ];
    }
}
