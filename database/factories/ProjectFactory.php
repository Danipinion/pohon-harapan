<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(rand(4, 8));

        $slug = Str::slug($title);

        return [
            'title' => $title,
            'slug' => $slug,
            'short_description' => fake()->paragraph(2),
            'body' => fake()->paragraphs(3, true),
            'location' => fake()->city() . ', ' . fake()->state(),
            'target_trees' => fake()->numberBetween(5000, 25000),
            'cost_per_tree' => fake()->numberBetween(15000, 30000),
            'partner_name' => fake()->company(),
            'status' => fake()->randomElement(['active', 'pending', 'completed']),
        ];
    }
}
