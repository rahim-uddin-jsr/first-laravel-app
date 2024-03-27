<?php

namespace Database\Factories;

use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->sentence($nbWords = 4, $variableNbWords = true);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'post' => $this->faker->name(),
        ];
    }
}