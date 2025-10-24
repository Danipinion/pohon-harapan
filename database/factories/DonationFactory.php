<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donation>
 */
class DonationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'user_id' => null,
            'project_id' => Project::factory(),
            'amount' => fake()->numberBetween(20000, 500000),
            'tree_quantity' => fake()->numberBetween(1, 25),
            'donor_name' => fake()->name(),
            'donor_email' => fake()->safeEmail(),
            'status' => fake()->randomElement(['pending', 'paid', 'failed']),
            'payment_token' => null,
            'payment_method' => fake()->randomElement(['bank_transfer', 'gopay', 'credit_card']),
            'payment_proof' => null,
            'admin_notes' => null,
        ];
    }
}
